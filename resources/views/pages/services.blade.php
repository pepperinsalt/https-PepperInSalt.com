@extends('layouts.app')
@section('title', 'Services')
@section('meta_description', 'Web design, email marketing, automation, digital advertising, and SEO from a full-stack digital specialist.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Services</div>
    <h1 class="font-serif font-black leading-tight mb-8 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        Everything you<br>need to <span class="gradient-text italic">grow.</span>
    </h1>
    <p class="max-w-2xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "A garden grows best when every element is tended — the soil, the water, the sun.
        Your digital presence is no different."
    </p>
</section>

{{-- Service cards --}}
@php $services = [
    [
        'num'   => '01',
        'icon'  => '🌐',
        'title' => 'Web Design & Development',
        'color' => '#FF6B6B',
        'bg'    => 'from-coral/10 to-pepper/5',
        'desc'  => 'Custom websites built to convert — not just look pretty. From architecture to pixel-perfect execution, every site is built with purpose, performance, and your customer in mind.',
        'items' => ['WordPress & October CMS','Laravel Applications','Custom HTML/CSS/JS','Responsive & Mobile-First','Performance Optimization','Hosting & Deployment'],
    ],
    [
        'num'   => '02',
        'icon'  => '📧',
        'title' => 'Email Marketing & Automation',
        'color' => '#FFD166',
        'bg'    => 'from-gold/10 to-saffron/5',
        'desc'  => 'Emails people actually open. Systems that run without you. Built on a decade of experience with Salesforce Marketing Cloud, AMPscript, and Liquid templating.',
        'items' => ['Salesforce Marketing Cloud','AMPscript & Liquid','Template Design','Journey Builder','List Management','A/B Testing'],
    ],
    [
        'num'   => '03',
        'icon'  => '📣',
        'title' => 'Digital Advertising',
        'color' => '#A8D520',
        'bg'    => 'from-lime/10 to-jade/5',
        'desc'  => 'Ads that earn their budget. From creative production to campaign management, UTM tracking, and conversion analysis — every dollar accounted for.',
        'items' => ['Google Ads','Meta Ads (FB/IG)','Ad Creative Production','UTM Tracking','Conversion Funnels','Campaign Reporting'],
    ],
    [
        'num'   => '04',
        'icon'  => '📊',
        'title' => 'SEO & Analytics',
        'color' => '#38BDF8',
        'bg'    => 'from-sky/10 to-violet/5',
        'desc'  => 'Visibility that compounds. Technical SEO, content strategy, and analytics implementation that build long-term organic growth.',
        'items' => ['Technical SEO Audit','On-Page Optimization','GA4 Implementation','Search Console','Core Web Vitals','Monthly Reporting'],
    ],
]; @endphp

<section class="py-10 max-w-7xl mx-auto px-6 lg:px-10 space-y-8">
    @foreach($services as $i => $svc)
    <div class="reveal reveal-delay-{{ $i % 3 + 1 }} group p-8 lg:p-12 rounded-3xl bg-gradient-to-br {{ $svc['bg'] }} border-2 border-transparent hover:border-current transition-all duration-500 card-hover" style="--tw-border-opacity:0.2; border-color: color-mix(in srgb, {{ $svc['color'] }} 20%, transparent);">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-7">
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-4xl">{{ $svc['icon'] }}</span>
                    <span class="font-black font-serif text-5xl opacity-20">{{ $svc['num'] }}</span>
                </div>
                <h2 class="font-serif font-black text-3xl lg:text-4xl mb-5" style="color: {{ $svc['color'] }}">{{ $svc['title'] }}</h2>
                <p class="text-ink/65 leading-relaxed text-lg mb-8">{{ $svc['desc'] }}</p>
                <a href="{{ route('contact') }}" class="btn-primary" style="background: {{ $svc['color'] }}; border-color: {{ $svc['color'] }};">Get Started →</a>
            </div>
            <div class="lg:col-span-5">
                <div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-4">What's included</div>
                <ul class="grid grid-cols-2 gap-3">
                    @foreach($svc['items'] as $item)
                    <li class="flex items-center gap-2 text-sm font-medium">
                        <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background: {{ $svc['color'] }}"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</section>

{{-- Pricing CTA --}}
<section class="py-24 bg-ink text-cream">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="section-label reveal justify-center" style="color: var(--color-gold);">
            <span style="background: var(--color-gold); width: 32px; height: 2px; display: inline-block;"></span>
            Pricing
        </div>
        <h2 class="font-serif font-black text-4xl lg:text-5xl mb-6 reveal reveal-delay-1">Simple. Transparent. Fair.</h2>
        <p class="text-cream/50 text-lg leading-relaxed mb-10 reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
            "Every project is different, every budget is real. Let's have an honest conversation about what you need and what it'll take to get there."
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal reveal-delay-3">
            <a href="{{ route('contact') }}" class="btn-primary">Get a Free Quote →</a>
            <a href="{{ route('work') }}" class="border-2 border-cream/20 text-cream font-bold text-sm uppercase tracking-widest px-8 py-3.5 rounded-full hover:border-cream hover:bg-cream hover:text-ink transition-all">See Past Work</a>
        </div>
    </div>
</section>

@endsection
