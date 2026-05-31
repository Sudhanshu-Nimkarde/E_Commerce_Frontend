@extends('layouts.admin.admin_nav_layout')

@section('title', 'Admin Dashboard - ShopEase')

@section('main_content')
<div class="dashboard-hero mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7 dashboard-hero__copy">
            <span class="section-kicker">Admin overview</span>
            <h1 class="mt-3">A cleaner operations dashboard for products, users, and orders.</h1>
            <p class="mt-3 mb-0">
                The admin shell now uses the same refined visual language as the storefront, so the project feels cohesive end to end.
            </p>

            <div class="dashboard-hero__actions">
                <button class="btn btn-light">Add New Product</button>
                <button class="btn btn-outline-primary">Export Report</button>
            </div>
        </div>

        <div class="col-lg-5 dashboard-hero__visual">
            <div class="f-card p-4">
                <div class="metric-label">System status</div>
                <div class="metric-value">99.9%</div>
                <p class="text-muted mb-0">Stable, responsive, and ready for multi-role ecommerce workflows.</p>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-kpi-grid mb-4">
    <div class="metric-card">
        <div class="metric-label">Total Sales</div>
        <div class="metric-value">$54,230</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Active Users</div>
        <div class="metric-value">1,842</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">Pending Orders</div>
        <div class="metric-value">24</div>
    </div>
    <div class="metric-card">
        <div class="metric-label">System Uptime</div>
        <div class="metric-value">99.9%</div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="f-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="fw-bold mb-1">Recent Transactions</h5>
                    <p class="text-muted mb-0">Keep the most important operational data easy to scan.</p>
                </div>
                <a href="#" class="btn btn-outline-primary btn-sm">View All</a>
            </div>

            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Wick</td>
                        <td>Pencil Kit v2</td>
                        <td class="fw-bold">$49.00</td>
                        <td><span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Paid</span></td>
                    </tr>
                    <tr>
                        <td>Sarah Johnson</td>
                        <td>Fresh Produce Box</td>
                        <td class="fw-bold">$29.99</td>
                        <td><span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Processing</span></td>
                    </tr>
                    <tr>
                        <td>Michael Brown</td>
                        <td>Home Essentials Kit</td>
                        <td class="fw-bold">$39.99</td>
                        <td><span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">Shipped</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="f-card p-4">
            <h5 class="fw-bold mb-3">Role Distribution</h5>

            <div class="dashboard-list">
                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Admins</div>
                        <div class="dashboard-list__meta">Platform control</div>
                    </div>
                    <span class="fw-bold">5</span>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Managers</div>
                        <div class="dashboard-list__meta">Operational roles</div>
                    </div>
                    <span class="fw-bold">12</span>
                </div>

                <div class="dashboard-list__item">
                    <div>
                        <div class="dashboard-list__title">Customers</div>
                        <div class="dashboard-list__meta">Active shoppers</div>
                    </div>
                    <span class="fw-bold">1,825</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
