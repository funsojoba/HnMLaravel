@extends('layouts.app')

@section('title', 'Our Community — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/community-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Our Community</span>
        <h1>About Hearts &amp; Mind Brunches</h1>
        <p>Building connections, fostering hope, and creating lasting change for foster families.</p>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:840px;">
        <p class="reveal" style="font-size:1.08rem;color:var(--muted);">
            Our community gatherings are more than just meals — they're spaces where foster families find support,
            connection, and understanding. Through our Hearts &amp; Mind Brunches, we create opportunities for
            families to share experiences, build relationships, and access resources in a warm, welcoming environment.
        </p>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="grid grid-3">
            <div class="card reveal">
                <div class="icon">🤝</div>
                <h3>Peer Support</h3>
                <p>Connect with other foster families who understand your journey and can offer guidance, empathy, and practical advice.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🍽️</div>
                <h3>Nourishing Meals</h3>
                <p>Enjoy delicious, culturally diverse meals prepared with love by our community volunteers and local partners.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💝</div>
                <h3>Resource Access</h3>
                <p>Access information about local services, support programs, and community resources designed for foster families.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-purple">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">What to Expect</span>
            <h2 class="section-title">A welcoming atmosphere, every time</h2>
        </div>
        <div class="grid grid-2">
            <div class="card reveal">
                <h3>Welcoming Atmosphere</h3>
                <p>Our brunches are held in comfortable, family-friendly spaces where everyone feels at home — children welcome, always.</p>
            </div>
            <div class="card reveal">
                <h3>Real Connection</h3>
                <p>No agendas or pressure: just warm conversation, shared stories, and a community that truly understands the caregiving journey.</p>
            </div>
        </div>
        <div class="center" style="margin-top:2.4rem;">
            <a href="{{ route('events') }}" class="btn btn-purple">See Upcoming Brunches</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">Moments Together</span>
            <h2 class="section-title">From our Hearts &amp; Mind Brunches</h2>
        </div>
        <div class="grid grid-3">
            @foreach (['Brunch-1.jpg', 'Brunch-2.jpg', 'Brunch-4.jpg', 'Brunch-5.jpg', 'Brunch-6.jpg', 'Brunch-7.jpg'] as $photo)
                <div class="gallery-photo reveal">
                    <img src="/images/Brunch/{{ $photo }}" alt="Foster families gathered at a Hearts &amp; Mind Brunch">
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
