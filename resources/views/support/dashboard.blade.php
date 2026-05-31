@extends('layouts.admin.admin_nav_layout')

@section('title', 'Support Dashboard - ShopEase')

@section('main_content')
<div class="dashboard-hero mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7 dashboard-hero__copy">
            <span class="section-kicker">Support center</span>
            <h1 class="mt-3">Resolve customer issues with a calmer, cleaner workspace.</h1>
            <p class="mt-3 mb-0">
                The support dashboard mirrors the rest of the app, so your internal team gets the same polished, responsive interface.
            </p>

            <div class="dashboard-hero__actions">
                <button class="btn btn-light">Open Ticket</button>
                <button class="btn btn-outline-primary">View SLA</button>
            </div>
        </div>

        <div class="col-lg-5 dashboard-hero__visual">
            <div class="f-card p-4">
                <div class="metric-label">Average response</div>
                <div class="metric-value">8m</div>
                <p class="text-muted mb-0">Keep your first response time visible and easy to compare.</p>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-kpi-grid mb-4">
    <div class="metric-card">
        <div class="metric-label">Open Tickets</div>
        <div class="metric-value">18</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Resolved Today</div>
        <div class="metric-value">42</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Escalations</div>
        <div class="metric-value">4</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">CSAT</div>
        <div class="metric-value">96%</div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="f-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="fw-bold mb-1">Priority Tickets</h5>
                    <p class="text-muted mb-0">Track the requests that need attention first.</p>
                </div>
                <a href="#" class="btn btn-outline-primary btn-sm">Open Queue</a>
            </div>

            <div class="dashboard-list">
                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Order missing from tracking</div>
                        <div class="dashboard-list__meta">Ticket #2041 - High priority</div>
                    </div>
                    <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">Urgent</span>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Refund request for late delivery</div>
                        <div class="dashboard-list__meta">Ticket #2044 - Needs review</div>
                    </div>
                    <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Pending</span>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Account login assistance</div>
                        <div class="dashboard-list__meta">Ticket #2045 - Quick response</div>
                    </div>
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Resolved</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="support-card">
            <h5 class="fw-bold mb-3">Quick Actions</h5>
            <div class="dashboard-list">
                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Search orders</div>
                        <div class="dashboard-list__meta">Find customer history fast</div>
                    </div>
                    <i class="bi bi-search"></i>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Escalations</div>
                        <div class="dashboard-list__meta">Hand off difficult cases</div>
                    </div>
                    <i class="bi bi-arrow-up-right-circle"></i>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Macros</div>
                        <div class="dashboard-list__meta">Reply faster with templates</div>
                    </div>
                    <i class="bi bi-chat-square-text"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
