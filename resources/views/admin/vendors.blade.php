@extends('layouts.admin.app')

@section('title', 'Vendor Management - ShopEase')

@section('main_content')
@php
    $pending = [
        ['name' => 'North Star Tech', 'owner' => 'Arun Menon', 'city' => 'Bengaluru', 'risk' => 'High', 'sales' => '$8,420'],
        ['name' => 'Fresh Basket', 'owner' => 'Isha Verma', 'city' => 'Pune', 'risk' => 'Medium', 'sales' => '$6,120'],
        ['name' => 'Urban Closet', 'owner' => 'Sana Khan', 'city' => 'Delhi', 'risk' => 'Low', 'sales' => '$11,240'],
    ];

    $vendors = [
        ['name' => 'Glow Beauty', 'status' => 'Active', 'orders' => '2,418', 'commission' => '12%', 'rating' => '4.9'],
        ['name' => 'HomeCraft', 'status' => 'Active', 'orders' => '1,928', 'commission' => '10%', 'rating' => '4.8'],
        ['name' => 'TechHaven', 'status' => 'Suspended', 'orders' => '842', 'commission' => '14%', 'rating' => '4.2'],
        ['name' => 'Farm Fresh', 'status' => 'Active', 'orders' => '2,104', 'commission' => '9%', 'rating' => '4.8'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Vendor management</span>
        <h1 class="admin-page-title">Vendors</h1>
        <p class="admin-page-desc">Approval queue, vendor list, sales cards, and access controls in one stable view.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.vendors.detail') }}" class="btn btn-outline-primary">Vendor detail</a>
        <a href="{{ route('admin.vendors.kyc-documents') }}" class="btn btn-outline-primary">KYC documents</a>
        <a href="{{ route('admin.vendors.commissions') }}" class="btn btn-primary">Commissions</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Pending</div><div class="admin-stat__value">14</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Active</div><div class="admin-stat__value">350</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">KYC overdue</div><div class="admin-stat__value">8</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Suspended</div><div class="admin-stat__value">12</div></div></div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Queue</div>
                    <h2 class="h5 fw-bold mb-0">Pending shop approval</h2>
                </div>
                <span class="admin-badge-soft">Manual review</span>
            </div>

            <div class="row g-3">
                @foreach ($pending as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="admin-soft h-100">
                            <div class="d-flex justify-content-between gap-2 mb-2">
                                <strong>{{ $item['name'] }}</strong>
                                <span class="badge rounded-pill {{ $item['risk'] === 'High' ? 'bg-danger-subtle text-danger' : ($item['risk'] === 'Medium' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success') }}">{{ $item['risk'] }}</span>
                            </div>
                            <div class="text-muted small">{{ $item['owner'] }} - {{ $item['city'] }}</div>
                            <div class="d-flex justify-content-between gap-2 mt-2">
                                <small class="text-muted">Projected sales</small>
                                <small class="fw-semibold">{{ $item['sales'] }}</small>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <button class="btn btn-success btn-sm">Approve</button>
                                <button class="btn btn-outline-secondary btn-sm">Reject</button>
                                <button class="btn btn-outline-primary btn-sm">Need info</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Sales cards</div>
                    <h2 class="h5 fw-bold mb-0">Vendor sales</h2>
                </div>
                <a href="{{ route('admin.vendors.commissions') }}" class="btn btn-outline-primary btn-sm">Setup</a>
            </div>

            <div class="admin-list">
                <div class="admin-list__item"><div><strong>Top vendor sales</strong><div class="text-muted small">Urban Closet</div></div><strong>$11,240</strong></div>
                <div class="admin-list__item"><div><strong>Average commission</strong><div class="text-muted small">Across active vendors</div></div><strong>11.4%</strong></div>
                <div class="admin-list__item"><div><strong>KYC pending</strong><div class="text-muted small">Documents waiting for review</div></div><strong>28</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="admin-panel admin-panel__body">
    <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
        <div>
            <div class="admin-stat__label">List</div>
            <h2 class="h5 fw-bold mb-0">Vendor list</h2>
        </div>
        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#vendorStatusModal">Suspend / reinstate</button>
    </div>

    <div class="admin-table-wrap table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th>Vendor</th>
                    <th>Status</th>
                    <th>Orders</th>
                    <th>Commission</th>
                    <th>Rating</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                    <tr>
                        <td class="fw-semibold">{{ $vendor['name'] }}</td>
                        <td><span class="badge rounded-pill {{ $vendor['status'] === 'Active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">{{ $vendor['status'] }}</span></td>
                        <td>{{ $vendor['orders'] }}</td>
                        <td>{{ $vendor['commission'] }}</td>
                        <td>{{ $vendor['rating'] }}</td>
                        <td class="text-end"><a href="{{ route('admin.vendors.detail') }}" class="btn btn-outline-primary btn-sm">Open</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="vendorStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Suspend / reinstate vendor</h5>
                    <small class="text-muted">Reason and status change UI only.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Action</label>
                        <select class="form-select">
                            <option>Suspend vendor</option>
                            <option>Reinstate vendor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Until</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" rows="4" placeholder="Reason for this action"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save change</button>
            </div>
        </div>
    </div>
</div>
@endsection
