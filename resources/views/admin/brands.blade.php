@extends('layouts.admin.app')

@section('title', 'Brands - ShopEase')

@section('main_content')
@php
    $brands = [
        ['name' => 'Glow Beauty', 'status' => 'Verified', 'category' => 'Beauty', 'products' => '284'],
        ['name' => 'North Star Tech', 'status' => 'Verified', 'category' => 'Electronics', 'products' => '428'],
        ['name' => 'HomeCraft', 'status' => 'Unverified', 'category' => 'Home', 'products' => '169'],
        ['name' => 'Urban Closet', 'status' => 'Verified', 'category' => 'Fashion', 'products' => '312'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Brand management</span>
        <h1 class="admin-page-title">Brands</h1>
        <p class="admin-page-desc">Brand list, verification badge, and duplicate merge modal.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#brandModal">Create / edit brand</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mergeBrandModal">Merge duplicates</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Brands</div><div class="admin-stat__value">124</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Verified</div><div class="admin-stat__value">89</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Unverified</div><div class="admin-stat__value">35</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Duplicates</div><div class="admin-stat__value">7</div></div></div>
</div>

<div class="row g-4">
    <div class="col-xl-7">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">List</div>
                    <h2 class="h5 fw-bold mb-0">Brand list</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td class="fw-semibold">{{ $brand['name'] }}</td>
                                <td>{{ $brand['category'] }}</td>
                                <td>{{ $brand['products'] }}</td>
                                <td><span class="badge rounded-pill {{ $brand['status'] === 'Verified' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">{{ $brand['status'] }}</span></td>
                                <td class="text-end"><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#brandModal">Edit</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="admin-panel admin-panel__body mb-4">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Merge</div>
                    <h2 class="h5 fw-bold mb-0">Duplicate brand UI</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between gap-2 mb-2">
                    <strong>Glow Beauty</strong>
                    <span class="badge rounded-pill bg-success-subtle text-success">Verified</span>
                </div>
                <div class="text-muted small">Primary brand candidate.</div>
            </div>
            <div class="admin-soft">
                <div class="d-flex justify-content-between gap-2 mb-2">
                    <strong>Glow Beauty India</strong>
                    <span class="badge rounded-pill bg-warning-subtle text-warning">Candidate</span>
                </div>
                <div class="text-muted small">Potential duplicate to merge later.</div>
            </div>

            <button class="btn btn-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#mergeBrandModal">Open merge tool</button>
        </div>

        <div class="admin-panel admin-panel__body">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Badge</div>
                    <h2 class="h5 fw-bold mb-0">Verification</h2>
                </div>
            </div>

            <div class="admin-list__item">
                <div>
                    <strong>Verified badge</strong>
                    <div class="text-muted small">Shown on tables and detail views</div>
                </div>
                <span class="badge rounded-pill bg-success-subtle text-success">Verified</span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="brandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Create / edit brand</h5>
                    <small class="text-muted">Brand identity and status.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Brand name</label><input type="text" class="form-control" placeholder="Brand name"></div>
                    <div class="col-md-6"><label class="form-label">Category</label><select class="form-select"><option>Beauty</option><option>Electronics</option><option>Home</option><option>Fashion</option></select></div>
                    <div class="col-md-6"><label class="form-label">Status</label><select class="form-select"><option>Verified</option><option>Unverified</option></select></div>
                    <div class="col-md-6"><label class="form-label">Verification badge</label><select class="form-select"><option>Enable</option><option>Disable</option></select></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Save brand</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mergeBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Merge duplicates</h5>
                    <small class="text-muted">Select the primary brand and duplicate candidate.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Primary brand</label><select class="form-select"><option>Glow Beauty</option><option>North Star Tech</option></select></div>
                    <div class="col-md-6"><label class="form-label">Duplicate candidate</label><select class="form-select"><option>Glow Beauty India</option><option>Glow Beautee</option></select></div>
                    <div class="col-12"><label class="form-label">Merge note</label><textarea class="form-control" rows="4" placeholder="Merge note"></textarea></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Merge brands</button>
            </div>
        </div>
    </div>
</div>
@endsection
