@extends('layouts.app')

@section('title', 'Our Values — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">What Guides Us</span>
        <h1>Our Values</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.about-subnav')
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container">
        <div class="grid grid-3">
            <div class="card reveal">
                <div class="icon">🫶</div>
                <h3>Compassion</h3>
                <p>We meet caregivers with empathy, understanding, and respect.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🤝</div>
                <h3>Community</h3>
                <p>We believe meaningful relationships create lasting support.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💪</div>
                <h3>Empowerment</h3>
                <p>We equip caregivers with practical tools, knowledge, and encouragement.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🌐</div>
                <h3>Collaboration</h3>
                <p>We work alongside organizations, volunteers, businesses, and community partners to strengthen caregiver support.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🌈</div>
                <h3>Inclusion</h3>
                <p>We welcome caregivers from every background and value diverse lived experiences.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Meet the people who live out these values.</h2>
            <p>Our leadership team, board and volunteers are the heart of Hearts and Mind Foster Community.</p>
            <a href="{{ route('about.leadership') }}" class="btn btn-gold">Leadership &amp; Management</a>
        </div>
    </div>
</section>

@endsection
