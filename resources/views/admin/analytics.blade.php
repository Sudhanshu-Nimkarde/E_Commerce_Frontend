@extends('layouts.admin.app')

@section('title', 'Analytics - ShopEase')

@section('main_content')
@php
    $funnel = [
        ['label' => 'Visited site', 'value' => '100%'],
        ['label' => 'Registered', 'value' => '74%'],
        ['label' => 'Verified email', 'value' => '58%'],
        ['label' => 'First order', 'value' => '32%'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Analytics</span>
        <h1 class="admin-page-title">Analytics</h1>
        <p class="admin-page-desc">User growth, retention metrics, funnel steps, and a geo sales placeholder.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary">This month</button>
        <button class="btn btn-outline-primary">This quarter</button>
        <button class="btn btn-primary">Export snapshot</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">New users</div><div class="admin-stat__value">2,174</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Retention</div><div class="admin-stat__value">64%</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Conversion</div><div class="admin-stat__value">32%</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Regions</div><div class="admin-stat__value">18</div></div></div>
</div>

<div class="row g-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-chart">
            <div class="d-flex justify-content-between align-items-center gap-2">
                <div>
                    <div class="admin-stat__label">User growth</div>
                    <h2 class="h5 fw-bold mb-0">Monthly acquisition placeholder</h2>
                </div>
                <span class="admin-badge-soft">Placeholder chart</span>
            </div>
            <div class="admin-chart__bars">
                <span style="height: 20%"></span>
                <span class="is-secondary" style="height: 28%"></span>
                <span class="is-dark" style="height: 38%"></span>
                <span class="is-primary" style="height: 42%"></span>
                <span style="height: 55%"></span>
                <span class="is-secondary" style="height: 66%"></span>
                <span class="is-dark" style="height: 74%"></span>
                <span class="is-primary" style="height: 82%"></span>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Funnel</div>
            <h2 class="h5 fw-bold mb-3">Registration funnel</h2>
            <div class="admin-funnel">
                @foreach ($funnel as $step)
                    <div class="admin-funnel__step">
                        <div class="admin-funnel__step-head">
                            <strong>{{ $step['label'] }}</strong>
                            <strong>{{ $step['value'] }}</strong>
                        </div>
                        <div class="progress" style="height: 8px;"><div class="progress-bar bg-primary" style="width: {{ $step['value'] }}"></div></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Retention</div>
            <h2 class="h5 fw-bold mb-3">Metrics</h2>
            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between"><span>Repeat purchase</span><strong>41%</strong></div>
            </div>
            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between"><span>Churn rate</span><strong>12%</strong></div>
            </div>
            <div class="admin-soft">
                <div class="d-flex justify-content-between"><span>Reactivation</span><strong>9%</strong></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Geo</div>
            <h2 class="h5 fw-bold mb-3">Sales heatmap placeholder</h2>
            <div class="admin-doc-preview">
                <div class="admin-doc-sheet">
                    <i class="bi bi-globe2 fs-1 text-primary"></i>
                    <h3 class="h6 fw-bold mt-3 mb-1">Heatmap placeholder</h3>
                    <div class="text-muted small">A simple visual placeholder for regions.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Sales</div>
            <h2 class="h5 fw-bold mb-3">Analytics cards</h2>
            <div class="admin-list">
                <div class="admin-list__item"><div><strong>Mobile buyers</strong><div class="text-muted small">Share of sales</div></div><strong>68%</strong></div>
                <div class="admin-list__item"><div><strong>Repeat users</strong><div class="text-muted small">Lifetime value boost</div></div><strong>41%</strong></div>
                <div class="admin-list__item"><div><strong>Weekend orders</strong><div class="text-muted small">Revenue concentration</div></div><strong>54%</strong></div>
            </div>
        </div>
    </div>
</div>
@endsection
