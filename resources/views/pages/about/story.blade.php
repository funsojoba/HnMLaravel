@extends('layouts.app')

@section('title', 'Our Story — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Who We Are</span>
        <h1>Every Caregiver Deserves to Feel Seen, Supported, and Valued.</h1>
        <p>Behind every child who thrives is a caregiver who has been given the support, encouragement, and resources to continue showing up with love, resilience, and hope. At Hearts and Mind Foster Community, we exist to ensure that foster parents and kinship caregivers never have to walk that journey alone.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.about-subnav')
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container split">
        <div class="reveal">
            <span class="eyebrow">Our Story</span>
            <h2 class="section-title">How Hearts and Mind began</h2>
            <p style="color:var(--muted);margin-bottom:1rem;">
                Hearts and Mind Foster Community was founded from a simple but powerful belief: when caregivers are
                supported, children and families thrive.
            </p>
            <p style="color:var(--muted);margin-bottom:1rem;">
                We recognized that while foster parents and kinship caregivers dedicate themselves to providing safe,
                stable, and loving homes, they often do so while carrying immense emotional, physical, and practical
                responsibilities. Many experience isolation, exhaustion, and limited access to support.
            </p>
            <p style="color:var(--muted);margin-bottom:1rem;">
                Rather than asking caregivers to simply do more, we asked a different question:
                <strong>How can we better support the people who are caring for children?</strong>
            </p>
            <p style="color:var(--muted);">
                That question became the foundation of Hearts and Mind Foster Community. Today, we bring caregivers
                together through practical relief, wellness initiatives, education, mentorship, community events, and
                meaningful partnerships that strengthen both caregivers and the communities around them.
            </p>
        </div>
        <div class="visual reveal">
            <img src="/images/about-visual.jpg" alt="A caregiver family embracing outdoors">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Together, We Are Building a Community Where Caregivers Thrive.</h2>
            <p>Whether you are seeking support, looking to volunteer, interested in partnering with us, or simply want to learn more, we invite you to become part of the Hearts and Mind community.</p>
            <a href="{{ route('about.leadership') }}" class="btn btn-light" style="margin-right:.6rem;">Meet Our Leadership</a>
            <a href="{{ route('give-help') }}" class="btn btn-gold">Get Involved</a>
        </div>
    </div>
</section>

@endsection
