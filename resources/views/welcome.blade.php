@extends('layouts.app')

@section('title', 'Welcome - ShopEase')

@section('content')
<div class="auth-card">
    <section class="auth-hero auth-hero--login">
        <a href="{{ url('/') }}" class="auth-brand" aria-label="ShopEase home">
            <span class="auth-brand__icon">
                <img src="{{ asset('images/home/shopease-favicon.svg') }}" alt="ShopEase">
            </span>
            <span>
                <span class="auth-brand__title">Shop<span>Ease</span></span>
                <span class="auth-brand__subtitle">Modern ecommerce front-end</span>
            </span>
        </a>

        <h1 class="auth-hero__title">A cleaner storefront for your Laravel project.</h1>
        <p class="auth-hero__text">
            This welcome screen now matches the same brand system, spacing, and card styling used across the updated app.
        </p>

        <div class="auth-highlights">
            <div class="auth-highlight">
                <strong>Responsive</strong>
                <span>Built to look polished on laptops and Windows screens.</span>
            </div>

            <div class="auth-highlight">
                <strong>Consistent</strong>
                <span>Reuses the same shared CSS and JS as the rest of the app.</span>
            </div>
        </div>
    </section>

    <section class="auth-panel">
        <div class="auth-panel__header">
            <span class="section-kicker">Welcome</span>
            <h1>Preview the ShopEase experience</h1>
            <p>Jump into the storefront or go straight to your account.</p>
        </div>

        <div class="auth-actions">
            <a href="{{ url('/') }}" class="btn btn-auth mb-3">Go to Home</a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Sign In</a>
        </div>
    </section>
</div>
@endsection
