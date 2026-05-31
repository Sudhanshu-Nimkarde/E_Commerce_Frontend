@extends('layouts.app')

@section('title', 'Login - ShopEase')

@section('content')
<div class="auth-card">
    <section class="auth-hero auth-hero--login">
        <a href="{{ url('/') }}" class="auth-brand" aria-label="ShopEase home">
            <span class="auth-brand__icon">
                <img src="{{ asset('images/home/shopease-favicon.svg') }}" alt="ShopEase">
            </span>
            <span>
                <span class="auth-brand__title">Shop<span>Ease</span></span>
                <span class="auth-brand__subtitle">Your quick commerce storefront</span>
            </span>
        </a>

        <h1 class="auth-hero__title">Welcome back.</h1>
        <p class="auth-hero__text">
            Sign in to continue shopping with faster checkout, cleaner navigation, and a polished ecommerce experience.
        </p>

        <div class="auth-highlights">
            <div class="auth-highlight">
                <strong>Fast checkout</strong>
                <span>Keep returning customers moving with less friction.</span>
            </div>

            <div class="auth-highlight">
                <strong>Daily deals</strong>
                <span>Promote fresh offers with a premium visual presentation.</span>
            </div>

            <div class="auth-highlight">
                <strong>Secure access</strong>
                <span>Keep the login flow simple and consistent across devices.</span>
            </div>

            <div class="auth-highlight">
                <strong>Responsive</strong>
                <span>Looks sharp on laptops, Windows screens, and smaller displays.</span>
            </div>
        </div>
    </section>

    <section class="auth-panel">
        <div class="auth-panel__header">
            <span class="section-kicker">Sign in</span>
            <h1>Login to your account</h1>
            <p>Use your username and password to continue.</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="user_name">Username</label>
                <input
                    type="text"
                    class="form-control @error('user_name') is-invalid @enderror"
                    id="user_name"
                    name="user_name"
                    value="{{ old('user_name') }}"
                    required
                    autocomplete="username"
                    autofocus
                >
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-group">
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                    <button
                        type="button"
                        class="password-toggle-btn"
                        data-toggle-password
                        data-target="#password"
                        aria-label="Show password"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>

            <a href="#" class="forgot-password">Forgot Password?</a>

            <div class="auth-actions">
                <button type="submit" class="btn btn-auth">Sign In</button>
            </div>

            <div class="social-login">
                <p><span>Or sign in with</span></p>
                <div class="social-buttons">
                    <a href="#" class="social-btn btn-facebook">
                        <i class="fab fa-facebook-f me-2"></i> Facebook
                    </a>
                    <a href="#" class="social-btn btn-google">
                        <i class="fab fa-google me-2"></i> Google
                    </a>
                </div>
            </div>

            <div class="auth-footer">
                Don't have an account? <a href="{{ route('register') }}">Create one</a>
            </div>
        </form>
    </section>
</div>
@endsection
