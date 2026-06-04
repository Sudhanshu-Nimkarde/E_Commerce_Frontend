@extends('layouts.customer.app')

@section('title', 'Track Order - ShopEase')

@section('customer_content')
@php
    $steps = [
        ['label' => 'Order Placed', 'status' => 'done'],
        ['label' => 'Confirmed', 'status' => 'done'],
        ['label' => 'Packed', 'status' => 'done'],
        ['label' => 'Shipped', 'status' => 'done'],
        ['label' => 'Out for Delivery', 'status' => 'current'],
        ['label' => 'Delivered', 'status' => 'upcoming'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Track order</span>
            <h1>Step-by-step progress with a delivery flow customers can trust.</h1>
            <p>The timeline mirrors the classic shopping flow: placed, confirmed, packed, shipped, out for delivery, delivered.</p>
        </div>
        <a href="{{ route('customer.orders') }}" class="btn btn-outline-primary">All orders</a>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Tracking ID</span>
                    <h3>#ORD-2048</h3>
                </div>
                <span class="customer-status-pill customer-status-pill--success">Live</span>
            </div>

            <div class="customer-progress-track">
                @foreach ($steps as $step)
                    <div class="customer-progress-step customer-progress-step--{{ $step['status'] }}">
                        <span class="customer-progress-step__dot"></span>
                        <strong>{{ $step['label'] }}</strong>
                    </div>
                @endforeach
            </div>
        </section>

        <aside class="customer-panel customer-panel--soft">
            <span class="section-kicker">Delivery details</span>
            <h3>Out for delivery today</h3>
            <p>Driver name: Rahul. ETA: 6:30 PM. Call status updates can be connected later through APIs.</p>
            <div class="customer-mini-note">
                <strong>Destination</strong>
                <span>Home - Pune, Baner Road</span>
            </div>
        </aside>
    </div>
</div>
@endsection
