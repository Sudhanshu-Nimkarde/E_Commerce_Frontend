@extends('layouts.vendor.app')

@section('title', 'Shop Management - ShopEase Vendor')

@section('vendor_content')
<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Shop Management</span>
        <h1 class="vendor-page-title">Manage shop profile, compliance, and operating rules</h1>
        <p class="vendor-page-desc">
            Static vendor UI for store settings, verification, shipping zones, and team access. The structure is intentionally simple so future APIs can attach cleanly.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Preview storefront</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($shopStats as $stat)
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
    <div class="col-12 col-xl-7">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Store profile</h3>
                <p>Basic shop information shown in the vendor portal and storefront.</p>
            </div>

            <div class="row g-3">
                @foreach ($profileRows as $row)
                    <div class="col-12 col-md-6">
                        <label class="form-label text-muted small mb-1">{{ $row['label'] }}</label>
                        <input type="text" class="form-control vendor-input" value="{{ $row['value'] }}" readonly>
                    </div>
                @endforeach
            </div>

            <div class="vendor-divider my-4"></div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label text-muted small mb-1">Store display title</label>
                    <input type="text" class="form-control vendor-input" value="North Star Market">
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label text-muted small mb-1">Support phone</label>
                    <input type="text" class="form-control vendor-input" value="+91 98765 43210">
                </div>
                <div class="col-12">
                    <label class="form-label text-muted small mb-1">Store bio</label>
                    <textarea class="form-control vendor-input" rows="4">Clean, reliable, and fast-moving product catalog with a support-first vendor experience.</textarea>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <button type="button" class="btn btn-primary">Update profile</button>
                <button type="button" class="btn btn-outline-secondary">Reset</button>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-5">
        <div class="vendor-stack h-100">
            <div class="vendor-form-card">
                <div class="vendor-form-card__header">
                    <h3>Compliance status</h3>
                    <p>Simple checklist for KYC, banking, and policy readiness.</p>
                </div>

                <div class="vendor-checklist">
                    @foreach ($complianceRows as $row)
                        <div class="vendor-checklist__item">
                            <strong>{{ $row['label'] }}</strong>
                            <span class="vendor-status-badge is-success">{{ $row['status'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="vendor-form-card">
                <div class="vendor-form-card__header">
                    <h3>Shipping zones</h3>
                    <p>Static representation of delivery areas and turnaround time.</p>
                </div>

                <div class="table-responsive">
                    <table class="table vendor-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Zone</th>
                                <th>ETA</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippingZones as $zone)
                                <tr>
                                    <td class="fw-semibold">{{ $zone['zone'] }}</td>
                                    <td>{{ $zone['eta'] }}</td>
                                    <td>
                                        <span class="vendor-status-badge {{ $zone['status'] === 'Active' ? 'is-success' : 'is-muted' }}">
                                            {{ $zone['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Team access</h2>
                <p class="vendor-table-card__sub">A clean UI for managing shop staff roles.</p>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Access</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teamRows as $member)
                            <tr>
                                <td class="fw-semibold">{{ $member['name'] }}</td>
                                <td>{{ $member['role'] }}</td>
                                <td>{{ $member['access'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $member['status'] === 'Active' ? 'is-success' : 'is-muted' }}">
                                        {{ $member['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Policy summary</h3>
                <p>Read-only snapshot of the rules currently shown in the portal.</p>
            </div>

            <div class="vendor-mini-list">
                <div class="vendor-mini-list__item">
                    <div>
                        <strong>Return window</strong>
                        <span>7 days for unopened items</span>
                    </div>
                    <span class="vendor-pill vendor-pill--accent">Published</span>
                </div>
                <div class="vendor-mini-list__item">
                    <div>
                        <strong>Cancellation rule</strong>
                        <span>Allowed before packing begins</span>
                    </div>
                    <span class="vendor-pill vendor-pill--success">Live</span>
                </div>
                <div class="vendor-mini-list__item">
                    <div>
                        <strong>Warranty note</strong>
                        <span>Manufacturer warranty on eligible products</span>
                    </div>
                    <span class="vendor-pill vendor-pill--warning">Review</span>
                </div>
            </div>

            <div class="vendor-divider my-4"></div>

            <div class="d-grid gap-2">
                <button type="button" class="btn btn-outline-secondary">Edit policies</button>
                <button type="button" class="btn btn-outline-secondary">Download store profile</button>
            </div>
        </div>
    </div>
</div>
@endsection
