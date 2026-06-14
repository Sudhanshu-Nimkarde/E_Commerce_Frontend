@php
    $vendorName = $vendorName ?? session('user_name', 'North Star Vendor');
    $vendorInitial = $vendorInitial ?? strtoupper(substr($vendorName, 0, 1));
    $vendorActivePage = $vendorActivePage ?? 'dashboard';
@endphp

<aside class="vendor-sidebar">
    <div class="vendor-sidebar__top">
        <a href="{{ route('vendor.dashboard') }}" class="vendor-brand" aria-label="ShopEase vendor home">
            <span class="vendor-brand__icon">
                <i class="bi bi-shop-window"></i>
            </span>
            <span class="vendor-brand__copy">
                <span class="vendor-brand__title">Shop<span>Ease</span></span>
                <span class="vendor-brand__subtitle">Vendor portal</span>
            </span>
        </a>

        <div class="vendor-sidebar__controls">
            <button type="button" class="vendor-icon-btn d-lg-none" data-vendor-sidebar-close aria-label="Close sidebar">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

    <div class="vendor-profile-chip">
        <span class="vendor-avatar">{{ $vendorInitial }}</span>
        <div class="vendor-profile-chip__copy">
            <strong>{{ $vendorName }}</strong>
            <span>Role ID {{ $vendorRoleId ?? 2 }} workspace</span>
        </div>
    </div>

    <div class="vendor-sidebar__section">
        <div class="vendor-sidebar__label">Workspace</div>
        <nav class="vendor-nav">
            <a href="{{ route('vendor.dashboard') }}" class="vendor-nav__link {{ $vendorActivePage === 'dashboard' ? 'is-active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span class="vendor-nav__text">Dashboard</span>
            </a>
            <a href="{{ route('vendor.shop-management') }}" class="vendor-nav__link {{ $vendorActivePage === 'shop-management' ? 'is-active' : '' }}">
                <i class="bi bi-shop"></i>
                <span class="vendor-nav__text">Shop Management</span>
            </a>
            <a href="{{ route('vendor.product-management') }}" class="vendor-nav__link {{ $vendorActivePage === 'product-management' ? 'is-active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span class="vendor-nav__text">Product Management</span>
            </a>
            <a href="{{ route('vendor.inventory') }}" class="vendor-nav__link {{ $vendorActivePage === 'inventory' ? 'is-active' : '' }}">
                <i class="bi bi-boxes"></i>
                <span class="vendor-nav__text">Inventory</span>
            </a>
            <a href="{{ route('vendor.order-handling') }}" class="vendor-nav__link {{ $vendorActivePage === 'order-handling' ? 'is-active' : '' }}">
                <i class="bi bi-receipt"></i>
                <span class="vendor-nav__text">Order Handling</span>
            </a>
            <a href="{{ route('vendor.discounts-marketing') }}" class="vendor-nav__link {{ $vendorActivePage === 'discounts-marketing' ? 'is-active' : '' }}">
                <i class="bi bi-megaphone"></i>
                <span class="vendor-nav__text">Discounts &amp; Marketing</span>
            </a>
            <a href="{{ route('vendor.earnings') }}" class="vendor-nav__link {{ $vendorActivePage === 'earnings' ? 'is-active' : '' }}">
                <i class="bi bi-cash-coin"></i>
                <span class="vendor-nav__text">Earnings</span>
            </a>
            <a href="{{ route('vendor.customer-interaction') }}" class="vendor-nav__link {{ $vendorActivePage === 'customer-interaction' ? 'is-active' : '' }}">
                <i class="bi bi-chat-left-dots"></i>
                <span class="vendor-nav__text">Customer Interaction</span>
            </a>
        </nav>
    </div>

    <div class="vendor-sidebar__footer">
        <div class="vendor-note">
            <strong>Ready for API binding</strong>
            <span>Static UI pages are organized for clean integration later.</span>
        </div>

        <form method="POST" action="{{ url('/logout') }}" class="vendor-logout-form">
            @csrf
            <button type="submit" class="vendor-logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
