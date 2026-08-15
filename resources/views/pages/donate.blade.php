@extends('layouts.app')

@section('title', 'Donate — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('/images/donate-hero.jpg') center/cover no-repeat;">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold-500);">Make a Difference</span>
        <h1>Your Support Makes Caregiving Stronger.</h1>
        <p>Every donation helps create practical relief, meaningful community, and opportunities for caregivers to thrive. Together, we are building stronger families by supporting the people who care for children every day.</p>
        <div style="margin-top:1.6rem;">
            <a href="#donate-form" class="btn btn-gold">Donate Now</a>
            <a href="#circle-of-care" class="btn btn-light" style="margin-left:.6rem;" onclick="document.getElementById('freqMonthly')?.click()">Join the Circle of Care</a>
        </div>
    </div>
</section>

<section class="section" id="donate-form">
    <div class="container">
        @if ($errors->any())
            <div class="alert-error" style="max-width:620px;margin-inline:auto;">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="form-card donate-card" method="POST" action="{{ route('donate.checkout') }}" id="donateForm">
            @csrf
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;">
                <h2 style="font-size:1.45rem;">Select Donation Amount</h2>
                <div class="freq-toggle" role="group" aria-label="Donation frequency">
                    <button type="button" class="active" data-freq="one_time">One-time</button>
                    <button type="button" id="freqMonthly" data-freq="monthly">Monthly ♥</button>
                </div>
            </div>
            <input type="hidden" name="frequency" id="frequency" value="one_time">
            <input type="hidden" name="amount" id="amount" value="50">

            <div class="amounts">
                @foreach ([25, 50, 100, 250, 500] as $amt)
                    <button type="button" class="amt {{ $amt === 50 ? 'selected' : '' }}" data-amount="{{ $amt }}">${{ $amt }}</button>
                @endforeach
            </div>

            <div class="custom-row">
                <div class="field">
                    <label for="customAmount">Custom amount (USD)</label>
                    <input type="number" id="customAmount" min="1" step="1" placeholder="e.g. 150">
                </div>
                <button type="submit" class="btn btn-gold" style="align-self:flex-end;flex-shrink:0;">
                    <span id="donateLabel">Donate $50</span> →
                </button>
            </div>

            <p class="impact-line" id="impactLine">💜 $50 provides 2 hours of in-home relief support for a caregiver.</p>
            <p class="form-note center" style="text-align:center;">
                🔒 Payments are processed securely by Stripe. You'll be redirected to complete your donation.
            </p>
        </form>
    </div>
</section>

{{-- ============ WHY YOUR GIFT MATTERS ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="center" style="margin-bottom:2.6rem;max-width:760px;margin-inline:auto;">
            <span class="eyebrow">Why Your Gift Matters</span>
            <h2 class="section-title">Every gift creates real, practical support</h2>
            <p class="section-lead reveal" style="margin-inline:auto;">
                When caregivers receive support, they are better equipped to provide stability, love, and guidance to
                the children in their care. Your generosity helps Hearts and Mind Foster Community continue providing
                programs, workshops, practical support, community events, and caregiver resources.
            </p>
        </div>
        <div class="grid grid-3">
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>$25</h3>
                <p>Helps provide a caregiver wellness kit, or supports 1–2 hours of home organization and laundry support.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>$50</h3>
                <p>Helps provide refreshments, educational materials, or wellness supplies for a caregiver workshop or community gathering.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>$100</h3>
                <p>Helps sponsor a caregiver's participation in a wellness workshop, support group, or community event, ensuring cost is never a barrier.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>$250</h3>
                <p>Helps fund practical relief services, caregiver support initiatives, or essential resources that reduce caregiver stress and strengthen families.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💜</div>
                <h3>$500</h3>
                <p>Helps sponsor an entire caregiver program, workshop, or community event.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ WHERE YOUR GIFT GOES ============ --}}
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">Where Your Gift Goes</span>
            <h2 class="section-title">Every dollar becomes real support</h2>
        </div>
        <div class="grid grid-3">
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🏠</div>
                <h3>In-Home Relief</h3>
                <p>Laundry, meals, housekeeping and errands for overwhelmed caregivers.</p>
            </div>
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🍽️</div>
                <h3>Community Brunches</h3>
                <p>Monthly gatherings where caregivers connect, share and recharge.</p>
            </div>
            <div class="card reveal center">
                <div class="icon" style="margin-inline:auto;">🌱</div>
                <h3>Workshops &amp; Mentorship</h3>
                <p>Practical training, healing circles and one-on-one guidance.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ CIRCLE OF CARE (MONTHLY GIVING) ============ --}}
<section class="section section-purple" id="circle-of-care">
    <div class="container center" style="max-width:720px;margin-inline:auto;">
        <span class="eyebrow">Monthly Giving</span>
        <h2 class="section-title">Join the Circle of Care</h2>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:.9rem;">
            Become a monthly supporter and help provide consistent, year round support for caregivers. As a member of
            the Circle of Care, your recurring gift helps us plan ahead, expand our programs, and continue building a
            strong, supportive community.
        </p>
        <p class="section-lead reveal" style="margin-inline:auto;margin-bottom:1.6rem;">
            Choose the monthly amount that is meaningful to you and become part of a community committed to
            strengthening caregivers and families.
        </p>
        <a href="#donate-form" class="btn btn-purple" onclick="document.getElementById('freqMonthly')?.click()">Join the Circle of Care</a>
    </div>
</section>

{{-- ============ OTHER WAYS TO GIVE ============ --}}
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2.4rem;">
            <span class="eyebrow">More Options</span>
            <h2 class="section-title">Other Ways to Give</h2>
        </div>
        <div class="grid grid-3">
            <a href="{{ route('give-help') }}#sponsor-form" class="card reveal" style="display:block;">
                <div class="icon">🎗️</div>
                <h3>Sponsor a Program</h3>
                <p>Direct your support toward relief packages, workshops, or brunches.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsor-form" class="card reveal" style="display:block;">
                <div class="icon">🎉</div>
                <h3>Sponsor an Event</h3>
                <p>Help bring a workshop, brunch, or community event to life.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsorship" class="card reveal" style="display:block;">
                <div class="icon">📦</div>
                <h3>Donate Goods</h3>
                <p>In-kind donations of goods and services for families and programs.</p>
            </a>
            <a href="{{ route('give-help') }}#sponsorship" class="card reveal" style="display:block;">
                <div class="icon">🏢</div>
                <h3>Corporate Giving</h3>
                <p>Matching gifts, employee volunteering, and corporate partnerships.</p>
            </a>
            <div class="card reveal">
                <div class="icon">🕊️</div>
                <h3>In Honour or In Memory Giving</h3>
                <p>Make a gift to celebrate or remember someone special to you.</p>
            </div>
            <div class="card reveal">
                <div class="icon">💼</div>
                <h3>Workplace Giving</h3>
                <p>Ask your employer about payroll giving or matching gift programs.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ THANK YOU ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="cta-band reveal">
            <h2>Thank You.</h2>
            <p>Every gift, no matter the size, creates meaningful change. Thank you for believing in caregivers, strengthening families, and investing in healthier communities.</p>
            <a href="#donate-form" class="btn btn-gold">Donate Now</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    const amountInput = document.getElementById('amount');
    const freqInput = document.getElementById('frequency');
    const custom = document.getElementById('customAmount');
    const label = document.getElementById('donateLabel');
    const impact = document.getElementById('impactLine');

    function update() {
        const amt = parseFloat(amountInput.value) || 0;
        const monthly = freqInput.value === 'monthly';
        label.textContent = 'Donate $' + amt + (monthly ? '/month' : '');
        const hours = Math.max(1, Math.round(amt / 25));
        impact.textContent = monthly
            ? `💜 $${amt}/month provides ${hours} hour${hours > 1 ? 's' : ''} of caregiver relief — every single month.`
            : `💜 $${amt} provides ${hours} hour${hours > 1 ? 's' : ''} of in-home relief support for a caregiver.`;
    }

    document.querySelectorAll('.amt').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.amt').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            custom.value = '';
            amountInput.value = btn.dataset.amount;
            update();
        });
    });

    custom.addEventListener('input', () => {
        if (custom.value) {
            document.querySelectorAll('.amt').forEach(b => b.classList.remove('selected'));
            amountInput.value = custom.value;
            update();
        }
    });

    document.querySelectorAll('.freq-toggle button').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.freq-toggle button').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            freqInput.value = btn.dataset.freq;
            update();
        });
    });

    update();
})();
</script>
@endpush
