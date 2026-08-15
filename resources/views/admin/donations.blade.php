@extends('admin.layout')

@section('title', 'Donations — Admin')

@section('content')
<div class="topbar"><h1>Donations</h1></div>

<table>
    <tr><th>Date</th><th>Email</th><th>Amount</th><th>Frequency</th><th>Status</th><th>Stripe Session</th></tr>
    @forelse ($donations as $d)
        <tr>
            <td>{{ $d->created_at->format('M j, Y g:ia') }}</td>
            <td>{{ $d->email ?? '—' }}</td>
            <td>{{ $d->amount_formatted }}</td>
            <td>{{ $d->frequency === 'monthly' ? 'Monthly' : 'One-time' }}</td>
            <td><span class="pill {{ $d->status }}">{{ ucfirst($d->status) }}</span></td>
            <td style="font-size:.75rem;color:#999;">{{ $d->stripe_session_id ? substr($d->stripe_session_id, 0, 24).'…' : '—' }}</td>
        </tr>
    @empty
        <tr><td colspan="6">No donations yet.</td></tr>
    @endforelse
</table>

<div class="pagination">{{ $donations->links() }}</div>
@endsection
