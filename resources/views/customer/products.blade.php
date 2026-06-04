@extends('layouts.customer.app')

@section('title', 'Products - ShopEase')

@section('customer_content')
@php
    $chips = ['Electronics', 'Under ₹5,000', '4+ Rating', 'Fast delivery'];
    $products = [
        ['name' => 'Noise Cancelling Headphones', 'price' => '₹4,999', 'old_price' => '₹6,499', 'rating' => '4.8', 'tag' => 'Bestseller', 'image' => asset('images/home/home-main.jpg')],
        ['name' => 'Smart Watch Series 5', 'price' => '₹7,299', 'old_price' => '₹8,999', 'rating' => '4.7', 'tag' => 'New arrival', 'image' => asset('images/home/home-main.jpg')],
        ['name' => 'Compact Bluetooth Speaker', 'price' => '₹2,299', 'old_price' => '₹2,899', 'rating' => '4.6', 'tag' => 'Trending', 'image' => asset('images/home/home-main.jpg')],
        ['name' => 'Wireless Keyboard Pro', 'price' => '₹3,899', 'old_price' => '₹4,599', 'rating' => '4.5', 'tag' => 'Value pick', 'image' => asset('images/home/home-main.jpg')],
        ['name' => 'Home Security Camera', 'price' => '₹3,499', 'old_price' => '₹4,299', 'rating' => '4.7', 'tag' => 'Popular', 'image' => asset('images/home/home-main.jpg')],
        ['name' => 'Minimal Desk Lamp', 'price' => '₹1,299', 'old_price' => '₹1,699', 'rating' => '4.4', 'tag' => 'Editor\'s pick', 'image' => asset('images/home/home-main.jpg')],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Products</span>
            <h1>Browse a premium catalog with fast filtering and clean product cards.</h1>
            <p>Filter by category, price, brand, and rating without breaking the shopping flow.</p>
        </div>
        <div class="customer-toolbar">
            <label class="customer-sort">
                <span>Sort by</span>
                <select class="form-control">
                    <option>Recommended</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Customer Rating</option>
                </select>
            </label>
            <a href="{{ route('customer.compare') }}" class="btn btn-outline-primary">Compare</a>
        </div>
    </section>

    <div class="customer-chip-row">
        @foreach ($chips as $chip)
            <button type="button" class="customer-chip is-active" data-filter-chip>{{ $chip }}</button>
        @endforeach
    </div>

    <div class="customer-grid customer-grid--products">
        <aside class="customer-filter-panel">
            <div class="customer-filter-panel__header">
                <span class="section-kicker">Filters</span>
                <a href="#" class="customer-filter-reset">Reset all</a>
            </div>

            <div class="customer-filter-stack">
                <div class="customer-filter-group">
                    <strong>Category</strong>
                    <label><input type="checkbox" checked> Electronics</label>
                    <label><input type="checkbox"> Home &amp; Kitchen</label>
                    <label><input type="checkbox"> Beauty</label>
                    <label><input type="checkbox"> Accessories</label>
                </div>

                <div class="customer-filter-group">
                    <strong>Price range</strong>
                    <input type="range" min="0" max="10000" value="4500" class="form-range">
                    <div class="customer-filter-range">
                        <span>₹0</span>
                        <span>₹10,000</span>
                    </div>
                </div>

                <div class="customer-filter-group">
                    <strong>Brand</strong>
                    <label><input type="checkbox" checked> ShopEase Select</label>
                    <label><input type="checkbox"> NovaTech</label>
                    <label><input type="checkbox"> UrbanWare</label>
                </div>

                <div class="customer-filter-group">
                    <strong>Rating</strong>
                    <label><input type="radio" name="rating" checked> 4 stars &amp; up</label>
                    <label><input type="radio" name="rating"> 3 stars &amp; up</label>
                    <label><input type="radio" name="rating"> Any rating</label>
                </div>
            </div>
        </aside>

        <section class="customer-product-grid">
            @foreach ($products as $product)
                <article class="customer-product-card">
                    <div class="customer-product-card__media">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                        <span class="customer-product-card__badge">{{ $product['tag'] }}</span>
                        <div class="customer-product-card__actions">
                            <button type="button" class="customer-mini-icon" aria-label="Add to wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <button type="button" class="customer-mini-icon" aria-label="Compare product">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="customer-product-card__body">
                        <h3>{{ $product['name'] }}</h3>
                        <div class="customer-rating">
                            <i class="bi bi-star-fill"></i>
                            <span>{{ $product['rating'] }} / 5</span>
                            <small>Verified purchase</small>
                        </div>
                        <div class="customer-price-row">
                            <div>
                                <strong>{{ $product['price'] }}</strong>
                                <span>{{ $product['old_price'] }}</span>
                            </div>
                            <a href="{{ route('customer.product.detail') }}" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </div>
</div>
@endsection
