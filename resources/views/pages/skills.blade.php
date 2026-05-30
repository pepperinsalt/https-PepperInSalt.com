@extends('layouts.app')
@section('title', 'Skills')
@section('meta_description', 'Technical skills — email development, web development, digital marketing, automation, and more.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Skills</div>
    <h1 class="font-serif font-black leading-tight mb-6 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        The tools.<br>The <span class="gradient-text italic">talent.</span>
    </h1>
    <p class="max-w-xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "A craftsman is only as good as their understanding of their tools —
        and their courage to pick up new ones."
    </p>
</section>

@php $skillGroups = [
    [
        'title' => 'Email & Marketing Automation',
        'color' => '#FF6B6B',
        'icon'  => '📧',
        'skills' => [
            ['Salesforce Marketing Cloud', 95],
            ['AMPscript & Liquid',         90],
            ['Responsive HTML Email',      95],
            ['Journey Builder',            85],
            ['A/B Testing Strategy',       88],
            ['List Management & Hygiene',  80],
        ],
    ],
    [
        'title' => 'Web Development',
        'color' => '#FFD166',
        'icon'  => '🌐',
        'skills' => [
            ['HTML5 & CSS3',       95],
            ['JavaScript',         80],
            ['PHP',                85],
            ['Laravel',            75],
            ['WordPress',          90],
            ['October CMS',        85],
        ],
    ],
    [
        'title' => 'Digital Advertising',
        'color' => '#A8D520',
        'icon'  => '📣',
        'skills' => [
            ['Google Ads',         85],
            ['Meta Ads (FB/IG)',   82],
            ['UTM Tracking',       90],
            ['Conversion Funnels', 80],
            ['Ad Creative',        75],
            ['Campaign Reporting', 85],
        ],
    ],
    [
        'title' => 'SEO & Analytics',
        'color' => '#38BDF8',
        'icon'  => '📊',
        'skills' => [
            ['Technical SEO',      80],
            ['Google Analytics 4', 85],
            ['Search Console',     82],
            ['Core Web Vitals',    78],
            ['Keyword Research',   75],
            ['Structured Data',    70],
        ],
    ],
]; @endphp

<section class="py-10 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach($skillGroups as $i => $group)
        <div class="reveal reveal-delay-{{ $i % 2 + 1 }} p-8 rounded-3xl bg-white border border-ink/8 shadow-sm">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-3xl">{{ $group['icon'] }}</span>
                <h2 class="font-serif font-bold text-xl" style="color: {{ $group['color'] }}">{{ $group['title'] }}</h2>
            </div>
            <div class="space-y-5">
                @foreach($group['skills'] as $skill)
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold">{{ $skill[0] }}</span>
                        <span class="text-xs font-mono font-bold" style="color: {{ $group['color'] }}">{{ $skill[1] }}%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-fill" data-pct="{{ $skill[1] }}" style="background: {{ $group['color'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Certifications --}}
<section class="py-24 bg-cream-dark">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="section-label reveal">Certifications & Tools</div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-8">
            @foreach(['Salesforce MC','Google Ads','Meta Blueprint','GA4','WordPress','Laravel','PHP','HTML/CSS','JavaScript','AMPscript','Liquid','Figma'] as $i => $cert)
            <div class="reveal reveal-delay-{{ $i % 4 + 1 }} p-5 rounded-2xl bg-white border border-ink/8 text-center hover:border-pepper/30 hover:shadow-lg transition-all">
                <div class="text-2xl mb-2">{{ ['📧','📣','📣','📊','🌐','⚙️','🐘','🎨','✨','📝','💧','🖼️'][$i] }}</div>
                <div class="text-xs font-bold uppercase tracking-wide text-ink/60">{{ $cert }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Soft skills --}}
<section class="py-24 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Soft Skills</div>
    <h2 class="font-serif font-black text-4xl mb-12 reveal reveal-delay-1">The human side.</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach([
            ['🧠', 'Strategic Thinking'],
            ['🗣️', 'Clear Communication'],
            ['⏰', 'Deadline-Driven'],
            ['🔄', 'Agile / Scrum'],
            ['🎯', 'Conversion Focus'],
            ['📐', 'Attention to Detail'],
        ] as $i => $s)
        <div class="reveal reveal-delay-{{ $i % 3 + 1 }} p-6 rounded-2xl border-2 border-ink/8 hover:border-pepper/30 text-center transition-all hover:shadow-lg">
            <div class="text-3xl mb-3">{{ $s[0] }}</div>
            <div class="text-xs font-bold uppercase tracking-wide text-ink/60">{{ $s[1] }}</div>
        </div>
        @endforeach
    </div>
</section>

@endsection
