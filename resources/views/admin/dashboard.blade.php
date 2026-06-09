@extends('layouts.admin.app')

@section('title', 'Admin Dashboard - ShopEase')

@section('main_content')
@php
    $kpis = [
        ['label' => 'Users', 'value' => '18,420', 'meta' => '12% growth this month'],
        ['label' => 'Vendors', 'value' => '364', 'meta' => '28 pending KYC reviews'],
        ['label' => 'Orders', 'value' => '9,148', 'meta' => 'High order volume today'],
        ['label' => 'Revenue', 'value' => '$128.4K', 'meta' => 'Stable weekly growth'],
        ['label' => 'Refunds', 'value' => '42', 'meta' => 'Needs review'],
        ['label' => 'Pending KYC', 'value' => '28', 'meta' => 'Vendor compliance queue'],
        ['label' => 'Blocked Users', 'value' => '19', 'meta' => 'High-risk accounts'],
    ];

    $orders = [
        ['id' => 'ORD-2041', 'customer' => 'Maya Chen', 'vendor' => 'North Star Tech', 'amount' => '$248.00', 'status' => 'Paid'],
        ['id' => 'ORD-2042', 'customer' => 'John Patel', 'vendor' => 'Fresh Basket', 'amount' => '$89.40', 'status' => 'Shipped'],
        ['id' => 'ORD-2043', 'customer' => 'Sarah Khan', 'vendor' => 'Urban Closet', 'amount' => '$176.90', 'status' => 'Processing'],
        ['id' => 'ORD-2044', 'customer' => 'Daniel Reed', 'vendor' => 'HomeCraft', 'amount' => '$59.50', 'status' => 'Refund Review'],
        ['id' => 'ORD-2045', 'customer' => 'Elena Gomez', 'vendor' => 'Glow Beauty', 'amount' => '$124.20', 'status' => 'Delivered'],
    ];

    $alerts = [
        ['title' => 'North Star Tech', 'meta' => 'Refund rate above threshold', 'status' => 'High risk'],
        ['title' => 'Fresh Basket', 'meta' => 'KYC renewal due soon', 'status' => 'Needs attention'],
        ['title' => 'Urban Closet', 'meta' => 'Shipping SLA dipped this week', 'status' => 'Watch'],
    ];

    $activity = [
        ['time' => '09:42', 'title' => 'Commission updated', 'meta' => 'North Star Tech fee changed to 12%.'],
        ['time' => '09:18', 'title' => 'Vendor approved', 'meta' => 'Fresh Basket passed manual KYC review.'],
        ['time' => '08:51', 'title' => 'User blocked', 'meta' => 'Temporary block set for 24 hours.'],
        ['time' => '08:24', 'title' => 'Report exported', 'meta' => 'Revenue summary exported for review.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Admin overview</span>
        <h1 class="admin-page-title">Dashboard</h1>
        <p class="admin-page-desc">A stable operations view for users, vendors, orders, refunds, and security.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.reports') }}" class="btn btn-outline-primary">View reports</a>
        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Open orders</a>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($kpis as $kpi)
        <div class="col-6 col-xl-3">
            <div class="admin-panel admin-stat h-100">
                <div class="admin-stat__label">{{ $kpi['label'] }}</div>
                <div class="admin-stat__value">{{ $kpi['value'] }}</div>
                <div class="admin-stat__meta">{{ $kpi['meta'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-7">
        <div class="admin-panel admin-chart">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <div class="admin-stat__label">Revenue trend</div>
                    <h2 class="h5 fw-bold mb-0">Weekly revenue placeholder</h2>
                </div>
                <span class="admin-badge-soft">Static chart placeholder</span>
            </div>
            <div class="admin-chart__bars">
                <span style="height: 28%"></span>
                <span class="is-secondary" style="height: 44%"></span>
                <span class="is-dark" style="height: 36%"></span>
                <span class="is-primary" style="height: 56%"></span>
                <span style="height: 48%"></span>
                <span class="is-secondary" style="height: 68%"></span>
                <span class="is-dark" style="height: 60%"></span>
                <span class="is-primary" style="height: 76%"></span>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Vendor risk</div>
                    <h2 class="h5 fw-bold mb-0">Vendor alerts</h2>
                </div>
                <a href="{{ route('admin.vendors') }}" class="btn btn-outline-primary btn-sm">View vendors</a>
            </div>

            <div class="admin-list">
                @foreach ($alerts as $alert)
                    <div class="admin-list__item">
                        <div>
                            <strong>{{ $alert['title'] }}</strong>
                            <div class="text-muted small">{{ $alert['meta'] }}</div>
                        </div>
                        <span class="admin-badge-soft">{{ $alert['status'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Orders</div>
                    <h2 class="h5 fw-bold mb-0">Recent orders</h2>
                </div>
                <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary btn-sm">Open full table</a>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Vendor</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Governance</div>
                    <h2 class="h5 fw-bold mb-0">Activity timeline</h2>
                </div>
                <a href="{{ route('admin.audit-logs') }}" class="btn btn-outline-primary btn-sm">Open logs</a>
            </div>

            <div class="admin-timeline">
                @foreach ($activity as $item)
                    <div class="admin-timeline__item">
                        <div class="d-flex justify-content-between gap-2">
                            <strong>{{ $item['title'] }}</strong>
                            <small class="text-muted">{{ $item['time'] }}</small>
                        </div>
                        <div class="text-muted small">{{ $item['meta'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
