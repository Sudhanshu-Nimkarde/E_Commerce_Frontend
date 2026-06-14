@extends('layouts.vendor.app')

@section('title', 'Vendor Dashboard - ShopEase')

@section('vendor_content')
@php
    $orderStatusTone = [
        'Ready to ship' => 'is-warning',
        'Processing' => 'is-muted',
        'Packed' => 'is-success',
        'Shipped' => 'is-success',
        'Delivered' => 'is-success',
    ];
@endphp

<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Dashboard</span>
        <h1 class="vendor-page-title">Welcome back, {{ $vendorName }}</h1>
        <p class="vendor-page-desc">
            A clean snapshot of shop performance, order flow, inventory, and earnings. Everything here is static UI and ready for future API integration.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Export summary</button>
        <button type="button" class="btn btn-primary">Add product</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($dashboardStats as $stat)
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="vendor-stat-card">
                <div class="vendor-stat-card__icon"><i class="bi {{ $stat['icon'] }}"></i></div>
                <div class="vendor-stat-card__label">{{ $stat['label'] }}</div>
                <div class="vendor-stat-card__value">{{ $stat['value'] }}</div>
                <div class="vendor-stat-card__meta">{{ $stat['meta'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    @foreach ($dashboardCharts as $chart)
        <div class="col-12 col-xl-4">
            <div class="vendor-chart-card">
                <div class="vendor-chart">
                    <div class="vendor-chart__meta">
                        <div>
                            <h3 class="vendor-panel__title">{{ $chart['title'] }}</h3>
                            <p class="vendor-panel__sub">{{ $chart['subtitle'] }}</p>
                        </div>
                        <span class="vendor-pill vendor-pill--accent">Static preview</span>
                    </div>

                    <div class="vendor-chart__bars">
                        @foreach ($chart['bars'] as $bar)
                            <span class="vendor-chart__bar" style="height: {{ $bar }}%;"></span>
                        @endforeach
                    </div>

                    <p class="mb-0 text-muted">{{ $chart['legend'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-3">
    <div class="col-12 col-xl-8">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header d-flex flex-wrap justify-content-between align-items-start gap-2">
                <div>
                    <h2 class="vendor-table-card__title">Recent orders</h2>
                    <p class="vendor-table-card__sub">Static order snapshot with clean badges and responsive table layout.</p>
                </div>
                <a href="{{ route('vendor.order-handling') }}" class="btn btn-outline-secondary btn-sm">Open order handling</a>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentOrders as $order)
                            <tr data-vendor-filter-row data-filter-text="{{ implode(' ', $order) }}">
                                <td class="fw-semibold">{{ $order['id'] }}</td>
                                <td>{{ $order['customer'] }}</td>
                                <td>{{ $order['items'] }}</td>
                                <td class="fw-semibold">{{ $order['amount'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $orderStatusTone[$order['status']] ?? 'is-muted' }}">
                                        {{ $order['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="vendor-stack h-100">
            <div class="vendor-table-card">
                <div class="vendor-table-card__header">
                    <h2 class="vendor-table-card__title">Vendor risk alerts</h2>
                    <p class="vendor-table-card__sub">Issues that need quick review.</p>
                </div>

                <div class="vendor-panel__body">
                    <div class="vendor-mini-list">
                        @foreach ($riskAlerts as $alert)
                            <div class="vendor-mini-list__item">
                                <div>
                                    <strong>{{ $alert['title'] }}</strong>
                                    <span>{{ $alert['meta'] }}</span>
                                </div>
                                <span class="vendor-pill vendor-pill--warning">Review</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="vendor-table-card flex-grow-1">
                <div class="vendor-table-card__header">
                    <h2 class="vendor-table-card__title">Recent admin activity</h2>
                    <p class="vendor-table-card__sub">Timeline-style UI for future audit integration.</p>
                </div>

                <div class="vendor-panel__body">
                    <div class="vendor-timeline">
                        @foreach ($activityTimeline as $activity)
                            <div class="vendor-timeline__item">
                                <div class="vendor-timeline__time">{{ $activity['time'] }}</div>
                                <div class="vendor-timeline__card">
                                    <strong>{{ $activity['title'] }}</strong>
                                    <span>{{ $activity['meta'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-0">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Priority actions</h2>
                <p class="vendor-table-card__sub">A lightweight checklist to keep operations moving.</p>
            </div>
            <div class="vendor-panel__body">
                <div class="vendor-checklist">
                    <div class="vendor-checklist__item"><strong>Restock low inventory items</strong><span>7 SKUs need attention</span></div>
                    <div class="vendor-checklist__item"><strong>Confirm delayed shipment</strong><span>2 orders are waiting on carrier update</span></div>
                    <div class="vendor-checklist__item"><strong>Review refund reserve</strong><span>1 partial refund requires approval</span></div>
                    <div class="vendor-checklist__item"><strong>Update weekend promotion</strong><span>Campaign copy and coupon are live</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Current shop health</h2>
                <p class="vendor-table-card__sub">Simple, readable indicators for the vendor workspace.</p>
            </div>
            <div class="vendor-panel__body">
                <div class="d-grid gap-3">
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Product coverage</span>
                            <strong>91%</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" style="width: 91%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Fulfillment readiness</span>
                            <strong>83%</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-primary" style="width: 83%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Customer response rate</span>
                            <strong>96%</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: 96%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
