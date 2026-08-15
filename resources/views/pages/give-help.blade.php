@extends('layouts.app')

@section('title', 'Give Help — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/give-help-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Partner With Us</span>
        <h1>Your Support Keeps Families Strong</h1>
        <p>Businesses, foundations, and community partners — join us to prevent burnout and keep foster placements stable.</p>
        <a href="#sponsorship" class="btn btn-gold" style="margin-top:1.6rem;">Learn How to Help</a>
    </div>
</section>

{{-- Sponsorship opportunities --}}
<section class="section" id="sponsorship">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">Sponsorship Opportunities</span>
            <h2 class="section-title">Ways to Partner</h2>
        </div>
        <div class="grid grid-3">
            <div class="card reveal">
                <div class="icon">🏢</div>
                <h3>Corporate Partnerships</h3>
                <p>Create meaningful impact in your community while advancing your corporate social responsibility goals — employee volunteer programs, matching gift initiatives, long-term strategic partnerships, and brand visibility and recognition.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🏪</div>
                <h3>Local Business Support</h3>
                <p>Local shops, restaurants and service providers can sponsor brunches, donate services, or host community drives that directly support foster families nearby.</p>
            </div>
            <div class="card reveal">
                <div class="icon">🎁</div>
                <h3>In-Kind Donations</h3>
                <p>Goods and services — meals, supplies, gift cards, professional services — go straight to families and programs where they're needed most.</p>
            </div>
        </div>
    </div>
</section>

{{-- Why sponsor --}}
<section class="section section-purple">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">Why Sponsor?</span>
            <h2 class="section-title">The impact is measurable</h2>
        </div>
        <div class="stats" style="margin-bottom:2.4rem;">
            <div class="stat reveal"><div class="num">92%</div><div class="label">of our parents say sponsors' support reduced their stress</div></div>
            <div class="stat reveal"><div class="num">40</div><div class="label">hours of support provided with every $1K sponsorship</div></div>
            <div class="stat reveal"><div class="num">85%</div><div class="label">reduction in placement disruptions for supported families</div></div>
        </div>
        <div class="grid grid-2">
            <div class="quote reveal">"Partnering with Hearts &amp; Mind lets our business live its values."<cite>— Local Bakery Owner</cite></div>
            <div class="quote reveal">"Seeing the direct impact on families in our community is incredibly rewarding."<cite>— Community Bank Manager</cite></div>
        </div>
    </div>
</section>

{{-- How it works --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">How Your Support Makes a Difference</span>
            <h2 class="section-title">$1K → 40 hours of support → 2 families helped → 1 month of stability</h2>
        </div>
        <div class="grid grid-3 steps">
            <div class="card step reveal">
                <h3>You Give</h3>
                <p>Choose cash, in-kind, or employee volunteering.</p>
            </div>
            <div class="card step reveal">
                <h3>We Deliver</h3>
                <p>Impact reports, measurable outcomes and transparent reporting you can trust.</p>
            </div>
            <div class="card step reveal">
                <h3>Families Thrive</h3>
                <p>Fewer disruptions, more stable homes.</p>
            </div>
        </div>
        <div class="center" style="margin-top:2.2rem;">
            <a href="#sponsor-form" class="btn btn-purple">Become a Sponsor Today</a>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="section">
    <div class="container" style="max-width:820px;">
        <div class="center" style="margin-bottom:2.2rem;">
            <span class="eyebrow">Sponsor FAQ</span>
            <h2 class="section-title">Common Questions</h2>
        </div>
        <details class="faq reveal">
            <summary>Can we sponsor a specific program?</summary>
            <p>Yes — you can direct your sponsorship toward a specific program such as relief packages, brunches, workshops, or cultural community support. Tell us your preference in the inquiry form below.</p>
        </details>
        <details class="faq reveal">
            <summary>Is my donation tax-deductible?</summary>
            <p>Please contact us at info@heartsandmind.org for details on receipts for your contribution.</p>
        </details>
        <details class="faq reveal">
            <summary>How are sponsors recognized?</summary>
            <p>Sponsors are featured in our sponsor spotlight, at events, and in program communications — with recognition tailored to your level of support.</p>
        </details>
        <details class="faq reveal">
            <summary>What's the minimum sponsorship amount?</summary>
            <p>There is no minimum — every contribution provides real hours of support to families. Reach out and we'll find the right fit.</p>
        </details>
        <details class="faq reveal">
            <summary>Can we volunteer as a team?</summary>
            <p>Absolutely. Corporate and community groups can volunteer together for meal prep, brunch setup, drives and more.</p>
        </details>
    </div>
</section>

{{-- Sponsors spotlight --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2rem;">
            <span class="eyebrow">Current Sponsors / Partners Spotlight</span>
            <h2 class="section-title">Thank you to our partners</h2>
        </div>
        <div class="sponsors reveal">
            @foreach ([
                'dcare.jpg' => "D'Care Foundation",
                'bigGirl.jpg' => 'Big Girl Interupted',
                'oxfordCollege.jpg' => 'Oxford College',
                'gas.jpg' => 'Gas Group',
                'black_women.jpg' => 'The Black Women Collective',
                'cop.jpg' => 'Dempsey Insurance & Financial Services',
                'eyeni.jpg' => 'Eyeni',
                'joseline.jpg' => 'Joseline Siles Makeup Artist',
                'verse.jpg' => 'Verse Thread',
                'zen.jpg' => 'ZenWellness Coaching',
                'chef_pike.jpeg' => 'Chef Pike Catering',
                'myrie.jpeg' => 'Myrie Beauty',
                'paradeyes.jpeg' => 'Paradeyes Optical',
                'primerica.png' => 'Primerica',
                'soulReaction.jpg' => 'Soul Reaction',
                'Goled-Photo.png' => "Gale D'Souza Photographic Touch",
            ] as $file => $sponsor)
                <div class="sponsor-logo">
                    <img src="/images/sponsors/{{ $file }}" alt="{{ $sponsor }} logo" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Sponsorship inquiry form --}}
<section class="section" id="sponsor-form">
    <div class="container" style="max-width:860px;">
        <div class="center" style="margin-bottom:2.2rem;">
            <span class="eyebrow">Get Started</span>
            <h2 class="section-title">Sponsorship Inquiry</h2>
        </div>

        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert-error">Please correct the highlighted fields and try again.</div>
        @endif

        <form class="form-card" method="POST" action="{{ route('forms.store', 'sponsorship') }}">
            @csrf
            <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
            <div class="form-grid">
                <div class="field"><label>Contact Name *</label><input type="text" name="name" required></div>
                <div class="field"><label>Organization</label><input type="text" name="organization"></div>
                <div class="field"><label>Email *</label><input type="email" name="email" required></div>
                <div class="field"><label>Phone</label><input type="tel" name="phone"></div>
                <div class="field full checks">
                    <label>I'm interested in… <span class="hint">(select all that apply)</span></label>
                    <span class="group-label">1. Financial Sponsorship</span>
                    <label class="check"><input type="checkbox" name="interests[]" value="Program Sponsorship"> Sponsor a program (relief packages, workshops, brunches)</label>
                    <label class="check"><input type="checkbox" name="interests[]" value="General Donation"> General financial support</label>
                    <span class="group-label">2. In-Kind Support</span>
                    <label class="check"><input type="checkbox" name="interests[]" value="Goods / Services"> Donate goods or services</label>
                    <label class="check"><input type="checkbox" name="interests[]" value="Meals / Catering"> Provide meals or catering</label>
                    <span class="group-label">3. Employee Engagement</span>
                    <label class="check"><input type="checkbox" name="interests[]" value="Team Volunteering"> Team volunteering (meal prep, brunch setup)</label>
                    <label class="check"><input type="checkbox" name="interests[]" value="Matching Gift Program"> Matching gift program (match employee donations)</label>
                    <span class="group-label">4. Cultural Community Support (Indigenous / Black initiatives)</span>
                    <label class="check"><input type="checkbox" name="interests[]" value="Land-Based Healing"> Sponsor land-based healing (Elder honoraria, supplies)</label>
                    <label class="check"><input type="checkbox" name="interests[]" value="Haircare / Mental Health Days"> Fund haircare / mental health days for Black parents</label>
                    <label class="check"><input type="checkbox" name="interests[]" value="Cultural Events"> Underwrite cultural events (Kwanzaa, Powwows, etc.)</label>
                    <span class="group-label">5. Other</span>
                    <label class="check"><input type="checkbox" name="interests[]" value="Custom Partnership"> Propose a custom partnership</label>
                </div>
                <div class="field full"><label>Describe your idea</label><textarea name="message" rows="4"></textarea></div>
            </div>
            <button type="submit" class="btn btn-purple" style="margin-top:1.6rem;">Submit Sponsorship Inquiry</button>
        </form>
    </div>
</section>

@endsection
