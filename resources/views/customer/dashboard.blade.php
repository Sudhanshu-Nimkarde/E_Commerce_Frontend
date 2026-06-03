@extends('layouts.customer.app')

@section('title', 'Customer Dashboard - ShopEase')

@section('customer_content')
@php
    $heroStats = [
        ['label' => 'Active orders', 'value' => '4', 'meta' => '2 out for delivery'],
        ['label' => 'Wishlist items', 'value' => '18', 'meta' => '6 new this week'],
        ['label' => 'Reward points', 'value' => '1,420', 'meta' => 'Ready to redeem'],
        ['label' => 'Open tickets', 'value' => '2', 'meta' => 'Both under SLA'],
    ];

    $shortcuts = [
        ['title' => 'Track order', 'meta' => 'Follow the live delivery ladder', 'icon' => 'bi-truck', 'route' => route('customer.track.order')],
        ['title' => 'Browse products', 'meta' => 'Jump back into shopping mode', 'icon' => 'bi-shop', 'route' => route('customer.products')],
        ['title' => 'Wishlist', 'meta' => 'Revisit saved items and offers', 'icon' => 'bi-heart', 'route' => route('customer.wishlist')],
        ['title' => 'Support', 'meta' => 'Create or reply to a ticket', 'icon' => 'bi-life-preserver', 'route' => route('customer.support.tickets')],
    ];

    $trendingProducts = [
        ['name' => 'Noise Cancelling Headphones', 'price' => '₹4,999', 'rating' => '4.8', 'tag' => 'Bestseller'],
        ['name' => 'Smart Watch Series 5', 'price' => '₹7,299', 'rating' => '4.7', 'tag' => 'New arrival'],
        ['name' => 'Home Security Camera', 'price' => '₹3,499', 'rating' => '4.6', 'tag' => 'Popular'],
    ];

    $recentOrders = [
        ['id' => '#ORD-2048', 'name' => 'Groceries and daily essentials', 'status' => 'Out for delivery', 'eta' => 'Today, 6:30 PM'],
        ['id' => '#ORD-2042', 'name' => 'Weekend electronics bundle', 'status' => 'Packed', 'eta' => 'Tomorrow'],
        ['id' => '#ORD-2031', 'name' => 'Kitchen accessories set', 'status' => 'Delivered', 'eta' => 'Jan 12, 2026'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-hero">
        <div class="customer-hero__copy">
            <span class="section-kicker">Customer dashboard</span>
            <h1>Shop, track, and support everything from one polished workspace.</h1>
            <p>
                The customer portal keeps shopping friction low with clear modules for My Account, Orders, Returns,
                Reviews, and Support. It feels fast, premium, and ready for API integration later.
            </p>

            <div class="customer-hero__actions">
                <a href="{{ route('customer.products') }}" class="btn btn-primary">Start shopping</a>
                <a href="{{ route('customer.orders') }}" class="btn btn-light">View orders</a>
            </div>

            <div class="customer-hero__meta">
                <div class="customer-hero__meta-card">
                    <strong>Next delivery</strong>
                    <span>Today, 6:30 PM</span>
                </div>
                <div class="customer-hero__meta-card">
                    <strong>Role ID</strong>
                    <span>{{ $customerRoleId ?? 3 }}</span>
                </div>
                <div class="customer-hero__meta-card">
                    <strong>Session</strong>
                    <span>Secure and active</span>
                </div>
            </div>
        </div>

        <div class="customer-hero__visual">
            <div class="customer-hero__visual-card customer-hero__visual-card--primary">
                <span class="customer-hero__visual-label">Live order</span>
                <strong>Groceries and daily essentials</strong>
                <p>Driver is 12 minutes away. Keep tracking without leaving the dashboard.</p>
            </div>

            <div class="customer-hero__visual-card-row">
                <div class="customer-hero__visual-card">
                    <span class="customer-hero__visual-label">Wishlist</span>
                    <strong>18 items</strong>
                    <p>Saved across gadgets, home, and lifestyle.</p>
                </div>

                <div class="customer-hero__visual-card customer-hero__visual-card--dark">
                    <span class="customer-hero__visual-label">Rewards</span>
                    <strong>1,420 points</strong>
                    <p>Use points for your next checkout.</p>
                </div>
            </div>

            <img src="{{ asset('images/home/home-main.jpg') }}" alt="Customer shopping inspiration" class="customer-hero__image">
        </div>
    </section>

    <section class="customer-stat-grid">
        @foreach ($heroStats as $stat)
            <article class="customer-stat-card">
                <span class="customer-stat-card__label">{{ $stat['label'] }}</span>
                <strong>{{ $stat['value'] }}</strong>
                <span class="customer-stat-card__meta">{{ $stat['meta'] }}</span>
            </article>
        @endforeach
    </section>

    <section class="customer-section">
        <div class="customer-section__header">
            <div>
                <span class="section-kicker">Quick actions</span>
                <h2>Everything you use most is one tap away.</h2>
            </div>
            <a href="{{ route('customer.products') }}" class="btn btn-outline-primary btn-sm">Browse products</a>
        </div>

        <div class="customer-shortcut-grid">
            @foreach ($shortcuts as $shortcut)
                <a href="{{ $shortcut['route'] }}" class="customer-shortcut-card">
                    <span class="customer-shortcut-card__icon">
                        <i class="bi {{ $shortcut['icon'] }}"></i>
                    </span>
                    <strong>{{ $shortcut['title'] }}</strong>
                    <span>{{ $shortcut['meta'] }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Trending now</span>
                    <h3>Products with the most attention this week.</h3>
                </div>
                <a href="{{ route('customer.products') }}" class="btn btn-outline-primary btn-sm">All products</a>
            </div>

            <div class="customer-product-list customer-product-list--compact">
                @foreach ($trendingProducts as $product)
                    <article class="customer-product-mini">
                        <div class="customer-product-mini__media">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="customer-product-mini__body">
                            <strong>{{ $product['name'] }}</strong>
                            <div class="customer-product-mini__meta">
                                <span>{{ $product['price'] }}</span>
                                <span><i class="bi bi-star-fill"></i> {{ $product['rating'] }}</span>
                                <span>{{ $product['tag'] }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Recent orders</span>
                    <h3>Track the latest movement without opening multiple screens.</h3>
                </div>
                <a href="{{ route('customer.track.order') }}" class="btn btn-outline-primary btn-sm">Track order</a>
            </div>

            <div class="customer-order-list">
                @foreach ($recentOrders as $order)
                    <article class="customer-order-card">
                        <div>
                            <strong>{{ $order['id'] }}</strong>
                            <span>{{ $order['name'] }}</span>
                        </div>
                        <div class="customer-order-card__meta">
                            <span class="customer-status-pill">{{ $order['status'] }}</span>
                            <small>{{ $order['eta'] }}</small>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
