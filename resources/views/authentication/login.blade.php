<!-- File: resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login - ShopEase')

@section('styles')
<style>
    .auth-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 40px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background: #fff;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h1 {
        color: #333;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .auth-header p {
        color: #777;
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #4e0763;
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 107, 107, 0.2);
    }

    .btn-auth {
        width: 100%;
        padding: 14px;
        background: linear-gradient(90deg, var(--primary), var(--accent1));
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-auth:hover {
        background: #ff5252;
    }

    .auth-footer {
        text-align: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .auth-footer a {
        color: #ff6b6b;
        text-decoration: none;
        font-weight: 500;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    .remember-me {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .remember-me input {
        margin-right: 10px;
    }

    .social-login {
        margin-top: 30px;
    }

    .social-login p {
        text-align: center;
        position: relative;
        margin-bottom: 20px;
    }

    .social-login p:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #eee;
        z-index: 1;
    }

    .social-login p span {
        display: inline-block;
        background: #fff;
        padding: 0 15px;
        position: relative;
        z-index: 2;
        color: #777;
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-btn {
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        color: white;
        text-decoration: none;
        transition: opacity 0.3s;
    }

    .social-btn:hover {
        opacity: 0.9;
    }

    .social-btn i {
        margin-right: 10px;
    }

    .btn-facebook {
        background: #3b5998;
    }

    .btn-google {
        background: #dd4b39;
    }

    .auth-container .logo {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    .auth-container .logo span {
        color: #ff6b6b;
    }

    .forgot-password {
        display: block;
        text-align: right;
        font-size: 14px;
        color: #777;
        margin-top: 8px;
        margin-bottom: 20px;
    }

    .forgot-password:hover {
        color: #ff6b6b;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo">Shop<span>Ease</span></div>
            <h1>Welcome Back</h1>
            <p>Sign in to your account to continue</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="user_name">Email Address</label>
                <input type="user_name" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="" class="forgot-password">Forgot Password?</a>
            </div>

            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn-auth">Sign In</button>

            <div class="social-login">
                <p><span>Or sign in with</span></p>
                <div class="social-buttons">
                    <a href="#" class="social-btn btn-facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="#" class="social-btn btn-google">
                        <i class="fab fa-google"></i> Google
                    </a>
                </div>
            </div>

            <div class="auth-footer">
                Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </form>
    </div>
</div>
@endsection