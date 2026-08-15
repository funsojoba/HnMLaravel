@extends('layouts.app')

@section('title', 'Leadership & Management — About Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/about-hero.png') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Meet the Team</span>
        <h1>Leadership &amp; Management</h1>
        <p>Behind Hearts and Mind Foster Community is a dedicated team of leaders, board members, volunteers, students, and community partners who are passionate about supporting caregivers and strengthening families.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.about-subnav')
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">Leadership</span>
            <h2 class="section-title">Abigail Wonuigwe</h2>
        </div>
        <div class="split" style="align-items:start;">
            <div class="reveal">
                <div class="visual" style="min-height:440px;">
                    <img src="/images/About/Abigail.jpg" alt="Abigail Wonuigwe">
                </div>
                <div class="team-card" style="margin-top:1.2rem;">
                    <h3>Abigail Wonuigwe</h3>
                    <span class="role">Founder &amp; Executive Director</span>
                </div>
            </div>
            <div class="reveal">
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Abigail Wonuigwe founded Hearts and Mind Foster Community from a deeply held belief that
                    caregivers deserve care too.
                </p>
                <p style="color:var(--muted);margin-bottom:1rem;">
                    As a foster parent herself, Abigail has experienced both the joy and the weight of opening her
                    home to children in need. She understands the sleepless nights, the emotional demands, the
                    countless appointments, the difficult decisions, and the moments when caregivers quietly carry
                    more than anyone else realizes. She also knows how transformative it can be when caregivers
                    receive the right support at the right time. That lived experience became the foundation of
                    Hearts and Mind Foster Community.
                </p>
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Abigail's vision is to build a community where foster parents and kinship caregivers never feel
                    like they have to figure everything out on their own. Through practical relief, emotional
                    wellness initiatives, education, mentorship, and meaningful community connections, she is leading
                    an organization that places caregivers at the heart of the conversation because when caregivers
                    thrive, children thrive too.
                </p>
                <p style="color:var(--muted);">
                    Abigail believes that every act of kindness, every helping hand, every listening ear, and every
                    moment of encouragement has the power to change a family's story. Her hope is that Hearts and
                    Mind Foster Community becomes a place where every caregiver feels seen, supported, valued, and
                    reminded that they are never alone on their journey.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">Governance</span>
            <h2 class="section-title">Board of Directors</h2>
        </div>

        <div class="split" style="align-items:start;margin-bottom:3.5rem;">
            <div class="reveal">
                <div class="visual" style="min-height:440px;">
                    <img src="/images/About/Hazel-Williams-.jpg" alt="Hazel Williams">
                </div>
                <div class="team-card" style="margin-top:1.2rem;">
                    <h3>Hazel Williams</h3>
                    <span class="role">Board Chair</span>
                </div>
            </div>
            <div class="reveal">
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Hazel currently serves as Chair of the Board, bringing her leadership, community experience, and
                    passion for strengthening support for children, families, foster parents, kinship caregivers, and
                    the wider community.
                </p>
                <p style="color:var(--muted);margin-bottom:1rem;">
                    With more than 30 years of experience in community and social services, Hazel has dedicated her
                    career to supporting children, youth, and families through child and youth care, behavioural and
                    special education support, crisis intervention, family collaboration, and community outreach.
                </p>
                <p style="color:var(--muted);">
                    As the Founder and CEO of Big Girl Interrupted, Hazel empowers women to rediscover their
                    confidence, purpose, and resilience through coaching, workshops, and supportive community spaces
                    — a passion that naturally complements her work ensuring caregivers feel seen, supported, and
                    equipped to thrive.
                </p>
            </div>
        </div>

        <div class="split" style="align-items:start;margin-bottom:3.5rem;">
            <div class="reveal" style="order:2;">
                <div class="visual" style="min-height:440px;">
                    <img src="/images/About/Chennell-Frederick.jpg" alt="Chennell Frederick, MSW">
                </div>
                <div class="team-card" style="margin-top:1.2rem;">
                    <h3>Chennell Frederick, MSW</h3>
                    <span class="role">Vice Chair</span>
                </div>
            </div>
            <div class="reveal" style="order:1;">
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Chennell provides strategic leadership and governance in support of the organization's mission to
                    strengthen caregivers and improve outcomes for children and families.
                </p>
                <p style="color:var(--muted);margin-bottom:1rem;">
                    A dedicated social worker with years of experience supporting children, youth, and families,
                    Chennell brings a deep understanding of trauma informed practice, family wellbeing, and community
                    based support — committed to empowering individuals through compassionate, person centered care.
                </p>
                <p style="color:var(--muted);">
                    Her own lived experience with kinship caregiving provides invaluable insight into the unique
                    realities, challenges, and rewards of caregiving, allowing her to lead with both professional
                    knowledge and personal understanding.
                </p>
            </div>
        </div>

        <div class="split" style="align-items:start;">
            <div class="reveal">
                <div class="visual" style="min-height:440px;">
                    <img src="/images/About/Valerie.jpg" alt="Valerie Babundo">
                </div>
                <div class="team-card" style="margin-top:1.2rem;">
                    <h3>Valerie Babundo</h3>
                    <span class="role">Board Secretary</span>
                </div>
            </div>
            <div class="reveal">
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Valerie serves as Board Secretary, contributing to the organization's governance, strategic
                    direction, and commitment to supporting foster parents and kinship caregivers.
                </p>
                <p style="color:var(--muted);">
                    Beyond her role with Hearts and Mind, Valerie is the founder of Verse Tread, a faith based
                    initiative dedicated to creating meaningful connections through faith, culture, and community —
                    rooted in the belief that everyone belongs and every story matters.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">Our Team</span>
            <h2 class="section-title">Supporting Every Day</h2>
        </div>
        <div class="split" style="align-items:start;">
            <div class="reveal">
                <div class="visual" style="min-height:440px;">
                    <img src="/images/About/Paula-Upe-Jimoh-.jpg" alt="Paula Upe Jimoh">
                </div>
                <div class="team-card" style="margin-top:1.2rem;">
                    <h3>Paula Upe Jimoh</h3>
                    <span class="role">Social Media &amp; Administrative Consultant</span>
                </div>
            </div>
            <div class="reveal">
                <p style="color:var(--muted);">
                    As a consultant, Paula supports Hearts and Mind Foster Community through social media management,
                    content creation, community engagement, and administrative coordination — helping amplify our
                    mission by sharing meaningful stories and strengthening communication with caregivers,
                    volunteers, partners, and the broader community.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Together, We Are Building a Community Where Caregivers Thrive.</h2>
            <p>Whether you are seeking support, looking to volunteer, interested in partnering with us, or simply want to learn more, we invite you to become part of the Hearts and Mind community.</p>
            <a href="{{ route('program', 'hearts-home-relief-support') }}" class="btn btn-light" style="margin-right:.6rem;">Our Programs</a>
            <a href="{{ route('give-help') }}" class="btn btn-gold">Get Involved</a>
        </div>
    </div>
</section>

@endsection
