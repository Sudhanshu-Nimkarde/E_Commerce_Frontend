@php
    $customerName = $customerName ?? session('user_name', 'Alex Johnson');
    $customerInitial = $customerInitial ?? strtoupper(substr($customerName, 0, 1));
@endphp

<header class="customer-header">
    <button
        type="button"
        class="customer-menu-toggle"
        data-customer-sidebar-toggle
        aria-label="Open customer menu"
        aria-expanded="false"
    >
        <i class="bi bi-list"></i>
    </button>

    <label class="customer-search" aria-label="Search products and orders">
        <i class="bi bi-search"></i>
        <input type="search" placeholder="Search products, orders, returns..." aria-label="Search customer dashboard">
        <button type="button">Search</button>
    </label>

    <div class="customer-header__actions">
        <a href="{{ route('customer.wishlist') }}" class="customer-icon-button" aria-label="Wishlist">
            <i class="bi bi-heart"></i>
            <span class="customer-icon-badge">12</span>
        </a>

        <a href="{{ route('customer.cart') }}" class="customer-icon-button" aria-label="Cart">
            <i class="bi bi-cart3"></i>
            <span class="customer-icon-badge">3</span>
        </a>

        <div class="customer-dropdown" data-customer-dropdown>
            <button
                type="button"
                class="customer-profile-toggle"
                data-customer-dropdown-toggle
                aria-expanded="false"
            >
                <span class="avatar-chip">{{ $customerInitial }}</span>
                <span class="customer-profile-toggle__copy">
                    <strong>{{ $customerName }}</strong>
                    <small>Premium shopper</small>
                </span>
                <i class="bi bi-chevron-down"></i>
            </button>

            <div class="customer-dropdown__menu" role="menu">
                <a href="{{ route('customer.profile') }}" role="menuitem">
                    <i class="bi bi-person"></i>
                    <span>My Account</span>
                </a>
                <a href="{{ route('customer.orders') }}" role="menuitem">
                    <i class="bi bi-clock-history"></i>
                    <span>Orders</span>
                </a>
                <a href="{{ route('customer.support.tickets') }}" role="menuitem">
                    <i class="bi bi-life-preserver"></i>
                    <span>Support</span>
                </a>
                <form method="POST" action="{{ url('/logout') }}" class="customer-dropdown__logout">
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
