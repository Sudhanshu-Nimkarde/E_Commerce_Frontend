@extends('layouts.customer.app')

@section('title', 'Product Detail - ShopEase')

@section('customer_content')
@php
    $specs = [
        ['label' => 'Brand', 'value' => 'ShopEase Select'],
        ['label' => 'Warranty', 'value' => '1 Year'],
        ['label' => 'Connectivity', 'value' => 'Bluetooth 5.3'],
        ['label' => 'Battery life', 'value' => 'Up to 20 hours'],
        ['label' => 'Delivery', 'value' => 'Same day in select pin codes'],
    ];

    $reviews = [
        ['name' => 'Riya', 'rating' => '5.0', 'text' => 'The build quality feels premium and the delivery was quick.', 'badge' => 'Verified purchase'],
        ['name' => 'Aman', 'rating' => '4.7', 'text' => 'Great sound profile. The product detail layout makes comparison easy.', 'badge' => 'Verified purchase'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Product detail</span>
            <h1>A premium product detail page with gallery, specs, and reviews.</h1>
            <p>Designed for confident shopping decisions with clear price, seller, stock, and comparison info.</p>
        </div>
        <div class="customer-toolbar">
            <a href="{{ route('customer.products') }}" class="btn btn-light">Back to products</a>
            <a href="{{ route('customer.compare') }}" class="btn btn-outline-primary">Compare</a>
        </div>
    </section>

    <div class="customer-grid customer-grid--detail">
        <section class="customer-panel">
            <div class="customer-product-gallery" data-product-gallery>
                <div class="customer-product-gallery__main">
                    <img
                        src="{{ asset('images/home/home-main.jpg') }}"
                        alt="Product preview"
                        data-gallery-main
                    >
                </div>

                <div class="customer-product-gallery__thumbs">
                    <button type="button" class="customer-gallery-thumb is-active" data-gallery-thumb data-gallery-image="{{ asset('images/home/home-main.jpg') }}">
                        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Thumbnail 1">
                    </button>
                    <button type="button" class="customer-gallery-thumb" data-gallery-thumb data-gallery-image="{{ asset('images/home/home-main.jpg') }}">
                        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Thumbnail 2">
                    </button>
                    <button type="button" class="customer-gallery-thumb" data-gallery-thumb data-gallery-image="{{ asset('images/home/home-main.jpg') }}">
                        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Thumbnail 3">
                    </button>
                </div>
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">ShopEase Select</span>
                    <h3>Noise Cancelling Headphones</h3>
                </div>
                <span class="customer-status-pill customer-status-pill--success">In stock</span>
            </div>

            <div class="customer-rating customer-rating--large">
                <i class="bi bi-star-fill"></i>
                <span>4.8</span>
                <small>1,248 ratings</small>
            </div>

            <div class="customer-price-block">
                <strong>₹4,999</strong>
                <span>₹6,499</span>
                <small>23% off with free delivery</small>
            </div>

            <div class="customer-seller-card">
                <strong>Seller</strong>
                <p>Sold and fulfilled by ShopEase Select. Trusted customer care and fast dispatch.</p>
            </div>

            <div class="customer-detail-actions">
                <a href="{{ route('customer.cart') }}" class="btn btn-primary">Add to cart</a>
                <button type="button" class="btn btn-light">Wishlist</button>
                <button type="button" class="btn btn-outline-primary">Compare</button>
            </div>

            <div class="customer-stock-line">
                <span>Stock status</span>
                <strong>Only 17 left in warehouse</strong>
            </div>
        </section>
    </div>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Specifications</span>
                    <h3>Technical details</h3>
                </div>
            </div>

            <div class="customer-spec-list">
                @foreach ($specs as $spec)
                    <div class="customer-spec-row">
                        <strong>{{ $spec['label'] }}</strong>
                        <span>{{ $spec['value'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Reviews</span>
                    <h3>Customer feedback</h3>
                </div>
                <a href="{{ route('customer.reviews') }}" class="btn btn-outline-primary btn-sm">Write review</a>
            </div>

            <div class="customer-review-list">
                @foreach ($reviews as $review)
                    <article class="customer-review-card">
                        <div class="customer-review-card__head">
                            <strong>{{ $review['name'] }}</strong>
                            <span class="customer-status-pill">{{ $review['badge'] }}</span>
                        </div>
                        <div class="customer-rating customer-rating--inline">
                            <i class="bi bi-star-fill"></i>
                            <span>{{ $review['rating'] }}</span>
                        </div>
                        <p>{{ $review['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
