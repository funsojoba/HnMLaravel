<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;
use Stripe\Webhook;

class DonationController extends Controller
{
    public function index()
    {
        return view('pages.donate');
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1|max:999999',
            'frequency' => 'required|in:one_time,monthly',
        ]);

        $amountCents = (int) round($validated['amount'] * 100);
        $frequency = $validated['frequency'];

        $stripe = new StripeClient(config('services.stripe.secret'));

        $priceData = [
            'currency' => 'usd',
            'unit_amount' => $amountCents,
            'product_data' => [
                'name' => $frequency === 'monthly'
                    ? 'Monthly Donation — Hearts and Mind'
                    : 'Donation — Hearts and Mind',
                'description' => 'Supporting foster parents, kinship caregivers and families.',
            ],
        ];

        if ($frequency === 'monthly') {
            $priceData['recurring'] = ['interval' => 'month'];
        }

        $session = $stripe->checkout->sessions->create([
            'mode' => $frequency === 'monthly' ? 'subscription' : 'payment',
            'line_items' => [[
                'price_data' => $priceData,
                'quantity' => 1,
            ]],
            'success_url' => route('donate.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('donate'),
        ]);

        Donation::create([
            'amount_cents' => $amountCents,
            'currency' => 'usd',
            'frequency' => $frequency,
            'stripe_session_id' => $session->id,
            'status' => 'pending',
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $donation = null;

        if ($sessionId = $request->query('session_id')) {
            $donation = Donation::where('stripe_session_id', $sessionId)->first();

            // Fallback confirmation in case the webhook hasn't fired yet.
            if ($donation && $donation->status === 'pending') {
                try {
                    $stripe = new StripeClient(config('services.stripe.secret'));
                    $session = $stripe->checkout->sessions->retrieve($sessionId);

                    if (in_array($session->payment_status, ['paid', 'no_payment_required'])) {
                        $donation->update([
                            'status' => 'paid',
                            'email' => $session->customer_details->email ?? null,
                            'stripe_customer_id' => is_string($session->customer) ? $session->customer : null,
                        ]);
                    }
                } catch (\Throwable $e) {
                    Log::warning('Stripe success lookup failed: '.$e->getMessage());
                }
            }
        }

        return view('pages.donate-success', compact('donation'));
    }

    public function webhook(Request $request)
    {
        $secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                $request->header('Stripe-Signature', ''),
                $secret
            );
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            Donation::where('stripe_session_id', $session->id)->update([
                'status' => 'paid',
                'email' => $session->customer_details->email ?? null,
                'stripe_customer_id' => is_string($session->customer ?? null) ? $session->customer : null,
            ]);
        }

        if ($event->type === 'checkout.session.expired') {
            Donation::where('stripe_session_id', $event->data->object->id)
                ->where('status', 'pending')
                ->update(['status' => 'failed']);
        }

        return response()->json(['received' => true]);
    }
}
