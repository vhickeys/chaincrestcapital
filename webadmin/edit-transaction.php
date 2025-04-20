<?php

require('classes/functions.php');
$transaction_id = $_GET["tId"];

authCheckById($transaction_id, "view-transactions");

$title = "Edit Transaction";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$transaction_details = $transaction->getTransactionById($transaction_id);
$users = $record->getRecords("users");

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Transactions</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-transactions.php">View Transactions</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
            <div class="alert alert-danger solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
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
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
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
                        <h4 class="card-title">Edit this Transaction</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=edit-transaction" method="POST"
                                enctype="multipart/form-data">

                                <input type="hidden" name="transaction_id" class="form-control"
                                    value="<?= $transaction_id; ?>">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Registered User:</label>
                                    <div class="col-sm-9">
                                        <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                            <select class="default-select form-control wide" name="user_id"
                                                tabindex="null" required>
                                                <option value="">-- Select User --</option>
                                                <?php
                                                foreach ($users as $user) {
                                                    $user_id = $user['id'];
                                                    $user_name = $user['full_name'];
                                                ?>

                                                <option
                                                    <?= $transaction_details['userId'] == $user_id ? 'selected' : '' ?>
                                                    value='<?= $user_id ?>'><?= $user_name ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Invested Fund:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="invested_fund" class="form-control"
                                            value="<?= $transaction_details['invested_fund'] ?>"
                                            placeholder="Enter Investment Fund">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Dividend:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dividend" class="form-control"
                                            value="<?= $transaction_details['dividend'] ?>"
                                            placeholder="Enter Dividend Amount">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Referral:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="referral" class="form-control"
                                            value="<?= $transaction_details['referral'] ?>"
                                            placeholder="Enter Referral Amount">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Withdrawn:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="withdrawn" class="form-control"
                                            value="<?= $transaction_details['withdrawn'] ?>"
                                            placeholder="Enter Withdrawn Amount">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Status:</div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                <?= $transaction_details['status'] == '1' ? 'checked' : '' ?>
                                                name="status" type="checkbox">
                                            <label class="form-check-label">
                                                Hidden
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="author"
                                    value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                                <div class="my-3 row justify-content-center">
                                    <button type="submit" name="edit-transaction" class="btn btn-primary">Edit this
                                        Transaction</button>
                                </div>

                            </form>
                        </div>
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