@extends('layouts.main_layout')

@section('nav_layout')
<div class="sidebar">
    <div class="d-flex align-items-center mb-4 px-3">
        <div class="bg-primary rounded-circle me-2" style="width: 35px; height: 35px;"></div>
        <h4 class="fw-bold m-0 text-primary">AdminPanel</h4>
    </div>
    
    <nav class="nav flex-column">
        <small class="text-uppercase fw-bold text-muted mb-2 px-3" style="font-size: 10px;">Main Menu</small>
        <a class="nav-link active" href="#"><i class="bi bi-grid-fill"></i> Dashboard</a>
        <a class="nav-link" href="#"><i class="bi bi-people"></i> Manage Users</a>
        <a class="nav-link" href="#"><i class="bi bi-shield-lock"></i> Roles & Access</a>
        
        <small class="text-uppercase fw-bold text-muted mt-4 mb-2 px-3" style="font-size: 10px;">Operations</small>
        <a class="nav-link" href="#"><i class="bi bi-cart-check"></i> Orders</a>
        <a class="nav-link" href="#"><i class="bi bi-box-seam"></i> Products</a>
        <a class="nav-link text-danger mt-5" href="#"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </nav>
</div>

<header class="top-navbar d-flex justify-content-between align-items-center">
    <input type="text" class="search-bar w-25" placeholder="Search systems...">
    <div class="d-flex align-items-center">
        <div class="text-end me-3">
            <p class="m-0 fw-bold">Admin User</p>
            <small class="text-muted">Super Admin</small>
        </div>
        <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" width="40">
    </div>
</header>

<div class="content-wrapper">
    @yield('main_content')
</div>
@endsection