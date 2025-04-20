<?php
require_once 'webadmin/classes/functions.php';

authCheckUser();

$title = "Dashboard";
$current_page = "dashboard.php";

include 'components/head.php';
include 'components/header.php';

$userId = $_SESSION['user_data']['userId'];
$packages = $package->getPackagesStatus("packages");
$userTransaction = $transaction->getUserTransaction($userId, "0");
$getProofs = $transaction->getPaymentProof($userId);

?>

<!-- head -->
<div class="section section--head">
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <div class="section__title">
                    <h1>My profile</h1>
                    <p>(<?= $_SESSION['user_data']['fullName'] ?>)</p>
                </div>
            </div>
            <!-- end title -->
            <?php include 'components/messages.php' ?>
        </div>
    </div>
</div>
<!-- end head -->

<!-- profile -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- tabs nav -->
            <div class="col-12 col-lg-3">
                <div class="section__tabs-profile">
                    <ul class="nav nav-tabs section__tabs section__tabs--big section__tabs--profile" id="section__tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Dashboard</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab" aria-controls="tab-2" aria-selected="false">Investing</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-4" type="button" role="tab" aria-controls="tab-4" aria-selected="false">Withdraw</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab" aria-controls="tab-3" aria-selected="false">Proof</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-5" type="button" role="tab" aria-controls="tab-5" aria-selected="false">Settings</button>
                        </li>
                    </ul>

                    <!-- design elements -->
                    <span class="screw screw--big-br screw--tablet"></span>
                    <span class="screw screw--big-bl screw--tablet"></span>
                    <span class="screw screw--big-tr screw--tablet"></span>
                    <span class="screw screw--big-tl screw--tablet"></span>
                </div>
            </div>
            <!-- end tabs nav -->

            <!-- tabs content -->
            <div class="col-12 col-lg-9">
                <div class="tab-content">
                    <!-- dashboard -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <!-- stats -->
                                <div class="stats">
                                    <span class="stats__value">$<?= $userTransaction['invested_fund'] ?? '0.0063' ?></span>
                                    <p class="stats__name">Total Invested Funds</p>

                                    <!-- design elements -->
                                    <span class="stats__dodger stats__dodger--left stats__dodger--orange"></span>
                                    <span class="stats__dodger stats__dodger--right stats__dodger--orange"></span>
                                </div>
                                <!-- end stats -->
                            </div>

                            <div class="col-12 col-md-4">
                                <!-- stats -->
                                <div class="stats">
                                    <span class="stats__value">$<?= $userTransaction['withdrawn'] ?? '0.00' ?></span>
                                    <p class="stats__name">Total withdrawn</p>

                                    <!-- design elements -->
                                    <span class="stats__dodger stats__dodger--left stats__dodger--green"></span>
                                    <span class="stats__dodger stats__dodger--right stats__dodger--green"></span>
                                </div>
                                <!-- end stats -->
                            </div>

                            <div class="col-12 col-md-4">
                                <!-- stats -->
                                <div class="stats">
                                    <span class="stats__value">$<?= $userTransaction['dividend'] ?? '0.0079' ?></span>
                                    <p class="stats__name">Dividends</p>

                                    <!-- design elements -->
                                    <span class="stats__dodger stats__dodger--left stats__dodger--blue"></span>
                                    <span class="stats__dodger stats__dodger--right stats__dodger--blue"></span>
                                </div>
                                <!-- end stats -->
                            </div>

                            <div class="col-12">
                                <!-- referral -->
                                <div class="invest invest--big">
                                    <h2 class="invest__title">Referral link</h2>

                                    <div class="invest__group">
                                        <input id="partnerlink" type="text" name="partnerlink" class="form__input" value="https://chaincrestcapital.com/register.php?ref=<?= $_SESSION['user_data']['userId'] ?>">
                                    </div>

                                    <p class="invest__text">You can earn a 10% referral bonus when someone you refer makes a deposit of $1000 or more. If they deposit less, your referral bonus will be 7%</p>

                                    <table class="invest__table">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Today's registrations</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Today's clicks</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Total registrations</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Total clicks</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td class="yellow">Total referrals</td>
                                                <td><?= $userTransaction['referral'] ?? '0.00' ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- design elements -->
                                    <span class="block-icon block-icon--yellow">
                                        <i class="ti ti-user-plus"></i>
                                    </span>
                                    <span class="screw screw--lines-bl"></span>
                                    <span class="screw screw--lines-br"></span>
                                    <span class="screw screw--lines-tr"></span>
                                </div>
                                <!-- end referral -->
                            </div>
                        </div>
                    </div>
                    <!-- end dashboard -->

                    <!-- investing -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <!-- profile -->
                                <div class="profile">
                                    <!-- tabs nav -->
                                    <ul class="nav nav-tabs section__tabs section__tabs--left" id="section__profile-tabs1" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-f1" type="button" role="tab" aria-controls="tab-f1" aria-selected="true">Active</button>
                                        </li>

                                        <!-- <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="tab" data-bs-target="#tab-f2" type="button" role="tab" aria-controls="tab-f2" aria-selected="false">Closed</button>
                                        </li> -->

                                        <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="tab" data-bs-target="#tab-f3" type="button" role="tab" aria-controls="tab-f3" aria-selected="false">New
                                                deposit</button>
                                        </li>
                                    </ul>
                                    <!-- end tabs nav -->

                                    <!-- tabs content -->
                                    <div class="tab-content">

                                        <!-- active -->
                                        <div class="tab-pane fade show active" id="tab-f1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php
                                                    if ($packages != null) {
                                                        foreach ($packages as $package) {
                                                    ?>
                                                            <!-- deposit -->
                                                            <div class="deposit">
                                                                <div class="deposit__name">
                                                                    <span class="deposit__icon deposit__icon--<?= $package['color'] ?? 'orange' ?>">
                                                                        <i class="ti ti-database-dollar"></i>
                                                                    </span>
                                                                    <h3 class="deposit__title"><?= $package['name'] ?></h3>
                                                                </div>

                                                                <ul class="deposit__list">
                                                                    <li>Daily profit (%): <b><?= round(intval($package['amount']) / 17, 3) ?></b></li>
                                                                    <li>Was opened: <b><?= date('H:i:s d-M-Y', strtotime($package['date'])) ?></b></li>

                                                                    <li><b><?= substr($package['caption'], 0, 180) ?>...</b></li>
                                                                </ul>

                                                                <div class="deposit__profit">
                                                                    <span class="text-success">Profit</span>
                                                                    <p>$<?= $package['amount'] ?></p>
                                                                </div>

                                                                <div class="col-12">
                                                                    <a href="invest.php?package=<?= $package['slug'] ?>">
                                                                        <button class="form__btn form__btn--small">Invest</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- end deposit -->

                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <div class="col-12 col-md-12">
                                                            <!-- stats -->
                                                            <div class="stats">
                                                                <p class="stats__alert">Investment packages will be displayed as soon as your registration is confirmed!</p>

                                                                <!-- design elements -->
                                                                <span class="stats__dodger stats__dodger--left stats__dodger--green"></span>
                                                                <span class="stats__dodger stats__dodger--right stats__dodger--green"></span>
                                                            </div>
                                                            <!-- end stats -->
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- active -->


                                    </div>
                                    <!-- end tabs content -->

                                    <!-- design elements -->
                                    <span class="screw screw--lines-bl"></span>
                                    <span class="screw screw--lines-br"></span>
                                    <span class="screw screw--lines-tr"></span>
                                    <span class="screw screw--lines-tl"></span>
                                </div>
                                <!-- end profile -->
                            </div>
                        </div>
                    </div>
                    <!-- end investing -->

                    <!-- proof -->
                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <!-- profile -->
                                <div class="profile">
                                    <!-- tabs nav -->
                                    <ul class="nav nav-tabs section__tabs section__tabs--left" id="section__profile-tabs2" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-f5" type="button" role="tab" aria-controls="tab-f5" aria-selected="false">Upload Proof of Transaction</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="tab" data-bs-target="#tab-f4" type="button" role="tab" aria-controls="tab-f4" aria-selected="true">Upload History</button>
                                        </li>
                                    </ul>
                                    <!-- end tabs nav -->

                                    <!-- tabs content -->
                                    <div class="tab-content">

                                        <!-- upload proof of transaction -->
                                        <div class="tab-pane fade show active" id="tab-f5" role="tabpanel">
                                            <div class="row">
                                                <form class="my-5" method="post" action="webadmin/classes/process.php?action=payment-proof" enctype="multipart/form-data">

                                                    <input type="hidden" name="user_id" value="<?= $userId ?>">

                                                    <div class="form__group">
                                                        <input name="proof" type="file" class="form-control form-control-md">
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="form__btn form__btn--small" name="create-proof" type="submit">Upload</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <!-- end upload proof of transaction -->

                                        <!-- upload history -->
                                        <div class="tab-pane fade" id="tab-f4" role="tabpanel">
                                            <div class="row">

                                                <!-- deals table -->
                                                <div class="col-12">
                                                    <div class="deals">
                                                        <div class="deals__table-wrap">
                                                            <table class="deals__table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>Document</th>
                                                                        <th>Status</th>
                                                                        <th>Date</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    $id = 1;
                                                                    if ($getProofs != null) {
                                                                        foreach ($getProofs as $proof) {
                                                                    ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="deals__text text-info"><?= $id ?></div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="deals__exchange text-warning">
                                                                                        <?= $proof['proof'] ?>
                                                                                    </div>
                                                                                </td>

                                                                                <?php if ($proof['status'] == 0) : ?>
                                                                                    <td>
                                                                                        <div class="deals__text text-info">Pending</div>
                                                                                    </td>
                                                                                <?php elseif ($proof['status'] == 1) : ?>
                                                                                    <td>
                                                                                        <div class="deals__text text-success">Approved</div>
                                                                                    </td>
                                                                                <?php else : ?>
                                                                                    <td>
                                                                                        <div class="deals__text text-danger">Declined</div>
                                                                                    </td>
                                                                                <?php endif; ?>

                                                                                <td>
                                                                                    <div class="deals__text text-success"><?= date('d-M-Y', strtotime($proof['date'])) ?></div>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($proof['status'] != 2) : ?>
                                                                                        <a href="img/payments/<?= $proof['proof'] ?>" class="form__btn form__btn--small">View</a>
                                                                                    <?php else: ?>
                                                                                        <a href="javascript:void(0)" class="form__btn form__btn--small">View</a>
                                                                                    <?php endif; ?>
                                                                                </td>
                                                                            </tr>

                                                                        <?php
                                                                            $id++;
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="5">
                                                                                <div class="deals__text text-info">No Transaction Upload history!</div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <!-- design elements -->
                                                        <span class="screw screw--lines-bl"></span>
                                                        <span class="screw screw--lines-br"></span>
                                                        <span class="screw screw--lines-tr"></span>
                                                        <span class="screw screw--lines-tl"></span>
                                                    </div>
                                                </div>
                                                <!-- end deals table -->

                                            </div>
                                        </div>
                                        <!-- upload history -->

                                    </div>
                                    <!-- end tabs content -->

                                    <!-- design elements -->
                                    <span class="screw screw--lines-bl"></span>
                                    <span class="screw screw--lines-br"></span>
                                    <span class="screw screw--lines-tr"></span>
                                    <span class="screw screw--lines-tl"></span>
                                </div>
                                <!-- end profile -->
                            </div>
                        </div>
                    </div>
                    <!-- end proof -->

                    <!-- withdraw -->
                    <div class="tab-pane fade" id="tab-4" role="tabpanel">
                        <div class="row">

                            <div class="col-12">
                                <!-- withdrawable -->
                                <div class="stats">
                                    <span class="stats__value">Withdrawable</span>
                                    <p class="stats__name">Dividends: $<?= $userTransaction['dividend'] ?? '0.0079' ?></p>
                                    <p class="stats__name">Referral: $<?= $userTransaction['referral'] ?? '0.00' ?></p>

                                    <!-- design elements -->
                                    <span class="stats__dodger stats__dodger--left stats__dodger--green"></span>
                                    <span class="stats__dodger stats__dodger--right stats__dodger--green"></span>
                                </div>
                                <!-- end withdrawable -->

                                <div class="col-md-4 mb-0 mt-4">
                                    <button class="apool__btn" id="te-withdraw-button" type="button">Withdraw</button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div id="te-spinner">
                                    <div class="spinner-grow text-danger px-3" style="margin-right: 10px;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-warning px-3" style="margin-right: 10px;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-info" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>

                            <div class="wallet-form">

                            </div>

                            <div class="col-12" id="paymentPlatform">
                                <!-- Withdrawal Input Input -->
                                <div class="stats px-5">
                                    <h4 class="text-white my-4">Please Select Method of Payment</h4>

                                    <select class="form-select mb-5" id="paymentOptions" aria-label="Large select example">
                                        <option selected>Select Method of Payment</option>
                                        <option value="bank">Withdraw to Bank</option>
                                        <option value="paypal">Waithraw to PayPal</option>
                                        <option value="wallet">Withdraw to Wallet</option>
                                    </select>

                                    <!-- design elements -->
                                    <span class="stats__dodger stats__dodger--left stats__dodger--orange"></span>
                                    <span class="stats__dodger stats__dodger--right stats__dodger--orange"></span>
                                </div>
                                <!-- end Withdrawal Input Input -->
                            </div>

                            <div class="col-12">
                                <!-- deals table -->
                                <div class="col-12">
                                    <div class="deals">
                                        <div class="deals__table-wrap">
                                            <table class="deals__table">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Amount Withdrawn</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="deals__text--green">No Withdrawal Records!</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- design elements -->
                                        <span class="screw screw--lines-bl"></span>
                                        <span class="screw screw--lines-br"></span>
                                        <span class="screw screw--lines-tr"></span>
                                        <span class="screw screw--lines-tl"></span>
                                    </div>
                                </div>
                                <!-- end deals table -->
                            </div>
                        </div>
                    </div>
                    <!-- end withdraw -->

                    <!-- settings -->
                    <div class="tab-pane fade" id="tab-5" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <!-- profile -->
                                <div class="profile">
                                    <!-- tabs nav -->
                                    <ul class="nav nav-tabs section__tabs section__tabs--left" id="section__profile-tabs3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-f6" type="button" role="tab" aria-controls="tab-f6" aria-selected="true">Profile</button>
                                        </li>

                                        <!-- <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="tab" data-bs-target="#tab-f7" type="button" role="tab" aria-controls="tab-f7" aria-selected="false">Wallets</button>
                                        </li> -->

                                        <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="tab" data-bs-target="#tab-f8" type="button" role="tab" aria-controls="tab-f8" aria-selected="false">Password</button>
                                        </li>
                                    </ul>
                                    <!-- end tabs nav -->

                                    <!-- tabs content -->
                                    <div class="tab-content">
                                        <!-- profile -->
                                        <div class="tab-pane fade show active" id="tab-f6" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="profile__title">Personal information</h3>
                                                </div>

                                                <div class="col-12 col-xl-6">
                                                    <div class="form__group">
                                                        <label for="name1" class="form__label">Name</label>
                                                        <input id="name1" type="text" value="<?= $_SESSION['user_data']['fullName'] ?>" name="name1" class="form__input">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-xl-6">
                                                    <div class="form__group">
                                                        <label for="email1" class="form__label">Email</label>
                                                        <input id="email1" type="text" value="<?= $_SESSION['user_data']['email'] ?>" name="email1" class="form__input">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-xl-6">
                                                    <div class="form__group">
                                                        <label for="phone1" class="form__label">Phone</label>
                                                        <input id="phone1" type="text" name="phone1" class="form__input">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-xl-6">
                                                    <div class="form__group">
                                                        <label for="telegram1" class="form__label">Country</label>
                                                        <input id="telegram1" type="text" name="telegram1" class="form__input">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="form__btn form__btn--small" type="button">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- profile -->

                                        <!-- password -->
                                        <div class="tab-pane fade" id="tab-f8" role="tabpanel">
                                            <div class="row">

                                                <div class="col-12">
                                                    <h3 class="profile__title">Change password</h3>
                                                </div>

                                                <form>

                                                    <div id="userAlert">

                                                    </div>

                                                    <input type="hidden" name="userId" id="userId" value="<?= $_SESSION['user_data']['userId'] ?>">
                                                    <div class="col-12 col-xl-12">
                                                        <div class="form__group">
                                                            <label for="op1" class="form__label">Old password</label>
                                                            <input id="old_password" type="password" name="old_password" class="form__input">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-xl-12">
                                                        <div class="form__group">
                                                            <label for="np1" class="form__label">New password</label>
                                                            <input id="new_password" type="password" name="new_password" class="form__input">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-xl-12">
                                                        <div class="form__group">
                                                            <label for="cnp1" class="form__label">Confirm new
                                                                password</label>
                                                            <input id="confirm_password" type="password" name="confirm_password" class="form__input">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="form__btn form__btn--small" id="userPasswordChange" type="submit">Save</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <!-- end password -->
                                    </div>
                                    <!-- end tabs content -->

                                    <!-- design elements -->
                                    <span class="screw screw--lines-bl"></span>
                                    <span class="screw screw--lines-br"></span>
                                    <span class="screw screw--lines-tr"></span>
                                    <span class="screw screw--lines-tl"></span>
                                </div>
                                <!-- end profile -->
                            </div>
                        </div>
                    </div>
                    <!-- end settings -->
                </div>
            </div>
            <!-- end tabs content -->
        </div>
    </div>
</div>
<!-- end profile -->

<!-- withdrawal modal -->
<div class="modal modal--auto fade" id="modal-withdraw" tabindex="-1" aria-labelledby="modal-withdraw" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button onclick="location.reload()" class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-danger">Error Message</h4>

                <p class="modal__text"><?= $webSetting['withdrawal_error'] ?? '' ?></p>

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end Withdrawal modal -->

<!-- pinCode modal -->
<div class="modal modal--auto fade" id="pinCode" tabindex="-1" aria-labelledby="modal-withdraw" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button onclick="location.reload()" class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Enter Your Pin</h4>

                <!-- wallets -->
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <input id="pinInput" type="number" placeholder="Enter your Pin Code" name="bank_name" class="form__input">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="form__btn form__btn--small" id="submitPin" type="button">Submit</button>
                    </div>
                </div>
                <!-- end wallets -->

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end pinCode modal -->

<!-- bank-modal modal -->
<div class="modal modal--auto fade" id="modal-bank" tabindex="-1" aria-labelledby="modal-withdraw" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button onclick="location.reload()" class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Withdraw to Bank Account</h4>

                <!-- wallets -->
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="bank_name" class="form__label">Bank Name</label>
                            <input id="bank_name" type="text" placeholder="Enter your Bank Name" name="bank_name" class="form__input">
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="account_name" class="form__label">Account Name</label>
                            <input id="account_name" type="text" name="account_name" placeholder="Enter your Account Name" class="form__input">
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="account_number" class="form__label">Account Number</label>
                            <input id="account_number" type="number" name="account_number" placeholder="Enter your Account Number" class="form__input">
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="amount_withdrawn" class="form__label">Amount to Withdraw</label>
                            <input id="amount_withdrawn" type="number" name="amount_withdrawn" placeholder="Enter Amount to Withdraw" class="form__input">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="form__btn form__btn--small" id="submit-bank" type="button">Submit</button>
                    </div>
                </div>
                <!-- end wallets -->

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end bank-modal modal -->

<!-- paypal-modal modal -->
<div class="modal modal--auto fade" id="modal-paypal" tabindex="-1" aria-labelledby="modal-withdraw" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button onclick="location.reload()" class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Withdraw to Paypal</h4>

                <!-- wallets -->
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="email" class="form__label">Email</label>
                            <input id="email" type="email" placeholder="Enter your email" name="email" class="form__input">
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="amount_withdrawn" class="form__label">Amount to Withdraw</label>
                            <input id="amount_withdrawn" type="number" name="amount_withdrawn" placeholder="Enter Amount to Withdraw" class="form__input">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="form__btn form__btn--small" id="submit-paypal" type="button">Submit</button>
                    </div>
                </div>
                <!-- end wallets -->

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end paypal-modal modal -->

<!-- wallet-modal modal -->
<div class="modal modal--auto fade" id="modal-wallet" tabindex="-1" aria-labelledby="modal-withdraw" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button onclick="location.reload()" class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <h4 class="modal__title text-success">Withdraw to Wallet</h4>

                <!-- wallets -->
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <label for="token" class="form__label">Token</label>
                        <select class="form-select mb-3" aria-label="Large select example">
                            <option selected>Select Token</option>
                            <option value="BTC">Withdraw to Bitcoin (BTC)</option>
                            <option value="ETH">Withdraw to Ethereum (ETH)</option>
                            <option value="USDT">Withdraw to Tether (USDT)</option>
                            <option value="BNB">Withdraw to BNB (BNB)</option>
                            <option value="USDC">Withdraw to USD Coin (USDC)</option>
                            <option value="XRP">Withdraw to XRP (XRP)</option>
                            <option value="ADA">Withdraw to Cardano (ADA)</option>
                            <option value="SOL">Withdraw to Solana (SOL)</option>
                            <option value="DOGE">Withdraw to Dogecoin (DOGE)</option>
                            <option value="MATIC">Withdraw to Polygon (MATIC)</option>
                        </select>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="wallet_address" class="form__label">Wallet Address</label>
                            <input id="wallet_address" type="text" name="wallet_address" placeholder="Enter your Wallet Address" class="form__input">
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="form__group">
                            <label for="amount_withdrawn" class="form__label">Amount to Withdraw</label>
                            <input id="amount_withdrawn" type="number" name="amount_withdrawn" placeholder="Enter Amount to Withdraw" class="form__input">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="form__btn form__btn--small" id="submit-wallet" type="button">Submit</button>
                    </div>
                </div>
                <!-- end wallets -->

                <!-- design elements -->
                <span class="screw screw--big-tl"></span>
                <span class="screw screw--big-bl"></span>
                <span class="screw screw--big-br"></span>
            </div>
        </div>
    </div>
</div>
<!-- end wallet-modal modal -->


<?php
include 'components/footer.php';
include 'components/scripts.php';
?>