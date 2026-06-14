@extends('layouts.vendor.app')

@section('title', 'Order Handling - ShopEase Vendor')

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
        <span class="vendor-kicker">Order Handling</span>
        <h1 class="vendor-page-title">Manage fulfilment, status updates, and exceptions</h1>
        <p class="vendor-page-desc">
            This order screen keeps the UI focused on filters, table clarity, and responsive layouts for laptop and mobile screens.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Export CSV</button>
        <button type="button" class="btn btn-outline-secondary">Export PDF</button>
        <button type="button" class="btn btn-primary">Manual override</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($orderStats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vendor-stat-card h-100">
                <div class="vendor-stat-card__label">{{ $stat['label'] }}</div>
                <div class="vendor-stat-card__value">{{ $stat['value'] }}</div>
                <div class="vendor-stat-card__meta">{{ $stat['meta'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-xl-8">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header d-flex flex-wrap justify-content-between align-items-start gap-2">
                <div>
                    <h2 class="vendor-table-card__title">Orders queue</h2>
                    <p class="vendor-table-card__sub">Static responsive table with filters and status badges.</p>
                </div>
                <label class="vendor-search w-100" style="max-width: 340px;">
                    <i class="bi bi-search"></i>
                    <input
                        type="search"
                        placeholder="Search order, customer..."
                        aria-label="Search orders"
                        data-vendor-filter-input="#orderRows"
                    >
                    <button type="button">Filter</button>
                </label>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="orderRows">
                        @foreach ($orderRows as $order)
                            <tr data-vendor-filter-row data-filter-text="{{ implode(' ', $order) }}">
                                <td class="fw-semibold">{{ $order['id'] }}</td>
                                <td>{{ $order['customer'] }}</td>
                                <td>{{ $order['items'] }}</td>
                                <td class="fw-semibold">{{ $order['amount'] }}</td>
                                <td>{{ $order['payment'] }}</td>
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
            <div class="vendor-form-card">
                <div class="vendor-form-card__header">
                    <h3>Fulfilment steps</h3>
                    <p>Readable step-by-step order flow.</p>
                </div>

                <div class="vendor-timeline">
                    @foreach ($timelineSteps as $step)
                        <div class="vendor-timeline__item">
                            <div class="vendor-timeline__time">{{ $loop->iteration }}</div>
                            <div class="vendor-timeline__card">
                                <strong>{{ $step['title'] }}</strong>
                                <span>{{ $step['meta'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="vendor-form-card flex-grow-1">
                <div class="vendor-form-card__header">
                    <h3>Exception handling</h3>
                    <p>UI for shipping delays, cancel requests, and manual updates.</p>
                </div>

                <div class="vendor-mini-list">
                    <div class="vendor-mini-list__item">
                        <div>
                            <strong>Delayed shipment</strong>
                            <span>Waiting on carrier pickup confirmation</span>
                        </div>
                        <span class="vendor-pill vendor-pill--warning">Review</span>
                    </div>
                    <div class="vendor-mini-list__item">
                        <div>
                            <strong>Force cancel</strong>
                            <span>Requires note before final action</span>
                        </div>
                        <span class="vendor-pill vendor-pill--danger">Sensitive</span>
                    </div>
                    <div class="vendor-mini-list__item">
                        <div>
                            <strong>Status override</strong>
                            <span>Reserved for operations verification</span>
                        </div>
                        <span class="vendor-pill vendor-pill--accent">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Order details snapshot</h2>
                <p class="vendor-table-card__sub">A static detail panel for future order pages.</p>
            </div>

            <div class="vendor-panel__body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="vendor-soft-card h-100">
                            <strong class="d-block mb-2">Shipping summary</strong>
                            <div class="text-muted small">Address</div>
                            <div class="fw-semibold mb-2">12 Park Avenue, Mumbai, India</div>
                            <div class="text-muted small">Carrier</div>
                            <div class="fw-semibold">BlueDart Express</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vendor-soft-card h-100">
                            <strong class="d-block mb-2">Payment summary</strong>
                            <div class="text-muted small">Method</div>
                            <div class="fw-semibold mb-2">Paid online</div>
                            <div class="text-muted small">Reference</div>
                            <div class="fw-semibold">TXN-884221</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Manual status override</h3>
                <p>Read-only UI layout for future privileged workflow integration.</p>
            </div>

            <div class="d-grid gap-3">
                <div>
                    <label class="form-label text-muted small mb-1">Current status</label>
                    <input type="text" class="form-control vendor-input" value="Processing">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">New status</label>
                    <select class="form-select vendor-input">
                        <option>Processing</option>
                        <option>Packed</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Reason note</label>
                    <textarea class="form-control vendor-input" rows="4">Carrier delay confirmed. Updating order status after warehouse verification.</textarea>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary">Save override</button>
                    <button type="button" class="btn btn-outline-secondary">Force cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
