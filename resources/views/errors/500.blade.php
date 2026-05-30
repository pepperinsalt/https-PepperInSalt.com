@extends('layouts.app')
@section('title', '500 — Server Error')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center px-6 text-center">
    <div class="font-serif font-black text-[12rem] leading-none gradient-text select-none">500</div>
    <h1 class="font-serif font-black text-4xl lg:text-5xl mb-4 -mt-4">Something went wrong.</h1>
    <p class="text-ink/50 text-lg max-w-md mb-10" style="font-family: var(--font-serif); font-style: italic;">
        "We'll sort this out — try again in a moment."
    </p>
    <a href="{{ route('home') }}" class="btn-primary">Back to Home →</a>
</section>
@endsection
