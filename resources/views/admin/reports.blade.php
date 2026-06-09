@extends('layouts.admin.app')

@section('title', 'Reports - ShopEase')

@section('main_content')
@php
    $leaders = [
        ['name' => 'Urban Closet', 'value' => '$11,240'],
        ['name' => 'North Star Tech', 'value' => '$9,860'],
        ['name' => 'Fresh Basket', 'value' => '$8,420'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Reports</span>
        <h1 class="admin-page-title">Reports & analytics</h1>
        <p class="admin-page-desc">Revenue summary cards, simple chart placeholder, and export actions.</p>
    </div>

    <div class="d-flex flex-wrap gap-2 align-items-center">
        <input type="date" class="form-control" style="width: 170px;">
        <input type="date" class="form-control" style="width: 170px;">
        <button class="btn btn-outline-primary">Export CSV</button>
        <button class="btn btn-outline-primary">Export PDF</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Revenue</div><div class="admin-stat__value">$128.4K</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Orders</div><div class="admin-stat__value">9,148</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">AOV</div><div class="admin-stat__value">$84</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Refund rate</div><div class="admin-stat__value">0.9%</div></div></div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-chart">
            <div class="d-flex justify-content-between align-items-center gap-2">
                <div>
                    <div class="admin-stat__label">Revenue trend</div>
                    <h2 class="h5 fw-bold mb-0">Daily performance placeholder</h2>
                </div>
                <span class="admin-badge-soft">7 day view</span>
            </div>
            <div class="admin-chart__bars">
                <span style="height: 30%"></span>
                <span class="is-secondary" style="height: 44%"></span>
                <span class="is-dark" style="height: 38%"></span>
                <span class="is-primary" style="height: 58%"></span>
                <span style="height: 50%"></span>
                <span class="is-secondary" style="height: 72%"></span>
                <span class="is-dark" style="height: 64%"></span>
                <span class="is-primary" style="height: 80%"></span>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Leaderboard</div>
                    <h2 class="h5 fw-bold mb-0">Vendor performance</h2>
                </div>
            </div>

            <div class="admin-leaderboard">
                @foreach ($leaders as $index => $leader)
                    <div class="admin-leaderboard__item">
                        <div>
                            <strong>#{{ $index + 1 }} {{ $leader['name'] }}</strong>
                            <div class="text-muted small">30 day sales</div>
                        </div>
                        <strong>{{ $leader['value'] }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Analytics</div>
            <h2 class="h5 fw-bold mb-3">Sales analytics</h2>
            <div class="admin-list">
                <div class="admin-list__item"><div><strong>Mobile share</strong><div class="text-muted small">Share of sales</div></div><strong>68%</strong></div>
                <div class="admin-list__item"><div><strong>Repeat orders</strong><div class="text-muted small">Repeat purchase rate</div></div><strong>41%</strong></div>
                <div class="admin-list__item"><div><strong>Cart recovery</strong><div class="text-muted small">Recovered carts</div></div><strong>19%</strong></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Growth</div>
            <h2 class="h5 fw-bold mb-3">User growth</h2>
            <div class="admin-chart" style="min-height: 180px;">
                <div class="admin-chart__bars">
                    <span style="height: 20%"></span>
                    <span class="is-secondary" style="height: 28%"></span>
                    <span class="is-dark" style="height: 38%"></span>
                    <span class="is-primary" style="height: 46%"></span>
                    <span style="height: 58%"></span>
                    <span class="is-secondary" style="height: 70%"></span>
                    <span class="is-dark" style="height: 66%"></span>
                    <span class="is-primary" style="height: 80%"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="admin-stat__label mb-2">Retention</div>
            <h2 class="h5 fw-bold mb-3">Metrics</h2>
            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between mb-2"><span>30 day retention</span><strong>64%</strong></div>
                <div class="progress" style="height: 8px;"><div class="progress-bar bg-primary" style="width: 64%"></div></div>
            </div>
            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between mb-2"><span>60 day retention</span><strong>42%</strong></div>
                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 42%"></div></div>
            </div>
            <div class="admin-soft">
                <div class="d-flex justify-content-between mb-2"><span>90 day retention</span><strong>28%</strong></div>
                <div class="progress" style="height: 8px;"><div class="progress-bar bg-warning" style="width: 28%"></div></div>
            </div>
        </div>
    </div>
</div>
@endsection
