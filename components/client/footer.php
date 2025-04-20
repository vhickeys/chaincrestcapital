<!--footer start-->
<footer class="app-footer">
    <div class="primary-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <img src="img/settings/<?= $webSetting['logso'] ?? 'chaincrestcapital-logo-dark.png' ?>" width="50%" class="img-fluid mb-3" alt="Chain Crest Capital  Logo">
                    <p><?= substr($webSetting['about'], 0, 200)  ?></p>
                </div>
                <div class="col-md-4 mb-md-0 mb-3 ">
                    <h6 class="text-uppercase">Services & Features</h6>
                    <ul class="list-unstyled">
                        <li> <a href="faq.php">Help center</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="how-it-works.php">How it works</a></li>
                        <li><a href="privacy.php">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 ">
                    <h6 class="text-uppercase">Company & Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="register.php">Invest</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="javascript:void(0)">Analytics(<?= web_visitor_count() ?> Web Visitors)</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="secondary-footer text-md-left text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-md-0 mb-3">
                    <p class="copyright mb-0 pb-0">&copy; Copyright <?= date('Y') ?> Chain Crest Capital, Inc.™</p>
                </div>
                <div class="col-md-6 text-md-right ">
                    <div class="social-links float-md-right">
                        <a href="https://<?= $webSetting['facebook'] ?? 'facebook.com' ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://<?= $webSetting['twitter'] ?? 'twitter.com' ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://<?= $webSetting['instagram'] ?? 'instagram.com' ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://<?= $webSetting['linkedIn'] ?? 'linkedIn.com' ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://<?= $webSetting['youtube'] ?? 'youtube.com' ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<!--js initialized-->
<script src="client/assets/vendor/jquery/jquery.min.js"></script>
<script src="client/assets/vendor/popper.min.js"></script>
<script src="client/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="client/assets/vendor/wow.min.js"></script>
<script src="client/assets/vendor/jquery.easing.min.js"></script>
<script src="client/assets/vendor/owl/owl.carousel.min.js"></script>
<script src="client/assets/vendor/jquery.countdown.min.js"></script>
<script src="client/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--<script src="client/assets/vendor/particles/particles.js"></script>-->
<!--<script src="client/assets/vendor/particles/init-particles.js"></script>-->

<!--contact form-->
<script type="text/javascript" src="client/assets/vendor/contact-form/form-validator.min.js"></script>
<script type="text/javascript" src="client/assets/vendor/contact-form/contact-form-script.js"></script>

<!--init scripts-->
<script src="client/assets/js/scripts.js"></script>

</body>


</html>