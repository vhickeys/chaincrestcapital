<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4 order-1 order-lg-4 order-xl-1">
                <!-- footer logo -->
                <div class="footer__logo">
                    <img src="img/settings/<?= $webSetting['logo'] ?? 'tradeeclipse__var3.png' ?>" alt="Chain Crest Capital  Logo">
                </div>
                <!-- end footer logo -->

                <!-- footer tagline -->
                <p class="footer__tagline"><?= substr($webSetting['about'], 0, 200)  ?></p>
                <!-- end footer tagline -->

                <!-- footer currencies -->
                <div class="footer__currencies">
                    <i class="ti ti-currency-bitcoin"></i>
                    <i class="ti ti-currency-ethereum"></i>
                    <i class="ti ti-currency-litecoin"></i>
                    <i class="ti ti-currency-solana"></i>
                    <i class="ti ti-currency-dogecoin"></i>
                </div>
                <!-- end footer currencies -->
            </div>

            <!-- navigation -->
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-3 order-md-2 order-lg-2 order-xl-3 offset-md-2 offset-lg-0">
                <h6 class="footer__title">Company</h6>
                <div class="footer__nav">
                    <a href="index.php">Home</a>
                    <a href="about.php">About Chain Crest Capital </a>
                    <a href="login.php">Login</a>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-6 col-xl-4 order-2 order-md-3 order-lg-1 order-xl-2">
                <div class="row">
                    <div class="col-12">
                        <h6 class="footer__title">Services & Features</h6>
                    </div>

                    <div class="col-12">
                        <div class="footer__nav">
                            <a href="register.php">Invest</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="javascript:void(0)">Analytics(<?= web_visitor_count() ?> Web Visitors)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-4 order-md-4 order-lg-3 order-xl-4">
                <h6 class="footer__title">Support</h6>
                <div class="footer__nav">
                    <a href="faq.php">Help center</a>
                    <a href="about.php">How it works</a>
                    <a href="privacy.php">Privacy policy</a>
                </div>
            </div>
            <!-- end navigation -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="footer__content">
                    <!-- footer social -->
                    <div class="footer__social">
                        <a href="https://<?= $webSetting['facebook'] ?? 'facebook.com' ?>" target="_blank"><i class="ti ti-brand-facebook"></i></a>
                        <a href="https://<?= $webSetting['twitter'] ?? 'twitter.com' ?>" target="_blank"><i class="ti ti-brand-x"></i></a>
                        <a href="https://<?= $webSetting['instagram'] ?? 'instagram.com' ?>" target="_blank"><i class="ti ti-brand-instagram"></i></a>
                        <a href="https://<?= $webSetting['linkedIn'] ?? 'linkedIn.com' ?>" target="_blank"><i class="ti ti-brand-linkedin"></i></a>
                        <a href="https://<?= $webSetting['youtube'] ?? 'youtube.com' ?>" target="_blank"><i class="ti ti-brand-youtube"></i></a>
                    </div>
                    <!-- end footer social -->

                    <!-- footer copyright -->
                    <small class="footer__copyright">© Chain Crest Capital, <?= date('Y') ?>.</small>
                    <!-- end footer copyright -->
                </div>
            </div>
        </div>
    </div>

    <!-- design elements -->
    <span class="screw screw--footer screw--footer-bl"></span>
    <span class="screw screw--footer screw--footer-br"></span>
    <span class="screw screw--footer screw--footer-tr"></span>
    <span class="screw screw--footer screw--footer-tl"></span>
</footer>
<!-- end footer -->

<!-- ask modal -->
<div class="modal modal--auto fade" id="modal-ask" tabindex="-1" aria-labelledby="modal-ask" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title">Ask a question</h4>

                <p class="modal__text">Our support team is always on call, and ready to help with all your
                    questions!</p>


                <form class="modal__form">
                    <div id="userAlert">

                    </div>

                    <div class="form__group">
                        <input id="name" name="name" type="text" class="form__input" placeholder="Name">
                    </div>

                    <div class="form__group">
                        <input id="email" name="email" type="text" class="form__input" placeholder="Email">
                    </div>

                    <input id="phone" type="hidden" value="FAQ" name="phone" class="form__input" placeholder="800 543 - 2109">

                    <input id="subject" type="hidden" value="FAQ" name="subject" class="form__input" placeholder="Ex. Support">


                    <div class="form__group">
                        <textarea id="message" name="message" class="form__textarea" placeholder="Your question"></textarea>
                    </div>

                    <button id="contact-us" class="form__btn" type="button">Send</button>
                </form>

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end ask modal -->