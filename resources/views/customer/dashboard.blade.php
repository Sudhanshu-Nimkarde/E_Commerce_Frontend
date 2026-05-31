@extends('layouts.user.user_nav_layout')

@section('title', 'Customer Dashboard - ShopEase')

@section('main_content')
<div class="dashboard-hero mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7 dashboard-hero__copy">
            <span class="section-kicker">Customer dashboard</span>
            <h1 class="mt-3">Track orders, revisit categories, and keep shopping moving.</h1>
            <p class="mt-3 mb-0">
                This dashboard pairs a clean content hierarchy with quick-access cards so the interface feels more like a modern commerce app.
            </p>

            <div class="dashboard-hero__actions">
                <a href="#" class="btn btn-light">Start Shopping</a>
                <a href="#" class="btn btn-outline-primary">Track Orders</a>
            </div>
        </div>

        <div class="col-lg-5 dashboard-hero__visual">
            <img src="{{ asset('images/home/home-main.jpg') }}" class="img-fluid rounded-4 shadow" alt="Fresh groceries and essentials">
        </div>
    </div>
</div>

<div class="dashboard-kpi-grid mb-4">
    <div class="metric-card">
        <div class="metric-label">Total Orders</div>
        <div class="metric-value">24</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Pending Deliveries</div>
        <div class="metric-value">3</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Wishlist Items</div>
        <div class="metric-value">12</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Reward Points</div>
        <div class="metric-value">1,420</div>
    </div>
</div>

<div class="section-header section-header--left mt-5">
    <span class="section-kicker">Quick access</span>
    <h2>Featured Categories</h2>
    <p>Use a 4-up tile layout to surface the most useful collections in the customer area.</p>
</div>

<div class="dashboard-category-grid mb-4">
    <div class="dashboard-category">
        <i class="bi bi-lightning-charge"></i>
        <h6>Electronics</h6>
        <p>Fast moving gadgets</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-bag-heart"></i>
        <h6>Wearables</h6>
        <p>Daily smart essentials</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-headphones"></i>
        <h6>Audio</h6>
        <p>Sound and accessories</p>
    </div>

    <div class="dashboard-category">
        <i class="bi bi-house-heart"></i>
        <h6>Home Office</h6>
        <p>Work-from-home upgrades</p>
    </div>
</div>

<div class="f-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-1">Recent Activity</h5>
            <p class="text-muted mb-0">Latest order updates and customer interactions.</p>
        </div>
        <a href="#" class="btn btn-outline-primary btn-sm">View All</a>
    </div>

    <div class="dashboard-list">
        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Fresh Produce Box</h6>
                <div class="dashboard-list__meta">Ordered on Jan 12, 2026</div>
            </div>
            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Delivered</span>
        </div>

        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Weekend Snack Bundle</h6>
                <div class="dashboard-list__meta">Ordered on Jan 15, 2026</div>
            </div>
            <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Processing</span>
        </div>

        <div class="dashboard-list__item">
            <div>
                <h6 class="dashboard-list__title">Home Essentials Kit</h6>
                <div class="dashboard-list__meta">Saved to wishlist</div>
            </div>
            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">Saved</span>
        </div>
    </div>
</div>
@endsection
