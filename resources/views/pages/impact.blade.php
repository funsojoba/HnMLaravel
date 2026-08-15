@extends('layouts.app')

@section('title', 'Our Impact — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Our Impact</span>
        <h1>Measuring Impact Through People, Partnerships, and Purpose.</h1>
        <p>Every number tells part of our story, but the true measure of our impact is found in caregivers who feel supported, volunteers who choose to serve, students who grow into compassionate professionals, and communities that come together to strengthen families.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="stats">
            <div class="stat reveal">
                <div class="num">12+</div>
                <div class="label">Impactful workshops and events hosted, including the Reflect and Renew Workshop Series, Hearts and Brunch Series, Building You, and other community initiatives.</div>
            </div>
            <div class="stat reveal">
                <div class="num">250+</div>
                <div class="label">Caregivers and community members engaged through workshops, events, wellness initiatives, and community gatherings.</div>
            </div>
            <div class="stat reveal">
                <div class="num">3</div>
                <div class="label">Countries reached through virtual programming and community engagement across Canada, the United States, Jamaica, and Nigeria.</div>
            </div>
            <div class="stat reveal">
                <div class="num">15+</div>
                <div class="label">Community partnerships established with organizations, businesses, educational institutions, guest speakers, and community groups.</div>
            </div>
            <div class="stat reveal">
                <div class="num">25+</div>
                <div class="label">Volunteers and student placement participants supporting our programs, events, and practical relief initiatives.</div>
            </div>
            <div class="stat reveal">
                <div class="num">6,000+</div>
                <div class="label">Volunteer service hours contributed in support of caregivers, families, and community programs.</div>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">How We Measure It</span>
            <h2 class="section-title">Impact in Every Direction</h2>
        </div>
        <div class="grid grid-2">
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>Supporting Caregivers</h3>
                <p>Our programs have created spaces where caregivers can find practical assistance, emotional encouragement, learning opportunities, and connection with people who understand the realities of caregiving. Through these supports, Hearts and Mind helps reduce isolation, promote wellbeing, and strengthen families.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🤝</div>
                <h3>Building Community</h3>
                <p>Our workshops, Hearts and Brunch gatherings, support groups, and community events bring people together in meaningful ways. These shared experiences create relationships, encourage peer support, and build a stronger network around caregivers.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🎓</div>
                <h3>Developing Future Professionals</h3>
                <p>Student placements and volunteers contribute their time, skills, and energy while gaining practical experience in community service. Through supervision, mentorship, and direct involvement in programs and operations, participants develop knowledge and confidence that they can carry into their future work.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🌐</div>
                <h3>Working Together</h3>
                <p>Partnerships with community organizations, educational institutions, businesses, professionals, and guest speakers expand what we are able to offer. These collaborations strengthen programs, increase access to resources, and help build a more connected system of support for caregivers.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="stories">
    <div class="container center" style="max-width:780px;">
        <span class="eyebrow">Stories Behind the Numbers</span>
        <h2 class="section-title">The human impact behind every number</h2>
        <p class="section-lead reveal" style="margin-inline:auto;">
            Caregiver stories, volunteer experiences, reflections, and partner testimonials show the human impact
            behind every number. These stories help demonstrate how practical support, encouragement, and community
            can make caregiving more sustainable.
        </p>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Be Part of the Next Number.</h2>
            <p>Every workshop attended, every volunteer who serves, every partner who gives, and every caregiver who joins our community becomes part of the Hearts and Mind story.</p>
            <a href="{{ route('volunteer') }}" class="btn btn-light" style="margin-right:.6rem;">Volunteer With Us</a>
            <a href="{{ route('give-help') }}" class="btn btn-gold">Get Involved</a>
        </div>
    </div>
</section>

@endsection
