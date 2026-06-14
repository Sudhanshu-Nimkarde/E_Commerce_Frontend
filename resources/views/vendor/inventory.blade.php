@extends('layouts.vendor.app')

@section('title', 'Inventory - ShopEase Vendor')

@section('vendor_content')
@php
    $inventoryStatusTone = [
        'Healthy' => 'is-success',
        'Low stock' => 'is-warning',
        'Out of stock' => 'is-danger',
    ];
@endphp

<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Inventory</span>
        <h1 class="vendor-page-title">Stock visibility for warehouses and replenishment</h1>
        <p class="vendor-page-desc">
            This inventory screen keeps everything clear and responsive with simple tables, cards, and threshold indicators.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Stock transfer</button>
        <button type="button" class="btn btn-primary">Restock plan</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($inventoryStats as $stat)
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
                    <h2 class="vendor-table-card__title">Inventory table</h2>
                    <p class="vendor-table-card__sub">Stock thresholds, reservations, and reorder levels in one place.</p>
                </div>
                <label class="vendor-search w-100" style="max-width: 340px;">
                    <i class="bi bi-search"></i>
                    <input
                        type="search"
                        placeholder="Search SKU or product..."
                        aria-label="Search inventory"
                        data-vendor-filter-input="#inventoryRows"
                    >
                    <button type="button">Filter</button>
                </label>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Product</th>
                            <th>Warehouse</th>
                            <th>On hand</th>
                            <th>Reserved</th>
                            <th>Reorder</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="inventoryRows">
                        @foreach ($inventoryRows as $row)
                            <tr data-vendor-filter-row data-filter-text="{{ implode(' ', $row) }}">
                                <td class="fw-semibold">{{ $row['sku'] }}</td>
                                <td>{{ $row['product'] }}</td>
                                <td>{{ $row['warehouse'] }}</td>
                                <td>{{ $row['onHand'] }}</td>
                                <td>{{ $row['reserved'] }}</td>
                                <td>{{ $row['reorder'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $inventoryStatusTone[$row['status']] ?? 'is-muted' }}">
                                        {{ $row['status'] }}
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
                    <h3>Warehouse health</h3>
                    <p>High-level capacity and SLA indicators for each location.</p>
                </div>

                <div class="d-grid gap-3">
                    @foreach ($warehouseRows as $warehouse)
                        <div class="vendor-soft-card">
                            <div class="d-flex justify-content-between gap-2 mb-2">
                                <strong>{{ $warehouse['name'] }}</strong>
                                <span class="vendor-pill vendor-pill--accent">{{ $warehouse['fill'] }}</span>
                            </div>
                            <div class="progress mb-2" style="height: 10px;">
                                <div class="progress-bar bg-primary" style="width: {{ $warehouse['fill'] }}"></div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <span>{{ $warehouse['inbound'] }} inbound</span>
                                <span>{{ $warehouse['sla'] }} SLA</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="vendor-form-card flex-grow-1">
                <div class="vendor-form-card__header">
                    <h3>Restock alerts</h3>
                    <p>Short list of items that need attention first.</p>
                </div>

                <div class="vendor-mini-list">
                    @foreach ($restockAlerts as $alert)
                        <div class="vendor-mini-list__item">
                            <div>
                                <strong>{{ $alert['title'] }}</strong>
                                <span>{{ $alert['meta'] }}</span>
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm">{{ $alert['action'] }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Incoming shipments</h2>
                <p class="vendor-table-card__sub">Placeholder UI for inbound stock tracking and vendor receiving.</p>
            </div>

            <div class="vendor-panel__body">
                <div class="vendor-checklist">
                    <div class="vendor-checklist__item"><strong>Shipment scheduled</strong><span>3 boxes arriving tomorrow</span></div>
                    <div class="vendor-checklist__item"><strong>Barcode scanning</strong><span>Ready for warehouse intake</span></div>
                    <div class="vendor-checklist__item"><strong>Damage check</strong><span>Inspection note ready</span></div>
                    <div class="vendor-checklist__item"><strong>Putaway completion</strong><span>Awaiting location assignment</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Threshold settings</h3>
                <p>Simple UI for safe, future stock-policy updates.</p>
            </div>

            <div class="d-grid gap-3">
                <div>
                    <label class="form-label text-muted small mb-1">Low stock threshold</label>
                    <input type="text" class="form-control vendor-input" value="20 units">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Out-of-stock alert email</label>
                    <input type="text" class="form-control vendor-input" value="ops@northstarmarket.com">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Reorder note</label>
                    <textarea class="form-control vendor-input" rows="4">Trigger replenishment once safety stock falls below the configured threshold.</textarea>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary">Save thresholds</button>
                    <button type="button" class="btn btn-outline-secondary">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
