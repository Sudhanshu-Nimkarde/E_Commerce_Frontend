@extends('layouts.admin.app')

@section('title', 'Commissions - ShopEase')

@section('main_content')
@php
    $tiers = [
        ['category' => 'Default', 'commission' => '12%', 'status' => 'Active'],
        ['category' => 'Electronics', 'commission' => '14%', 'status' => 'Active'],
        ['category' => 'Fashion', 'commission' => '10%', 'status' => 'Active'],
        ['category' => 'Grocery', 'commission' => '8%', 'status' => 'Active'],
    ];

    $history = [
        ['time' => '09 Jun 2026', 'title' => 'North Star Tech updated', 'meta' => 'Commission changed from 11% to 12%.'],
        ['time' => '08 Jun 2026', 'title' => 'Fashion rate updated', 'meta' => 'Seasonal commission discount applied.'],
        ['time' => '06 Jun 2026', 'title' => 'Grocery reviewed', 'meta' => 'Adjusted for lower margin basket size.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Vendor finance</span>
        <h1 class="admin-page-title">Commission setup</h1>
        <p class="admin-page-desc">Simple rate setup with a change history for future integrations.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.vendors.detail') }}" class="btn btn-outline-primary">Vendor detail</a>
        <a href="{{ route('admin.vendors') }}" class="btn btn-primary">Back to vendors</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Average</div><div class="admin-stat__value">11.4%</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Vendors</div><div class="admin-stat__value">364</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Pending</div><div class="admin-stat__value">5</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Change log</div><div class="admin-stat__value">42</div></div></div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Rates</div>
                    <h2 class="h5 fw-bold mb-0">Commission tiers</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Commission</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tiers as $tier)
                            <tr>
                                <td class="fw-semibold">{{ $tier['category'] }}</td>
                                <td>{{ $tier['commission'] }}</td>
                                <td><span class="badge rounded-pill bg-success-subtle text-success">{{ $tier['status'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Update</div>
                    <h2 class="h5 fw-bold mb-0">Edit rate</h2>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select class="form-select">
                        <option>Default</option>
                        <option>Electronics</option>
                        <option>Fashion</option>
                        <option>Grocery</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Rate</label>
                    <input type="text" class="form-control" value="12%">
                </div>
                <div class="col-12">
                    <label class="form-label">Reason</label>
                    <textarea class="form-control" rows="4" placeholder="Why did this change?"></textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Save commission</button>
        </div>
    </div>

    <div class="col-12">
        <div class="admin-panel admin-panel__body">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">History</div>
                    <h2 class="h5 fw-bold mb-0">Change history</h2>
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
</div>
@endsection
