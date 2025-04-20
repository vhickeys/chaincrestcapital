<?php
require('webadmin/classes/functions.php');

$title = "Homepage";
$current_page = "index.php";
include 'components/client/header.php';

$users_count = $record->countRecords("users");
$packages = array_slice($package->getPackagesStatus("packages"), 0, 3);
$latestPackage = $package->getLatestPackage("packages");

?>

<!--banner start-->
<div class="hero-banner creative-banner" id="home">
    <div class="bubble-set">
        <div class="bubble-lg"></div>
        <div class="bubble-md"></div>
        <div class="bubble-sm"></div>
    </div>

    <div id="particles-js"></div>

    <div class="hero-text ">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-12">
                    <h1 class="hero-title  text-light"> Profitable Crypto-Backed Investments</h1>
                    <p class="here-sub-title  text-light">Our platform is designed to help you grow your wealth through secure cryptocurrency transactions without the confusion and risk of traditional crypto trading.</p>
                    <div class="mb-3 mb-lg-3">
                        <a href="register.php" class="btn btn-gradient btn-pill text-uppercase mr-3 mb-3 ">Sign Up</a>
                        <a href="login.php" class="btn btn-white btn-pill mb-3 text-uppercase ">Login</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <img class="banner-img" src="client/assets/img/banner-thumb.png" alt="Chain Crest Capital" />
                </div>
            </div>
        </div>
    </div>
    <div class="hero-footer" style="background-image: url('assets/img/banner-curve.png')"></div>
</div>
<!--banner end-->


<div id="token">
    <!--section start-->
    <section class="section-gap">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5 col-md-12 col-gap mb-md-0 mb-3">
                    <div class="row text-center mb-lg-0 mb-5">
                        <div class="col-6 mt-lg-5 pt-lg-5 mt-0 pt-0">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card box-show py-md-5 ">
                                        <div class="card-body">
                                            <h3 class="text-paste-color"><?= intval($users_count) + 1500 ?></h3>
                                            <p class="mb-0">Users</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card box-show py-md-5 ">
                                        <div class="card-body">
                                            <h3 class="text-paste-color">1300 +</h3>
                                            <p class="mb-0">Active Traders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card box-show py-md-5 ">
                                        <div class="card-body">
                                            <h3 class="text-paste-color">$25</h3>
                                            <p class="mb-0">Starting Bonus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card box-show py-md-5 ">
                                        <div class="card-body">
                                            <h3 class="text-paste-color">$49.7m +</h3>
                                            <p class="mb-0">Total Investments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-gap">
                    <h2 class="mb-md-5 ">About Chain Crest Capital</h2>

                    <p class="">Chain Crest Capital is a modern investment platform that combines blockchain-style transparency with structured financial growth strategies. While we resemble crypto trading platforms, our focus is delivering ROI-based investment plans all powered through secure wallet-based transactions.
                        <br><br>
                        We accept multiple cryptocurrencies and ensure that every transaction is encrypted and verified via wallet addresses.
                    </p>
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5 class="text-purple-color">Why Chain Crest Capital?</h5>
                            <p class="mb-3">No experience needed. No complicated charts. Just real returns.</p>
                            <ul class="list-unstyled">
                                <li>- Crypto-Only Payments</li>
                                <li>- Verified ROI Plans</li>
                                <li>- Instant Withdrawals</li>
                            </ul>
                        </div>
                        <div class="col-md-6 ">
                            <h5 class="text-paste-color">What We Offer</h5>
                            <p class="mb-3">You invest. We protect. Your peace of mind is our top priority.</p>
                            <ul class="list-unstyled">
                                <li>- Secure Crypto Investments</li>
                                <li>- Profitable Investment Plans</li>
                                <li>- Personal Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>


<!--section start-->
<div id="about">
    <section class="section-gap section-gray-bg">
        <div class="container">
            <!--currency icons-->
            <div class="row justify-content-md-center text-center accept-card">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="">We Accept</h3>
                            <p class=" "> This following currencies right now.</p>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body py-md-4"><img src="client/assets/img/svg-icons/bitcoin.svg" width="70" alt="Chain Crest Capital" /></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body py-md-4"><img src="client/assets/img/svg-icons/dash.svg" width="70" alt="Chain Crest Capital" /></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body py-md-4"><img src="client/assets/img/svg-icons/Ethereum.svg" width="70" alt="Chain Crest Capital" /></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body py-md-4"><img src="client/assets/img/svg-icons/ripple.svg" width="70" alt="Chain Crest Capital" /></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body py-md-4"><img src="client/assets/img/svg-icons/litecoin.svg" width="70" alt="Chain Crest Capital" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--currency icons-->
        </div>
    </section>

</div>
<!--section end-->

<!--partner section start-->
<!-- <section class="section-gap-sm">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm col-6">
                <div class="partner-brand ">
                    <img src="client/assets/img/c1.png" alt="Chain Crest Capital">
                </div>
            </div>
            <div class="col-sm col-6">
                <div class="partner-brand ">
                    <img src="client/assets/img/c2.png" alt="Chain Crest Capital">
                </div>
            </div>
            <div class="col-sm col-6">
                <div class="partner-brand ">
                    <img src="client/assets/img/c3.png" alt="Chain Crest Capital">
                </div>
            </div>
            <div class="col-sm col-6">
                <div class="partner-brand ">
                    <img src="client/assets/img/c4.png" alt="Chain Crest Capital">
                </div>
            </div>
            <div class="col-sm col-6">
                <div class="partner-brand ">
                    <img src="client/assets/img/c5.png" alt="Chain Crest Capital">
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--partner section end-->

<div id="roadmap">
    <!--section start-->
    <section class="section-gap road-map-bg">
        <div class="container">
            <!--section title-->
            <div class="row text-center">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="">Roadmap</h3>
                        <p class="">Our milestones we are going towards rapidly to achieve that</p>
                    </div>
                </div>
            </div><!--section title-->
            <div class="row text-center">
                <div class="owl-carousel owl-theme js_road_map ">
                    <div class="roadmap-timeline-list">
                        <div class="rm-info">Technical & Legal works begin</div>
                        <div class="rm-date"><span>June 2018</span></div>
                    </div>
                    <div class="roadmap-timeline-list alt">
                        <div class="rm-date"><span>September 2018</span></div>
                        <div class="rm-info">Alpha crypto chain</div>
                    </div>
                    <div class="roadmap-timeline-list active">
                        <div class="rm-info">Chain Crest Capital Begins</div>
                        <div class="rm-date"><span>December 2018 [Now]</span></div>
                    </div>
                    <div class="roadmap-timeline-list alt ">
                        <div class="rm-date"><span>January 2019</span></div>
                        <div class="rm-info">Full Public crypto chain start</div>
                    </div>
                    <div class="roadmap-timeline-list">
                        <div class="rm-info">Development begins</div>
                        <div class="rm-date"><span>March 2019</span></div>
                    </div>

                    <div class="roadmap-timeline-list alt">
                        <div class="rm-date"><span>June 2019</span></div>
                        <div class="rm-info">Alpha crypto chain</div>
                    </div>
                    <div class="roadmap-timeline-list">
                        <div class="rm-info">Technical & Leagal works beign</div>
                        <div class="rm-date"><span>March 2019</span></div>
                    </div>
                    <div class="roadmap-timeline-list alt">
                        <div class="rm-date"><span>August 2019</span></div>
                        <div class="rm-info">Chain Crest Capital Begins</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>

<div id="ico">
    <!--section start-->
    <section class="section-gap">
        <div class="container">
            <!--section title-->
            <div class="row text-center">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="">Why Choose Chain Crest Capital?</h2>
                        <p class=" "> to find the ones who get it right. We trust our future with experts everyday</p>
                    </div>
                </div>
            </div><!--section title-->
            <div class="row text-md-left text-center">
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-money f-icon text-paste-color"></i>
                    <h5 class="my-4">Crypto-Only, Globally Accessible</h5>
                    <p>We operate on a 100% cryptocurrency model, meaning you can invest and withdraw from anywhere in the world instantly. No delays from traditional banks, no third-party gateways, and zero conversion headaches. Whether you're in New York, Nairobi, or New Delhi, you’re just a wallet address away from your next investment.</p>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-money-bag f-icon text-paste-color"></i>
                    <h5 class="my-4">ROI-Focused Investment Plans</h5>
                    <p>We’re not just promising dreams, we provide specific ROI structures backed by a proven strategy. Every plan is clear, time-bound, and directly linked to blockchain-powered security protocols. You choose the plan, send crypto, and watch your returns grow, no guesswork, no hidden terms.</p>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-office-bag f-icon text-paste-color"></i>
                    <h5 class="my-4">Real-Time Smart Notifications</h5>
                    <p>Get instant updates on deposits, investment activations, profit milestones, and withdrawals. Our notification system ensures you're never left in the dark. You’ll always know when your investment cycle starts, when it's due to mature, and when your funds are ready.</p>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-refresh-time f-icon text-paste-color"></i>
                    <h5 class="my-4">Dedicated 24/7 Support Team</h5>
                    <p>We don’t do bots when it matters most. Our trained customer success team is available around the clock to help with anything from crypto payment issues to tracking your returns. Whether you reach out via chat, email, or Telegram, you’ll always find a responsive human ready to assist.</p>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-bond f-icon text-paste-color"></i>
                    <h5 class="my-4">Transparent Operations & Performance Tracking</h5>
                    <p>Every transaction is recorded. Every cycle is traceable. Every return is verifiable. Our platform allows you to view historical performance, plan comparisons, cycle countdowns, and much more — all in one elegant dashboard. It’s your money, and you deserve full control over it.</p>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <i class="bi bi-shield f-icon text-paste-color"></i>
                    <h5 class="my-4">End-to-End Security & Platform Integrity</h5>
                    <p>Our platform is designed with security at the core. From DDoS protection to SSL encryption and wallet integrity checks, your funds are safe throughout the investment cycle. We also run regular internal audits and smart contract reviews to keep your experience risk-free.</p>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>

<!--section start-->
<section class="section-gap section-gray-bg">
    <div class="container">
        <div class="row d-flex align-items-center mb-lg-5 mb-md-3 pb-lg-5 pb-0">
            <div class="col-md-7 col-gap">
                <h6 class=" pre-title ls2 text-uppercase">Automated Growth Cycle-</h6>
                <h2 class="mb-md-5 text-purple-color ">Invest once. Let the system handle the rest.</h2>
                <p class=" ">At Chain Crest Capital, we’ve eliminated manual tracking and guesswork. The moment your investment is confirmed via crypto wallet, our automated system kicks into action — tracking every phase of your investment cycle in real-time. <br><br>
                    Our smart cycle engine ensures you never miss an opportunity to grow your capital. It’s like having a virtual wealth manager, on autopilot, 24/7.

                </p>
                <a href="register.php" class="btn btn-purple btn-pill text-uppercase ">get started</a>
            </div>
            <div class="col-md-5 col-gap ">
                <img class="my-5" src="client/assets/img/art3.png" alt="Chain Crest Capital" />
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-7 col-gap ">
                <h6 class="  pre-title ls2 text-uppercase">Personal Investment Dashboard-</h6>
                <h2 class="text-paste-color mb-md-5 ">Full transparency. Total control. Beautifully designed.</h2>
                <p class=" ">We’ve designed a dashboard that’s both powerful and intuitive. Whether you’re a beginner or a seasoned investor, your Chain Crest Capital dashboard gives you complete clarity at every level. <br><br>
                    All displayed in a sleek, responsive interface that works beautifully across mobile, tablet, and desktop. With Chain Crest Capital, your money works — and you’re always in the loop.

                </p>
            </div>
            <div class="col-md-5 col-gap mb-md-0 mb-3 order-md-first">
                <div class="">
                    <img src="client/assets/img/art4.png" alt="Chain Crest Capital" />
                </div>
            </div>
        </div>
    </div>
</section>
<!--section end-->

<!--section start-->
<section class="section-gap section-dark-bg">
    <div class="container">
        <!--section title-->
        <div class="row text-center">
            <div class="col-12">
                <div class="section-title">
                    <h2 class=" ">Investment Plans</h2>
                    <p class=" ">Our Investment Plans Tailored to You</p>
                </div>
            </div>
        </div><!--section title-->
        <div class="row d-flex align-items-center">
            <?php
            if ($packages != null) {
                foreach ($packages as $package) {
            ?>
                    <div class="col-md-6 col-gap">
                        <div class="card mb-5 text-dark ">
                            <img class="card-img-top" src="img/packages/<?= $package['image'] ?>" alt="Chain Crest Capital">
                            <div class="card-body p-lg-5">
                                <h5 class="card-title">
                                    <a href="login.php" class="text-dark"><?= $package['name'] ?></a>
                                </h5>
                                <p class="card-text"><?= substr($package['description'], 0, 60) ?> ...</p>
                                <p class="card-text">
                                    <a href="login.php" class="text-purple-color"><small><i class="fa fa-check-square-o pr-1"></i> <?= $package['amount'] ?> Package Amount</small></a> <br>
                                    <a href="login.php" class="text-purple-color"><small><i class="fa fa-check-square-o pr-1"></i> <?= $package['bonus'] ?> Bonus Balance</small></a> <br>
                                    <a href="login.php" class="text-purple-color"><small><i class="fa fa-check-square-o pr-1"></i> + <?= $package['daily_profit'] ?> Daily Profit</small></a> <br>
                                    <a href="login.php" class="text-purple-color"><small><i class="fa fa-check-square-o pr-1"></i> <?= $package['days'] ?> Days</small></a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>

                <div class="col-md-12">
                    <div class="alert alert-info">
                        Investment packages will be displayed as soon as your registration is confirmed!
                    </div>
                </div>

            <?php
            }
            ?>
            <div class="col-12 text-center mt-md-5 mt-3">
                <a href="login.php" class="btn btn-purple btn-pill text-uppercase ">explore all plans</a>
            </div>
        </div>
    </div>
</section>
<!--section end-->

<!--faq section start-->
<section class="section-gap pb-0">
    <div class="container">
        <!--section title-->
        <div class="row text-center">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="">Frequently Asked Questions</h2>
                    <p class="">Here are answers to some of the most common questions about Chain Crest Capital and our crypto-based investment plans.</p>
                </div>
            </div>
        </div><!--section title-->
        <div class="row">
            <div class="col-md-6 col-gap">
                <div class="accordion " id="accordion-1">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-1">
                                    What is Chain Crest Capital?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-1" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>Chain Crest Capital is a crypto-powered investment platform offering ROI-focused investment plans. Users deposit cryptocurrency to a dedicated wallet address and receive returns after a set cycle, with complete transparency and automation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-2">
                                    What kind of returns can I expect?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-2" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>Each investment plan offers fixed ROI percentages depending on the amount and duration. Returns are clearly stated before you invest, with no hidden fees. For example, investing $100 may yield up to $135 after 14 days, depending on the plan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-3">
                                    Are there any geographical restrictions?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-3" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>No. Chain Crest Capital is globally accessible. As long as you have internet access and a supported cryptocurrency wallet, you can participate — no matter your location.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-4">
                                    What cryptocurrencies do you accept?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-4" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>We currently accept major cryptocurrencies including Bitcoin (BTC), Ethereum (ETH), and USDT (TRC20 & ERC20). All payments are made via wallet addresses provided on your dashboard upon plan selection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-gap">
                <div class="accordion " id="accordion-2">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-1">
                                    How do I deposit and start investing?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-1" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>After registering and logging into your dashboard, select an investment plan. You’ll be given a unique wallet address to send your crypto. Once the payment is confirmed on the blockchain, your investment cycle begins automatically.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-2">
                                    How and when can I withdraw my earnings?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-2" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>Once your investment cycle is complete, your dashboard will notify you. You can withdraw your returns directly to your crypto wallet instantly or choose to reinvest into a new plan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-3">
                                    Is my investment safe and secure?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-3" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>Yes. We use wallet-level encryption, DDoS protection, and a fully audited smart infrastructure. All transactions are recorded on the blockchain, and we do not store private keys or funds on centralized platforms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-4">
                                    Do I need any trading experience to use the platform?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-4" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>No trading skills are required. Our investment plans are automated and beginner-friendly. You simply choose a plan, deposit funds, and let the system handle the rest. Your dashboard will keep you updated every step of the way.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-md-5 mt-3 sm-txt">
                <a href="faq.php" class="view-link">View all Questions</a>
            </div>
        </div>
    </div>
</section>
<!--faq section end-->


<?php
include 'components/client/footer.php';
?>