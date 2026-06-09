@extends('layouts.admin.app')

@section('title', 'User Management - ShopEase')

@section('main_content')
@php
    $users = [
        ['name' => 'Maya Chen', 'email' => 'maya.chen@example.com', 'role' => 'Customer', 'status' => 'Active', 'last_login' => '5 min ago'],
        ['name' => 'Daniel Reed', 'email' => 'daniel.reed@example.com', 'role' => 'Customer', 'status' => 'Blocked', 'last_login' => '1 day ago'],
        ['name' => 'Priya Nair', 'email' => 'priya.nair@example.com', 'role' => 'Support', 'status' => 'Active', 'last_login' => '12 min ago'],
        ['name' => 'Aman Shah', 'email' => 'aman.shah@example.com', 'role' => 'Inventory Manager', 'status' => 'Temporary Block', 'last_login' => 'Yesterday'],
        ['name' => 'Elena Gomez', 'email' => 'elena.gomez@example.com', 'role' => 'Customer', 'status' => 'Active', 'last_login' => '2 hrs ago'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">User management</span>
        <h1 class="admin-page-title">Users</h1>
        <p class="admin-page-desc">Search, filter, block, assign roles, and view user details without backend logic.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.users.detail') }}" class="btn btn-outline-primary">User detail</a>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userFormModal">Add user</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="admin-panel admin-panel__body">
            <label class="form-label fw-bold">Search users</label>
            <input type="search" class="form-control" placeholder="Name, email, role..." data-admin-filter-input="#usersTable">
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="admin-panel admin-panel__body">
            <label class="form-label fw-bold">Status</label>
            <select class="form-select">
                <option>All</option>
                <option>Active</option>
                <option>Blocked</option>
                <option>Temporary Block</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="admin-panel admin-panel__body">
            <label class="form-label fw-bold">Role</label>
            <select class="form-select">
                <option>All roles</option>
                <option>Customer</option>
                <option>Support</option>
                <option>Inventory Manager</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex gap-2 h-100 align-items-end">
                <button class="btn btn-outline-primary flex-fill" type="button">Export CSV</button>
                <button class="btn btn-outline-primary flex-fill" type="button">Export PDF</button>
            </div>
        </div>
    </div>
</div>

<div class="admin-panel admin-panel__body">
    <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
        <div>
            <div class="admin-stat__label">Table</div>
            <h2 class="h5 fw-bold mb-0">User list</h2>
        </div>
        <span class="admin-badge-soft">Static UI only</span>
    </div>

    <div class="admin-table-wrap table-responsive">
        <table class="table admin-table align-middle" id="usersTable">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Last login</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr data-admin-filter-row data-filter-text="{{ strtolower($user['name'] . ' ' . $user['email'] . ' ' . $user['role'] . ' ' . $user['status']) }}">
                        <td>
                            <div class="fw-semibold">{{ $user['name'] }}</div>
                            <div class="text-muted small">{{ $user['email'] }}</div>
                        </td>
                        <td>{{ $user['role'] }}</td>
                        <td>
                            @php
                                $statusBadge = match ($user['status']) {
                                    'Active' => 'bg-success-subtle text-success',
                                    'Blocked' => 'bg-danger-subtle text-danger',
                                    'Temporary Block' => 'bg-warning-subtle text-warning',
                                    default => 'bg-secondary-subtle text-secondary',
                                };
                            @endphp
                            <span class="badge rounded-pill {{ $statusBadge }}">{{ $user['status'] }}</span>
                        </td>
                        <td>{{ $user['last_login'] }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">Manage</button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('admin.users.detail') }}">View detail</a></li>
                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#userFormModal">Edit user</button></li>
                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#userBlockModal">Block / Unblock</button></li>
                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#userRoleModal">Assign role</button></li>
                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#userAccessModal">Password / logout</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="userFormModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Add / edit user</h5>
                    <small class="text-muted">Static form for future API wiring.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full name</label>
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" placeholder="Contact">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select">
                            <option>Customer</option>
                            <option>Support</option>
                            <option>Inventory Manager</option>
                            <option>Delivery Manager</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Blocked</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Save user</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userBlockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Block / unblock user</h5>
                    <small class="text-muted">Temporary block date and reason.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Action</label>
                        <select class="form-select">
                            <option>Temporary block</option>
                            <option>Permanent block</option>
                            <option>Unblock</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Until</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" rows="4" placeholder="Reason for this action"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Confirm</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Assign role</h5>
                    <small class="text-muted">Change access level.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Role</label>
                <select class="form-select">
                    <option>Customer</option>
                    <option>Support</option>
                    <option>Inventory Manager</option>
                    <option>Delivery Manager</option>
                    <option>Shopkeeper</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Update role</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userAccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Password reset / force logout</h5>
                    <small class="text-muted">UI only for future admin actions.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="admin-soft h-100">
                            <label class="form-label fw-bold">Password reset</label>
                            <input type="text" class="form-control mb-3" value="Temp@12345">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked id="forceChangePassword">
                                <label class="form-check-label" for="forceChangePassword">Force change on next login</label>
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-3 w-100">Reset password</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="admin-soft h-100">
                            <label class="form-label fw-bold">Force logout</label>
                            <textarea class="form-control mb-3" rows="4" placeholder="Reason"></textarea>
                            <button type="button" class="btn btn-primary w-100">Force logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
