@extends('layouts.main_layout')

@section('nav_layout')
<aside class="sidebar sidebar--admin">
    <div class="sidebar-brand">
        <span class="sidebar-brand__icon">
            <i class="fa-solid fa-shield-halved"></i>
        </span>

        <div class="sidebar-brand__copy">
            <div class="sidebar-brand__title">Shop<span>Ease</span> Ops</div>
            <div class="sidebar-brand__subtitle">Operations dashboard</div>
        </div>
    </div>

    <div class="sidebar-section-label">Main menu</div>
    <nav class="sidebar-nav">
        <a class="nav-link active" href="#"><i class="bi bi-grid-fill"></i> Dashboard</a>
        <a class="nav-link" href="#"><i class="bi bi-people"></i> Manage Users</a>
        <a class="nav-link" href="#"><i class="bi bi-shield-lock"></i> Roles &amp; Access</a>
    </nav>

    <div class="sidebar-section-label">Operations</div>
    <nav class="sidebar-nav">
        <a class="nav-link" href="#"><i class="bi bi-cart-check"></i> Orders</a>
        <a class="nav-link" href="#"><i class="bi bi-box-seam"></i> Products</a>
        <a class="nav-link text-danger" href="#"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </nav>
</aside>

<header class="top-navbar">
    <label class="dashboard-search">
        <i class="bi bi-search"></i>
        <input type="search" placeholder="Search systems..." aria-label="Search admin dashboard">
    </label>

    <div class="top-navbar__actions">
        <div class="text-end">
            <div class="top-navbar__title">{{ session('user_name', 'Admin User') }}</div>
            <small class="text-muted">{{ session('role_name', 'Operations') }}</small>
        </div>

        <div class="avatar-chip">
            {{ strtoupper(substr(session('user_name', 'A'), 0, 1)) }}
        </div>
    </div>
</header>

<div class="content-wrapper">
    @yield('main_content')
</div>
@endsection
