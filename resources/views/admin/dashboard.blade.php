@extends('admin.layout')

@section('title', 'Dashboard — Admin')

@section('content')
<div class="topbar">
    <h1>Dashboard</h1>
    <span>Welcome, {{ session('admin_name', 'Admin') }}</span>
</div>

<div class="cards">
    <div class="card">
        <div class="num">${{ number_format($stats['donations_total'] / 100, 2) }}</div>
        <div class="label">Total donations received</div>
    </div>
    <div class="card">
        <div class="num">{{ $stats['donations_count'] }}</div>
        <div class="label">Successful donations</div>
    </div>
    <div class="card">
        <div class="num">{{ $stats['events_count'] }}</div>
        <div class="label">Events</div>
    </div>
    <div class="card">
        <div class="num">{{ $stats['unread_submissions'] }}</div>
        <div class="label">Unread submissions</div>
    </div>
</div>

<h2 style="margin-bottom:1rem;font-size:1.1rem;">Recent donations</h2>
<table style="margin-bottom:2rem;">
    <tr><th>Date</th><th>Email</th><th>Amount</th><th>Frequency</th><th>Status</th></tr>
    @forelse ($recentDonations as $d)
        <tr>
            <td>{{ $d->created_at->format('M j, Y') }}</td>
            <td>{{ $d->email ?? '—' }}</td>
            <td>{{ $d->amount_formatted }}</td>
            <td>{{ $d->frequency === 'monthly' ? 'Monthly' : 'One-time' }}</td>
            <td><span class="pill {{ $d->status }}">{{ ucfirst($d->status) }}</span></td>
        </tr>
    @empty
        <tr><td colspan="5">No donations yet.</td></tr>
    @endforelse
</table>

<h2 style="margin-bottom:1rem;font-size:1.1rem;">Recent submissions</h2>
<table>
    <tr><th>Date</th><th>Type</th><th>Name</th><th>Email</th><th></th></tr>
    @forelse ($recentSubmissions as $s)
        <tr>
            <td>{{ $s->created_at->format('M j, Y') }}</td>
            <td>{{ $s->type_label }}</td>
            <td>{{ $s->name ?? '—' }}</td>
            <td>{{ $s->email ?? '—' }}</td>
            <td>@unless ($s->is_read)<span class="pill unread">New</span>@endunless</td>
        </tr>
    @empty
        <tr><td colspan="5">No submissions yet.</td></tr>
    @endforelse
</table>
@endsection
