<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hearts and Mind — Support | Connect | Heal')</title>
    <meta name="description" content="@yield('meta_description', 'Hearts and Mind empowers foster parents, kinship caregivers and families with resources, relational guidance, and in-home support.')">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a href="{{ route('home') }}" class="brand">
            <img src="/images/logo.png" alt="Hearts and Mind logo"
                 onerror="this.style.display='none'">
        </a>

        <button class="nav-burger" aria-label="Toggle menu" onclick="document.getElementById('navLinks').classList.toggle('open')">☰</button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li class="dropdown">
                <button class="drop-toggle" type="button" onclick="this.parentElement.classList.toggle('open')">
                    About Us <span class="caret">▼</span>
                </button>
                <div class="drop-menu">
                    <a href="{{ route('about') }}">Our Story</a>
                    <a href="{{ route('about.mission') }}">Our Mission</a>
                    <a href="{{ route('about.vision') }}">Our Vision</a>
                    <a href="{{ route('about.values') }}">Values</a>
                    <a href="{{ route('about.leadership') }}">Leadership and Management</a>
                    <a href="{{ route('about.support-model') }}">Our Caregiver Support Model</a>
                </div>
            </li>
            <li><a href="{{ route('give-help') }}" class="{{ request()->routeIs('give-help') ? 'active' : '' }}">Get Involved</a></li>
            <li class="dropdown">
                <button class="drop-toggle" type="button" onclick="this.parentElement.classList.toggle('open')">
                    Our Programs <span class="caret">▼</span>
                </button>
                <div class="drop-menu">
                    <a href="{{ route('program', 'hearts-home-relief-support') }}">Home Management Program</a>
                    <a href="{{ route('program', 'heart-and-home-closet') }}">Heart and Home Closet</a>
                    <a href="{{ route('program', 'reflect-renew-workshops') }}">Reflect &amp; Renew Workshops</a>
                    <a href="{{ route('program', 'coaching-mentorship-program') }}">Coaching &amp; Mentorship Program</a>
                    <a href="{{ route('program', 'caregiver-circle') }}">Hearts and Mind Support Group</a>
                    <a href="{{ route('program', 'hearts-brunch-series') }}">Hearts &amp; Brunch Series</a>
                </div>
            </li>
            {{-- <li class="dropdown">
                <button class="drop-toggle" type="button" onclick="this.parentElement.classList.toggle('open')">
                    Our Community <span class="caret">▼</span>
                </button>
                <div class="drop-menu">
                    <a href="{{ route('community') }}">About Hearts &amp; Mind Brunches</a>
                </div>
            </li> --}}
            <li><a href="{{ route('chapters') }}" class="{{ request()->routeIs('chapters') ? 'active' : '' }}">Chapters</a></li>
            <li><a href="{{ route('impact') }}" class="{{ request()->routeIs('impact') ? 'active' : '' }}">Our Impact</a></li>
            <li><a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'active' : '' }}">Events</a></li>
            <li><a href="{{ route('volunteer') }}" class="{{ request()->routeIs('volunteer') ? 'active' : '' }}">Volunteer</a></li>
            <li><a href="{{ route('donate') }}" class="nav-cta">Donate ♥</a></li>
        </ul>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h4>Start a Conversation</h4>
                <ul class="footer-list">
                    <li>✉️ <a href="mailto:info@heartsandmind.org">info@heartsandmind.org</a></li>
                    <li>✉️ <a href="mailto:heartsandmindfc@gmail.com">heartsandmindfc@gmail.com</a></li>
                    <li>📞 <a href="tel:+19056689608">(905) 668-9608</a></li>
                </ul>
            </div>
            <div>
                <h4>Visit Our Office</h4>
                <ul class="footer-list">
                    <li>📍 190 Harwood Avenue South<br>&nbsp;&nbsp;&nbsp;&nbsp;Ajax, ON L1S 2H6</li>
                </ul>
            </div>
            <div>
                <h4>Quick Links</h4>
                <ul class="footer-list">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('impact') }}">Our Impact</a></li>
                    <li><a href="{{ route('events') }}">Upcoming Events</a></li>
                    <li><a href="{{ route('volunteer') }}">Volunteer</a></li>
                    <li><a href="{{ route('donate') }}">Donate</a></li>
                </ul>
            </div>
            <div>
                <h4>Compliance</h4>
                <ul class="footer-list">
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                </ul>
                <h4 style="margin-top:1.4rem;">Find Us On</h4>
                <div class="social-row">
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="Instagram">◎</a>
                    <a href="#" aria-label="LinkedIn">in</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} HeartsandMind Inc, 1705794-6. All rights reserved.</span>
            <span>Support&nbsp;·&nbsp;Connect&nbsp;·&nbsp;Heal</span>
        </div>
    </div>
</footer>

<script>
// Scroll-reveal animation
const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>
@stack('scripts')
</body>
</html>
