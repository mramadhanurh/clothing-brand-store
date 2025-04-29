<!-- #FOOTER -->

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-brand">
                <a href="#" class="logo">
                    <img src="{{ asset('storage/'.$setting->image_logo_web) }}" alt="FamiliarFaces logo" width="150" height="51">
                </a>
                <p class="footer-text">
                    {{ $setting->description }}
                </p>

                <ul class="social-list">
                    <li>
                        <a href="https://web.facebook.com/{{ $setting->facebook }}" class="social-link" target="_blank" rel="noopener noreferrer">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/{{ $setting->instagram }}" class="social-link" target="_blank" rel="noopener noreferrer">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $setting->whatsapp }}" class="social-link" target="_blank" rel="noopener noreferrer">
                            <ion-icon name="logo-whatsapp"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">Information</p>
                </li>
                <li>
                    <a href="#" class="footer-link">About Company</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Payment Type</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Awards Winning</a>
                </li>
                <li>
                    <a href="#" class="footer-link">World Media Partner</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Become an Agent</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Refund Policy</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">Category</p>
                </li>
                <li>
                    <a href="#" class="footer-link">Handbags & Wallets</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Women's Clothing</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Plus Sizes</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Complete Your Look</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Baby Corner</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Man & Woman Shoe</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">Help & Support</p>
                </li>
                <li>
                    <a href="#" class="footer-link">Dealers & Agents</a>
                </li>
                <li>
                    <a href="#" class="footer-link">FAQ Information</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Return Policy</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Shipping & Delivery</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Order Tranking</a>
                </li>
                <li>
                    <a href="#" class="footer-link">List of Shops</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="copyright">
                &copy; 2025 <a href="#">Familiarfaces</a>. All Rights Reserved
            </p>
            <ul class="footer-bottom-list">
                <li>
                    <a href="#" class="footer-bottom-link">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="footer-bottom-link">Terms & Conditions</a>
                </li>
                <li>
                    <a href="#" class="footer-bottom-link">Sitemap</a>
                </li>
            </ul>
            <div class="payment">
                <p class="payment-title">We Support</p>
                <!-- <img src="{{ asset('template_frontend/assets/images/payment-img.png') }}" alt="Online payment logos" class="payment-img"> -->
            </div>
        </div>
    </div>

</footer>