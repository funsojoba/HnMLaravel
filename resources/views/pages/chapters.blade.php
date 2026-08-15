@extends('layouts.app')

@section('title', 'Chapters — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/chapters-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Our Community</span>
        <h1>Growing One Community at a Time.</h1>
        <p>Hearts and Mind Foster Community began in Durham Region with a vision of ensuring that caregivers never have to walk their journey alone. As our community grows, we hope to establish new chapters that bring the same support, connection, and sense of belonging to caregivers across Canada.</p>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="visual reveal">
            <img src="/images/Coaching/Coaching-and-Mentorship-3.jpg" alt="Caregivers gathered together in the Durham Region Chapter">
        </div>
        <div class="reveal">
            <span class="eyebrow">Our Founding Chapter</span>
            <h2 class="section-title">Durham Region Chapter</h2>
            <p style="color:var(--muted);margin-bottom:1rem;">
                The Durham Region Chapter is the founding chapter of Hearts and Mind Foster Community.
            </p>
            <p style="color:var(--muted);margin-bottom:1rem;">
                It is home to our workshops, community gatherings, wellness events, volunteer initiatives, and
                caregiver support programs.
            </p>
            <p style="color:var(--muted);">
                Through meaningful relationships and practical support, caregivers throughout Durham Region continue
                to build a stronger, more connected community together.
            </p>
        </div>
    </div>
</section>

<section class="section section-purple">
    <div class="container center" style="max-width:720px;margin-inline:auto;">
        <span class="eyebrow">Expanding Our Reach</span>
        <h2 class="section-title">Bring Hearts and Mind to Your Community</h2>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:.9rem;">
            We believe every community deserves a place where caregivers feel seen, supported, and connected. If you
            are interested in bringing Hearts and Mind Foster Community to your region through a future chapter or
            partnership, we would love to hear from you.
        </p>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:1.6rem;">
            Together, we can expand caregiver support to even more families and communities.
        </p>
        <a href="{{ route('home') }}#get-in-touch" class="btn btn-purple">Start a Conversation</a>
    </div>
</section>

@endsection
