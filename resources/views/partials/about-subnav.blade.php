<nav class="sub-nav reveal">
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Our Story</a>
    <a href="{{ route('about.mission') }}" class="{{ request()->routeIs('about.mission') ? 'active' : '' }}">Our Mission</a>
    <a href="{{ route('about.vision') }}" class="{{ request()->routeIs('about.vision') ? 'active' : '' }}">Our Vision</a>
    <a href="{{ route('about.values') }}" class="{{ request()->routeIs('about.values') ? 'active' : '' }}">Values</a>
    <a href="{{ route('about.leadership') }}" class="{{ request()->routeIs('about.leadership') ? 'active' : '' }}">Leadership &amp; Management</a>
    <a href="{{ route('about.support-model') }}" class="{{ request()->routeIs('about.support-model') ? 'active' : '' }}">Our Caregiver Support Model</a>
</nav>
