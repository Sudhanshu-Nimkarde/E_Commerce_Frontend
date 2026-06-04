@extends('layouts.customer.app')

@section('title', 'Orders - ShopEase')

@section('customer_content')
@php
    $orders = [
        ['id' => '#ORD-2048', 'name' => 'Groceries and daily essentials', 'status' => 'Out for delivery', 'date' => 'Jun 1, 2026', 'amount' => '₹1,899'],
        ['id' => '#ORD-2042', 'name' => 'Weekend electronics bundle', 'status' => 'Packed', 'date' => 'May 29, 2026', 'amount' => '₹7,299'],
        ['id' => '#ORD-2031', 'name' => 'Kitchen accessories set', 'status' => 'Delivered', 'date' => 'May 23, 2026', 'amount' => '₹2,599'],
        ['id' => '#ORD-2027', 'name' => 'Office chair cushion', 'status' => 'Returned', 'date' => 'May 18, 2026', 'amount' => '₹999'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Orders</span>
            <h1>Search order history, track statuses, and keep every purchase visible.</h1>
            <p>Designed to feel fast and dense, like a serious commerce workspace, without being cluttered.</p>
        </div>
        <a href="{{ route('customer.track.order') }}" class="btn btn-primary">Track latest order</a>
    </section>

    <section class="customer-panel">
        <div class="customer-toolbar customer-toolbar--full">
            <label class="customer-search customer-search--compact">
                <i class="bi bi-search"></i>
                <input type="search" placeholder="Search order ID or product name">
            </label>
            <div class="customer-chip-row customer-chip-row--tight">
                <button type="button" class="customer-chip is-active">All</button>
                <button type="button" class="customer-chip">Delivered</button>
                <button type="button" class="customer-chip">Open</button>
                <button type="button" class="customer-chip">Returned</button>
            </div>
        </div>

        <div class="customer-order-table-wrap">
            <table class="customer-order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product / Bundle</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['name'] }}</td>
                            <td>{{ $order['date'] }}</td>
                            <td><span class="customer-status-pill">{{ $order['status'] }}</span></td>
                            <td>{{ $order['amount'] }}</td>
                            <td>
                                <a href="{{ route('customer.order.detail') }}" class="customer-link-button">Open</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
