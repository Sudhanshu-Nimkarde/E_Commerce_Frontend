@extends('layouts.customer.app')

@section('title', 'Order Detail - ShopEase')

@section('customer_content')
@php
    $timeline = [
        ['label' => 'Order placed', 'date' => 'May 30, 2026', 'status' => 'done'],
        ['label' => 'Confirmed', 'date' => 'May 30, 2026', 'status' => 'done'],
        ['label' => 'Packed', 'date' => 'May 31, 2026', 'status' => 'done'],
        ['label' => 'Shipped', 'date' => 'Jun 1, 2026', 'status' => 'current'],
        ['label' => 'Out for delivery', 'date' => 'Today', 'status' => 'upcoming'],
        ['label' => 'Delivered', 'date' => 'Pending', 'status' => 'upcoming'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Order detail</span>
            <h1>One order, one clean timeline, and all the essentials in a single view.</h1>
            <p>Great for support handoff, customer reassurance, and future backend integration.</p>
        </div>
        <div class="customer-toolbar">
            <a href="{{ route('customer.orders') }}" class="btn btn-light">Back to orders</a>
            <a href="{{ route('customer.track.order') }}" class="btn btn-primary">Track order</a>
        </div>
    </section>

    <div class="customer-grid customer-grid--detail">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Status timeline</span>
                    <h3>#ORD-2048</h3>
                </div>
                <span class="customer-status-pill customer-status-pill--success">Shipped</span>
            </div>

            <div class="customer-timeline">
                @foreach ($timeline as $step)
                    <article class="customer-timeline__item customer-timeline__item--{{ $step['status'] }}">
                        <span class="customer-timeline__marker"></span>
                        <div>
                            <strong>{{ $step['label'] }}</strong>
                            <small>{{ $step['date'] }}</small>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Items</span>
                    <h3>Order contents</h3>
                </div>
            </div>

            <div class="customer-order-items">
                <article class="customer-order-item">
                    <strong>Noise Cancelling Headphones</strong>
                    <span>Qty 1 • ₹4,999</span>
                </article>
                <article class="customer-order-item">
                    <strong>Wireless Keyboard Pro</strong>
                    <span>Qty 2 • ₹7,798</span>
                </article>
            </div>

            <div class="customer-summary-list customer-summary-list--compact">
                <div><span>Subtotal</span><strong>₹12,797</strong></div>
                <div><span>Shipping</span><strong>₹49</strong></div>
                <div><span>Total</span><strong>₹12,846</strong></div>
            </div>
        </section>
    </div>
</div>
@endsection
