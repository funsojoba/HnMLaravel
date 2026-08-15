@extends('layouts.app')

@section('title', 'Volunteer — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/volunteer-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Get Involved</span>
        <h1>Every Child Deserves a Supported Caregiver. You Can Help Make That Possible.</h1>
        <p>At Hearts and Mind Foster Community, our volunteers are at the heart of everything we do. Whether you're preparing Home Kits, organizing the Heart and Home Closet, supporting workshops, assisting with our Home Management Program, or sharing your professional skills, your time helps caregivers feel supported and children feel welcomed.</p>
        <p style="margin-top:.8rem;">Join a compassionate community that's making a meaningful impact, one caregiver at a time.</p>
        <a href="#apply" class="btn btn-gold" style="margin-top:1.6rem;">Become a Volunteer</a>
    </div>
</section>

{{-- ============ WHERE YOU CAN MAKE AN IMPACT ============ --}}
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;">
            <span class="eyebrow">Get Involved</span>
            <h2 class="section-title">Where You Can Make an Impact</h2>
        </div>
        <div class="grid grid-3">
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Relief/relief-4.jpeg" alt="Volunteers organizing the Heart and Home Closet">
                </div>
                <h3>Heart and Home Closet</h3>
                <p style="color:var(--muted);font-size:.95rem;">Help organize donations, prepare Welcome Home Kits, maintain inventory, and assist during Community Closet Days, ensuring caregivers have access to essential resources when they need them most.</p>
            </div>
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Relief/relief-1.jpeg" alt="Volunteers supporting the Home Management Program">
                </div>
                <h3>Home Management Program</h3>
                <p style="color:var(--muted);font-size:.95rem;">Support caregivers by providing practical household assistance such as meal preparation, home organization, laundry, light housekeeping, moving support, and errands, helping restore balance during challenging seasons.</p>
            </div>
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Brunch/Brunch-1.jpg" alt="Volunteers at a Hearts and Mind Brunchin event">
                </div>
                <h3>Hearts and Mind Brunchin'</h3>
                <p style="color:var(--muted);font-size:.95rem;">Help create welcoming gatherings where caregivers can connect and build community. Volunteers assist with coordinating venues, registrations, hospitality, photography, refreshments, and creating meaningful experiences for every attendee.</p>
            </div>
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Workshop/Workshop-1.jpg" alt="Volunteers at a Reflect and Renew Workshop">
                </div>
                <h3>Reflect and Renew Workshops</h3>
                <p style="color:var(--muted);font-size:.95rem;">Support our virtual and in person workshops by preparing resources, coordinating speakers, assisting with registrations, facilitating virtual sessions, and helping create engaging learning experiences for caregivers.</p>
            </div>
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Coaching/Coaching-and-Mentorship-3.jpg" alt="A coaching, mentorship and support group session">
                </div>
                <h3>Coaching, Mentorship, and Support Groups</h3>
                <p style="color:var(--muted);font-size:.95rem;">Support caregivers behind the scenes by assisting with administrative tasks, preparing resources, coordinating schedules, and helping create welcoming spaces where caregivers can learn, grow, and connect.</p>
            </div>
            <div class="reveal">
                <div class="gallery-photo" style="margin-bottom:1rem;">
                    <img src="/images/Coaching/Coaching-and-Mentorship-1.jpg" alt="Community events and outreach">
                </div>
                <h3>Community Events and Outreach</h3>
                <p style="color:var(--muted);font-size:.95rem;">Represent Hearts and Mind at community events, awareness campaigns, fundraising initiatives, collection drives, and family events while helping us build meaningful connections throughout the community.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ PROFESSIONAL VOLUNTEERS & STUDENT PLACEMENTS ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="split" style="align-items:center;">
            <div class="visual reveal">
                <img src="/images/Brunch/Brunch-7.jpg" alt="A team of professional volunteers and student placements">
            </div>
            <div class="reveal">
                <span class="eyebrow">For Students &amp; Professionals</span>
                <h2 class="section-title">Professional Volunteers and Student Placements</h2>
                <p style="color:var(--muted);margin-bottom:1rem;">
                    Whether you're a student looking for meaningful placement experience or a professional wanting to
                    give back, there's a place for you at Hearts and Mind.
                </p>
                <p style="color:var(--muted);margin-bottom:1.4rem;">
                    We welcome volunteers from a variety of backgrounds, including Social Work, Child and Youth Care,
                    Developmental Services, Personal Support Work, Mental Health, Education, Marketing, Photography,
                    Event Planning, Administration, Salesforce, and many other professional fields.
                </p>
                <a href="#apply" class="btn btn-purple">Apply for a Student Placement</a>
            </div>
        </div>
    </div>
</section>

{{-- ============ THE IMPACT YOU'LL MAKE ============ --}}
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:760px;margin-inline:auto;">
            <span class="eyebrow">The Impact You'll Make</span>
            <h2 class="section-title">Every volunteer plays an important role in strengthening our community.</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">
                Our volunteers help prepare Welcome Home Kits, organize the Heart and Home Closet, support our Home
                Management Program, assist with workshops and events, and create welcoming spaces where caregivers
                feel seen, supported, and connected. Every hour you give helps strengthen families and create
                brighter beginnings for children.
            </p>
        </div>
        <div class="grid grid-3">
            @foreach ([
                '/images/Brunch/Brunch-4.jpg',
                '/images/Brunch/Brunch-6.jpg',
                '/images/Workshop/Workshop-3.jpg',
                '/images/Workshop/Workshop-4.jpg',
                '/images/Coaching/Coaching-and-Mentorship-2.jpg',
                '/images/Relief/relief-2.jpeg',
            ] as $photo)
                <div class="gallery-photo reveal">
                    <img src="{{ $photo }}" alt="Hearts and Mind volunteers in action">
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ READY TO MAKE A DIFFERENCE ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Ready to Make a Difference?</h2>
            <p>Whether you can volunteer once a month or every week, your time and talents can make a lasting difference. Together, we can ensure every caregiver feels supported, every child is welcomed with dignity, and every family has a community they can count on.</p>
            <a href="#apply" class="btn btn-light" style="margin-right:.6rem;">Apply to Volunteer</a>
            <a href="{{ route('home') }}#get-in-touch" class="btn btn-gold">Contact Us</a>
        </div>
    </div>
</section>

{{-- ============ APPLICATION FORM ============ --}}
<section class="section" id="apply">
    <div class="container" style="max-width:900px;">
        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert-error">Please correct the highlighted fields and try again.</div>
        @endif

        <form class="form-card" method="POST" action="{{ route('forms.store', 'volunteer') }}">
            @csrf
            <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
            <span class="eyebrow">Volunteer Details</span>
            <h2 class="section-title" style="font-size:1.6rem;">Volunteer Application</h2>
            <p style="color:var(--muted);font-size:.92rem;margin:.4rem 0 1.6rem;">
                Tell us a bit about yourself and how you'd like to support foster families.
                Your application will be reviewed before approval.
            </p>

            <h3 style="margin-bottom:1rem;">Personal Info</h3>
            <div class="form-grid">
                <div class="field"><label>First Name *</label><input type="text" name="first_name" required></div>
                <div class="field"><label>Last Name *</label><input type="text" name="last_name" required></div>
                <div class="field"><label>Email *</label><input type="email" name="email" required></div>
                <div class="field"><label>Phone *</label><input type="tel" name="phone" required></div>
                <div class="field"><label>Company</label><input type="text" name="company"></div>
                <div class="field"><label>City</label><input type="text" name="city_text"></div>
                @include('partials.province-city', ['prefix' => 'vol'])
            </div>

            <h3 style="margin:1.8rem 0 1rem;">Volunteer Profile</h3>
            <div class="form-grid">
                <div class="field">
                    <label>Volunteer Type *</label>
                    <select name="volunteer_type" required>
                        <option value="">— None —</option>
                        <option>Foster Parent</option>
                        <option>Community Member</option>
                        <option>Corporate Group</option>
                        <option>Student Placement</option>
                        <option>Professional Volunteer</option>
                    </select>
                </div>
                <div class="field">
                    <label>Availability</label>
                    <select name="availability">
                        <option value="">— None —</option>
                        <option>Mornings</option><option>Afternoons</option><option>Evenings</option>
                        <option>Weekdays</option><option>Weekends</option>
                    </select>
                </div>
                <div class="field">
                    <label>Skills / Certifications</label>
                    <select name="skills">
                        <option value="">— None —</option>
                        <option>First Aid / CPR</option>
                        <option>Vulnerable Sector Check</option>
                        <option>Trauma Training</option>
                    </select>
                </div>
                <div class="field full checks">
                    <label class="check"><input type="checkbox" name="cas_support" value="yes"> I can support roles that require CAS (for respite care).</label>
                    <label class="check"><input type="checkbox" name="background_check_consent" value="yes" required> I consent to a background check. *</label>
                </div>
            </div>

            <h3 style="margin:1.8rem 0 1rem;">Emergency Contact</h3>
            <div class="form-grid">
                <div class="field"><label>Emergency Contact Name *</label><input type="text" name="emergency_name" required></div>
                <div class="field"><label>Emergency Contact Phone *</label><input type="tel" name="emergency_phone" required></div>
            </div>

            <h3 style="margin:1.8rem 0 1rem;">Preferences</h3>
            <label class="check"><input type="checkbox" name="newsletter" value="yes"> I'd like to receive newsletters and updates.</label>

            <button type="submit" class="btn btn-purple" style="margin-top:1.8rem;">Submit Application</button>
            <p class="form-note">By submitting this form, you confirm the information provided is accurate to the best of your knowledge.</p>
        </form>
    </div>
</section>

@endsection
