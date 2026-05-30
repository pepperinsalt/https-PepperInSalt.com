@extends('layouts.app')
@section('title', 'About')
@section('meta_description', 'Kacy Culpepper — 10+ years of digital expertise. Web development, email marketing, automation, and advertising.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">About</div>
    <h1 class="font-serif font-black leading-tight mb-6 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        One person.<br><span class="gradient-text italic">Full-stack</span><br>capability.
    </h1>
    <p class="max-w-2xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "The best craftsmen don't outsource their soul — they bring the whole of themselves to the work."
    </p>
</section>

{{-- Portrait + intro --}}
<section class="py-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="reveal">
            <div class="relative inline-block">
                <div class="absolute -inset-4 rounded-3xl blob bg-gradient-to-br from-coral/30 via-gold/30 to-lime/20"></div>
                <div class="relative rounded-2xl overflow-hidden aspect-[4/5] bg-ink flex items-center justify-center">
                    <div class="text-center p-12">
                        <img src="/images/logo.jpg" alt="Pepper in Salt" class="w-48 h-48 rounded-full object-cover mx-auto mb-6 ring-4 ring-gold" loading="lazy" decoding="async">
                        <div class="font-serif font-black text-gold text-5xl">10+</div>
                        <div class="text-cream/60 text-sm uppercase tracking-widest">Years Experience</div>
                        <div class="flex gap-3 mt-6 justify-center flex-wrap">
                            @foreach(['Email','Web Dev','Ads','SEO','Automation'] as $skill)
                                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full border border-cream/20 text-cream/50">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reveal reveal-delay-1">
            <h2 class="font-serif font-black text-4xl lg:text-5xl mb-8 leading-tight">
                Hi, I'm <span class="gradient-text">Kacy.</span>
            </h2>
            <div class="space-y-5 text-ink/70 leading-relaxed">
                <p>I'm a Salt Lake City-based digital specialist with 10+ years working at the intersection of design, technology, and marketing. I've led email programs reaching 250,000+ contacts, built responsive design systems from scratch, and managed ad campaigns that actually convert.</p>
                <p style="font-family: var(--font-serif); font-style: italic; color: var(--color-ink); font-size: 1.05rem;">"I believe every brand deserves a digital presence that feels as alive as the people behind it — not a template, not a checkbox, but something that breathes."</p>
                <p>Whether it's a single high-converting landing page or a full-stack marketing system, I bring the same level of craft and attention to every engagement. No handoffs, no gaps — just results.</p>
            </div>
            <div class="flex flex-wrap gap-4 mt-10">
                <a href="{{ route('contact') }}" class="btn-primary">Work Together →</a>
                <a href="https://docs.google.com/document/d/16RSZtZuLAhohoX6JN_oaQpijdfaV1biIAhZfVc6lK8Q/export?format=pdf" target="_blank" class="btn-outline">Download C/V</a>
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="py-24 bg-ink text-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="section-label reveal" style="color: var(--color-gold);">
            <span style="background: var(--color-gold); width: 32px; height: 2px; display: inline-block;"></span>
            Philosophy
        </div>
        <h2 class="font-serif font-black text-4xl lg:text-5xl mb-16 reveal reveal-delay-1">What I believe.</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['🌶️', 'Craft over shortcut',    "Good work takes time to get right. I'd rather spend an extra hour on the details than ship something I'm not proud of."],
                ['🧪', 'Data meets intuition',    'Metrics matter. But so does gut feel. The best decisions live where numbers and taste intersect.'],
                ['🤝', 'Collaboration is clarity', 'The best outcomes come from honest conversations. I ask a lot of questions because I actually care about getting it right.'],
            ] as $v)
            <div class="reveal reveal-delay-{{ $loop->iteration }} p-8 rounded-2xl border border-cream/10 hover:border-gold/30 transition-colors">
                <div class="text-4xl mb-5">{{ $v[0] }}</div>
                <h3 class="font-serif font-bold text-xl text-gold mb-3">{{ $v[1] }}</h3>
                <p class="text-cream/50 leading-relaxed text-sm">{{ $v[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Quick facts --}}
<section class="py-24 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <div class="section-label reveal">Quick Facts</div>
            <div class="space-y-4 reveal reveal-delay-1">
                @foreach([
                    ['📍', 'Location',       'Salt Lake City, UT'],
                    ['🎓', 'Experience',     '10+ years in digital'],
                    ['🛠️', 'Stack',         'Laravel, WordPress, Salesforce MC, HTML/CSS, PHP, JS'],
                    ['📧', 'Email',         'pepperinsalt@gmail.com'],
                    ['📞', 'Phone',         '(385) 379-0540'],
                    ['⏱️', 'Response time', 'Under 48 hours, always'],
                ] as $f)
                <div class="flex gap-4 py-4 border-b border-ink/8">
                    <span class="text-xl w-8 flex-shrink-0">{{ $f[0] }}</span>
                    <div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-0.5">{{ $f[1] }}</div>
                        <div class="font-medium">{{ $f[2] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="section-label reveal">Availability</div>
            <div class="space-y-4 reveal reveal-delay-1">
                @foreach([
                    ['Full-Time Roles',      'Open',      'bg-lime/20 text-green-700'],
                    ['Contract / Freelance', 'Open',      'bg-lime/20 text-green-700'],
                    ['Consulting',           'Available', 'bg-gold/20 text-yellow-700'],
                    ['Response Time',        '< 48 hrs',  'bg-sky/20 text-blue-700'],
                ] as $a)
                <div class="flex items-center justify-between py-4 border-b border-ink/8">
                    <span class="font-medium">{{ $a[0] }}</span>
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full {{ $a[2] }}">{{ $a[1] }}</span>
                </div>
                @endforeach
            </div>
            <div class="mt-10 p-8 rounded-2xl bg-gradient-to-br from-pepper/10 to-saffron/10 border border-pepper/20">
                <p class="font-serif italic text-lg text-ink/80 mb-4">"The best partnerships are built on trust, transparency, and a shared obsession with quality."</p>
                <a href="{{ route('contact') }}" class="btn-primary">Start a Conversation →</a>
            </div>
        </div>
    </div>
</section>

@endsection
