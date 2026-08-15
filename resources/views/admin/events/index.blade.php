@extends('admin.layout')

@section('title', 'Events — Admin')

@section('content')
<div class="topbar">
    <h1>Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-purple">+ New Event</a>
</div>

<table>
    <tr><th>Date</th><th>Title</th><th>Time</th><th>Location</th><th>Flier</th><th>Published</th><th></th></tr>
    @forelse ($events as $e)
        <tr>
            <td>{{ $e->event_date->format('M j, Y') }}</td>
            <td>{{ $e->title }}</td>
            <td>{{ $e->formatted_time ?? '—' }}</td>
            <td>{{ $e->location ?? '—' }}</td>
            <td>{{ $e->event_flier ? '📎' : '—' }}</td>
            <td>{{ $e->is_published ? '✅' : '—' }}</td>
            <td style="white-space:nowrap;">
                <a href="{{ route('admin.events.edit', $e) }}" class="btn btn-ghost">Edit</a>
                <form method="POST" action="{{ route('admin.events.destroy', $e) }}" style="display:inline"
                      onsubmit="return confirm('Delete this event?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7">No events yet — create your first one.</td></tr>
    @endforelse
</table>

<div class="pagination">{{ $events->links() }}</div>
@endsection
