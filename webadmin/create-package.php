<?php

require('classes/functions.php');

authCheck();

$title = "Create Packages";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Packages</h5>
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
            if (isset($_SESSION['errorMessage'])) {
            ?>
                <div class="alert alert-danger solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> <?php echo $_SESSION['errorMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['errorMessage']);
            }

            if (isset($_SESSION['successMessage'])) {
            ?>
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Success!</strong> Hey, <?php echo $_SESSION['successMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['successMessage']);
            }
            ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Creates New Package</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=create-package" method="POST" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name of Package" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" placeholder="Enter Caption of Package" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Color of Investment:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="color" class="form-control" placeholder="Enter package color e.g blue, orange, red" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Percentage Gain:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="percentage" class="form-control" placeholder="Enter Percentage to gain e.g 3% of the deposit amount" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Daily Profit:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="daily_profit" class="form-control" placeholder="Enter daily profit e.g + 0.5% daily profit" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Currency:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="currency" class="form-control" placeholder="Enter currency symbol e.g $ (Dollars) £ (Pounds) etc," required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Bonus:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bonus" class="form-control" placeholder="Enter bonus to receive" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Enter Days for ROI:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="days" class="form-control" placeholder="Enter Enter Days for ROI (Returns on Investment)" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" class="form-control" placeholder="Enter Package Amount">
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
                                    <textarea class="form-txtarea form-control" name="description"
                                        rows="8" id="comment"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="formFile" class="col-form-label">Image for Package</label>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <p class="text-danger"><small>You cannnot upload images greater than 500KB*</small></p>
                                        <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" type="checkbox">
                                        <label class="form-check-label">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                            <div class="my-3 row justify-content-center">
                                <button type="submit" name="submit-package" class="btn btn-primary">Create a New
                                    Package</button>
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