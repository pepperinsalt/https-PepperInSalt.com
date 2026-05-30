@extends('layouts.app')
@section('title', 'Work')
@section('meta_description', 'Selected projects — email systems, web development, automation, and ad operations.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Selected Work</div>
    <h1 class="font-serif font-black leading-tight mb-6 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        Projects that<br><span class="gradient-text italic">prove it.</span>
    </h1>
    <p class="max-w-xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "Results are the only currency that matters. Everything else is storytelling."
    </p>
</section>

@php $projects = [
    [
        'num'     => '01',
        'title'   => 'CHG Healthcare Email System',
        'role'    => 'Email Developer & Strategist',
        'year'    => '2014–2018',
        'result'  => '📈 Open rates: 18% → 31%',
        'color'   => '#FF6B6B',
        'bg'      => 'linear-gradient(135deg, #1a1a2e, #16213e)',
        'tags'    => ['Salesforce MC','AMPscript','Responsive Email','A/B Testing','CRM','Automation'],
        'desc'    => 'Led the full migration from table-based to fully responsive email design across all CHG Healthcare brands. Integrated Salesforce Marketing Cloud for a 250,000+ contact database, built automated nurture journeys for healthcare professional recruitment, and ran an ongoing A/B testing program that lifted open rates from 18% to 31%.',
        'url'     => 'https://www.chghealthcare.com',
    ],
    [
        'num'     => '02',
        'title'   => 'Altaracks Web & Ad Operations',
        'role'    => 'Web & Advertising Specialist',
        'year'    => '2026–Present',
        'result'  => '📅 Active contract',
        'color'   => '#FFD166',
        'bg'      => 'linear-gradient(135deg, #2d1b69, #11998e)',
        'tags'    => ['WordPress','Google Ads','Meta Ads','PHP','SEO','Lead Gen'],
        'desc'    => 'Managing end-to-end web support and digital advertising for Altaracks. WordPress architecture optimization, ad creative production for Google and Meta, UTM tracking implementation, and conversion funnel analysis.',
        'url'     => 'https://altaracks.com',
    ],
    [
        'num'     => '03',
        'title'   => 'Artisan Talent Email Automation',
        'role'    => 'Email Automation Specialist',
        'year'    => '2023',
        'result'  => '⚡ 60% reduction in manual workload',
        'color'   => '#A8D520',
        'bg'      => 'linear-gradient(135deg, #4a1942, #c0392b)',
        'tags'    => ['AMPscript','Liquid','CSV Automation','HTML Email','List Hygiene'],
        'desc'    => 'Designed and implemented a CSV-driven automation system that eliminated 60% of manual campaign work. Built reusable template components with dynamic content blocks using AMPscript and Liquid. Audited and cleaned contact lists, improving deliverability by 18%.',
        'url'     => null,
    ],
    [
        'num'     => '04',
        'title'   => 'kacyculpepper.digital',
        'role'    => 'Full-Stack Developer',
        'year'    => '2025',
        'result'  => '🌐 Live portfolio',
        'color'   => '#38BDF8',
        'bg'      => 'linear-gradient(135deg, #0a3d62, #1e3799)',
        'tags'    => ['HTML','CSS','JavaScript','GitHub Pages','Bento Grid'],
        'desc'    => 'Hand-coded portfolio site built with pure HTML, CSS, and JavaScript. Features a bento-card grid layout, terminal typewriter animation, real-time clock, and fully responsive design. Deployed via GitHub Pages with a custom domain.',
        'url'     => 'https://kacyculpepper.digital',
    ],
    [
        'num'     => '05',
        'title'   => 'Sheet Metal Specialties',
        'role'    => 'Web Developer',
        'year'    => '2024',
        'result'  => '🔧 Custom multi-page website',
        'color'   => '#94A3B8',
        'bg'      => 'linear-gradient(135deg, #1c1c2e, #3a3a5c)',
        'tags'    => ['HTML','CSS','JavaScript','Responsive Design','Photo Gallery'],
        'desc'    => 'Designed and built a custom multi-page website for a sheet metal craftsmanship company. Features audience-segmented sections for homeowners, contractors, and architects — plus a project gallery, meet-the-crew page, and finishing touches showcase highlighting the company\'s artisan metalwork.',
        'url'     => 'http://sheetmetalspecialties.com',
    ],
    [
        'num'     => '06',
        'title'   => 'Dr. Dawn Buckingham',
        'role'    => 'Web Developer',
        'year'    => '2025',
        'result'  => '🗳️ Political campaign website',
        'color'   => '#EF4444',
        'bg'      => 'linear-gradient(135deg, #1a1a2e, #7f1d1d)',
        'tags'    => ['WordPress','PHP','Custom Theme','CSS','Campaign Web'],
        'desc'    => 'Built and maintained the campaign website for Dr. Dawn Buckingham, Texas politician. Custom WordPress theme with issue-focused content architecture covering border security, public education, veterans affairs, disaster relief, and energy policy. Optimized for constituent engagement and media presence.',
        'url'     => 'https://dawnbuckingham.com',
    ],
]; @endphp

<section class="pb-20 max-w-7xl mx-auto px-6 lg:px-10 space-y-8">
    @foreach($projects as $i => $p)
    <div class="reveal card-hover rounded-3xl overflow-hidden border border-ink/8">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            {{-- Visual --}}
            <div class="relative h-64 lg:h-auto min-h-64 flex items-center justify-center p-12" style="background: {{ $p['bg'] }}">
                <div class="text-center">
                    <div class="font-serif font-black text-8xl opacity-10 text-white leading-none">{{ $p['num'] }}</div>
                    <div class="font-serif font-bold text-3xl text-white mt-4">{{ explode(' ', $p['title'])[0] }}</div>
                </div>
            </div>
            {{-- Content --}}
            <div class="p-8 lg:p-12 bg-white">
                <div class="flex items-center gap-3 mb-4">
                    <span class="font-mono text-xs font-bold text-ink/30">{{ $p['num'] }}</span>
                    <span class="tag">{{ $p['year'] }}</span>
                </div>
                <h2 class="font-serif font-black text-2xl lg:text-3xl mb-2" style="color: {{ $p['color'] }}">{{ $p['title'] }}</h2>
                <div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-5">{{ $p['role'] }}</div>

                <div class="inline-flex items-center gap-2 bg-lime/10 border border-lime/30 text-green-700 px-4 py-2 rounded-full text-xs font-bold mb-6">
                    {{ $p['result'] }}
                </div>

                <p class="text-ink/65 leading-relaxed text-sm mb-6">{{ $p['desc'] }}</p>

                <div class="flex flex-wrap gap-2 mb-8">
                    @foreach($p['tags'] as $tag)
                    <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>

                @if($p['url'])
                <a href="{{ $p['url'] }}" target="_blank" rel="noopener" class="btn-primary" style="background: {{ $p['color'] }}; border-color: {{ $p['color'] }};">↗ View Live</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</section>

{{-- New project CTA --}}
<section class="py-24 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="reveal text-center p-16 rounded-3xl border-2 border-dashed border-pepper/30 bg-pepper/5">
        <div class="text-6xl mb-6">🌶️</div>
        <h2 class="font-serif font-black text-4xl mb-4">Your project could be here.</h2>
        <p class="text-ink/60 max-w-md mx-auto mb-8 leading-relaxed" style="font-family: var(--font-serif); font-style: italic;">
            "Every great project starts with a single conversation. Let's have ours."
        </p>
        <a href="{{ route('contact') }}" class="btn-primary">Start a Project →</a>
    </div>
</section>

@endsection
