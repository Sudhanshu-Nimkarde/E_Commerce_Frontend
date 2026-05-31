<!-- File: resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('title', 'Sign Up - ShopEase')

@section('styles')
    <style>
        .auth-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }

        .auth-header p {
            color: #777;
            font-size: 16px;
        }

        .logo {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .logo span {
            color: #ff6b6b;
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
            height: 48px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #ff6b6b;
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 107, 107, 0.2);
        }

        .password-group {
            position: relative;
        }

        .password-group .form-control {
            padding-right: 45px;
        }

        .password-toggle-btn {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #777;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
        }

        .password-toggle-btn:hover {
            color: #ff6b6b;
        }

        .text-danger {
            display: block;
            margin-top: 5px;
            font-size: 13px;
        }

        .register-btn {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(90deg, var(--primary), var(--accent1));
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        .register-btn:hover {
            background: linear-gradient(90deg, var(--primary), var(--accent1));
            opacity: 0.9;
        }

        .register-btn:focus {
            outline: none;
            box-shadow: none;
        }

        .auth-footer {
            margin-top: 25px;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .auth-footer a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {

            .auth-container {
                padding: 25px;
                margin: 20px auto;
            }

        }
    </style>
@endsection

@section('content')

    <div class="container">

        <div class="auth-container">

            <div class="auth-header">

                <div class="logo">
                    Shop<span>Ease</span>
                </div>

                <h1>Create Account</h1>

                <p>
                    Join us to start shopping with ease
                </p>

            </div>

            <form id="registerForm">

                @csrf

                <!-- Name & Email -->
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="name">
                                Name
                            </label>

                            <input type="text" class="form-control" id="name" name="name" required>

                            <span class="text-danger" id="name_error"></span>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <input type="email" class="form-control" id="email" name="email" required>

                            <span class="text-danger" id="email_error"></span>

                        </div>

                    </div>

                </div>

                <!-- Username & Address -->
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="user_name">
                                Username
                            </label>

                            <input type="text" class="form-control" id="user_name" name="user_name" required>

                            <span class="text-danger" id="user_name_error"></span>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="address">
                                Address
                            </label>

                            <input type="text" class="form-control" id="address" name="address" required>

                            <span class="text-danger" id="address_error"></span>

                        </div>

                    </div>

                </div>

                <!-- Contact & Gender -->
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="contact">
                                Contact
                            </label>

                            <input type="text" class="form-control" id="contact" name="contact">

                            <span class="text-danger" id="contact_error"></span>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="gender">
                                Gender
                            </label>

                            <select class="form-control" id="gender" name="gender" required>

                                <option value="">
                                    -- Select Gender --
                                </option>

                                @foreach ($genders as $gender)
                                    <option value="{{ $gender['gender'] }}">
                                        {{ $gender['gender'] }}
                                    </option>
                                @endforeach

                            </select>

                            <span class="text-danger" id="gender_error"></span>

                        </div>

                    </div>

                </div>

                <!-- Password -->
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="password">
                                Password
                            </label>

                            <div class="password-group">

                                <input type="password" class="form-control" id="password" name="password" required>

                                <button type="button" id="togglePasswordBtn" class="password-toggle-btn">
                                    <i class="fa-solid fa-eye" id="passwordIcon"></i>
                                </button>

                            </div>

                            <span class="text-danger" id="password_error"></span>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="confirm_password">
                                Confirm Password
                            </label>

                            <div class="password-group">

                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                    required>

                                <button type="button" id="toggleConfirmPasswordBtn" class="password-toggle-btn">
                                    <i class="fa-solid fa-eye" id="confirmPasswordIcon"></i>
                                </button>

                            </div>

                            <span class="text-danger" id="confirm_password_error"></span>

                        </div>

                    </div>

                </div>

                <!-- Register Button -->
                <div class="form-group mt-3 mb-0">

                    <button type="submit" id="registerBtn" class="register-btn">

                        <span class="register-btn-text">
                            Register
                        </span>

                    </button>

                </div>

            </form>

            <div class="auth-footer">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#registerForm').on('submit', function(e) {

                e.preventDefault();

                $('.text-danger').text('');

                const form = document.getElementById('registerForm');

                const formData = new FormData(form);

                $.ajax({

                    type: 'POST',

                    url: '/addUser',

                    data: formData,

                    processData: false,

                    contentType: false,

                    success: function(response) {

                        if (response.status) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {

                                window.location.href = "{{ route('login') }}";

                            });

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: response.message
                            });

                        }

                    },

                    error: function(xhr) {

                        if (xhr.status === 422) {

                            const errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {

                                $('#' + key + '_error').text(value[0]);

                            });

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Unexpected Error',
                                text: 'Something went wrong. Please try again.'
                            });

                        }

                    }

                });

            });

            $('#togglePasswordBtn').on('click', function() {

                togglePasswordVisibility(
                    '#password',
                    '#passwordIcon'
                );

            });

            $('#toggleConfirmPasswordBtn').on('click', function() {

                togglePasswordVisibility(
                    '#confirm_password',
                    '#confirmPasswordIcon'
                );

            });

            function togglePasswordVisibility(inputSelector, iconSelector) {

                const passwordField = $(inputSelector);

                const passwordIcon = $(iconSelector);

                const isPassword = passwordField.attr('type') === 'password';

                passwordField.attr(
                    'type',
                    isPassword ? 'text' : 'password'
                );

                passwordIcon.toggleClass(
                    'fa-eye fa-eye-slash'
                );

            }

        });
    </script>

@endsection
