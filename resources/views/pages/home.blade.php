@extends('layouts.app')
@section('title', 'Pepper in Salt — Web Services')
@section('meta_description', 'Strategy, design, and development for brands ready to stand out. Salt Lake City digital agency.')

@section('content')

{{-- ── HERO ────────────────────────────────────────────────────────────────── --}}
<section class="relative min-h-screen flex flex-col justify-end pb-20 overflow-hidden">

    {{-- Background blobs --}}
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-coral/20 blob animate-float"></div>
        <div class="absolute top-1/3 right-0 w-80 h-80 bg-gold/25 blob" style="animation: float 8s ease-in-out infinite 2s;"></div>
        <div class="absolute bottom-1/4 left-1/3 w-64 h-64 bg-pepper/10 blob" style="animation: float 7s ease-in-out infinite 1s;"></div>
        <div class="absolute top-20 right-1/4 w-40 h-40 bg-lime/20 rounded-full blur-xl"></div>
    </div>

    {{-- Decorative text --}}
    <div class="absolute top-40 right-8 writing-vertical text-xs font-mono font-bold tracking-[0.3em] text-ink/20 select-none hidden xl:block">SALT LAKE CITY · EST. 2014</div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full pt-40">

        {{-- Badge --}}
        <div class="reveal flex items-center gap-3 mb-10">
            <span class="inline-flex items-center gap-2 bg-pepper/10 border border-pepper/20 text-pepper font-bold text-xs uppercase tracking-widest px-4 py-2 rounded-full">
                <span class="w-2 h-2 bg-pepper rounded-full animate-pulse"></span>
                Available for new projects
            </span>
            <span class="text-ink/40 text-sm hidden sm:block">— Salt Lake City, UT</span>
        </div>

        {{-- Headline --}}
        <h1 class="font-serif font-black leading-[0.95] mb-10 reveal reveal-delay-1" style="font-size: clamp(4rem,10vw,9rem);">
            We make<br>
            the <span class="gradient-text italic">internet</span><br>
            <span class="relative inline-block">
                beautiful.
                <svg class="absolute -bottom-3 left-0 w-full" viewBox="0 0 400 12" fill="none" style="height:8px;">
                    <path d="M2 6 Q100 1 200 6 Q300 11 398 6" stroke="#D63535" stroke-width="3" stroke-linecap="round" fill="none"/>
                </svg>
            </span>
        </h1>

        <div class="flex flex-col lg:flex-row items-start lg:items-end gap-10 justify-between reveal reveal-delay-2">
            <p class="max-w-lg text-ink/60 text-lg font-light leading-relaxed" style="font-family: var(--font-serif); font-style: italic;">
                "Every brand has a story worth telling beautifully —<br>
                we just make sure the right people find it."
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('work') }}" class="btn-primary">See Our Work →</a>
                <a href="{{ route('contact') }}" class="btn-outline">Start a Project</a>
            </div>
        </div>

        {{-- Clocks --}}
        <div class="flex gap-10 mt-16 pt-10 border-t border-ink/10 reveal reveal-delay-3">
            <div><div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-1">Salt Lake City</div><div class="font-mono text-lg font-bold" id="clock-slc">--:--:--</div></div>
            <div><div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-1">New York</div><div class="font-mono text-lg font-bold" id="clock-ny">--:--:--</div></div>
            <div><div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-1">London</div><div class="font-mono text-lg font-bold" id="clock-lon">--:--:--</div></div>
        </div>
    </div>
</section>

{{-- ── MARQUEE ──────────────────────────────────────────────────────────────── --}}
<div class="border-y-2 border-ink py-5 my-0 overflow-hidden bg-ink text-cream">
    <div class="flex w-max" style="animation: marquee 28s linear infinite;">
        @foreach(array_fill(0, 2, ['Web Design','Email Marketing','Automation','Ad Ops','WordPress','SEO','Branding','Laravel','Salesforce MC','Lead Gen','Conversion CRO','UI/UX']) as $items)
            @foreach($items as $item)
                <span class="text-sm font-bold uppercase tracking-widest px-8 text-gold/80">{{ $item }}</span>
                <span class="text-pepper text-lg">✦</span>
            @endforeach
        @endforeach
    </div>
</div>

{{-- ── SERVICES TEASER ─────────────────────────────────────────────────────── --}}
<section class="py-28 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="flex flex-col lg:flex-row items-start justify-between gap-16">
        <div class="lg:w-1/2">
            <div class="section-label reveal">What We Do</div>
            <h2 class="font-serif font-black text-5xl lg:text-6xl leading-tight mb-8 reveal reveal-delay-1">
                The full stack.<br><span class="gradient-text italic">No middlemen.</span>
            </h2>
            <p class="text-ink/60 leading-relaxed mb-10 reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic; font-size: 1.1rem;">
                "From the first spark of an idea to the day it goes live and beyond —
                every piece of the puzzle, handled with intention."
            </p>
            <a href="{{ route('services') }}" class="btn-ghost reveal reveal-delay-3">Explore All Services →</a>
        </div>
        <div class="lg:w-1/2 space-y-4">
            @foreach([
                ['01', 'Web Design & Development',    '#FF6B6B'],
                ['02', 'Email Marketing & Automation', '#FFD166'],
                ['03', 'Digital Advertising',          '#A8D520'],
                ['04', 'SEO & Analytics',              '#38BDF8'],
            ] as $svc)
            <div class="reveal reveal-delay-{{ $loop->iteration }} group flex items-center gap-6 p-6 rounded-2xl border-2 border-ink/8 hover:border-pepper/30 transition-all hover:bg-white hover:shadow-xl cursor-default">
                <span class="text-2xl font-black font-serif" style="color: {{ $svc[2] }}">{{ $svc[0] }}</span>
                <span class="font-bold text-lg flex-1">{{ $svc[1] }}</span>
                <span class="text-ink/20 group-hover:text-pepper transition-colors font-bold">→</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── STATS ────────────────────────────────────────────────────────────────── --}}
<section class="py-24 bg-ink text-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-cream/10">
            @foreach([
                ['10',  '+', 'Years Experience',    '#FF6B6B'],
                ['250', '+', 'Campaigns Delivered', '#FFD166'],
                ['31',  '%', 'Avg Open Rate Lift',  '#A8D520'],
                ['60',  '%', 'Automation Savings',  '#38BDF8'],
            ] as $stat)
            <div class="reveal reveal-delay-{{ $loop->iteration }} bg-ink p-12 text-center hover:bg-ink/80 transition-colors">
                <div class="stat-num mb-3" style="color: {{ $stat[3] }}">
                    <span data-target="{{ $stat[0] }}" data-suffix="{{ $stat[1] }}">0{{ $stat[1] }}</span>
                </div>
                <div class="text-xs font-bold uppercase tracking-widest text-cream/40">{{ $stat[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── WORK TEASER ─────────────────────────────────────────────────────────── --}}
<section class="py-28 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="flex items-end justify-between mb-14">
        <div>
            <div class="section-label reveal">Selected Work</div>
            <h2 class="font-serif font-black text-5xl lg:text-6xl leading-tight reveal reveal-delay-1">
                Projects that<br><span class="italic">move the needle.</span>
            </h2>
        </div>
        <a href="{{ route('work') }}" class="btn-outline hidden lg:inline-flex reveal reveal-delay-2">View All Work</a>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        {{-- Card 1 --}}
        <div class="lg:col-span-7 reveal card-hover group relative overflow-hidden rounded-3xl h-80 lg:h-96 flex flex-col justify-end p-8" style="background: linear-gradient(135deg, #1a1a2e, #16213e);">
            <div class="absolute inset-0 bg-pepper/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <span class="tag border-white/20 text-white/60 mb-3">Email · Salesforce MC</span>
            <h3 class="font-serif text-2xl font-bold text-white">CHG Healthcare Email System</h3>
            <p class="text-white/50 text-sm mt-1">Open rates: 18% → 31%</p>
        </div>
        {{-- Card 2 --}}
        <div class="lg:col-span-5 reveal reveal-delay-1 card-hover group relative overflow-hidden rounded-3xl h-80 lg:h-96 flex flex-col justify-end p-8" style="background: linear-gradient(135deg, #2d1b69, #11998e);">
            <div class="absolute inset-0 bg-gold/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <span class="tag border-white/20 text-white/60 mb-3">WordPress · Google Ads</span>
            <h3 class="font-serif text-2xl font-bold text-white">Altaracks Web & Ad Ops</h3>
            <p class="text-white/50 text-sm mt-1">Active contract, 2026–present</p>
        </div>
        {{-- Card 3 --}}
        <div class="lg:col-span-4 reveal card-hover group relative overflow-hidden rounded-3xl h-64 flex flex-col justify-end p-8" style="background: linear-gradient(135deg, #4a1942, #c0392b);">
            <span class="tag border-white/20 text-white/60 mb-3">AMPscript · Automation</span>
            <h3 class="font-serif text-xl font-bold text-white">Artisan Talent</h3>
        </div>
        {{-- Card 4 --}}
        <div class="lg:col-span-4 reveal reveal-delay-1 card-hover group relative overflow-hidden rounded-3xl h-64 flex flex-col justify-end p-8" style="background: linear-gradient(135deg, #0a3d62, #1e3799);">
            <span class="tag border-white/20 text-white/60 mb-3">HTML · GitHub Pages</span>
            <h3 class="font-serif text-xl font-bold text-white">kacyculpepper.digital</h3>
        </div>
        {{-- Card 5 --}}
        <div class="lg:col-span-4 reveal reveal-delay-2 card-hover group relative overflow-hidden rounded-3xl h-64 flex items-center justify-center p-8 border-2 border-dashed border-pepper/30 bg-pepper/5">
            <div class="text-center">
                <div class="text-4xl mb-3">🌶️</div>
                <div class="font-serif font-bold text-lg text-pepper">Your Project</div>
                <div class="text-ink/40 text-sm mt-1">Let's build it</div>
            </div>
        </div>
    </div>
    <div class="mt-8 lg:hidden text-center">
        <a href="{{ route('work') }}" class="btn-outline">View All Work</a>
    </div>
</section>

{{-- ── TESTIMONIAL / QUOTE ──────────────────────────────────────────────────── --}}
<section class="py-24 bg-cream-dark">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="text-6xl text-pepper/20 font-serif leading-none mb-6 reveal">"</div>
        <blockquote class="font-serif text-3xl lg:text-4xl font-bold leading-snug mb-8 reveal reveal-delay-1">
            Kacy completely transformed our email program. Open rates jumped from
            <span class="gradient-text">18% to 31%</span> — and the automation
            he built saves us hours every single week.
        </blockquote>
        <div class="font-bold text-sm uppercase tracking-widest text-ink/50 reveal reveal-delay-2">Marketing Director · CHG Healthcare</div>
    </div>
</section>

{{-- ── CTA ───────────────────────────────────────────────────────────────────── --}}
<section class="py-28 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="relative rounded-3xl overflow-hidden p-12 lg:p-20 text-center" style="background: linear-gradient(135deg, #D63535 0%, #FF8C00 50%, #FFD166 100%);">
        <div class="absolute inset-0 opacity-10" style="background-image: url('/images/logo.jpg'); background-size: 200px; background-repeat: repeat; mix-blend-mode: overlay; filter: grayscale(1);"></div>
        <h2 class="font-serif font-black text-white text-5xl lg:text-6xl mb-6 relative reveal">
            Ready to stand out?
        </h2>
        <p class="text-white/80 text-lg max-w-md mx-auto mb-10 relative font-light reveal reveal-delay-1" style="font-family: var(--font-serif); font-style: italic;">
            "The best time to invest in your digital presence was yesterday. The second best time is right now."
        </p>
        <div class="flex flex-wrap gap-4 justify-center relative reveal reveal-delay-2">
            <a href="{{ route('contact') }}" class="bg-white text-pepper font-black text-sm uppercase tracking-widest px-10 py-4 rounded-full hover:bg-cream transition-colors">
                Let's Talk →
            </a>
            <a href="{{ route('work') }}" class="border-2 border-white text-white font-black text-sm uppercase tracking-widest px-10 py-4 rounded-full hover:bg-white hover:text-pepper transition-all">
                See My Work
            </a>
        </div>
    </div>
</section>

@endsection
