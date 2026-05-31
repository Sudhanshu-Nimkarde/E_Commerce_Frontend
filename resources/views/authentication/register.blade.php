@extends('layouts.app')

@section('title', 'Sign Up - ShopEase')

@section('content')
<div class="auth-card">
    <section class="auth-hero auth-hero--register">
        <a href="{{ url('/') }}" class="auth-brand" aria-label="ShopEase home">
            <span class="auth-brand__icon">
                <img src="{{ asset('images/home/shopease-favicon.svg') }}" alt="ShopEase">
            </span>
            <span>
                <span class="auth-brand__title">Shop<span>Ease</span></span>
                <span class="auth-brand__subtitle">Create your shopping account</span>
            </span>
        </a>

        <h1 class="auth-hero__title">Join ShopEase in a few quick steps.</h1>
        <p class="auth-hero__text">
            Use a cleaner sign-up flow with a modern layout, responsive form grid, and stronger visual hierarchy.
        </p>

        <div class="auth-highlights">
            <div class="auth-highlight">
                <strong>Quick setup</strong>
                <span>Capture the essential user data without overwhelming the form.</span>
            </div>

            <div class="auth-highlight">
                <strong>Validation ready</strong>
                <span>Error messages stay readable and consistent with the new UI.</span>
            </div>

            <div class="auth-highlight">
                <strong>Modern layout</strong>
                <span>Balanced spacing and strong CTA styling for laptop screens.</span>
            </div>

            <div class="auth-highlight">
                <strong>Easy return</strong>
                <span>Every screen guides the user back to login when needed.</span>
            </div>
        </div>
    </section>

    <section class="auth-panel">
        <div class="auth-panel__header">
            <span class="section-kicker">Create account</span>
            <h1>Sign up for ShopEase</h1>
            <p>Fill in your details to create a new shopping account.</p>
        </div>

        <form
            id="registerForm"
            method="POST"
            action="{{ route('addUser') }}"
            data-success-redirect="{{ route('login') }}"
            class="auth-form"
        >
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required autocomplete="name">
                        <span class="text-danger" id="name_error"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
                        <span class="text-danger" id="email_error"></span>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_name">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required autocomplete="username">
                        <span class="text-danger" id="user_name_error"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required autocomplete="street-address">
                        <span class="text-danger" id="address_error"></span>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" autocomplete="tel">
                        <span class="text-danger" id="contact_error"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">-- Select Gender --</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender['gender'] }}">{{ $gender['gender'] }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="gender_error"></span>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-group">
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
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
                        <span class="text-danger" id="password_error"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required autocomplete="new-password">
                            <button
                                type="button"
                                class="password-toggle-btn"
                                data-toggle-password
                                data-target="#confirm_password"
                                aria-label="Show password"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <span class="text-danger" id="confirm_password_error"></span>
                    </div>
                </div>
            </div>

            <div class="auth-actions">
                <button type="submit" id="registerBtn" class="btn btn-auth">Register</button>
            </div>
        </form>

        <div class="auth-footer">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </section>
</div>
@endsection
