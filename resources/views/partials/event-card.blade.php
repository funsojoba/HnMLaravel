<div class="card event-card reveal">
    <div class="event-card-head">
        <div class="event-date-chip">
            <div class="d">{{ $event->event_date->format('j') }}</div>
            <div class="m">{{ $event->event_date->format('M Y') }}</div>
        </div>
        <h3>{{ $event->title }}</h3>
    </div>

    <div class="event-meta">
        @if ($event->event_time)<span>🕒 {{ $event->formatted_time }}</span>@endif
        @if ($event->location)<span>📍 {{ $event->location }}</span>@endif
    </div>

    @if ($event->flier_is_image)
        <a href="{{ $event->flier_url }}" target="_blank" rel="noopener">
            <img src="{{ $event->flier_url }}" alt="{{ $event->title }} flier" class="event-flier-thumb">
        </a>
    @endif

    <p style="color:var(--muted);">{{ $event->description }}</p>

    <div class="event-card-actions">
        @if ($event->register_url)
            <a href="{{ $event->register_url }}" target="_blank" rel="noopener" class="btn btn-purple">Register for this event</a>
        @endif
        @if ($event->event_flier && ! $event->flier_is_image)
            <a href="{{ $event->flier_url }}" target="_blank" rel="noopener" class="btn btn-outline">View Flier</a>
        @endif
    </div>
</div>
