@extends('layouts.customer.app')

@section('title', 'Wishlist - ShopEase')

@section('customer_content')
@php
    $wishlist = [
        ['name' => 'Wireless Keyboard Pro', 'price' => '₹3,899', 'rating' => '4.5', 'tag' => 'Saved yesterday'],
        ['name' => 'Minimal Desk Lamp', 'price' => '₹1,299', 'rating' => '4.4', 'tag' => 'On sale'],
        ['name' => 'Compact Bluetooth Speaker', 'price' => '₹2,299', 'rating' => '4.6', 'tag' => 'Lowest ever price'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Wishlist</span>
            <h1>Keep your saved picks visible and easy to buy later.</h1>
            <p>Review price drops, compare choices, and move items into the cart whenever you're ready.</p>
        </div>
        <a href="{{ route('customer.products') }}" class="btn btn-primary">Continue shopping</a>
    </section>

    <div class="customer-grid customer-grid--wishlist">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Saved items</span>
                    <h3>Ready to buy</h3>
                </div>
                <span class="customer-status-pill">{{ count($wishlist) }} items</span>
            </div>

            <div class="customer-wishlist-list">
                @foreach ($wishlist as $item)
                    <article class="customer-wishlist-card">
                        <div class="customer-wishlist-card__media">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <div class="customer-wishlist-card__body">
                            <strong>{{ $item['name'] }}</strong>
                            <div class="customer-rating customer-rating--inline">
                                <i class="bi bi-star-fill"></i>
                                <span>{{ $item['rating'] }}</span>
                            </div>
                            <div class="customer-price-row">
                                <div>
                                    <strong>{{ $item['price'] }}</strong>
                                    <span>{{ $item['tag'] }}</span>
                                </div>
                                <div class="customer-row-actions">
                                    <a href="{{ route('customer.cart') }}" class="btn btn-primary btn-sm">Add to cart</a>
                                    <button type="button" class="btn btn-light btn-sm">Remove</button>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <aside class="customer-panel customer-panel--soft">
            <span class="section-kicker">Wishlist tips</span>
            <h3>Turn saved products into quick actions.</h3>
            <p>
                Keep an eye on price changes, stock alerts, and product comparisons. This panel can later connect to
                live recommendations.
            </p>
            <div class="customer-mini-note">
                <strong>Smart move</strong>
                <span>Use compare before adding multiple products to cart.</span>
            </div>
        </aside>
    </div>
</div>
@endsection
