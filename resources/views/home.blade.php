<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Your One-Stop Shopping Destination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <span><i class="fas fa-phone"></i> +1 234 567 890</span>
                <span><i class="fas fa-envelope"></i> info@shopease.com</span>
            </div>
            <div class="top-right">
                <a href="#"><i class="fas fa-user"></i> Login</a>
                <a href="#"><i class="fas fa-heart"></i> Wishlist</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="header-main">
            <div class="container">
                <div class="logo">Shop<span>Ease</span></div>
                <div class="search-bar">
                    <input type="text" placeholder="Search for products...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="header-right">
                    <div class="icon-box">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-heart"></i>
                        <span class="badge">2</span>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge">3</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav>
            <div class="container">
                {{-- <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div> --}}
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Deals</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="nav-right">
                    <i class="fas fa-headset"></i> Customer Support
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->   
    <section class="hero">
        <img src="{{ asset('images/home/home-main.jpg') }}" alt="Hero Background" class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1>Shop the Latest Trends</h1>
                <p>Discover amazing products with great deals. Quality items for your everyday needs.</p>
                <a href="#" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Popular Categories</h2>
            </div>
            <div class="categories">
                <a href="#" class="category-item">
                    <img src="/api/placeholder/300/200" alt="Electronics">
                    <div class="category-name">Electronics</div>
                </a>
                <a href="#" class="category-item">
                    <img src="/api/placeholder/300/200" alt="Fashion">
                    <div class="category-name">Fashion</div>
                </a>
                <a href="#" class="category-item">
                    <img src="/api/placeholder/300/200" alt="Home & Kitchen">
                    <div class="category-name">Home & Kitchen</div>
                </a>
                <a href="#" class="category-item">
                    <img src="/api/placeholder/300/200" alt="Beauty">
                    <div class="category-name">Beauty</div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="section featured-products">
        <div class="container">
            <div class="section-header">
                <h2>Featured Products</h2>
            </div>
            <div class="products">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="/api/placeholder/300/300" alt="Product 1">
                        <div class="product-badge">New</div>
                        <div class="product-icons">
                            <div class="product-icon"><i class="far fa-heart"></i></div>
                            <div class="product-icon"><i class="fas fa-eye"></i></div>
                            <div class="product-icon"><i class="fas fa-sync-alt"></i></div>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-title">Wireless Bluetooth Headphones</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(4.5)</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="original-price">$89.99</span>
                                <span class="price">$69.99</span>
                            </div>
                            <button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="/api/placeholder/300/300" alt="Product 2">
                        <div class="product-badge">-20%</div>
                        <div class="product-icons">
                            <div class="product-icon"><i class="far fa-heart"></i></div>
                            <div class="product-icon"><i class="fas fa-eye"></i></div>
                            <div class="product-icon"><i class="fas fa-sync-alt"></i></div>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-title">Smart Watch Series 5</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(4.0)</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="original-price">$199.99</span>
                                <span class="price">$159.99</span>
                            </div>
                            <button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="/api/placeholder/300/300" alt="Product 3">
                        <div class="product-icons">
                            <div class="product-icon"><i class="far fa-heart"></i></div>
                            <div class="product-icon"><i class="fas fa-eye"></i></div>
                            <div class="product-icon"><i class="fas fa-sync-alt"></i></div>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-title">Premium Leather Wallet</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(5.0)</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">$49.99</span>
                            </div>
                            <button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="/api/placeholder/300/300" alt="Product 4">
                        <div class="product-badge">Hot</div>
                        <div class="product-icons">
                            <div class="product-icon"><i class="far fa-heart"></i></div>
                            <div class="product-icon"><i class="fas fa-eye"></i></div>
                            <div class="product-icon"><i class="fas fa-sync-alt"></i></div>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-title">Portable Bluetooth Speaker</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(3.5)</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="original-price">$79.99</span>
                                <span class="price">$59.99</span>
                            </div>
                            <button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal of the Day -->
    <section class="section deal">
        <div class="container">
            <div class="deal-content">
                <div class="deal-image">
                    <img src="/api/placeholder/600/400" alt="Deal of the Day">
                </div>
                <div class="deal-text">
                    <h3>Deal of the Day</h3>
                    <h2>Premium Noise Cancelling Headphones</h2>
                    <p>Experience crystal clear sound with our premium noise cancelling headphones. Perfect for music lovers and professionals who demand the best audio quality.</p>
                    <div class="timer">
                        <div class="timer-box">
                            <span class="time">08</span>
                            <span class="label">Days</span>
                        </div>
                        <div class="timer-box">
                            <span class="time">17</span>
                            <span class="label">Hours</span>
                        </div>
                        <div class="timer-box">
                            <span class="time">42</span>
                            <span class="label">Minutes</span>
                        </div>
                        <div class="timer-box">
                            <span class="time">15</span>
                            <span class="label">Seconds</span>
                        </div>
                    </div>
                    
                    <div class="price">
                        <span class="original-price">$299.99</span>
                        <span class="price">$199.99</span>
                    </div>
                    
                    <a href="#" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <h2>Subscribe to Our Newsletter</h2>
            <p>Get timely updates from your favorite products and special offers.</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Your email address">
                <button type="submit">Subscribe</button>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Customers Say</h2>
            </div>
            <div class="testimonial-grid">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        I've been shopping here for years and the quality of products never disappoints. The customer service is outstanding too!
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Author 1">
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Regular Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        Fast shipping and secure packaging. I received my order in perfect condition and much faster than expected.
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Author 2">
                        </div>
                        <div class="author-info">
                            <h4>Michael Brown</h4>
                            <p>Verified Buyer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        The variety of products is amazing. I always find exactly what I'm looking for at reasonable prices.
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Author 3">
                        </div>
                        <div class="author-info">
                            <h4>Emma Wilson</h4>
                            <p>Loyal Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <!-- About -->
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>ShopEase is your one-stop destination for all your shopping needs. We offer high-quality products at competitive prices with exceptional customer service.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Customer Service -->
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul class="footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="contact-info footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Commerce St, New York, NY 10001</li>
                        <li><i class="fas fa-phone"></i> +1 234 567 890</li>
                        <li><i class="fas fa-envelope"></i> info@shopease.com</li>
                        <li><i class="fas fa-clock"></i> Monday-Friday: 9am-8pm</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 ShopEase. All Rights Reserved. | Designed with <i class="fas fa-heart"></i> for shopping enthusiasts</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for the countdown timer
        function updateTimer() {
            const endDate = new Date();
            endDate.setDate(endDate.getDate() + 8);
            endDate.setHours(endDate.getHours() + 17);
            endDate.setMinutes(endDate.getMinutes() + 42);
            endDate.setSeconds(endDate.getSeconds() + 15);
            
            const now = new Date();
            const diff = endDate - now;
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.querySelector('.timer-box:nth-child(1) .time').textContent = days.toString().padStart(2, '0');
            document.querySelector('.timer-box:nth-child(2) .time').textContent = hours.toString().padStart(2, '0');
            document.querySelector('.timer-box:nth-child(3) .time').textContent = minutes.toString().padStart(2, '0');
            document.querySelector('.timer-box:nth-child(4) .time').textContent = seconds.toString().padStart(2, '0');
        }
        
        // Update the timer every second
        setInterval(updateTimer, 1000);
        
        // Mobile menu toggle functionality
        document.querySelector('.hamburger').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });
        
        // Product hover effect for mobile (touch)
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('touchstart', function() {
                const icons = this.querySelector('.product-icons');
                icons.style.opacity = '1';
                icons.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>