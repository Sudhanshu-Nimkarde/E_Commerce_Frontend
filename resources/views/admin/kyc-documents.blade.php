@extends('layouts.admin.app')

@section('title', 'KYC Documents - ShopEase')

@section('main_content')
@php
    $docs = [
        ['vendor' => 'North Star Tech', 'doc' => 'GST Certificate', 'status' => 'Pending', 'updated' => 'Today', 'risk' => 'High'],
        ['vendor' => 'Fresh Basket', 'doc' => 'PAN Card', 'status' => 'Reviewed', 'updated' => 'Yesterday', 'risk' => 'Medium'],
        ['vendor' => 'Urban Closet', 'doc' => 'Bank Statement', 'status' => 'Pending', 'updated' => '3 hrs ago', 'risk' => 'Low'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Vendor compliance</span>
        <h1 class="admin-page-title">KYC documents</h1>
        <p class="admin-page-desc">Review queue, preview area, and approve / reject actions in a simple layout.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.vendors') }}" class="btn btn-outline-primary">Back to vendors</a>
        <a href="{{ route('admin.vendors.commissions') }}" class="btn btn-primary">Commission setup</a>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-5">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Queue</div>
                    <h2 class="h5 fw-bold mb-0">Review list</h2>
                </div>
                <span class="admin-badge-soft">3 pending</span>
            </div>

            <div class="admin-list">
                @foreach ($docs as $doc)
                    <div class="admin-list__item align-items-start">
                        <div>
                            <strong>{{ $doc['vendor'] }}</strong>
                            <div class="text-muted small">{{ $doc['doc'] }}</div>
                            <div class="text-muted small">Updated {{ $doc['updated'] }}</div>
                        </div>
                        <span class="badge rounded-pill {{ $doc['status'] === 'Pending' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success' }}">{{ $doc['status'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-7">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Preview</div>
                    <h2 class="h5 fw-bold mb-0">Document preview</h2>
                </div>
                <span class="admin-badge-soft">UI only</span>
            </div>

            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="admin-doc-preview">
                        <div class="admin-doc-sheet">
                            <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
                            <h3 class="h6 fw-bold mt-3 mb-1">GST Certificate</h3>
                            <div class="text-muted small">Vendor: North Star Tech</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="admin-soft h-100">
                        <label class="form-label fw-bold">Authorization note</label>
                        <textarea class="form-control mb-3" rows="6" placeholder="Approval / rejection note"></textarea>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success">Approve KYC</button>
                            <button class="btn btn-outline-secondary">Reject</button>
                            <button class="btn btn-outline-primary">Request more info</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive mt-4">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Vendor</th>
                            <th>Status</th>
                            <th>Risk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docs as $doc)
                            <tr>
                                <td>{{ $doc['doc'] }}</td>
                                <td>{{ $doc['vendor'] }}</td>
                                <td>{{ $doc['status'] }}</td>
                                <td><span class="badge rounded-pill {{ $doc['risk'] === 'High' ? 'bg-danger-subtle text-danger' : ($doc['risk'] === 'Medium' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success') }}">{{ $doc['risk'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
