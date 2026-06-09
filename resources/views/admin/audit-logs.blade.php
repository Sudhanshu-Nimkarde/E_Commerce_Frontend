@extends('layouts.admin.app')

@section('title', 'Audit Logs - ShopEase')

@section('main_content')
@php
    $logs = [
        ['time' => '09:42', 'actor' => 'Admin User', 'action' => 'Changed commission', 'module' => 'Vendors', 'ip' => '192.168.1.24'],
        ['time' => '09:18', 'actor' => 'Admin User', 'action' => 'Blocked user', 'module' => 'Users', 'ip' => '192.168.1.24'],
        ['time' => '08:51', 'actor' => 'Admin User', 'action' => 'Approved KYC', 'module' => 'Vendor compliance', 'ip' => '192.168.1.24'],
        ['time' => '08:24', 'actor' => 'Admin User', 'action' => 'Exported report', 'module' => 'Reports', 'ip' => '192.168.1.24'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Governance</span>
        <h1 class="admin-page-title">Audit logs</h1>
        <p class="admin-page-desc">Audit table and masked data placeholders with simple filters.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary">Export CSV</button>
        <button class="btn btn-outline-primary">Export PDF</button>
    </div>
</div>

<div class="admin-panel admin-panel__body mb-4">
    <div class="row g-3 align-items-end">
        <div class="col-lg-4">
            <label class="form-label fw-bold">Search logs</label>
            <input type="search" class="form-control" placeholder="Actor, action, module..." data-admin-filter-input="#auditTable">
        </div>
        <div class="col-lg-2 col-md-4">
            <label class="form-label fw-bold">Module</label>
            <select class="form-select">
                <option>All modules</option>
                <option>Users</option>
                <option>Vendors</option>
                <option>Orders</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-4">
            <label class="form-label fw-bold">Action</label>
            <select class="form-select">
                <option>All actions</option>
                <option>Changed commission</option>
                <option>Blocked user</option>
                <option>Approved KYC</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 d-flex gap-2">
            <button class="btn btn-outline-primary flex-fill" type="button">Today</button>
            <button class="btn btn-outline-primary flex-fill" type="button">This week</button>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-8">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Table</div>
                    <h2 class="h5 fw-bold mb-0">Audit log table</h2>
                </div>
            </div>

            <div class="admin-table-wrap table-responsive">
                <table class="table admin-table align-middle" id="auditTable">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Actor</th>
                            <th>Action</th>
                            <th>Module</th>
                            <th>IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr data-admin-filter-row data-filter-text="{{ strtolower($log['actor'] . ' ' . $log['action'] . ' ' . $log['module']) }}">
                                <td class="fw-semibold">{{ $log['time'] }}</td>
                                <td>{{ $log['actor'] }}</td>
                                <td>{{ $log['action'] }}</td>
                                <td>{{ $log['module'] }}</td>
                                <td class="text-muted">{{ $log['ip'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="admin-panel admin-panel__body mb-4">
            <div class="admin-stat__label mb-2">Masking</div>
            <h2 class="h5 fw-bold mb-3">Sensitive data</h2>
            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Email</div>
                <div class="fw-semibold">maya.chen@ex***.com</div>
            </div>
            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Phone</div>
                <div class="fw-semibold">+91 98** **45 22</div>
            </div>
            <div class="admin-soft">
                <div class="admin-stat__label">Address</div>
                <div class="text-muted">Partially hidden for privacy in the admin UI.</div>
            </div>
        </div>

        <div class="admin-panel admin-panel__body">
            <div class="admin-stat__label mb-2">Recent activity</div>
            <h2 class="h5 fw-bold mb-3">Timeline</h2>
            <div class="admin-timeline">
                <div class="admin-timeline__item">
                    <strong>Commission update</strong>
                    <div class="text-muted small">North Star Tech commission changed to 12%.</div>
                </div>
                <div class="admin-timeline__item">
                    <strong>User block</strong>
                    <div class="text-muted small">Temporary block applied to a suspicious account.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
