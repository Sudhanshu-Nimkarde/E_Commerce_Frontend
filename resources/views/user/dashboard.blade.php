@extends('layouts.user.user_nav_layout')

@section('title', 'User Dashboard - ShopEase')

@section('main_content')
<div class="dashboard-hero mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7 dashboard-hero__copy">
            <span class="section-kicker">User dashboard</span>
            <h1 class="mt-3">A cleaner workspace for shopping, tracking, and discovery.</h1>
            <p class="mt-3 mb-0">
                A polished dashboard layout helps the project feel complete while keeping the existing routes and data flow unchanged.
            </p>

            <div class="dashboard-hero__actions">
                <a href="#" class="btn btn-light">Explore Store</a>
                <a href="#" class="btn btn-outline-primary">View Orders</a>
            </div>
        </div>

        <div class="col-lg-5 dashboard-hero__visual">
            <img src="{{ asset('images/home/home-main.jpg') }}" class="img-fluid rounded-4 shadow" alt="ShopEase storefront preview">
        </div>
    </div>
</div>

<div class="dashboard-kpi-grid mb-4">
    <div class="metric-card">
        <div class="metric-label">Orders Placed</div>
        <div class="metric-value">48</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Active Tickets</div>
        <div class="metric-value">2</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Wishlist</div>
        <div class="metric-value">9</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Savings This Month</div>
        <div class="metric-value">$124</div>
    </div>
</div>

<div class="section-header section-header--left mt-5">
    <span class="section-kicker">Quick access</span>
    <h2>Featured Categories</h2>
    <p>Balanced category tiles make the dashboard easier to scan and feel much more premium on large monitors.</p>
</div>

<div class="dashboard-category-grid mb-4">
    <div class="dashboard-category">
        <i class="bi bi-lightning-charge"></i>
        <h6>Electronics</h6>
        <p>Trending gadgets</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-bag-heart"></i>
        <h6>Wearables</h6>
        <p>Smart everyday picks</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-headphones"></i>
        <h6>Audio</h6>
        <p>Sound essentials</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-house-heart"></i>
        <h6>Home Office</h6>
        <p>Workday upgrades</p>
    </div>
</div>

<div class="f-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-1">Recent Activity</h5>
            <p class="text-muted mb-0">Latest purchases and saved products.</p>
        </div>
        <a href="#" class="btn btn-outline-primary btn-sm">View All</a>
    </div>

    <div class="dashboard-list">
        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Wireless Noise Cancelling Headphones</h6>
                <div class="dashboard-list__meta">Purchased on Jan 12, 2026</div>
            </div>
            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Delivered</span>
        </div>

        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Smart Watch Series 5</h6>
                <div class="dashboard-list__meta">Added to wishlist</div>
            </div>
            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">Saved</span>
        </div>

        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Portable Bluetooth Speaker</h6>
                <div class="dashboard-list__meta">Delivery scheduled for tomorrow</div>
            </div>
            <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">In transit</span>
        </div>
    </div>
</div>
@endsection
