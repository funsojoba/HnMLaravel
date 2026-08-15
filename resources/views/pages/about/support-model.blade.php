@extends('layouts.app')

@section('title', 'Our Caregiver Support Model — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">How We Help</span>
        <h1>Our Caregiver Support Model</h1>
        <p>Rather than focusing on one challenge, our programs address the whole caregiving journey by combining practical support, emotional wellness, education, and community connection.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.about-subnav')
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container">
        <div class="grid grid-4">
            <div class="card reveal">
                <div class="icon">🏠</div>
                <h3>Practical Relief</h3>
                <p>Supporting caregivers through practical assistance and essential resources that reduce everyday stress and create space for what matters most.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🌿</div>
                <h3>Emotional Wellness</h3>
                <p>Creating opportunities for caregivers to rest, reflect, connect, and care for their own wellbeing through workshops, support groups, and wellness focused experiences.</p>
            </div>
            <div class="card reveal">
                <div class="icon">👥</div>
                <h3>Community Connection</h3>
                <p>Bringing caregivers together through meaningful relationships, shared experiences, and a supportive community that understands their journey.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🌱</div>
                <h3>Caregiver Growth</h3>
                <p>Providing education, mentorship, and practical tools that strengthen caregivers and build confidence throughout every stage of caregiving.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-purple">
    <div class="container center">
        <span class="eyebrow">Every Stage of the Journey</span>
        <h2 class="section-title">Supporting caregivers so they can continue providing safe, stable, and nurturing homes for children.</h2>
        <p class="section-lead reveal" style="margin-inline:auto;">
            Whether caregivers need practical relief, emotional support, education, or connection, our programs
            provide opportunities to grow, recharge, and thrive.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Ready to Get Started?</h2>
            <p>Whether you are looking for home support, education, or community, there is a place for you at Hearts and Mind Foster Community.</p>
            <a href="{{ route('home') }}#get-in-touch" class="btn btn-light" style="margin-right:.6rem;">Request Support</a>
            <a href="{{ route('program', 'hearts-home-relief-support') }}" class="btn btn-gold">See Our Programs</a>
        </div>
    </div>
</section>

@endsection
