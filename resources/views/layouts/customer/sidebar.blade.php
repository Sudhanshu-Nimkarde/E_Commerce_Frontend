@php
    $customerName = $customerName ?? session('user_name', 'Alex Johnson');
    $customerInitial = $customerInitial ?? strtoupper(substr($customerName, 0, 1));
    $customerActivePage = $customerActivePage ?? 'dashboard';
@endphp

<aside class="customer-sidebar" data-customer-sidebar>
    <div class="customer-sidebar__brand-row">
        <a href="{{ route('customer.dashboard') }}" class="customer-brand" aria-label="ShopEase customer home">
            <span class="customer-brand__icon">
                <i class="fa-solid fa-bag-shopping"></i>
            </span>
            <span class="customer-brand__copy">
                <span class="customer-brand__title">Shop<span>Ease</span></span>
                <span class="customer-brand__subtitle">Customer portal</span>
            </span>
        </a>

        <button type="button" class="customer-sidebar__close" data-customer-sidebar-close aria-label="Close menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="customer-profile-chip">
        <span class="avatar-chip">{{ $customerInitial }}</span>
        <div class="customer-profile-chip__copy">
            <strong>{{ $customerName }}</strong>
            <span>Role ID {{ $customerRoleId ?? 3 }} customer workspace</span>
        </div>
    </div>

    <div class="customer-sidebar__section">
        <div class="customer-sidebar__label">Shopping</div>
        <nav class="customer-sidebar__nav">
            <a href="{{ route('customer.dashboard') }}" class="customer-sidebar__link {{ $customerActivePage === 'dashboard' ? 'is-active' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('customer.profile') }}" class="customer-sidebar__link {{ $customerActivePage === 'profile' ? 'is-active' : '' }}">
                <i class="bi bi-person-vcard"></i>
                <span>My Account</span>
            </a>
            <a href="{{ route('customer.addresses') }}" class="customer-sidebar__link {{ $customerActivePage === 'addresses' ? 'is-active' : '' }}">
                <i class="bi bi-geo-alt"></i>
                <span>Addresses</span>
            </a>
            <a href="{{ route('customer.products') }}" class="customer-sidebar__link {{ $customerActivePage === 'products' ? 'is-active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>
            <a href="{{ route('customer.categories') }}" class="customer-sidebar__link {{ $customerActivePage === 'categories' ? 'is-active' : '' }}">
                <i class="bi bi-grid-1x2"></i>
                <span>Categories</span>
            </a>
            <a href="{{ route('customer.compare') }}" class="customer-sidebar__link {{ $customerActivePage === 'compare' ? 'is-active' : '' }}">
                <i class="bi bi-arrow-left-right"></i>
                <span>Compare</span>
            </a>
            <a href="{{ route('customer.wishlist') }}" class="customer-sidebar__link {{ $customerActivePage === 'wishlist' ? 'is-active' : '' }}">
                <i class="bi bi-heart"></i>
                <span>Wishlist</span>
            </a>
            <a href="{{ route('customer.cart') }}" class="customer-sidebar__link {{ $customerActivePage === 'cart' ? 'is-active' : '' }}">
                <i class="bi bi-cart3"></i>
                <span>Cart</span>
            </a>
        </nav>
    </div>

    <div class="customer-sidebar__section">
        <div class="customer-sidebar__label">Orders &amp; Support</div>
        <nav class="customer-sidebar__nav">
            <a href="{{ route('customer.orders') }}" class="customer-sidebar__link {{ $customerActivePage === 'orders' ? 'is-active' : '' }}">
                <i class="bi bi-clock-history"></i>
                <span>Orders</span>
            </a>
            <a href="{{ route('customer.returns') }}" class="customer-sidebar__link {{ $customerActivePage === 'returns' ? 'is-active' : '' }}">
                <i class="bi bi-arrow-counterclockwise"></i>
                <span>Returns</span>
            </a>
            <a href="{{ route('customer.reviews') }}" class="customer-sidebar__link {{ $customerActivePage === 'reviews' ? 'is-active' : '' }}">
                <i class="bi bi-star"></i>
                <span>Reviews</span>
            </a>
            <a href="{{ route('customer.support.tickets') }}" class="customer-sidebar__link {{ $customerActivePage === 'support-tickets' ? 'is-active' : '' }}">
                <i class="bi bi-life-preserver"></i>
                <span>Support Tickets</span>
            </a>
            <a href="{{ route('customer.complaints') }}" class="customer-sidebar__link {{ $customerActivePage === 'complaints' ? 'is-active' : '' }}">
                <i class="bi bi-exclamation-triangle"></i>
                <span>Complaints</span>
            </a>
        </nav>
    </div>

    <div class="customer-sidebar__footer">
        <div class="customer-sidebar__note">
            <strong>Need help fast?</strong>
            <span>Support SLAs and live order updates sit inside this workspace.</span>
        </div>

        <form method="POST" action="{{ url('/logout') }}" class="customer-logout-form">
            @csrf
            <button type="submit" class="customer-logout-button">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
