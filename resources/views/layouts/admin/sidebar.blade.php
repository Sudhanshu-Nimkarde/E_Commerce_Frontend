<aside class="admin-sidebar offcanvas-lg offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
    <div class="offcanvas-header admin-sidebar__header d-lg-none">
        <div>
            <h5 class="offcanvas-title mb-0" id="adminSidebarLabel">ShopEase Admin</h5>
            <small class="text-muted">Operations workspace</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="admin-brand">
        <div class="admin-brand__icon">S</div>
        <div class="min-w-0">
            <div class="admin-brand__title">ShopEase Admin</div>
            <div class="admin-brand__sub">Stable operations panel</div>
        </div>
    </div>

    <nav class="admin-nav">
        <div class="admin-nav__label">Overview</div>
        <a class="admin-nav__link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i><span>Dashboard</span>
        </a>

        <div class="admin-nav__label">Management</div>
        <a class="admin-nav__link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" href="{{ route('admin.users') }}">
            <i class="bi bi-people"></i><span>User Management</span>
        </a>
        <a class="admin-nav__link {{ request()->routeIs('admin.vendors*') ? 'active' : '' }}" href="{{ route('admin.vendors') }}">
            <i class="bi bi-shop"></i><span>Vendor Management</span>
        </a>
        <a class="admin-nav__link {{ request()->routeIs('admin.categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}">
            <i class="bi bi-diagram-3"></i><span>Categories</span>
        </a>
        <a class="admin-nav__link {{ request()->routeIs('admin.brands') ? 'active' : '' }}" href="{{ route('admin.brands') }}">
            <i class="bi bi-tag"></i><span>Brands</span>
        </a>

        <div class="admin-nav__label">Operations</div>
        <a class="admin-nav__link {{ request()->routeIs('admin.orders*') || request()->routeIs('admin.refunds') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
            <i class="bi bi-bag-check"></i><span>Orders & Refunds</span>
        </a>

        <div class="admin-nav__label">Insights</div>
        <a class="admin-nav__link {{ request()->routeIs('admin.reports') || request()->routeIs('admin.analytics') ? 'active' : '' }}" href="{{ route('admin.reports') }}">
            <i class="bi bi-bar-chart-line"></i><span>Reports & Analytics</span>
        </a>

        <div class="admin-nav__label">Governance</div>
        <a class="admin-nav__link {{ request()->routeIs('admin.audit-logs') ? 'active' : '' }}" href="{{ route('admin.audit-logs') }}">
            <i class="bi bi-journal-check"></i><span>Audit Logs</span>
        </a>
        <a class="admin-nav__link {{ request()->routeIs('admin.security') ? 'active' : '' }}" href="{{ route('admin.security') }}">
            <i class="bi bi-shield-lock"></i><span>Security / MFA</span>
        </a>
    </nav>

    <div class="admin-sidebar__meta">
        <div class="small text-muted">Admin role ID</div>
        <div class="fw-bold">{{ $adminRoleId ?? 1 }}</div>
    </div>
</aside>
