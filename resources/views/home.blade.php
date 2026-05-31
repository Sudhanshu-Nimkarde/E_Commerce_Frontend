<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0f172a">
    <title>ShopEase - Your One-Stop Shopping Destination</title>
    <link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('images/home/shopease-favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="storefront-page">
    @include('layouts.topbar')
    @include('layouts.header')

    <main id="home">
        <section class="hero-section">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-copy">
                        <span class="hero-eyebrow">Fast delivery. Fresh picks. Better deals.</span>
                        <h1 class="hero-title">Shop groceries, essentials, and daily needs with a smoother checkout flow.</h1>
                        <p class="hero-subtitle">
                            ShopEase gives your customers a clean ecommerce experience inspired by modern quick-commerce apps:
                            faster browsing, clearer product cards, and strong calls to action.
                        </p>

                        <div class="hero-actions">
                            <a href="#featured" class="btn btn-primary">Shop Now</a>
                            <a href="#categories" class="btn btn-outline-primary">Browse Categories</a>
                        </div>

                        <div class="hero-metrics">
                            <div class="hero-metric">
                                <strong>15 min</strong>
                                <span>Average dispatch window</span>
                            </div>
                            <div class="hero-metric">
                                <strong>2,500+</strong>
                                <span>Curated essentials</span>
                            </div>
                            <div class="hero-metric">
                                <strong>24/7</strong>
                                <span>Support and tracking</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Fresh groceries and essentials">
                        <div class="hero-floating-card">
                            <span class="hero-floating-card__label">Trending today</span>
                            <strong class="hero-floating-card__value">Fresh produce bundle</strong>
                            <span class="hero-floating-card__meta">Up to 20% off on selected essentials</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--surface" id="categories">
            <div class="container">
                <div class="section-header">
                    <span class="section-kicker">Shop by category</span>
                    <h2>Popular Categories</h2>
                    <p>Quickly guide shoppers into the most useful collections with clear visual cards and strong contrast.</p>
                </div>

                <div class="category-grid">
                    <a href="#" class="category-card category-card--fresh">
                        <div class="category-card__icon">
                            <i class="fas fa-carrot"></i>
                        </div>
                        <div class="category-card__body">
                            <span>Fresh Picks</span>
                            <strong>Fruits &amp; Veggies</strong>
                            <div class="category-card__meta">Daily farm-fresh arrivals</div>
                        </div>
                    </a>

                    <a href="#" class="category-card category-card--dairy">
                        <div class="category-card__icon">
                            <i class="fas fa-bread-slice"></i>
                        </div>
                        <div class="category-card__body">
                            <span>Breakfast</span>
                            <strong>Dairy &amp; Bakery</strong>
                            <div class="category-card__meta">Morning essentials in one place</div>
                        </div>
                    </a>

                    <a href="#" class="category-card category-card--snacks">
                        <div class="category-card__icon">
                            <i class="fas fa-bowl-food"></i>
                        </div>
                        <div class="category-card__body">
                            <span>Snacking</span>
                            <strong>Snacks &amp; Beverages</strong>
                            <div class="category-card__meta">Fast grab-and-go favorites</div>
                        </div>
                    </a>

                    <a href="#" class="category-card category-card--home">
                        <div class="category-card__icon">
                            <i class="fas fa-house"></i>
                        </div>
                        <div class="category-card__body">
                            <span>Everyday</span>
                            <strong>Home &amp; Essentials</strong>
                            <div class="category-card__meta">Products that sell on repeat</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="section section--muted" id="featured">
            <div class="container">
                <div class="section-header section-header--left">
                    <span class="section-kicker">Featured picks</span>
                    <h2>Best Sellers</h2>
                    <p>Four clean product cards with image, badge, rating, and a strong cart action for faster browsing.</p>
                </div>

                <div class="product-grid">
                    <article class="product-card">
                        <div class="product-card__media">
                            <img src="{{ asset('images/home/home-main.jpg') }}" alt="Fresh produce box">
                            <span class="product-card__badge">New</span>
                            <div class="product-card__actions">
                                <button type="button" class="product-card__action" aria-label="Add to wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="product-card__action" aria-label="Quick view">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-card__body">
                            <h3 class="product-card__title">Fresh Produce Box</h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(4.5)</span>
                            </div>
                            <div class="price-row">
                                <div>
                                    <span class="original-price">$29.99</span>
                                    <span class="price">$19.99</span>
                                </div>
                                <button type="button" class="product-card__add" aria-label="Add to cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__media">
                            <img src="{{ asset('images/home/home-main.jpg') }}" alt="Daily essentials pack">
                            <span class="product-card__badge">-20%</span>
                            <div class="product-card__actions">
                                <button type="button" class="product-card__action" aria-label="Add to wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="product-card__action" aria-label="Quick view">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-card__body">
                            <h3 class="product-card__title">Daily Essentials Pack</h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>(4.0)</span>
                            </div>
                            <div class="price-row">
                                <div>
                                    <span class="original-price">$24.99</span>
                                    <span class="price">$18.99</span>
                                </div>
                                <button type="button" class="product-card__add" aria-label="Add to cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__media">
                            <img src="{{ asset('images/home/home-main.jpg') }}" alt="Weekend snack bundle">
                            <span class="product-card__badge">Hot</span>
                            <div class="product-card__actions">
                                <button type="button" class="product-card__action" aria-label="Add to wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="product-card__action" aria-label="Quick view">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-card__body">
                            <h3 class="product-card__title">Weekend Snack Bundle</h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5.0)</span>
                            </div>
                            <div class="price-row">
                                <div>
                                    <span class="original-price">$34.99</span>
                                    <span class="price">$24.99</span>
                                </div>
                                <button type="button" class="product-card__add" aria-label="Add to cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__media">
                            <img src="{{ asset('images/home/home-main.jpg') }}" alt="Home essentials kit">
                            <span class="product-card__badge">Bestseller</span>
                            <div class="product-card__actions">
                                <button type="button" class="product-card__action" aria-label="Add to wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="product-card__action" aria-label="Quick view">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-card__body">
                            <h3 class="product-card__title">Home Essentials Kit</h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span>(3.5)</span>
                            </div>
                            <div class="price-row">
                                <div>
                                    <span class="original-price">$39.99</span>
                                    <span class="price">$29.99</span>
                                </div>
                                <button type="button" class="product-card__add" aria-label="Add to cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="deals">
            <div class="container">
                <div class="deal-card">
                    <div class="deal-media">
                        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Deal of the day">
                        <span class="deal-badge">Deal of the Day</span>
                    </div>

                    <div class="deal-copy">
                        <span class="section-kicker">Limited time offer</span>
                        <h2>Fresh produce bundle at a special price.</h2>
                        <p>
                            Highlight a fast-moving daily offer with a clean split layout, readable timer,
                            and a clear CTA that feels premium on laptop and Windows screens.
                        </p>

                        <div class="deal-timer js-countdown" data-countdown-end="{{ now()->addDays(8)->addHours(17)->addMinutes(42)->addSeconds(15)->toIso8601String() }}">
                            <div class="timer-box">
                                <span class="timer-value" data-unit="days">08</span>
                                <span class="timer-label">Days</span>
                            </div>
                            <div class="timer-box">
                                <span class="timer-value" data-unit="hours">17</span>
                                <span class="timer-label">Hours</span>
                            </div>
                            <div class="timer-box">
                                <span class="timer-value" data-unit="minutes">42</span>
                                <span class="timer-label">Minutes</span>
                            </div>
                            <div class="timer-box">
                                <span class="timer-value" data-unit="seconds">15</span>
                                <span class="timer-label">Seconds</span>
                            </div>
                        </div>

                        <div class="deal-price">
                            <div>
                                <span class="original-price">$79.99</span>
                                <span class="price">$49.99</span>
                            </div>
                            <a href="#featured" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--surface">
            <div class="container">
                <div class="newsletter-panel">
                    <div>
                        <span class="section-kicker">Stay updated</span>
                        <h2>Subscribe for weekly deals.</h2>
                        <p>Use the newsletter area to capture leads and keep the design fresh without clutter.</p>
                    </div>

                    <div class="newsletter-form" role="form" aria-label="Newsletter signup">
                        <input type="email" placeholder="Enter your email address" aria-label="Email address">
                        <button type="button">Subscribe</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--muted" id="reviews">
            <div class="container">
                <div class="section-header">
                    <span class="section-kicker">Social proof</span>
                    <h2>What Customers Say</h2>
                    <p>Testimonials are set up as compact cards with avatars, readable text, and enough contrast for desktop use.</p>
                </div>

                <div class="testimonial-grid">
                    <article class="testimonial-card">
                        <p class="testimonial-quote">
                            I can find essentials faster, and the layout feels much more premium than a standard ecommerce template.
                        </p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">SJ</div>
                            <div>
                                <h4>Sarah Johnson</h4>
                                <p>Regular Customer</p>
                            </div>
                        </div>
                    </article>

                    <article class="testimonial-card">
                        <p class="testimonial-quote">
                            The product cards are clean, the sections are easy to scan, and the whole page feels modern on my laptop.
                        </p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">MB</div>
                            <div>
                                <h4>Michael Brown</h4>
                                <p>Verified Buyer</p>
                            </div>
                        </div>
                    </article>

                    <article class="testimonial-card">
                        <p class="testimonial-quote">
                            Quick commerce energy, but with a calmer and more professional look. Exactly the style I wanted for this project.
                        </p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">EW</div>
                            <div>
                                <h4>Emma Wilson</h4>
                                <p>Loyal Customer</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    <script src="{{ asset('js/common.js') }}" defer></script>
</body>
</html>
