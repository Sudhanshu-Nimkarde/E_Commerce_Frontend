@extends('layouts.admin.app')

@section('title', 'User Detail - ShopEase')

@section('main_content')
@php
    $history = [
        ['time' => '09 Jun 2026, 09:42', 'title' => 'Successful login', 'meta' => 'Chrome on macOS - 192.168.1.24'],
        ['time' => '08 Jun 2026, 18:16', 'title' => 'Password changed', 'meta' => 'Safari on iPhone - 203.95.44.12'],
        ['time' => '07 Jun 2026, 20:03', 'title' => 'Failed login attempt', 'meta' => 'Edge on Windows - 103.22.71.14'],
    ];

    $orders = [
        ['id' => 'ORD-2018', 'amount' => '$258.40', 'status' => 'Delivered'],
        ['id' => 'ORD-2031', 'amount' => '$86.10', 'status' => 'Returned'],
        ['id' => 'ORD-2041', 'amount' => '$248.00', 'status' => 'Paid'],
    ];

    $auditTrail = [
        ['time' => '09:55', 'action' => 'Profile viewed', 'meta' => 'Admin checked account details.'],
        ['time' => '09:33', 'action' => 'Password reset', 'meta' => 'Temporary password prepared.'],
        ['time' => '08:51', 'action' => 'Block timer created', 'meta' => '24 hour temporary block scheduled.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">User detail</span>
        <h1 class="admin-page-title">Maya Chen</h1>
        <p class="admin-page-desc">Profile, login history, order summary, and audit trail in a stable static layout.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">Back to users</a>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userEditModal">Edit user</button>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="admin-avatar" style="width: 44px; height: 44px; font-size: 1rem;">M</div>
                <div>
                    <h2 class="h5 fw-bold mb-1">Maya Chen</h2>
                    <div class="text-muted">Customer role, active for 2 years</div>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Contact</div>
                <div class="fw-semibold mt-1">maya.chen@example.com</div>
                <div class="text-muted">+91 98** **45 22</div>
            </div>

            <div class="row g-3">
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Status</div><div class="admin-stat__value">Active</div></div></div>
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Role</div><div class="admin-stat__value">Customer</div></div></div>
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Orders</div><div class="admin-stat__value">28</div></div></div>
                <div class="col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Audit</div><div class="admin-stat__value">14</div></div></div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Login history</div>
                    <h2 class="h5 fw-bold mb-0">Recent access activity</h2>
                </div>
                <span class="admin-badge-soft">No anomalies flagged</span>
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

<div class="row g-4">
    <div class="col-lg-5">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Orders</div>
                    <h2 class="h5 fw-bold mb-0">Order summary</h2>
                </div>
                <span class="admin-badge-soft">Static data</span>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-6"><div class="admin-soft"><div class="admin-stat__label">Lifetime orders</div><div class="admin-stat__value mb-0">28</div></div></div>
                <div class="col-6"><div class="admin-soft"><div class="admin-stat__label">Lifetime value</div><div class="admin-stat__value mb-0">$4,820</div></div></div>
                <div class="col-6"><div class="admin-soft"><div class="admin-stat__label">Returns</div><div class="admin-stat__value mb-0">3</div></div></div>
                <div class="col-6"><div class="admin-soft"><div class="admin-stat__label">Last order</div><div class="admin-stat__value mb-0">2 hrs</div></div></div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="fw-semibold">{{ $order['id'] }}</td>
                                <td>{{ $order['amount'] }}</td>
                                <td>{{ $order['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Audit trail</div>
                    <h2 class="h5 fw-bold mb-0">Action log</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Action</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditTrail as $entry)
                            <tr>
                                <td class="fw-semibold">{{ $entry['time'] }}</td>
                                <td>{{ $entry['action'] }}</td>
                                <td class="text-muted">{{ $entry['meta'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Edit user</h5>
                    <small class="text-muted">Simple profile form.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Full name</label><input type="text" class="form-control" value="Maya Chen"></div>
                    <div class="col-md-6"><label class="form-label">Email</label><input type="email" class="form-control" value="maya.chen@example.com"></div>
                    <div class="col-md-6"><label class="form-label">Role</label><select class="form-select"><option selected>Customer</option><option>Support</option><option>Inventory Manager</option></select></div>
                    <div class="col-md-6"><label class="form-label">Status</label><select class="form-select"><option selected>Active</option><option>Inactive</option><option>Blocked</option></select></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
