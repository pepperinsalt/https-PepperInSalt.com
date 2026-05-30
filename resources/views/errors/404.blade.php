@extends('layouts.app')
@section('title', '404 — Page Not Found')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center px-6 text-center">
    <div class="font-serif font-black text-[12rem] leading-none gradient-text select-none">404</div>
    <h1 class="font-serif font-black text-4xl lg:text-5xl mb-4 -mt-4">Page not found.</h1>
    <p class="text-ink/50 text-lg max-w-md mb-10" style="font-family: var(--font-serif); font-style: italic;">
        "Even the best explorers take a wrong turn sometimes."
    </p>
    <div class="flex flex-wrap gap-4 justify-center">
        <a href="{{ route('home') }}" class="btn-primary">Back to Home →</a>
        <a href="{{ route('contact') }}" class="btn-outline">Contact Me</a>
    </div>
</section>
@endsection
