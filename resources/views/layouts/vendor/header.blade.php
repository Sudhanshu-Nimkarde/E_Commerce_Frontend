@php
    $vendorName = $vendorName ?? session('user_name', 'North Star Vendor');
    $vendorRoleName = $vendorRoleName ?? session('role_name', 'Vendor');
@endphp

<header class="vendor-header">
    <div class="d-flex align-items-center gap-2">
        <button type="button" class="vendor-icon-btn d-lg-none" data-vendor-sidebar-toggle aria-label="Open sidebar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>

        <button type="button" class="vendor-icon-btn d-none d-lg-inline-flex" data-vendor-sidebar-collapse aria-label="Collapse sidebar">
            <i class="bi bi-layout-sidebar-inset"></i>
        </button>

        <div class="vendor-header__copy">
            <span class="vendor-header__eyebrow">Vendor workspace</span>
            <strong>{{ $vendorStoreName ?? 'North Star Market' }}</strong>
        </div>
    </div>

    <label class="vendor-search d-none d-md-flex" aria-label="Search vendor workspace">
        <i class="bi bi-search"></i>
        <input type="search" placeholder="Search orders, products, customers..." aria-label="Search vendor workspace">
        <button type="button">Search</button>
    </label>

    <div class="vendor-header__actions">
        <button type="button" class="vendor-action-btn" aria-label="Notifications">
            <i class="bi bi-bell"></i>
            <span class="vendor-action-badge">5</span>
        </button>

        <div class="vendor-dropdown" data-vendor-dropdown>
            <button type="button" class="vendor-profile-toggle" data-vendor-dropdown-toggle aria-expanded="false">
                <span class="vendor-avatar vendor-avatar--sm">{{ strtoupper(substr($vendorName, 0, 1)) }}</span>
                <span class="vendor-profile-toggle__copy">
                    <strong>{{ $vendorName }}</strong>
                    <small>{{ $vendorRoleName }}</small>
                </span>
                <i class="bi bi-chevron-down"></i>
            </button>

            <div class="vendor-dropdown__menu" role="menu">
                <a href="{{ route('vendor.dashboard') }}" role="menuitem">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('vendor.shop-management') }}" role="menuitem">
                    <i class="bi bi-shop"></i>
                    <span>Shop settings</span>
                </a>
                <a href="{{ route('vendor.earnings') }}" role="menuitem">
                    <i class="bi bi-cash-coin"></i>
                    <span>Earnings</span>
                </a>
                <form method="POST" action="{{ url('/logout') }}" class="vendor-dropdown__logout">
                    @csrf
                    <button type="submit" role="menuitem">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
