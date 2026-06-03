@extends('layouts.customer.app')

@section('title', 'Cart - ShopEase')

@section('customer_content')
@php
    $cartItems = [
        ['name' => 'Noise Cancelling Headphones', 'price' => '₹4,999', 'qty' => 1, 'subtotal' => '₹4,999'],
        ['name' => 'Wireless Keyboard Pro', 'price' => '₹3,899', 'qty' => 2, 'subtotal' => '₹7,798'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Cart</span>
            <h1>Everything you need to checkout with confidence.</h1>
            <p>Keep shipping, coupon, and payment summaries visible in one clean layout.</p>
        </div>
        <a href="{{ route('customer.products') }}" class="btn btn-outline-primary">Keep shopping</a>
    </section>

    <div class="customer-grid customer-grid--cart">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Items</span>
                    <h3>Your selected products</h3>
                </div>
            </div>

            <div class="customer-cart-list">
                @foreach ($cartItems as $item)
                    <article class="customer-cart-card">
                        <div class="customer-cart-card__media">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="customer-cart-card__body">
                            <strong>{{ $item['name'] }}</strong>
                            <span>{{ $item['price'] }}</span>
                            <div class="customer-cart-card__meta">
                                <button type="button">-</button>
                                <strong>{{ $item['qty'] }}</strong>
                                <button type="button">+</button>
                            </div>
                        </div>
                        <div class="customer-cart-card__footer">
                            <strong>{{ $item['subtotal'] }}</strong>
                            <button type="button" class="customer-link-button">Remove</button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <aside class="customer-panel customer-summary-panel">
            <span class="section-kicker">Summary</span>
            <h3>Order preview</h3>
            <div class="customer-summary-list">
                <div><span>Items total</span><strong>₹12,797</strong></div>
                <div><span>Delivery fee</span><strong>₹49</strong></div>
                <div><span>Discount</span><strong>-₹300</strong></div>
                <div><span>Grand total</span><strong>₹12,546</strong></div>
            </div>

            <label class="customer-coupon">
                <span>Coupon code</span>
                <div class="customer-coupon__row">
                    <input type="text" class="form-control" placeholder="SAVE20">
                    <button type="button" class="btn btn-outline-primary">Apply</button>
                </div>
            </label>

            <div class="customer-mini-note">
                <strong>Delivery address</strong>
                <span>Home - Pune, with same day fulfillment where available.</span>
            </div>

            <button type="button" class="btn btn-primary w-100">Proceed to checkout</button>
        </aside>
    </div>
</div>
@endsection
