@extends('layouts.admin.app')

@section('title', 'Refunds - ShopEase')

@section('main_content')
@php
    $refunds = [
        ['id' => 'RF-1001', 'order' => 'ORD-2044', 'customer' => 'Daniel Reed', 'amount' => '$59.50', 'type' => 'Partial', 'status' => 'Pending'],
        ['id' => 'RF-1002', 'order' => 'ORD-2038', 'customer' => 'Sara Ali', 'amount' => '$248.00', 'type' => 'Full', 'status' => 'Approved'],
        ['id' => 'RF-1003', 'order' => 'ORD-2022', 'customer' => 'Aman Shah', 'amount' => '$16.90', 'type' => 'Partial', 'status' => 'Rejected'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Refund management</span>
        <h1 class="admin-page-title">Refunds</h1>
        <p class="admin-page-desc">Refund queue, reason fields, and wallet adjustment preview in a simple layout.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary">Open orders</a>
        <button class="btn btn-primary">Export queue</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Pending</div><div class="admin-stat__value">42</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Approved</div><div class="admin-stat__value">118</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Rejected</div><div class="admin-stat__value">9</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Wallet adjustments</div><div class="admin-stat__value">31</div></div></div>
</div>

<div class="row g-4">
    <div class="col-xl-7">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Queue</div>
                    <h2 class="h5 fw-bold mb-0">Refund queue</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Refund</th>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($refunds as $refund)
                            <tr>
                                <td class="fw-semibold">{{ $refund['id'] }}</td>
                                <td>{{ $refund['order'] }}</td>
                                <td>{{ $refund['customer'] }}</td>
                                <td>{{ $refund['amount'] }}</td>
                                <td>{{ $refund['type'] }}</td>
                                <td><span class="badge rounded-pill {{ $refund['status'] === 'Pending' ? 'bg-warning-subtle text-warning' : ($refund['status'] === 'Approved' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger') }}">{{ $refund['status'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="admin-panel admin-panel__body h-100 mb-4">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Action</div>
                    <h2 class="h5 fw-bold mb-0">Refund controls</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <label class="form-label fw-bold">Refund type</label>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-primary" type="button">Full refund</button>
                    <button class="btn btn-outline-primary" type="button">Partial refund</button>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <label class="form-label fw-bold">Refund reason</label>
                <textarea class="form-control" rows="3" placeholder="Reason captured from the customer or support team"></textarea>
            </div>

            <div class="admin-soft mb-3">
                <label class="form-label fw-bold">Authorization note</label>
                <textarea class="form-control" rows="3" placeholder="Internal approval note"></textarea>
            </div>

            <div class="admin-soft">
                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                    <strong>Vendor wallet adjustment preview</strong>
                    <span class="admin-badge-soft">Preview only</span>
                </div>
                <div class="d-flex justify-content-between mt-2"><span>Deduct from wallet</span><strong>$52.80</strong></div>
                <div class="d-flex justify-content-between mt-2"><span>Platform absorbs</span><strong>$6.70</strong></div>
                <div class="d-flex justify-content-between mt-2 pt-2 border-top"><span class="fw-bold">Net adjustment</span><strong>$59.50</strong></div>
            </div>

            <button class="btn btn-primary mt-3 w-100">Submit refund decision</button>
        </div>
    </div>
</div>
@endsection
