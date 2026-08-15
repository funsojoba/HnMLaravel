@extends('layouts.app')

@section('title', 'Our Mission — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Why We Exist</span>
        <h1>Our Mission</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.about-subnav')
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container center" style="max-width:780px;">
        <p class="section-lead reveal" style="font-size:1.25rem;color:var(--ink);margin-inline:auto;">
            At Hearts and Mind, we believe that supporting caregivers is one of the most powerful ways to change a
            child's life. Every caregiver who feels seen, supported, and empowered is better equipped to provide the
            stability, love, and guidance that children need to heal, grow, and thrive.
        </p>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>See the model behind our mission.</h2>
            <p>Explore how practical relief, emotional wellness, community connection, and caregiver growth come together to support every caregiver we serve.</p>
            <a href="{{ route('about.support-model') }}" class="btn btn-gold">Our Caregiver Support Model</a>
        </div>
    </div>
</section>

@endsection
