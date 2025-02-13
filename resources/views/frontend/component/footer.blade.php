
<section>
    <footer class="footer" style="background-color: #8fc74a; color:white;">
        <div class="footer-middle">
            <div class="container">
                <div class="row" st>
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget widget-about">
                            <img src="frontend/assets/images/logo.png" class="footer-logo" alt="Footer Logo"
                                width="105" height="25">
                            <p style="color: white;">Praesent dapibus, neque id cursus ucibus, tortor neque egestas
                                augue, eu vulputate magna eros eu erat. </p>

                            <div class="social-icons">
                                <a href=" https://www.facebook.com/agiinigeria" target="_blank" class="social-icon" target="_blank" title="Facebook"><i
                                        class="icon-facebook-f"></i></a>


                                <a href="https://x.com/agiinigeria" class="social-icon" target="_blank" title="Twitter"><i
                                        class="icon-twitter"></i></a>

                                <a href="https://www.tiktok.com/@agiinigeria" class="social-icon" target="_blank" title="TikTok"><i
                                            class="icon-TikTok">t</i></a>

                                <a href="https://www.instagram.com/agiinigeria" class="social-icon" target="_blank" title="Instagram"><i
                                        class="icon-instagram"></i></a>
                                <a href="https://youtube.com/@agiinigeria" class="social-icon" target="_blank" title="Youtube"><i
                                        class="icon-youtube"></i></a>
                                {{-- <a href="#" class="social-icon" target="_blank" title="Pinterest"><i
                                        class="icon-pinterest"></i></a> --}}
                            </div><!-- End .soial-icons -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="/about">About Agii NG</a></li>
                                {{-- <li><a href="#">How to shop on Agii Ng</a></li>
                                <li><a href="#">FAQ</a></li> --}}
                                <li><a href="/login">Log in</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="/contact">Contact us</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                @if (auth()->user())
                                <li><a href="logout">Sign Out</a></li>
                                @else
                                <li><a href="login">Sign In </a></li>
                                @endif


                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright" style="color: white;">Copyright © 2025 Agii NG. All Rights Reserved.
                </p><!-- End .footer-copyright -->
                <figure class="footer-payments">
                        <img src="frontend/assets/images/payments.png" alt="Payment methods" width="272" height="20">
                </figure><!-- End .footer-payments -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
</section>

</div>


