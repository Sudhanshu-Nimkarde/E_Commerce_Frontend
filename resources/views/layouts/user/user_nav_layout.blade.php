@extends('layouts.main_layout')

@section('nav_layout')
<div class="sidebar" style="background: linear-gradient(180deg, #ffffff 0%, #f0f7ff 100%);">
    <div class="d-flex align-items-center mb-4 px-3">
        <i class="bi bi-bag-heart-fill text-primary fs-3 me-2"></i>
        <h4 class="fw-bold m-0" style="color: #2b3a4a;">MyStore</h4>
    </div>
    
    <nav class="nav flex-column">
        <a class="nav-link active" href="#"><i class="bi bi-house-door"></i> Home</a>
        <a class="nav-link" href="#"><i class="bi bi-collection"></i> Categories</a>
        <a class="nav-link" href="#"><i class="bi bi-heart"></i> Wishlist</a>
        <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Edit Profile</a>
        <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Order History</a>
    </nav>
</div>

<header class="top-navbar d-flex justify-content-between align-items-center">
    <div class="fw-medium">Welcome back, <span class="text-primary fw-bold">Alex!</span></div>
    <div class="d-flex align-items-center gap-4">
        <div class="position-relative">
            <i class="bi bi-cart3 fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </div>
        <img src="https://ui-avatars.com/api/?name=User" class="rounded-circle border" width="40">
    </div>
</header>

<div class="content-wrapper">
    @yield('main_content')
</div>
@endsection