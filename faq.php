<?php
require('webadmin/classes/functions.php');

$title = "Frequently Asked Questions";
$current_page = "faq";
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
                <h1 class="hero-title  text-light"> FAQ</h1>
                <p class="here-sub-title  text-light">Welcome to our FAQ page. We’ve compiled answers to the most common questions about Chain Crest Capital, how our crypto-based investment platform works, and what you can expect.</p>
            </div>
        </div>
    </div>
    <div class="hero-footer" style="background-image: url('assets/img/banner-curve.png')"></div>
</div>
<!--banner end-->

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
                    <!-- Additional FAQs for Left Column (accordion-1) -->
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-5">
                                    Can I cancel my investment after payment?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-5" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>Once a payment is confirmed on the blockchain, the investment cycle is locked and cannot be canceled. This is to ensure transparency and automation within the smart contract ecosystem.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-6">
                                    How can I contact support?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-6" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>You can reach our 24/7 support team via live chat on the dashboard or email at support@chaincrestcapital.com. We typically respond within minutes.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-7">
                                    What is the minimum and maximum investment amount?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-7" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>The minimum investment is $50 worth of crypto, while the maximum depends on the plan. Details are always visible when selecting a plan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-8">
                                    Do you offer referral bonuses?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-8" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>Yes! Our referral program rewards you with bonuses for every user who registers and invests through your unique referral link. Payouts are instant and viewable on your dashboard.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-1-9">
                                    Are there any hidden charges?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-1-9" class="collapse" data-parent="#accordion-1">
                            <div class="card-body pt-0">
                                <p>No hidden fees. What you see is what you get. All returns are net of fees, clearly stated on each plan.</p>
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
                    <!-- Additional FAQs for Right Column (accordion-2) -->
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-5">
                                    Is KYC verification required?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-5" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>No KYC is required to start investing. We value privacy and decentralization. However, advanced account features may request verification for added security.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-6">
                                    What happens if I send the wrong amount?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-6" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>If the amount sent doesn't match a plan requirement, it may not be processed automatically. Contact support immediately with your transaction hash for manual resolution.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-7">
                                    Can I track my investment progress?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-7" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>Yes. Your user dashboard displays real-time tracking of all investments, including countdown timers, status updates, and payout timelines.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-8">
                                    How do I know the platform is legitimate?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-8" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>We are a registered company with a transparent team and blockchain-based smart contracts. You can view testimonials and public transaction logs as proof of operation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <a class="collapsed" data-toggle="collapse" data-target="#collapse-2-9">
                                    What makes Chain Crest Capital different from other platforms?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-2-9" class="collapse" data-parent="#accordion-2">
                            <div class="card-body pt-0">
                                <p>We prioritize transparency, automation, and security. Unlike others, we use blockchain-backed protocols and smart logic for instant payouts, no downtime, and user protection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--faq section end-->


<?php

include 'components/client/footer.php';

?>