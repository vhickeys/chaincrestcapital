<?php

require('classes/functions.php');
$package_id = $_GET["pId"];

authCheckById($package_id, "view-packages");

$title = "Edit Package";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$package = $record->getRecord("packages", $package_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Packages</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-packages.php">View Packages</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once('components/alert_messages.php');
            ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit this Package</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=edit-package" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="package_id" class="form-control" value="<?= $package_id; ?>">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="<?= $package['name'] ?>" placeholder="Enter Name of Package" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" value="<?= $package['caption'] ?>" placeholder="Enter Caption of Package" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Color of Investment:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="color" class="form-control" value="<?= $package['color'] ?>" placeholder="Enter package color e.g blue, orange, red" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Percentage Gain:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="percentage" class="form-control" value="<?= $package['percentage'] ?>" placeholder="Enter Percentage to gain e.g 3% of the deposit amount" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Daily Profit:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="daily_profit" class="form-control" value="<?= $package['daily_profit'] ?>" placeholder="Enter daily profit e.g + 0.5% daily profit" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Currency:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="currency" class="form-control" value="<?= $package['currency'] ?>" placeholder="Enter currency symbol e.g $ (Dollars) £ (Pounds) etc," required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Bonus:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bonus" class="form-control" value="<?= $package['bonus'] ?>" placeholder="Enter bonus to receive" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Days for ROI:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="days" class="form-control" value="<?= $package['days'] ?>" placeholder="Enter Enter Days for ROI (Returns on Investment)" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" class="form-control" value="<?= $package['amount'] ?>" placeholder="Enter Package Amount">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">OTHER INFORMATION</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="mb-3 row">
                                <label class="col-form-label">Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="description" rows="8" id="comment"><?= $package['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="formFile" class="col-form-label">Image for Package</label>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <p class="text-danger"><small>You cannnot upload images greater than 500KB*</small></p>
                                        <input class="form-control" name="image" type="file" id="formFile">
                                        <input type="hidden" class="form-control" name="old_image" value="<?= $package['image']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <img src="../img/packages/<?= $package['image'] ?? 'blank.jpg'; ?>" alt="<?= $package['name']; ?>" class="img-fluid" width="20%">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $package['status'] == '1' ? 'checked' : '' ?> name="status" type="checkbox">
                                        <label class="form-check-label">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                            <div class="my-3 row justify-content-center">
                                <button type="submit" name="edit-package" class="btn btn-primary">Edit this Package</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--**********************************
            Content body end
***********************************-->

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>