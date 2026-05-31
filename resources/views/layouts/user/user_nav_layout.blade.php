@extends('layouts.main_layout')

@section('nav_layout')
<aside class="sidebar sidebar--user">
    <div class="sidebar-brand">
        <span class="sidebar-brand__icon">
            <i class="fa-solid fa-bag-shopping"></i>
        </span>

        <div class="sidebar-brand__copy">
            <div class="sidebar-brand__title">Shop<span>Ease</span></div>
            <div class="sidebar-brand__subtitle">Customer portal</div>
        </div>
    </div>

    <div class="sidebar-section-label">Main menu</div>
    <nav class="sidebar-nav">
        <a class="nav-link active" href="#"><i class="bi bi-house-door"></i> Home</a>
        <a class="nav-link" href="#"><i class="bi bi-grid-1x2"></i> Categories</a>
        <a class="nav-link" href="#"><i class="bi bi-heart"></i> Wishlist</a>
        <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Edit Profile</a>
        <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Order History</a>
    </nav>
</aside>

<header class="top-navbar">
    <div class="top-navbar__title">
        Welcome back, <span>{{ session('user_name', 'Alex') }}</span>
    </div>

    <div class="top-navbar__actions">
        <label class="dashboard-search">
            <i class="bi bi-search"></i>
            <input type="search" placeholder="Search orders, products..." aria-label="Search dashboard">
        </label>

        <button type="button" class="icon-button" aria-label="Cart">
            <i class="bi bi-cart3"></i>
            <span class="icon-badge">3</span>
        </button>

        <div class="avatar-chip">
            {{ strtoupper(substr(session('user_name', 'Alex'), 0, 1)) }}
        </div>
    </div>
</header>

<div class="content-wrapper">
    @yield('main_content')
</div>
@endsection
