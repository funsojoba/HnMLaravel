@extends('admin.layout')

@section('title', ($event->exists ? 'Edit' : 'New').' Event — Admin')

@section('content')
<div class="topbar">
    <h1>{{ $event->exists ? 'Edit Event' : 'New Event' }}</h1>
    <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">← Back</a>
</div>

@if ($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
@endif

<form method="POST" enctype="multipart/form-data"
      action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}"
      class="card" style="max-width:760px;">
    @csrf
    @if ($event->exists) @method('PUT') @endif

    <div class="form-grid">
        <div class="field full">
            <label>Title *</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" required>
        </div>
        <div class="field">
            <label>Date *</label>
            <input type="date" name="event_date" value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}" required>
        </div>
        <div class="field">
            <label>Time</label>
            <input type="time" name="event_time" value="{{ old('event_time', $event->event_time) }}">
        </div>
        <div class="field full">
            <label>Location</label>
            <input type="text" name="location" value="{{ old('location', $event->location) }}">
        </div>
        <div class="field full">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="field full">
            <label>Registration URL</label>
            <input type="url" name="register_url" value="{{ old('register_url', $event->register_url) }}" placeholder="https://…">
        </div>
        <div class="field full">
            <label>Event Flier</label>
            @if ($event->exists && $event->event_flier)
                <div style="display:flex;align-items:center;gap:.8rem;margin-bottom:.6rem;">
                    <a href="{{ $event->flier_url }}" target="_blank" rel="noopener">View current flier</a>
                    <label style="display:flex;align-items:center;gap:.4rem;font-weight:400;">
                        <input type="checkbox" name="remove_flier" value="1" style="width:auto;"> Remove flier
                    </label>
                </div>
            @endif
            <input type="file" name="event_flier" accept=".jpg,.jpeg,.png,.webp,.pdf">
            <span class="hint">JPG, PNG, WEBP or PDF, up to 5MB.</span>
        </div>
        <div class="field full">
            <label style="display:flex;align-items:center;gap:.5rem;">
                <input type="checkbox" name="is_published" value="1" style="width:auto;"
                       {{ old('is_published', $event->exists ? $event->is_published : true) ? 'checked' : '' }}>
                Published (visible on the website)
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-purple" style="margin-top:1.4rem;">
        {{ $event->exists ? 'Save Changes' : 'Create Event' }}
    </button>
</form>
@endsection
