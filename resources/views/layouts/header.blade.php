<header class="site-header">
    <div class="header-main">
        <a href="{{ url('/') }}" class="brand" aria-label="ShopEase home">
            <span class="brand__icon">
                <img src="{{ asset('images/home/shopease-favicon.svg') }}" alt="ShopEase">
            </span>
            <span class="brand__text">Shop<span>Ease</span></span>
        </a>

        <div class="header-search" role="search">
            <input type="search" placeholder="Search groceries, essentials, and more" aria-label="Search products">
            <button type="button" aria-label="Search">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="header-actions">
            <a href="#" class="action-chip action-chip--accent">
                <i class="fa-solid fa-bolt"></i>
                Deals
            </a>
            <button type="button" class="icon-button" aria-label="Wishlist">
                <i class="far fa-heart"></i>
                <span class="icon-badge">2</span>
            </button>
            <button type="button" class="icon-button" aria-label="Cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="icon-badge">3</span>
            </button>
            <button
                type="button"
                class="mobile-menu-toggle"
                data-mobile-menu-toggle
                aria-label="Toggle navigation"
                aria-expanded="false"
            >
                <span></span>
            </button>
        </div>
    </div>

    <nav class="site-nav" data-mobile-menu>
        <div class="site-nav__inner">
            <ul class="nav-links">
                <li><a href="#home" class="is-active">Home</a></li>
                <li><a href="#categories">Categories</a></li>
                <li><a href="#featured">Featured</a></li>
                <li><a href="#deals">Deals</a></li>
                <li><a href="#reviews">Reviews</a></li>
                <li><a href="#footer">Contact</a></li>
            </ul>

            <div class="support-pill">
                <i class="fa-solid fa-headset"></i>
                24/7 Customer Support
            </div>
        </div>
    </nav>
</header>
