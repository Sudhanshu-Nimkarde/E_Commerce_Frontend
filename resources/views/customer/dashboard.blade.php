@extends('layouts.user.user_nav_layout')

@section('main_content')
<div class="f-card p-5 mb-4 border-0 text-white" style="background: linear-gradient(135deg, #0099ff 0%, #00d2ff 100%);">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold mb-3">Explore the Future of Tech</h1>
            <p class="opacity-75 mb-4">Upgrade your workspace with our premium gadgets and electronics.</p>
            <button class="btn btn-light text-primary fw-bold px-4 py-2">Start Shopping</button>
        </div>
    </div>
</div>

<h4 class="fw-bold mb-4">Featured Categories</h4>
<div class="row g-4 mb-5">
    @foreach(['Electronics', 'Wearables', 'Audio', 'Home Office'] as $cat)
    <div class="col-md-3 text-center">
        <div class="f-card p-4">
            <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; line-height: 60px; font-size: 24px;">
                <i class="bi bi-lightning-charge"></i>
            </div>
            <h6 class="fw-bold m-0">{{ $cat }}</h6>
        </div>
    </div>
    @endforeach
</div>

<h4 class="fw-bold mb-4">Your Recent Activity</h4>
<div class="f-card p-4">
    <div class="row align-items-center">
        <div class="col-auto">
            <img src="https://via.placeholder.com/100" class="rounded-4">
        </div>
        <div class="col">
            <h6 class="fw-bold mb-1">Wireless Noise Cancelling Headphones</h6>
            <p class="text-muted small mb-0">Purchased on Jan 12, 2026</p>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary btn-sm rounded-pill px-4">View Order</button>
        </div>
    </div>
</div>
@endsection

@section('main_content')
<div class="row mb-5">
    <div class="col-12 p-5 glass-card text-center overflow-hidden" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://source.unsplash.com/random/1200x400/?cyberpunk'); background-size: cover;">
        <h1 class="orbitron display-4 fw-bold">SUMMER_DROP_2026</h1>
        <p class="lead">Get the latest cybernetic enhancements at 30% off.</p>
        <button class="btn btn-futuristic btn-lg mt-3">Explore Store</button>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="glass-card overflow-hidden">
            <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="product">
            <div class="p-4">
                <h5 class="orbitron">Neural Link V2</h5>
                <p class="text-secondary small">Experience the web directly in your cortex.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-4 fw-bold text-info">$899</span>
                    <button class="btn btn-sm btn-futuristic">Purchase</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection