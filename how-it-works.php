<?php
require('webadmin/classes/functions.php');

$title = "How It Works";
$current_page = "how-it-works";
include 'components/client/header.php';

?>

<!--banner start-->
<div class="hero-banner creative-banner" style="height: 70% !important;">
    <div class="bubble-set">
        <div class="bubble-lg"></div>
        <div class="bubble-md"></div>
        <div class="bubble-sm"></div>
    </div>

    <div id="particles-js"></div>

    <div class="hero-text ">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h1 class="hero-title  text-light"> How It Works</h1>
            </div>
        </div>
    </div>
    <div class="hero-footer" style="background-image: url('assets/img/banner-curve.png')"></div>
</div>
<!--banner end-->

<!--section start-->
<section class="section-gap section-gray-bg">
    <div class="container">
        <div class="row d-flex align-items-center mb-lg-5 mb-md-3 pb-lg-5 pb-0">
            <div class="col-md-7 col-gap">
                <h6 class=" pre-title ls2 text-uppercase">Register Instantly-</h6>
                <h2 class="mb-md-5 text-purple-color ">Create your free account in under 2 minutes.</h2>
                <p class=" ">Getting started with Chain Crest Capital is simple and hassle-free. Just fill out a quick registration form with your basic details, no long processes or hidden requirements. Your secure dashboard will be ready instantly, giving you full access to our investment plans and platform tools.</p>
                <a href="register.php" class="btn btn-purple btn-pill text-uppercase ">Create an Account</a>
            </div>
            <div class="col-md-5 col-gap ">
                <img class="my-5" src="client/assets/img/art3.png" alt="Chain Crest Capital" />
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-7 col-gap ">
                <h6 class="  pre-title ls2 text-uppercase">Fund Your Wallet-</h6>
                <h2 class="text-paste-color mb-md-5 ">Choose your investment plan and send crypto to your unique wallet address.</h2>
                <p class=" ">Select from a range of flexible investment plans tailored to your financial goals. Once you've chosen a plan, you’ll receive a secure, unique wallet address to transfer your preferred cryptocurrency. All transactions are encrypted and processed swiftly for maximum security and transparency.</p>
            </div>
            <div class="col-md-5 col-gap mb-md-0 mb-3 order-md-first">
                <div class="">
                    <img src="client/assets/img/art4.png" alt="Chain Crest Capital" />
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-center mt-5 pt-5 mb-md-3 pb-lg-5">
            <div class="col-md-7 col-gap">
                <h6 class=" pre-title ls2 text-uppercase">Watch Your Wealth Grow-</h6>
                <h2 class="mb-md-5 text-purple-color ">Track your earnings in real-time and withdraw profit once your cycle ends.</h2>
                <p class=" ">Sit back and monitor your investment progress through your personalized dashboard. You’ll see real-time growth updates, performance insights, and automated cycle tracking. Once your investment matures, you can withdraw your profits instantly or reinvest to keep growing your wealth.</p>
                <a href="login.php" class="btn btn-purple btn-pill text-uppercase ">Login Your Account</a>
            </div>
            <div class="col-md-5 col-gap ">
                <img class="my-5" src="client/assets/img/art3.png" alt="Chain Crest Capital" />
            </div>
        </div>
    </div>
</section>
<!--section end-->

<?php

include 'components/client/footer.php';

?>