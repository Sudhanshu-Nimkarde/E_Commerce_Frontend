@extends('layouts.admin.app')

@section('title', 'Orders - ShopEase')

@section('main_content')
@php
    $orders = [
        ['id' => 'ORD-2041', 'customer' => 'Maya Chen', 'vendor' => 'North Star Tech', 'amount' => '$248.00', 'status' => 'Paid', 'updated' => '3 min ago'],
        ['id' => 'ORD-2042', 'customer' => 'John Patel', 'vendor' => 'Fresh Basket', 'amount' => '$89.40', 'status' => 'Shipped', 'updated' => '18 min ago'],
        ['id' => 'ORD-2043', 'customer' => 'Sarah Khan', 'vendor' => 'Urban Closet', 'amount' => '$176.90', 'status' => 'Processing', 'updated' => '34 min ago'],
        ['id' => 'ORD-2044', 'customer' => 'Daniel Reed', 'vendor' => 'HomeCraft', 'amount' => '$59.50', 'status' => 'Refund Review', 'updated' => '1 hr ago'],
        ['id' => 'ORD-2045', 'customer' => 'Elena Gomez', 'vendor' => 'Glow Beauty', 'amount' => '$124.20', 'status' => 'Delivered', 'updated' => '2 hrs ago'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Order management</span>
        <h1 class="admin-page-title">Orders</h1>
        <p class="admin-page-desc">Filters, export actions, and a responsive table with order status badges.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary">Export CSV</button>
        <button class="btn btn-outline-primary">Export PDF</button>
        <a href="{{ route('admin.orders.detail') }}" class="btn btn-primary">Open order detail</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Open</div><div class="admin-stat__value">274</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Shipped</div><div class="admin-stat__value">842</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Refund queue</div><div class="admin-stat__value">42</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Overrides</div><div class="admin-stat__value">8</div></div></div>
</div>

<div class="admin-panel admin-panel__body">
    <div class="row g-3 mb-3">
        <div class="col-lg-4">
            <label class="form-label fw-bold">Search order</label>
            <input type="search" class="form-control" placeholder="Order, customer, vendor..." data-admin-filter-input="#ordersTable">
        </div>
        <div class="col-lg-2 col-md-4">
            <label class="form-label fw-bold">Status</label>
            <select class="form-select">
                <option>All</option>
                <option>Paid</option>
                <option>Processing</option>
                <option>Shipped</option>
                <option>Delivered</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-4">
            <label class="form-label fw-bold">Channel</label>
            <select class="form-select">
                <option>All channels</option>
                <option>Web</option>
                <option>Mobile</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 d-flex gap-2 align-items-end">
            <button class="btn btn-outline-primary flex-fill" type="button">Today</button>
            <button class="btn btn-outline-primary flex-fill" type="button">This week</button>
        </div>
    </div>

    <div class="admin-table-wrap table-responsive">
        <table class="table admin-table align-middle" id="ordersTable">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Vendor</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr data-admin-filter-row data-filter-text="{{ strtolower($order['id'] . ' ' . $order['customer'] . ' ' . $order['vendor'] . ' ' . $order['status']) }}">
                        <td class="fw-semibold">{{ $order['id'] }}</td>
                        <td>{{ $order['customer'] }}</td>
                        <td>{{ $order['vendor'] }}</td>
                        <td>{{ $order['amount'] }}</td>
                        <td>
                            @php
                                $badge = match ($order['status']) {
                                    'Paid' => 'bg-success-subtle text-success',
                                    'Shipped' => 'bg-primary-subtle text-primary',
                                    'Processing' => 'bg-warning-subtle text-warning',
                                    'Refund Review' => 'bg-danger-subtle text-danger',
                                    default => 'bg-secondary-subtle text-secondary',
                                };
                            @endphp
                            <span class="badge rounded-pill {{ $badge }}">{{ $order['status'] }}</span>
                        </td>
                        <td>{{ $order['updated'] }}</td>
                        <td class="text-end"><a href="{{ route('admin.orders.detail') }}" class="btn btn-outline-primary btn-sm">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
