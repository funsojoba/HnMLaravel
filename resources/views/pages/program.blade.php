@extends('layouts.app')

@section('title', $program['title'].' — Hearts and Mind')

@section('content')

<section class="page-hero" style="background: var(--grad-hero), url('{{ $program['hero_image'] }}') center/cover no-repeat;">
    <div class="container">
        <div style="font-size:3rem;margin-bottom:.6rem;">{{ $program['icon'] }}</div>
        <h1>{{ $program['title'] }}</h1>
        <p>{{ $program['tagline'] }}</p>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:840px;">
        <p class="reveal" style="font-size:1.08rem;color:var(--muted);">{{ $program['intro'] }}</p>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="grid grid-2">
            @foreach ($program['sections'] as $sec)
                <div class="card reveal">
                    <h3>{{ $sec['heading'] }}</h3>
                    @if (isset($sec['text']))
                        <p style="margin-top:.6rem;">{{ $sec['text'] }}</p>
                    @endif
                    @if (isset($sec['list']))
                        <ul style="margin-top:.8rem;display:grid;gap:.55rem;list-style:none;">
                            @foreach ($sec['list'] as $item)
                                <li style="display:flex;gap:.6rem;color:var(--muted);"><span style="color:var(--purple-600);font-weight:800;">✓</span> {{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

@if (count($program['images']))
<section class="section section-alt">
    <div class="container">
        <div class="grid grid-3">
            @foreach ($program['images'] as $img)
                <div class="gallery-photo reveal">
                    <img src="{{ $img }}" alt="{{ $program['title'] }} in action">
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if (count($program['quotes']))
<section class="section">
    <div class="container">
        <div class="center" style="margin-bottom:2rem;">
            <span class="eyebrow">Caregiver Voices</span>
            <h2 class="section-title">Real stories from support visits</h2>
        </div>
        <div class="grid grid-2">
            @foreach ($program['quotes'] as $quote)
                <div class="quote reveal">{{ $quote }}</div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="section">
    <div class="container">
        <div class="cta-band reveal">
            <h2>{{ $program['tagline'] }}</h2>
            <p>We're here for you — reach out and our team will follow up as soon as possible.</p>
            <a href="{{ route($program['cta']['route']) }}{{ $program['cta']['anchor'] ?? '' }}" class="btn btn-gold">{{ $program['cta']['label'] }}</a>
            <a href="{{ route('home') }}#get-in-touch" class="btn btn-light" style="margin-left:.6rem;">Contact Us</a>
        </div>
    </div>
</section>

@endsection
