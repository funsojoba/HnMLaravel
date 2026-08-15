@extends('layouts.app')

@section('title', 'Our Vision — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Where We're Headed</span>
        <h1>Our Vision</h1>
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
            A future where every foster parent, kinship caregiver and their family have access to the support,
            community, and practical resources they need to thrive, creating stronger families and brighter futures
            for children.
        </p>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>The values that guide how we get there.</h2>
            <p>Compassion, community, empowerment, collaboration and inclusion shape everything we do.</p>
            <a href="{{ route('about.values') }}" class="btn btn-gold">See Our Values</a>
        </div>
    </div>
</section>

@endsection
