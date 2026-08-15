<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Submission;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'donations_total' => Donation::where('status', 'paid')->sum('amount_cents'),
            'donations_count' => Donation::where('status', 'paid')->count(),
            'events_count' => Event::count(),
            'unread_submissions' => Submission::where('is_read', false)->count(),
        ];

        $recentDonations = Donation::latest()->take(5)->get();
        $recentSubmissions = Submission::latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentDonations', 'recentSubmissions'));
    }

    public function donations()
    {
        $donations = Donation::latest()->paginate(25);

        return view('admin.donations', compact('donations'));
    }

    public function submissions(?string $type = null)
    {
        $query = Submission::latest();

        if ($type && array_key_exists($type, Submission::TYPES)) {
            $query->where('type', $type);
        } else {
            $type = null;
        }

        $submissions = $query->paginate(25);

        return view('admin.submissions', compact('submissions', 'type'));
    }

    public function markRead(Submission $submission)
    {
        $submission->update(['is_read' => ! $submission->is_read]);

        return back();
    }
}
