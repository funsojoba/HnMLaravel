@extends('layouts.app')

@section('title', 'Upcoming Events — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/events-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">What's Happening</span>
        <h1>Upcoming Events</h1>
        <p>Join us for our upcoming workshops, brunches, and support sessions designed specifically for foster parents and kinship caregivers.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="center reveal" style="max-width:760px;margin-inline:auto;margin-bottom:3rem;">
            <h2 class="section-title">Bringing Our Community Together.</h2>
            <p class="section-lead" style="margin-inline:auto;">Our events create opportunities for caregivers, families, volunteers, professionals, and community members to learn, connect, celebrate, and grow together.</p>
            <p class="section-lead" style="margin-inline:auto;margin-top:.8rem;">From wellness workshops to signature annual events, every gathering strengthens our community.</p>
        </div>

        <div class="form-tabs">
            <button type="button" class="active" data-tab="upcomingEvents">Upcoming Events</button>
            <button type="button" data-tab="allEvents">All Events</button>
        </div>

        <div id="upcomingEvents" class="events-grid">
            @forelse ($upcomingEvents as $event)
                @include('partials.event-card', ['event' => $event])
            @empty
                <div class="center" style="padding:3rem 0;grid-column:1/-1;">
                    <div style="font-size:3rem;">📅</div>
                    <h3 style="margin:.8rem 0;">No upcoming events just yet</h3>
                    <p class="section-lead" style="margin-inline:auto;">Check back soon — new brunches, workshops and community gatherings are added regularly.</p>
                </div>
            @endforelse
        </div>

        <div id="allEvents" class="events-grid" style="display:none;">
            @forelse ($allEvents as $event)
                @include('partials.event-card', ['event' => $event])
            @empty
                <div class="center" style="padding:3rem 0;grid-column:1/-1;">
                    <div style="font-size:3rem;">📅</div>
                    <h3 style="margin:.8rem 0;">No events yet</h3>
                    <p class="section-lead" style="margin-inline:auto;">Our past and upcoming events will show up here.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('scripts')
<script>
document.querySelectorAll('.form-tabs button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.form-tabs button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('upcomingEvents').style.display = btn.dataset.tab === 'upcomingEvents' ? '' : 'none';
        document.getElementById('allEvents').style.display = btn.dataset.tab === 'allEvents' ? '' : 'none';
    });
});
</script>
@endpush

@endsection
