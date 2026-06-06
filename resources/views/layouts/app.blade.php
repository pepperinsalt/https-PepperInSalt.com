<!DOCTYPE html>
<html lang="en" class="noise">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pepper in Salt') | Web Services</title>
    <meta name="description" content="@yield('meta_description', 'Strategy, design, and development for brands ready to stand out. Salt Lake City digital agency.')">
    <meta name="theme-color" content="#D63535">

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="Pepper in Salt Web Services">
    <meta property="og:title"       content="@yield('title', 'Pepper in Salt') | Web Services">
    <meta property="og:description" content="@yield('meta_description', 'Strategy, design, and development for brands ready to stand out. Salt Lake City digital agency.')">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:image"       content="{{ asset('images/logo.jpg') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="@yield('title', 'Pepper in Salt') | Web Services">
    <meta name="twitter:description" content="@yield('meta_description', 'Strategy, design, and development for brands ready to stand out. Salt Lake City digital agency.')">
    <meta name="twitter:image"       content="{{ asset('images/logo.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/images/logo.jpg" type="image/jpeg">
</head>
<body class="font-sans">

    {{-- Skip to content --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[9999] focus:px-4 focus:py-2 focus:bg-pepper focus:text-white focus:rounded-lg focus:font-bold focus:text-sm">Skip to content</a>

    {{-- Mobile Menu --}}
    <div class="mobile-menu" id="mobile-menu">
        <a href="{{ route('home') }}"       onclick="closeMobile()">Home</a>
        <a href="{{ route('services') }}"   onclick="closeMobile()">Services</a>
        <a href="{{ route('work') }}"       onclick="closeMobile()">Work</a>
        <a href="{{ route('skills') }}"     onclick="closeMobile()">Skills</a>
        <a href="{{ route('experience') }}" onclick="closeMobile()">Experience</a>
        <a href="{{ route('about') }}"      onclick="closeMobile()">About</a>
        <a href="{{ route('contact') }}"    onclick="closeMobile()">Contact</a>
    </div>

    {{-- Navigation --}}
    <nav id="nav" class="fixed top-0 left-0 right-0 z-100 py-6 transition-all duration-400">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="/images/logo.jpg" alt="Pepper in Salt" class="w-10 h-10 rounded-full object-cover ring-2 ring-pepper/20">
                <span class="font-serif font-bold text-lg hidden sm:block">Pepper in Salt</span>
            </a>
            <ul class="hidden lg:flex items-center gap-8">
                <li><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li><a class="nav-link" href="{{ route('work') }}">Work</a></li>
                <li><a class="nav-link" href="{{ route('skills') }}">Skills</a></li>
                <li><a class="nav-link" href="{{ route('experience') }}">Experience</a></li>
                <li><a class="nav-link" href="{{ route('about') }}">About</a></li>
            </ul>
            <div class="flex items-center gap-4">
                <a href="{{ route('contact') }}" class="btn-primary hidden lg:inline-flex">Start a Project</a>
                <button id="hamburger" onclick="toggleMobile()" class="lg:hidden flex flex-col gap-1.5 p-2" aria-label="Menu" aria-expanded="false" aria-controls="mobile-menu">
                    <span class="w-6 h-0.5 bg-ink transition-all block"></span>
                    <span class="w-6 h-0.5 bg-ink transition-all block"></span>
                    <span class="w-4 h-0.5 bg-ink transition-all block"></span>
                </button>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-ink text-cream py-16 mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/images/logo.jpg" alt="Logo" class="w-10 h-10 rounded-full object-cover" loading="lazy" decoding="async">
                        <span class="font-serif font-bold text-xl">Pepper in Salt</span>
                    </div>
                    <p class="text-cream/50 text-sm leading-relaxed max-w-xs">
                        Strategy, design, and development for brands that want to be remembered.
                        Based in Salt Lake City. Working worldwide.
                    </p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-cream/40 mb-4">Pages</p>
                    <ul class="space-y-2 text-sm text-cream/60">
                        <li><a href="{{ route('services') }}"   class="hover:text-gold transition-colors">Services</a></li>
                        <li><a href="{{ route('work') }}"       class="hover:text-gold transition-colors">Work</a></li>
                        <li><a href="{{ route('skills') }}"     class="hover:text-gold transition-colors">Skills</a></li>
                        <li><a href="{{ route('experience') }}" class="hover:text-gold transition-colors">Experience</a></li>
                        <li><a href="{{ route('about') }}"      class="hover:text-gold transition-colors">About</a></li>
                        <li><a href="{{ route('contact') }}"    class="hover:text-gold transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-cream/40 mb-4">Connect</p>
                    <ul class="space-y-2 text-sm text-cream/60">
                        <li><a href="mailto:pepperinsalt@gmail.com" class="hover:text-gold transition-colors">pepperinsalt@gmail.com</a></li>
                        <li><a href="tel:+13853790540" class="hover:text-gold transition-colors">(385) 379-0540</a></li>
                        <li><a href="https://linkedin.com/in/kacyculpepper" target="_blank" rel="noopener" class="hover:text-gold transition-colors">LinkedIn</a></li>
                        <li><a href="https://github.com/pepperinsalt" target="_blank" rel="noopener" class="hover:text-gold transition-colors">GitHub</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-cream/10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-cream/30">
                <span>&copy; {{ date('Y') }} Pepper in Salt Web Services. Salt Lake City, UT.</span>
                <span>Built with Laravel &amp; love 🌶️</span>
            </div>
        </div>
    </footer>

    <script>
    (function(){
        // Nav scroll
        var nav = document.getElementById('nav');
        // ⚡ Bolt: Track scroll state to prevent redundant DOM updates and layout thrashing
        var isScrolled = false;
        window.addEventListener('scroll', function(){
            if(window.scrollY > 60 && !isScrolled){
                isScrolled = true;
                nav.style.background = 'rgba(250,247,240,0.95)';
                nav.style.backdropFilter = 'blur(20px)';
                nav.style.boxShadow = '0 1px 0 rgba(13,10,7,0.08)';
                nav.style.paddingTop = '14px';
                nav.style.paddingBottom = '14px';
            } else if (window.scrollY <= 60 && isScrolled) {
                isScrolled = false;
                nav.style.background = '';
                nav.style.backdropFilter = '';
                nav.style.boxShadow = '';
                nav.style.paddingTop = '';
                nav.style.paddingBottom = '';
            }
        }, {passive:true});

        // Mobile menu
        window.toggleMobile = function(){
            var menu = document.getElementById('mobile-menu');
            var btn  = document.getElementById('hamburger');
            var open = menu.classList.toggle('open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        };
        window.closeMobile = function(){
            document.getElementById('mobile-menu').classList.remove('open');
            document.getElementById('hamburger').setAttribute('aria-expanded', 'false');
        };

        // Reveal on scroll
        var reveals = document.querySelectorAll('.reveal,.reveal-left');
        var obs = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
            });
        }, {threshold:0.08, rootMargin:'0px 0px -30px 0px'});
        reveals.forEach(function(el){ obs.observe(el); });

        // Skill bars
        var skillObs = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){
                    e.target.style.width = e.target.dataset.pct + '%';
                    skillObs.unobserve(e.target);
                }
            });
        }, {threshold:0.3});
        document.querySelectorAll('.skill-fill').forEach(function(el){ skillObs.observe(el); });

        // Counters
        function countUp(el){
            var target = +el.dataset.target, suffix = el.dataset.suffix||'', t0 = null, dur = 1800;
            function step(ts){
                if(!t0) t0=ts;
                var p = Math.min((ts-t0)/dur,1), ease = 1-Math.pow(1-p,3);
                el.textContent = Math.floor(ease*target) + suffix;
                if(p<1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }
        var counterObs = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){ countUp(e.target); counterObs.unobserve(e.target); }
            });
        }, {threshold:0.5});
        document.querySelectorAll('[data-target]').forEach(function(el){ counterObs.observe(el); });

        // Clocks
        function tick(){
            ['slc','ny','lon'].forEach(function(id){
                var el = document.getElementById('clock-'+id);
                if(!el) return;
                var tz = {slc:'America/Denver',ny:'America/New_York',lon:'Europe/London'}[id];
                el.textContent = new Date().toLocaleTimeString('en-US',{timeZone:tz,hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:false});
            });
        }
        tick(); setInterval(tick,1000);
    })();
    </script>
</body>
</html>
