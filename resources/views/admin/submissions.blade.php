@extends('admin.layout')

@section('title', 'Submissions — Admin')

@section('content')
<div class="topbar"><h1>Form Submissions</h1></div>

<div class="tabs">
    <a href="{{ route('admin.submissions') }}" class="{{ $type ? '' : 'active' }}">All</a>
    @foreach (\App\Models\Submission::TYPES as $key => $label)
        <a href="{{ route('admin.submissions', $key) }}" class="{{ $type === $key ? 'active' : '' }}">{{ $label }}</a>
    @endforeach
</div>

<table>
    <tr><th>Date</th><th>Type</th><th>Name</th><th>Contact</th><th>Details</th><th></th></tr>
    @forelse ($submissions as $s)
        <tr>
            <td>{{ $s->created_at->format('M j, Y g:ia') }}</td>
            <td>{{ $s->type_label }}</td>
            <td>{{ $s->name ?? '—' }}</td>
            <td>
                {{ $s->email }}<br>
                <span style="color:#999;">{{ $s->phone }}</span>
            </td>
            <td>
                <details class="json">
                    <summary>View details</summary>
                    <pre>@foreach ($s->data ?? [] as $k => $v){{ str_replace('_', ' ', ucfirst($k)) }}: {{ is_array($v) ? implode(', ', $v) : $v }}
@endforeach</pre>
                </details>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.submissions.read', $s) }}">
                    @csrf
                    <button class="btn {{ $s->is_read ? 'btn-ghost' : 'btn-purple' }}" type="submit">
                        {{ $s->is_read ? 'Read ✓' : 'Mark read' }}
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No submissions yet.</td></tr>
    @endforelse
</table>

<div class="pagination">{{ $submissions->links() }}</div>
@endsection
