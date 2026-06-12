@extends('layouts.admin.app')

@section('title', 'Vendor Detail - ShopEase')

@section('main_content')
@php
    $sales = [
        ['label' => 'Gross sales', 'value' => '$48,420'],
        ['label' => 'Orders', 'value' => '2,418'],
        ['label' => 'Commission due', 'value' => '$5,810'],
        ['label' => 'Refunds', 'value' => '31'],
    ];

    $history = [
        ['time' => '09 Jun 2026', 'title' => 'Commission changed', 'meta' => 'Updated to 12% for electronics.'],
        ['time' => '08 Jun 2026', 'title' => 'KYC verified', 'meta' => 'Documents approved by review team.'],
        ['time' => '06 Jun 2026', 'title' => 'Vendor note added', 'meta' => 'Shipping SLA update requested.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Vendor detail</span>
        <h1 class="admin-page-title">North Star Tech</h1>
        <p class="admin-page-desc">Vendor profile, sales summary, KYC preview, and commission history.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.vendors') }}" class="btn btn-outline-primary">Back to vendors</a>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vendorStatusModal">Suspend / reinstate</button>
        <a href="{{ route('admin.vendors.kyc-documents') }}" class="btn btn-primary">Review KYC</a>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($sales as $item)
        <div class="col-md-3 col-6">
            <div class="admin-panel admin-stat">
                <div class="admin-stat__label">{{ $item['label'] }}</div>
                <div class="admin-stat__value">{{ $item['value'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="admin-avatar" style="width:44px;height:44px;font-size:1rem;">N</div>
                <div>
                    <h2 class="h5 fw-bold mb-1">North Star Tech</h2>
                    <div class="text-muted">Owner: Arun Menon</div>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                    <span class="admin-stat__label">Current status</span>
                    <span class="badge rounded-pill bg-warning-subtle text-warning">Under review</span>
                </div>
                <div class="text-muted small">High refund ratio and pending KYC renewal.</div>
            </div>

            <div class="row g-3">
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Rating</div><div class="admin-stat__value">4.8</div></div></div>
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">SLA</div><div class="admin-stat__value">93%</div></div></div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">KYC</div>
                    <h2 class="h5 fw-bold mb-0">Document preview</h2>
                </div>
                <span class="admin-badge-soft">Preview only</span>
            </div>

            <div class="row g-3">
                <div class="col-lg-5">
                    <div class="admin-doc-preview">
                        <div class="admin-doc-sheet">
                            <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                            <h3 class="h6 fw-bold mt-3 mb-1">GST Certificate</h3>
                            <div class="text-muted small">Front side preview</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="admin-soft h-100">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Registration number</label>
                                <input type="text" class="form-control" value="29ABCDE1234F2Z5">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Document status</label>
                                <select class="form-select">
                                    <option>Pending review</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Reviewer note</label>
                                <textarea class="form-control" rows="4" placeholder="Internal note"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <button class="btn btn-success">Approve KYC</button>
                            <button class="btn btn-outline-secondary">Reject</button>
                            <button class="btn btn-outline-primary">Request more info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Commission</div>
                    <h2 class="h5 fw-bold mb-0">Setup</h2>
                </div>
                <a href="{{ route('admin.vendors.commissions') }}" class="btn btn-outline-primary btn-sm">History</a>
            </div>

            <div class="row g-3">
                <div class="col-md-4"><label class="form-label">Default</label><input type="text" class="form-control" value="12%"></div>
                <div class="col-md-4"><label class="form-label">Electronics</label><input type="text" class="form-control" value="14%"></div>
                <div class="col-md-4"><label class="form-label">Fashion</label><input type="text" class="form-control" value="10%"></div>
                <div class="col-12"><label class="form-label">Notes</label><textarea class="form-control" rows="3" placeholder="Add note"></textarea></div>
            </div>

            <button class="btn btn-primary mt-3">Save commission</button>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">History</div>
                    <h2 class="h5 fw-bold mb-0">Commission changes</h2>
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

<div class="modal fade" id="vendorStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Suspend / reinstate vendor</h5>
                    <small class="text-muted">Reason capture UI only.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Reason</label>
                <textarea class="form-control" rows="4" placeholder="Explain the state change"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endsection
