@extends('layouts.app')

@section('title', 'Thank You — Hearts and Mind')

@section('content')

<section class="section" style="padding-top:6rem;">
    <div class="container center" style="max-width:640px;">
        <div style="font-size:4.5rem;">💜</div>
        <h1 class="section-title" style="margin-top:1rem;">Thank you for your generosity!</h1>
        @if ($donation && $donation->status === 'paid')
            <p class="section-lead" style="margin:1rem auto 0;">
                Your {{ $donation->frequency === 'monthly' ? 'monthly donation' : 'donation' }} of
                <strong>{{ $donation->amount_formatted }}</strong> was received successfully.
                @if ($donation->email) A receipt has been sent to <strong>{{ $donation->email }}</strong>.@endif
            </p>
        @else
            <p class="section-lead" style="margin:1rem auto 0;">
                Your donation is being processed. You'll receive a confirmation email from Stripe shortly.
            </p>
        @endif
        <p class="section-lead" style="margin:1.2rem auto 2rem;">
            Because of you, foster parents and kinship caregivers get real, hands-on support — and the
            children in their care get more stable, loving homes.
        </p>
        <a href="{{ route('home') }}" class="btn btn-purple">Back to Home</a>
        <a href="{{ route('events') }}" class="btn btn-outline" style="margin-left:.6rem;">See Upcoming Events</a>
    </div>
</section>

@endsection
