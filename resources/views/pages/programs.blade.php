@extends('layouts.app')

@section('title', 'Our Programs — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">What We Do</span>
        <h1>Our Programs</h1>
        <p>Every program at Hearts and Mind Foster Community exists to reduce caregiver burden while strengthening the wellbeing of families.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-3">
            @foreach ($programs as $slug => $program)
                <a href="{{ route('program', $slug) }}" class="card reveal" style="display:block;">
                    <div class="icon">{{ $program['icon'] }}</div>
                    <h3>{{ $program['title'] }}</h3>
                    <p>{{ $program['tagline'] }}</p>
                    <span class="card-link">Learn more →</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Ready to Get Started?</h2>
            <p>Whether you are looking for home support, education, or community, there is a place for you at Hearts and Mind Foster Community.</p>
            <a href="{{ route('home') }}#get-in-touch" class="btn btn-light" style="margin-right:.6rem;">Request Support</a>
            <a href="{{ route('give-help') }}" class="btn btn-gold">Get Involved</a>
        </div>
    </div>
</section>

@endsection
