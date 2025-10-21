</div> <!-- Close container -->
</main> <!-- Close main -->

<!-- Footer Ad -->
<!-- <div class="container text-center mt-4">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=YOUR_ADSENSE_ID"
        crossorigin="anonymous"></script>
    <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="YOUR_ADSENSE_ID"
        data-ad-slot="FOOTER_SLOT"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div> -->

<footer class="bg-dark text-light">
    <div class="container py-5">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-uppercase"><?php echo isset($trans) ? $trans->get('about_us') : 'About Us'; ?></h5>
                <p class="text-muted">
                    <?php echo isset($trans) ? $trans->get('footer_description') : 'Your trusted platform for translation and dictionary services. We help bridge language barriers between English and Indonesian.'; ?>
                </p>
                <div class="social-links">
                    <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-uppercase"><?php echo isset($trans) ? $trans->get('quick_links') : 'Quick Links'; ?>
                </h5>
                <ul class="list-unstyled">
                    <!-- <li class="mb-2"><a href="/"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('home') : 'Home'; ?></a>
                    </li> -->
                    <li class="mb-2"><a href="/contact"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('contact') : 'Contact Us'; ?></a>
                    </li>
                    <!-- <li class="mb-2"><a href="/about"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('about') : 'About'; ?></a>
                    </li> -->
                    <!-- <li class="mb-2"><a href="/services"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('services') : 'Services'; ?></a>
                    </li> -->
                </ul>
            </div>

            <!-- Legal -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-uppercase"><?php echo isset($trans) ? $trans->get('legal') : 'Legal'; ?></h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/terms"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('terms') : 'Terms of Use'; ?></a>
                    </li>
                    <li class="mb-2"><a href="/privacy"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('privacy') : 'Privacy Policy'; ?></a>
                    </li>
                    <!-- <li class="mb-2"><a href="/cookies"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('cookies') : 'Cookie Policy'; ?></a>
                    </li> -->
                    <!-- <li class="mb-2"><a href="/disclaimer"
                            class="text-muted text-decoration-none"><?php echo isset($trans) ? $trans->get('disclaimer') : 'Disclaimer'; ?></a>
                    </li> -->
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-uppercase"><?php echo isset($trans) ? $trans->get('contact_us') : 'Contact Us'; ?></h5>
                <ul class="list-unstyled text-muted">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <?php echo isset($trans) ? $trans->get('address') : '123 Street, City, Country'; ?>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        <?php echo isset($trans) ? $trans->get('phone') : '+1 234 567 890'; ?>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        <?php echo isset($trans) ? $trans->get('email') : 'info@example.com'; ?>
                    </li>
                </ul>

                <!-- Newsletter Signup -->
                <div class="newsletter mt-4">
                    <h6 class="text-uppercase"><?php echo isset($trans) ? $trans->get('newsletter') : 'Newsletter'; ?>
                    </h6>
                    <p class="text-muted small mb-2">
                        <?php echo isset($trans) ? $trans->get('newsletter_desc') : 'Subscribe to get updates on our latest features.'; ?>
                    </p>
                    <div class="input-group input-group-sm">
                        <input type="email" class="form-control"
                            placeholder="<?php echo isset($trans) ? $trans->get('email_placeholder') : 'Your email address'; ?>">
                        <button class="btn btn-primary"
                            type="button"><?php echo isset($trans) ? $trans->get('subscribe') : 'Subscribe'; ?></button>
                    </div>
                </div>
            </div>
        </div>

        <hr class="bg-light my-4">

        <!-- Bottom Footer -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <p class="text-muted mb-0">
                    &copy; <?php echo date('Y'); ?>
                    <?php echo isset($trans) ? $trans->get('company_name') : 'Your Company Name'; ?>.
                    <?php echo isset($trans) ? $trans->get('all_rights_reserved') : 'All rights reserved.'; ?>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="payment-methods">
                    <span
                        class="text-muted me-2 small"><?php echo isset($trans) ? $trans->get('we_accept') : 'We accept:'; ?></span>
                    <i class="fab fa-cc-visa text-muted me-2"></i>
                    <i class="fab fa-cc-mastercard text-muted me-2"></i>
                    <i class="fab fa-cc-paypal text-muted me-2"></i>
                    <i class="fab fa-cc-apple-pay text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button onclick="topFunction()" id="backToTop" class="btn btn-primary position-fixed"
        style="bottom: 20px; right: 20px; display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script src="/assets/js/script.js"></script>
</body>

</html>