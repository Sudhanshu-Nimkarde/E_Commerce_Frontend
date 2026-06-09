<header class="admin-topbar">
    <div class="d-flex align-items-center gap-3 w-100">
        <button
            class="btn btn-outline-secondary admin-sidebar-toggle d-lg-none"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#adminSidebar"
            aria-controls="adminSidebar"
            aria-label="Open navigation"
        >
            <i class="bi bi-list"></i>
        </button>

        <div class="admin-search flex-grow-1">
            <i class="bi bi-search"></i>
            <input type="search" class="form-control" placeholder="Search users, vendors, orders" aria-label="Search admin">
        </div>
    </div>

    <div class="dropdown ms-3">
        <button class="btn btn-outline-secondary admin-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="admin-avatar">{{ $adminInitial ?? 'A' }}</span>
            <span class="d-none d-sm-inline">{{ $adminName ?? 'Admin User' }}</span>
        </button>

        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
            <li><span class="dropdown-item-text small text-muted">Role ID {{ $adminRoleId ?? 1 }}</span></li>
            <li><a class="dropdown-item" href="{{ route('admin.security') }}">Security</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.audit-logs') }}">Audit Logs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ url('/logout') }}" class="px-3 pb-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm w-100">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</header>
