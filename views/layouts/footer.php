<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                    <div class="footer__payment">
                        <img src="assets/img/payment-item.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__bottom">
                    <div id="button-contact-vr" class="">
                        <div id="gom-all-in-one">
                            <!-- zalo -->
                            <div id="overlay" onclick="closeOverlay()">
                                <img id="overlayImage" alt="Zalo Image" src="">
                                <button id="closeButton">Close</button>
                            </div>

                            <div id="zalo-vr" class="button-contact">
                                <div class="phone-vr">
                                    <div class="phone-vr-circle-fill"></div>
                                    <div class="phone-vr-img-circle">
                                        <a href="assets/img/zalo.jpg" onclick="showImage(event);">
                                            <img alt="Zalo" src="assets/img/zalo1.jpg" class="round-image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end zalo -->
                        <!-- Phone -->
                        <div id="phone-vr" class="button-contact">
                            <div class="phone-vr">
                                <div class="phone-vr-circle-fill"></div>
                                <div class="phone-vr-img-circle">
                                    <a href="https://www.facebook.com/alone.dev2003">
                                        <img alt="Fb" src="assets/img/fb.png" class="round-image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end phone -->
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* CSS for floating footer */
            #button-contact-vr {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
            }

            .button-contact {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background-color: #e9e9e9;
                margin-bottom: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                animation: glow 1s infinite alternate, shake 0.5s infinite;
            }

            .round-image {
                width: 60px;
                height: 60px;
                border-radius: 50%;
            }

            #overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                display: none;
                justify-content: center;
                align-items: center;
            }

            #overlayImage {
                max-width: 90%;
                max-height: 90%;
            }

            #closeButton {
                position: absolute;
                top: 10px;
                right: 10px;
            }

            @keyframes shake {
                0% {
                    transform: rotate(0deg);
                }

                25% {
                    transform: rotate(-5deg);
                }

                75% {
                    transform: rotate(5deg);
                }

                100% {
                    transform: rotate(0deg);
                }
            }

            @keyframes glow {
                0% {
                    box-shadow: 0 0 10px #00FFFF;
                }

                100% {
                    box-shadow: 0 0 20px #00FFFF, 0 0 40px #00ff00, 0 0 80px #00ff00;
                }
            }
        </style>
        <script>
            function showImage(event) {
                event.preventDefault();
                var imgSrc = event.currentTarget.href;

                // Hiển thị overlay
                var overlay = document.getElementById("overlay");
                overlay.style.display = "flex";

                // Đặt src của ảnh trong overlay thành đường dẫn của ảnh
                var overlayImage = document.getElementById("overlayImage");
                overlayImage.src = imgSrc;
            }

            function closeOverlay() {
                // Đóng overlay
                var overlay = document.getElementById("overlay");
                overlay.style.display = "none";
            }
        </script>
    </div>
    </div>
</footer>
<!-- Footer Section End -->
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>



</body>

</html>