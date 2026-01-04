@extends('layouts.admin.admin_nav_layout')

@section('main_content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Admin Overview</h2>
    <button class="btn btn-gradient">+ Add New Product</button>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="f-card p-4 text-center border-bottom border-primary border-5">
            <div class="text-muted small fw-bold">TOTAL SALES</div>
            <h2 class="fw-bold text-primary mt-2">$54,230</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="f-card p-4 text-center border-bottom border-info border-5">
            <div class="text-muted small fw-bold">ACTIVE USERS</div>
            <h2 class="fw-bold text-info mt-2">1,842</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="f-card p-4 text-center border-bottom border-warning border-5">
            <div class="text-muted small fw-bold">PENDING ORDERS</div>
            <h2 class="fw-bold text-warning mt-2">24</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="f-card p-4 text-center border-bottom border-success border-5">
            <div class="text-muted small fw-bold">SYSTEM UPTIME</div>
            <h2 class="fw-bold text-success mt-2">99.9%</h2>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="f-card p-4">
            <h5 class="fw-bold mb-4">Recent Transactions</h5>
            <table class="table align-middle">
                <thead>
                    <tr class="text-muted small">
                        <th>USER</th>
                        <th>PRODUCT</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://i.pravatar.cc/30" class="rounded-circle me-2"> John Wick</td>
                        <td>Pencil Kit v2</td>
                        <td class="fw-bold">$49.00</td>
                        <td><span class="badge bg-light text-success rounded-pill px-3">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="f-card p-4">
            <h5 class="fw-bold mb-3">Role Distribution</h5>
            <div class="mb-3 d-flex justify-content-between">
                <span>Admins</span> <span class="fw-bold">5</span>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <span>Managers</span> <span class="fw-bold">12</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Customers</span> <span class="fw-bold">1,825</span>
            </div>
        </div>
    </div>
</div>
@endsection