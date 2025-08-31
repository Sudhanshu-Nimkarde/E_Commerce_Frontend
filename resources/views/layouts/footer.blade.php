<!-- FOOTER -->
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

<!-- Footer Scripts -->
<script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.querySelector('.hamburger');
        if (hamburgerButton) {
            hamburgerButton.addEventListener('click', function() {
                const navLinks = document.querySelector('.nav-links');
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            });
        }
    });
</script>