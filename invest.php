<?php
require_once 'webadmin/classes/functions.php';

$package_slug = $_GET['package'];

authCheckBy2records($package_slug, "dashboard", "packages", "slug", "status", $package_slug, "0");

$title = "Invest with Us";
$current_page = "invest.php";

include 'components/head.php';
include 'components/header.php';

$package_details = $package->getPackageBySlug("packages", $package_slug);
$wallet_addresses = $walletAddress->getWalletsAddrStatus();

?>

<!-- head -->
<div class="section section--head">
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                <div class="section__title">
                    <h1>Invest With Us</h1>
                    <p>Invest with ease and maintain full control—no trading experience required. Our platform simplifies investment management, offering you straightforward tools to track and manage your assets effortlessly.</p>
                </div>
            </div>
            <!-- end title -->
        </div>
    </div>
</div>
<!-- end head -->


<!-- about -->
<div class="section section--pb">
    <div class="container">
        <div class="row row--relative">
            <div class="col-md-12">
                <div class="about">


                    <h2 class="about__title"><?= $package_details['name'] ?></h2>

                    <ul class="deposit__list mb-3">
                        <li class="text-warning">Daily profit (%): <b><?= round(intval($package_details['amount']) / 17, 3) ?></b></li>
                        <li class="text-warning">Was opened: <b><?= date('H:i:s d-M-Y', strtotime($package_details['date'])) ?></b></li>
                    </ul>

                    <p class="about__text"><?= $package_details['description'] ?></p>

                    <ul class="node__list">
                        <li><i class="ti ti-circle-check"></i><b><?= $package_details['percentage'] ?></b> of the deposit amount</li>
                        <li><i class="ti ti-circle-check"></i><b>$100</b> to the principal balance</li>
                        <li><i class="ti ti-circle-check"></i><b><?= $package_details['bonus'] ?></b> bonus balance</li>
                        <li><i class="ti ti-circle-check"></i><b>+ <?= $package_details['daily_profit'] ?></b> daily profit</li>
                    </ul>

                    <div class="col-md-4 mt-5 mb-3">
                        <button class="section__btn" data-bs-target="#modal-invest" type="button" data-bs-toggle="modal">Invest</button>
                    </div>

                    <!-- design elements -->
                    <span class="block-icon block-icon--purple">
                        <i class="ti ti-topology-star-2"></i>
                    </span>
                    <span class="screw screw--lines-bl"></span>
                    <span class="screw screw--lines-br"></span>
                    <span class="screw screw--lines-tr"></span>
                </div>
            </div>

            <!-- animation background -->
            <div class="section__canvas section__canvas--page section__canvas--first" id="canvas"></div>
        </div>
    </div>
</div>
<!-- end about -->

<!-- Investment modal -->
<div class="modal modal--auto fade" id="modal-invest" tabindex="-1" aria-labelledby="modal-invest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Notice Message</h4>

                <p class="modal__text"><?= $webSetting['payment_notice'] ?? '' ?></p>

                <div class="apool__group mt-4">
                    <label for="pool3" class="apool__label text-bold text-warning">Select a Wallet Address to Invest</label>
                    <select class="form-select mb-3" id="paymentReceiveOptions" aria-label="Large select example">
                        <option selected>Select Method of Payment</option>
                        <?php foreach ($wallet_addresses as $wallet_address) : ?>
                            <option value="<?= $wallet_address['wallet_address'] ?>"><?= $wallet_address['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>

<!-- Wallet Address Modal -->
<div class="modal modal--auto fade" id="modal-wallet-addr" tabindex="-1" aria-labelledby="modal-wallet-addr" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Notice Message</h4>

                <p class="modal__text"><?= $webSetting['payment_notice'] ?? '' ?></p>

                <div class="apool__group mt-4">
                    <label for="pool3" class="apool__label text-bold text-warning">Select a Wallet Address to Invest</label>
                    <input id="paymentWalletAddress" name="paymentWalletAddress" type="text" class="apool__input">
                </div>

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>

<!-- end Investment modal -->

<?php
include 'components/footer.php';
include 'components/scripts.php';
?>