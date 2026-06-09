@extends('layouts.admin.app')

@section('title', 'Order Detail - ShopEase')

@section('main_content')
@php
    $items = [
        ['name' => 'Wireless Headphones', 'qty' => 1, 'price' => '$160.00'],
        ['name' => 'USB-C Charger', 'qty' => 2, 'price' => '$44.00'],
        ['name' => 'Protective Case', 'qty' => 1, 'price' => '$24.00'],
    ];

    $history = [
        ['time' => '09 Jun 2026, 09:38', 'title' => 'Delivered', 'meta' => 'Courier confirmed handoff.'],
        ['time' => '09 Jun 2026, 07:15', 'title' => 'Out for delivery', 'meta' => 'Parcel left final hub.'],
        ['time' => '08 Jun 2026, 18:22', 'title' => 'Packed', 'meta' => 'Vendor marked order ready.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Order detail</span>
        <h1 class="admin-page-title">ORD-2041</h1>
        <p class="admin-page-desc">Items, pricing, shipping, payment, and status history in a stable detail page.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary">Back to orders</a>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#overrideModal">Manual override</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cancelModal">Force cancel</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Amount</div><div class="admin-stat__value">$248</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Shipping</div><div class="admin-stat__value">Paid</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Payment</div><div class="admin-stat__value">Captured</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Status</div><div class="admin-stat__value">Delivered</div></div></div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Items</div>
                    <h2 class="h5 fw-bold mb-0">Order items</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="fw-semibold">{{ $item['name'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ $item['price'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Payment</div>
                    <h2 class="h5 fw-bold mb-0">Shipping and payment</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Shipping address</div>
                <div class="text-muted">Maya Chen, 28 Park Street, Bengaluru, Karnataka, India.</div>
            </div>
            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Payment method</div>
                <div class="text-muted">UPI •••• 4422, captured successfully.</div>
            </div>
            <div class="admin-soft">
                <div class="admin-stat__label">Pricing breakdown</div>
                <div class="d-flex justify-content-between mt-2"><span>Items</span><strong>$228.00</strong></div>
                <div class="d-flex justify-content-between mt-2"><span>Shipping</span><strong>$12.00</strong></div>
                <div class="d-flex justify-content-between mt-2"><span>Tax</span><strong>$8.00</strong></div>
                <div class="d-flex justify-content-between mt-2 pt-2 border-top"><span class="fw-bold">Total</span><strong>$248.00</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Status</div>
                    <h2 class="h5 fw-bold mb-0">History</h2>
                </div>
            </div>

            <div class="admin-timeline">
                @foreach ($history as $item)
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

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Notes</div>
                    <h2 class="h5 fw-bold mb-0">Delivery notes</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <strong>Courier</strong>
                <div class="text-muted">Blue Dart - tracking live and last mile complete.</div>
            </div>
            <div class="admin-soft">
                <strong>Support note</strong>
                <div class="text-muted">Customer confirmed delivery and asked for invoice copy.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="overrideModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Manual status override</h5>
                    <small class="text-muted">Reason capture for admin-only changes.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Status</label><select class="form-select"><option>Processing</option><option>Shipped</option><option>Delivered</option><option>Cancelled</option></select></div>
                    <div class="col-md-6"><label class="form-label">Reason</label><input type="text" class="form-control" placeholder="Why is status changing?"></div>
                    <div class="col-12"><label class="form-label">Authorization note</label><textarea class="form-control" rows="4" placeholder="Approval note"></textarea></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Apply override</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Force cancel order</h5>
                    <small class="text-muted">Confirmation UI only.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Reason</label>
                <textarea class="form-control" rows="4" placeholder="Explain the cancellation"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Cancel order</button>
            </div>
        </div>
    </div>
</div>
@endsection
