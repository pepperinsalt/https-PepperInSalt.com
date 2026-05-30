@extends('layouts.app')
@section('title', 'Experience')
@section('meta_description', 'Kacy Culpepper work history — 10+ years in email marketing, web development, automation, and digital advertising.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Experience</div>
    <h1 class="font-serif font-black leading-tight mb-6 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        A decade of<br><span class="gradient-text italic">doing the work.</span>
    </h1>
    <p class="max-w-xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "Experience is what you earn when the plan meets reality —
        and you figure it out anyway."
    </p>
</section>

<section class="py-10 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

        {{-- Timeline --}}
        <div class="lg:col-span-2">
            <div class="section-label reveal">Work History</div>

            @php $jobs = [
                [
                    'year'    => '2026 – Present',
                    'type'    => 'Contract',
                    'title'   => 'Web Support & Ad Operations Specialist',
                    'company' => 'Altaracks · Remote',
                    'color'   => '#FF6B6B',
                    'items'   => [
                        'Manage and optimize WordPress site architecture for performance and SEO',
                        'Design and deploy digital ad creatives across Google and Meta platforms',
                        'Build and maintain lead generation funnels and landing pages',
                        'Implement tracking pixels, UTM parameters, and conversion reporting',
                    ],
                    'tags'    => ['WordPress','Google Ads','Meta Ads','SEO','Lead Gen'],
                ],
                [
                    'year'    => '2024 – Present',
                    'type'    => 'Self-Directed',
                    'title'   => 'Technical Infrastructure Specialist',
                    'company' => 'Commercial Projects · Salt Lake City, UT',
                    'color'   => '#FFD166',
                    'items'   => [
                        'Install and terminate commercial Cat6/Cat6A structured cabling',
                        'Configure and deploy network switches, patch panels, and access points',
                        'Troubleshoot complex network topology issues in commercial environments',
                    ],
                    'tags'    => ['Cat6 Cabling','Network Config','Infrastructure'],
                ],
                [
                    'year'    => '2023',
                    'type'    => 'Contract',
                    'title'   => 'Email Automation Specialist',
                    'company' => 'Artisan Talent · Remote',
                    'color'   => '#A8D520',
                    'items'   => [
                        'Reduced manual email workload by 60% through CSV-driven automation',
                        'Built reusable, modular HTML email template library',
                        'Implemented dynamic content blocks using AMPscript and Liquid',
                        'Audited and cleaned contact lists, improving deliverability by 18%',
                    ],
                    'tags'    => ['AMPscript','Liquid','HTML Email','Automation','List Hygiene'],
                ],
                [
                    'year'    => '2014 – 2018',
                    'type'    => 'Full-Time',
                    'title'   => 'Email & Front-End Developer',
                    'company' => 'CHG Healthcare · Salt Lake City, UT',
                    'color'   => '#38BDF8',
                    'items'   => [
                        'Led full migration from table-based to responsive email design across all brands',
                        'Integrated Salesforce Marketing Cloud for 250,000+ contact database',
                        'Built and maintained automated nurture journeys for healthcare professional recruitment',
                        'Managed A/B testing program improving open rates from 18% to 31%',
                        'Collaborated on 50+ campaigns per year with design, content, and compliance teams',
                    ],
                    'tags'    => ['Salesforce MC','AMPscript','Responsive Email','A/B Testing','CRM'],
                ],
                [
                    'year'    => '2010 – 2014',
                    'type'    => 'Full-Time',
                    'title'   => 'Digital Marketing Coordinator',
                    'company' => 'Various Agencies · Salt Lake City, UT',
                    'color'   => '#7B4FD4',
                    'items'   => [
                        'Managed email campaigns for retail, entertainment, and hospitality clients',
                        'Built HTML email templates from PSD mockups using table-based layouts',
                        'Supported clients including Simon Malls, Sorenson, and Arenawins',
                    ],
                    'tags'    => ['Email Marketing','HTML','Campaign Mgmt'],
                ],
            ]; @endphp

            <div class="space-y-0">
                @foreach($jobs as $i => $job)
                <div class="timeline-item reveal reveal-delay-{{ $i % 3 + 1 }}">
                    <div class="flex flex-wrap items-center gap-3 mb-2">
                        <span class="text-xs font-mono font-bold" style="color: {{ $job['color'] }}">{{ $job['year'] }}</span>
                        <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-full" style="background: color-mix(in srgb, {{ $job['color'] }} 15%, transparent); color: {{ $job['color'] }}">{{ $job['type'] }}</span>
                    </div>
                    <h3 class="font-serif font-bold text-xl mb-1">{{ $job['title'] }}</h3>
                    <div class="text-sm font-semibold mb-4" style="color: {{ $job['color'] }}">{{ $job['company'] }}</div>
                    <ul class="space-y-2 mb-5">
                        @foreach($job['items'] as $item)
                        <li class="text-sm text-ink/65 flex gap-2 leading-relaxed">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full flex-shrink-0" style="background: {{ $job['color'] }}"></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="flex flex-wrap gap-2">
                        @foreach($job['tags'] as $tag)
                        <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-8">
            <div class="section-label reveal">Competencies</div>

            <div class="reveal reveal-delay-1 p-8 rounded-3xl bg-white border border-ink/8 shadow-sm">
                <ul class="space-y-3">
                    @foreach([
                        'Data Interpretation','Conversion Optimization','Customer Retention',
                        'Marketing Automation','DNS & Server Config','Agile / Scrum',
                        'Project Management','Technical Writing',
                    ] as $comp)
                    <li class="flex items-center gap-3 text-sm font-medium">
                        <span class="w-2 h-2 rounded-full bg-pepper flex-shrink-0"></span>
                        {{ $comp }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal reveal-delay-2 p-8 rounded-3xl bg-gradient-to-br from-pepper to-saffron text-white text-center">
                <div class="font-serif font-black text-5xl mb-2">10+</div>
                <div class="text-white/70 text-sm uppercase tracking-widest mb-6">Years Experience</div>
                <div class="font-serif italic text-white/80 text-sm mb-8">"A decade of getting it right, so you don't have to start from scratch."</div>
                <a href="https://docs.google.com/document/d/16RSZtZuLAhohoX6JN_oaQpijdfaV1biIAhZfVc6lK8Q/export?format=pdf" target="_blank" class="bg-white text-pepper font-black text-xs uppercase tracking-widest px-6 py-3 rounded-full inline-block hover:bg-cream transition-colors">
                    Download C/V
                </a>
            </div>

            <div class="reveal reveal-delay-3 p-8 rounded-3xl border-2 border-dashed border-pepper/30 text-center">
                <p class="font-serif italic text-ink/70 mb-5">"Ready to add your project to this history?"</p>
                <a href="{{ route('contact') }}" class="btn-primary w-full justify-center">Hire Me →</a>
            </div>
        </div>

    </div>
</section>

@endsection
