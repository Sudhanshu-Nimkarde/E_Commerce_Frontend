<!-- File: resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('title', 'Sign Up - ShopEase')

@section('styles')
<style>
.auth-container {
    max-width: 800px;
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
    border-color: #ff6b6b;
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
            <h1>Create Account</h1>
            <p>Join us to start shopping with ease</p>
        </div>

        <form id="registerForm">
            @csrf

            <!-- Name and Email -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <span class="text-danger" id="name_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="text-danger" id="email_error"></span>
                    </div>
                </div>
            </div>

            <!-- address and username -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="uset_name">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                        <span class="text-danger" id="user_name_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <span class="text-danger" id="address_error"></span>
                    </div>
                </div>
            </div>

            <!-- Contact and Gender -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact">
                        <span class="text-danger" id="contact_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="">-- Select Gender --</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender['gender'] }}">{{ $gender['gender'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Password and Confirm Password -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="text-danger" id="password_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <span class="text-danger" id="confirm_password_error"></span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        // Clear previous error messages
        $('#name_error').text('');
        $('#email_error').text('');
        $('#contact_error').text('');
        $('#gender_error').text('');
        $('#user_name_error').text('');
        $('#addrerss_error').text('');
        $('#password_error').text('');
        $('#confirm_password_error').text('');

        // Create FormData using form ID
        const form = document.getElementById('registerForm');
        const formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '/addUser',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
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
                        text: response.message,
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        $('#name_error').text(errors.name[0]);
                    }
                    if (errors.email) {
                        $('#email_error').text(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#password_error').text(errors.password[0]);
                    }
                    if (errors.confirm_password) {
                        $('#confirm_password_error').text(errors.confirm_password[0]);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Unexpected Error',
                        text: 'Something went wrong. Please try again.',
                    });
                }
            }
        });
    });
});
</script>
@endsection

