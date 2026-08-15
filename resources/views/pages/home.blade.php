@extends('layouts.app')

@section('title', 'Hearts and Mind — Support | Connect | Heal')

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero">
    <div class="container">
        <h1>Hearts And Mind</h1>
        <div class="tagline">
            <span>Supporting Caregivers</span><span class="dot"></span>
            <span>Strengthening Families</span><span class="dot"></span>
            <span>Building Community</span>
        </div>
        <p class="hero-sub">Empowering foster parents, kinship caregivers and families with resources, relational guidance, and in-home support.</p>
        <a href="{{ route('donate') }}" class="btn btn-gold">Donate ♥</a>
        <a href="{{ route('volunteer') }}" class="btn btn-light" style="margin-left:.6rem;">Volunteer With Us</a>
    </div>
</section>

{{-- ============ ABOUT TEASER ============ --}}
<section class="section">
    <div class="container split">
        <div class="reveal">
            <span class="eyebrow">Who We Are</span>
            <h2 class="section-title">About Hearts &amp; Mind</h2>
            <p class="section-lead" style="margin-bottom:1rem;">
                At Hearts and Mind Foster Community, we believe that supporting caregivers is one of the most powerful ways to change a child's life. Every caregiver who feels seen, supported, and empowered is better equipped to provide the stability, love, and guidance that children need to heal, grow, and thrive.
            </p>
            <p class="section-lead" style="margin-bottom:1.6rem;">
                Through practical relief, emotional wellness, education, and meaningful community connections, we are building a community where no caregiver has to walk the journey alone.
            </p>
            <a href="{{ route('about') }}" class="btn btn-purple">Learn More</a>
        </div>
        <div class="visual reveal">
            <img src="/images/home-about.jpg" alt="A family sharing a moment together">
        </div>
    </div>
</section>

{{-- ============ CAREGIVERS CHANGE LIVES ============ --}}
<section class="section section-purple">
    <div class="container center" style="max-width:800px;margin-inline:auto;">
        <span class="eyebrow">Why We're Here</span>
        <h2 class="section-title">Caregivers Change Lives. They Should Not Have to Do It Alone.</h2>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:.9rem;">
            Every day, foster parents and kinship caregivers open their homes and hearts to children who need
            safety, stability, and belonging. While caregiving is incredibly rewarding, it also comes with unique
            challenges that can often leave caregivers feeling overwhelmed, isolated, and exhausted.
        </p>
        <p class="section-lead reveal" style="margin-inline:auto;">
            At Hearts and Mind Foster Community, we exist to change that. By providing practical support, emotional
            encouragement, educational opportunities, and a strong community of peers and partners, we help
            caregivers continue doing what they do best, caring for children with confidence, compassion, and hope.
        </p>
    </div>
</section>

{{-- ============ HOW WE SUPPORT CAREGIVERS ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">What We Do</span>
            <h2 class="section-title">How We Support Caregivers</h2>
        </div>
        <div class="grid grid-4">
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🏠</div>
                <h3>Practical Relief</h3>
                <p>Supporting caregivers through practical assistance and essential resources that reduce everyday stress and create space for what matters most.</p>
            </div>
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🌿</div>
                <h3>Emotional Wellness</h3>
                <p>Creating opportunities for caregivers to rest, reflect, connect, and care for their own wellbeing through workshops, support groups, and wellness focused experiences.</p>
            </div>
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🤝</div>
                <h3>Community Connection</h3>
                <p>Bringing caregivers together through meaningful relationships, shared experiences, and a supportive community that understands their journey.</p>
            </div>
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🌱</div>
                <h3>Caregiver Growth</h3>
                <p>Providing education, mentorship, and practical tools that strengthen caregivers and build confidence throughout every stage of caregiving.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ OUR IMPACT AT A GLANCE ============ --}}
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:700px;margin-inline:auto;">
            <span class="eyebrow">By the Numbers</span>
            <h2 class="section-title">Our Impact at a Glance</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">Every number tells a story of lives touched, caregivers supported, and communities strengthened.</p>
        </div>
        <div class="stats">
            <div class="stat reveal">
                <div class="num">12</div>
                <div class="label">Impactful workshops and events hosted, including the Reflect &amp; Renew Workshop Series, Hearts &amp; Brunch Series, and the first edition of our Building You event.</div>
            </div>
            <div class="stat reveal">
                <div class="num">250+</div>
                <div class="label">Caregivers and community members joined us, showing the growing need for spaces of caregiver support.</div>
            </div>
            <div class="stat reveal">
                <div class="num">3</div>
                <div class="label">Countries reached beyond Canada — the United States, Jamaica, and Nigeria — through our online programming.</div>
            </div>
            <div class="stat reveal">
                <div class="num">15+</div>
                <div class="label">Partnerships formed with organizations, guest speakers, and community groups.</div>
            </div>
            <div class="stat reveal">
                <div class="num">25+</div>
                <div class="label">Volunteers and placement students supported our programs and relief packages.</div>
            </div>
            <div class="stat reveal">
                <div class="num">6,000+</div>
                <div class="label">People reached monthly on Instagram, building an organic community across social platforms.</div>
            </div>
        </div>
        <div class="center" style="margin-top:2.4rem;">
            <a href="{{ route('impact') }}" class="btn btn-purple">Explore Our Impact</a>
        </div>
    </div>
</section>

{{-- ============ OUR PROGRAMS ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:700px;margin-inline:auto;">
            <span class="eyebrow">What We Offer</span>
            <h2 class="section-title">Our Programs</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">Every program at Hearts and Mind Foster Community exists to reduce caregiver burden while strengthening the wellbeing of families.</p>
        </div>
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
        <div class="center" style="margin-top:2.4rem;">
            <a href="{{ route('programs') }}" class="btn btn-purple">Explore Our Programs</a>
        </div>
    </div>
</section>

{{-- ============ STORIES FROM OUR COMMUNITY ============ --}}
<section class="section">
    <div class="container center" style="max-width:720px;margin-inline:auto;">
        <span class="eyebrow">In Their Words</span>
        <h2 class="section-title">Stories from Our Community</h2>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:1.6rem;">
            Behind every program is a caregiver who felt supported, a volunteer who chose to serve, a student who
            discovered purpose, and a partner who believed in our mission. Their stories remind us that meaningful
            change begins with community.
        </p>
        <a href="{{ route('impact') }}#stories" class="btn btn-purple">Read Our Stories</a>
    </div>
</section>

{{-- ============ EVENTS CALENDAR ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:700px;margin-inline:auto;">
            <span class="eyebrow">Mark Your Calendar</span>
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">Join us for workshops, wellness sessions, caregiver gatherings, and signature community events designed to educate, encourage, and connect.</p>
        </div>
        @include('partials.calendar')
        <div class="center" style="margin-top:2.4rem;">
            <a href="{{ route('events') }}" class="btn btn-purple">View All Events</a>
        </div>
    </div>
</section>

{{-- ============ GET INVOLVED ============ --}}
<section class="section" id="get-involved">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:720px;margin-inline:auto;">
            <span class="eyebrow">Join Us</span>
            <h2 class="section-title">Get Involved</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">
                Whether you volunteer your time, partner with us, sponsor an initiative, or make a donation, you
                become part of a growing community committed to supporting caregivers and strengthening families.
            </p>
        </div>
        <div class="grid grid-3">
            <a href="{{ route('volunteer') }}" class="card reveal" style="display:block;">
                <div class="icon">🙋</div>
                <h3>Volunteer</h3>
                <p>Share your time and skills to support caregivers and children.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsorship" class="card reveal" style="display:block;">
                <div class="icon">🤝</div>
                <h3>Become a Partner</h3>
                <p>Partner with us to expand programs and reach more families.</p>
            </a>
            <a href="{{ route('volunteer') }}#apply" class="card reveal" style="display:block;">
                <div class="icon">🎓</div>
                <h3>Student Placement</h3>
                <p>Gain meaningful, hands-on placement experience with our team.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsor-form" class="card reveal" style="display:block;">
                <div class="icon">🎗️</div>
                <h3>Sponsor</h3>
                <p>Sponsor a program, workshop, or community event.</p>
            </a>
            <a href="{{ route('donate') }}" class="card reveal" style="display:block;">
                <div class="icon">💜</div>
                <h3>Donate</h3>
                <p>Every gift creates real, practical support for caregivers.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsorship" class="card reveal" style="display:block;">
                <div class="icon">🏢</div>
                <h3>Corporate Support</h3>
                <p>Matching gifts, employee volunteering, and corporate partnerships.</p>
            </a>
        </div>
    </div>
</section>

{{-- ============ GET IN TOUCH (support / contact forms) ============ --}}
<section class="section section-alt" id="get-in-touch">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">We're Here For You</span>
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-lead">Choose the form that best fits your needs.</p>
        </div>

        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert-error">Please correct the highlighted fields and try again.</div>
        @endif

        <div class="form-card" style="max-width:860px;margin-inline:auto;">
            <div class="form-tabs">
                <button type="button" class="active" data-tab="supportForm">Support Request Form</button>
                <button type="button" data-tab="contactForm">Contact Form</button>
            </div>

            {{-- SUPPORT REQUEST --}}
            <form id="supportForm" method="POST" action="{{ route('forms.store', 'support') }}">
                @csrf
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
                <p style="color:var(--muted);font-size:.93rem;margin-bottom:1.4rem;">
                    Please share what you need. Our team will review your request and follow up as soon as possible.
                    Fields marked with * help us respond faster.
                </p>
                <div class="form-grid">
                    <div class="field"><label>Full Name *</label><input type="text" name="name" required></div>
                    <div class="field"><label>Email *</label><input type="email" name="email" required></div>
                    <div class="field"><label>Phone</label><input type="tel" name="phone"></div>
                    <div class="field">
                        <label>Preferred Contact Method</label>
                        <select name="contact_method">
                            <option value="">— None —</option>
                            <option>Email</option><option>Text</option><option>Phone Call</option>
                        </select>
                    </div>
                    @include('partials.province-city', ['prefix' => 'support'])
                    <div class="field full"><label>Additional Notes</label><textarea name="notes" rows="3"></textarea></div>
                    <div class="field full checks">
                        <label>Your Needs * <span class="hint">(select all that apply)</span></label>
                        <span class="group-label">Practical Support</span>
                        <label class="check"><input type="checkbox" name="needs[]" value="Laundry Assistance"> Laundry Assistance</label>
                        <label class="check"><input type="checkbox" name="needs[]" value="Meal Prep"> Meal Prep</label>
                        <label class="check"><input type="checkbox" name="needs[]" value="Emergency Cleaning"> Emergency Cleaning</label>
                        <span class="group-label">Community Connection</span>
                        <label class="check"><input type="checkbox" name="needs[]" value="Hearts and Mind Brunch Invites"> Hearts and Mind Brunch Invites</label>
                        <label class="check"><input type="checkbox" name="needs[]" value="Join a POD"> Join a POD</label>
                        <span class="group-label">Cultural Support</span>
                        <label class="check"><input type="checkbox" name="needs[]" value="Indigenous Healing Circles"> Indigenous Healing Circles</label>
                        <label class="check"><input type="checkbox" name="needs[]" value="Black Parent Affinity Group"> Black Parent Affinity Group</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-purple" style="margin-top:1.6rem;">Submit Request</button>
                <p class="form-note">By submitting this form, you confirm the information provided is accurate to the best of your knowledge.</p>
            </form>

            {{-- CONTACT --}}
            <form id="contactForm" method="POST" action="{{ route('forms.store', 'contact') }}" style="display:none;">
                @csrf
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
                <div class="form-grid">
                    <div class="field"><label>Full Name *</label><input type="text" name="name" required></div>
                    <div class="field"><label>Email *</label><input type="email" name="email" required></div>
                    <div class="field"><label>Phone</label><input type="tel" name="phone"></div>
                    <div class="field"><label>Subject</label><input type="text" name="subject"></div>
                    <div class="field full"><label>Message *</label><textarea name="message" rows="5" required></textarea></div>
                </div>
                <button type="submit" class="btn btn-purple" style="margin-top:1.6rem;">Send Message</button>
            </form>
        </div>
    </div>
</section>

{{-- ============ CLOSING CTA ============ --}}
<section class="section">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Together, We Can Build a Stronger Community for Caregivers.</h2>
            <p>Every act of support creates a ripple effect that reaches children, families, and communities. Join us in ensuring that every caregiver feels seen, supported, and empowered.</p>
            <a href="#get-in-touch" class="btn btn-light" style="margin-right:.6rem;">Request Support</a>
            <a href="{{ route('donate') }}#circle-of-care" class="btn btn-light" style="margin-right:.6rem;">Join the Circle of Care</a>
            <a href="#get-involved" class="btn btn-gold">Get Involved</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.form-tabs button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.form-tabs button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('supportForm').style.display = btn.dataset.tab === 'supportForm' ? '' : 'none';
        document.getElementById('contactForm').style.display = btn.dataset.tab === 'contactForm' ? '' : 'none';
    });
});
</script>
@endpush
