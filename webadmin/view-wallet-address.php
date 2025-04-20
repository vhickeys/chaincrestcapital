<?php

require('classes/functions.php');

authCheck();

$title = "View Wallet Addresses";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$walletAddresses = $walletAddress->getWalletAddresses();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Wallet Addresses</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="create-wallet-address.php">+ Add Wallet Address</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once('components/alert_messages.php');
            ?>

            <!-- Modal -->
            <form method="post" action="classes/process.php?action=delete-wallet">
                <div class="modal fade" id="deleteWalletModal" tabindex="-1" aria-labelledby="deleteWalletModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This Wallet Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="deleteModalId" name="deleteModalId">
                                <h4>Are you sure you want to delete this wallet address?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-wallet" class="btn btn-danger">Delete
                                    Wallet Address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Wallet Addresses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Wallet Address</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($walletAddresses == null) {
                                    } else {
                                        foreach ($walletAddresses as $walletAddress) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $walletAddress['name'] ?></td>
                                                <td><?= $walletAddress['wallet_address'] ?></td>

                                                <td><?= $walletAddress['status'] == '1' ? 'Hidden' : 'Visible' ?></td>


                                                <td><?php echo date("H:i:s d-M-Y", strtotime($walletAddress['created_at'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="edit-wallet-address.php?waId=<?= $walletAddress['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <button class="btn btn-danger shadow btn-xs sharp deleteWallet" value="<?= $walletAddress['id'] ?>"><i class="fa fa-trash"></i></button>
                                                        <?php endif; ?>

                                                    </div>
                                                </td>
                                            </tr>

                                    <?php
                                            $id++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
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