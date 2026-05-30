@extends('layouts.app')
@section('title', 'Contact')
@section('meta_description', 'Get in touch — available for full-time, contract, and consulting work.')

@section('content')

<section class="pt-40 pb-20 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="section-label reveal">Contact</div>
    <h1 class="font-serif font-black leading-tight mb-6 reveal reveal-delay-1" style="font-size: clamp(3rem,8vw,7rem);">
        Let's build<br>something <span class="gradient-text italic">great.</span>
    </h1>
    <p class="max-w-xl text-ink/60 text-xl font-light leading-relaxed reveal reveal-delay-2" style="font-family: var(--font-serif); font-style: italic;">
        "The best projects always start with a simple question: what if we made this remarkable?"
    </p>
</section>

<section class="py-10 pb-28 max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

        {{-- Left: info --}}
        <div>
            {{-- Success / error --}}
            @if(session('success'))
            <div class="mb-8 p-5 rounded-2xl bg-lime/10 border border-lime/30 text-green-700 font-semibold">
                <span aria-hidden="true">✅</span> {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div class="mb-8 p-5 rounded-2xl bg-pepper/10 border border-pepper/30 text-pepper font-semibold">
                @foreach($errors->all() as $err)<div><span aria-hidden="true">⚠️</span> {{ $err }}</div>@endforeach
            </div>
            @endif

            <div class="section-label reveal">Direct Contact</div>
            <div class="space-y-6 reveal reveal-delay-1">
                @foreach([
                    ['✉️',  'Email',    'pepperinsalt@gmail.com',          'mailto:pepperinsalt@gmail.com'],
                    ['📞',  'Phone',    '(385) 379-0540',                  'tel:+13853790540'],
                    ['🔗',  'LinkedIn', 'linkedin.com/in/kacyculpepper',   'https://linkedin.com/in/kacyculpepper'],
                    ['🐙',  'GitHub',   'github.com/pepperinsalt',         'https://github.com/pepperinsalt'],
                    ['📍',  'Location', 'Salt Lake City, UT',              null],
                ] as $c)
                <div class="flex items-center gap-5 py-4 border-b border-ink/8">
                    <span class="text-2xl w-9">{{ $c[0] }}</span>
                    <div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ink/40 mb-0.5">{{ $c[1] }}</div>
                        @if($c[3])
                        <a href="{{ $c[3] }}" class="font-semibold hover:text-pepper transition-colors"
                           @if(str_starts_with($c[3], 'http')) target="_blank" rel="noopener" @endif>{{ $c[2] }}</a>
                        @else
                        <span class="font-semibold">{{ $c[2] }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 reveal reveal-delay-2">
                <div class="section-label">Availability</div>
                <div class="space-y-3 mt-4">
                    @foreach([
                        ['Full-Time Roles',      'Open',      'bg-lime/15 text-green-700'],
                        ['Contract / Freelance', 'Open',      'bg-lime/15 text-green-700'],
                        ['Consulting',           'Available', 'bg-gold/20 text-yellow-700'],
                        ['Response Time',        '< 48 hours','bg-sky/15 text-sky-700'],
                    ] as $a)
                    <div class="flex items-center justify-between py-3 border-b border-ink/8">
                        <span class="font-medium text-sm">{{ $a[0] }}</span>
                        <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full {{ $a[2] }}">{{ $a[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-12 p-8 rounded-3xl bg-gradient-to-br from-pepper/10 to-saffron/10 border border-pepper/20 reveal reveal-delay-3">
                <p class="font-serif italic text-lg text-ink/70 mb-5">
                    "I respond to every inquiry personally. No forms that go nowhere, no assistants — just me, reading your message and writing back."
                </p>
                <a href="https://docs.google.com/document/d/16RSZtZuLAhohoX6JN_oaQpijdfaV1biIAhZfVc6lK8Q/export?format=pdf" target="_blank" class="btn-ghost">Download my C/V →</a>
            </div>
        </div>

        {{-- Right: form --}}
        <div class="reveal reveal-delay-1">
            <div class="section-label">Send a Message</div>
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 mt-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label" for="name">Your Name *</label>
                        <input class="form-input" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Jane Smith" required>
                    </div>
                    <div>
                        <label class="form-label" for="email">Email Address *</label>
                        <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="jane@company.com" required>
                    </div>
                </div>
                <div>
                    <label class="form-label" for="service">What do you need?</label>
                    <select class="form-input form-select-arrow" id="service" name="service">
                        <option value="">— Select a service —</option>
                        <option {{ old('service') == 'Web Design & Development' ? 'selected' : '' }}>Web Design & Development</option>
                        <option {{ old('service') == 'Email Marketing & Automation' ? 'selected' : '' }}>Email Marketing & Automation</option>
                        <option {{ old('service') == 'Digital Advertising' ? 'selected' : '' }}>Digital Advertising</option>
                        <option {{ old('service') == 'SEO & Analytics' ? 'selected' : '' }}>SEO & Analytics</option>
                        <option {{ old('service') == 'Full-Stack / Multiple Services' ? 'selected' : '' }}>Full-Stack / Multiple Services</option>
                        <option {{ old('service') == 'Something Else' ? 'selected' : '' }}>Something Else</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="budget">Rough Budget</label>
                    <select class="form-input form-select-arrow" id="budget" name="budget">
                        <option value="">— Select a range —</option>
                        <option>Under $1,000</option>
                        <option>$1,000 – $3,000</option>
                        <option>$3,000 – $7,500</option>
                        <option>$7,500 – $15,000</option>
                        <option>$15,000+</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="message">Tell me about your project *</label>
                    <textarea class="form-input" id="message" name="message" rows="6" placeholder="What are you trying to accomplish? Any timeline or budget context is helpful..." required style="resize:vertical; min-height: 150px;">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-base py-4">
                    Send Message 🌶️
                </button>
            </form>
        </div>

    </div>
</section>

@endsection
