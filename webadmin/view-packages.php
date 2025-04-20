<?php

require('classes/functions.php');

authCheck();

$title = "View Packages";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allPackages = $package->getPackages();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Packages</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="create-package.php">+ Add Package</a>
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

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Packages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Amount</th>

                                        <th>Color</th>
                                        <th>Percentage</th>
                                        <th>Daily Profit</th>
                                        <th>Currency</th>
                                        <th>Bonus</th>
                                        <th>Days</th>

                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($allPackages == null) {
                                    } else {
                                        foreach ($allPackages as $package) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $package['name'] ?></td>
                                                <td><?= $package['amount'] ?></td>

                                                <td><?= $package['color'] ?></td>
                                                <td><?= $package['percentage'] ?></td>
                                                <td><?= $package['daily_profit'] ?></td>
                                                <td><?= $package['currency'] ?></td>
                                                <td><?= $package['bonus'] ?></td>
                                                <td><?= $package['days'] ?></td>

                                                <td>
                                                    <div class="products">
                                                        <img src="../img/packages/<?= $package['image'] == '' ? 'placeholder.png' : $package['image'] ?>" class="avatar avatar-md" alt="<?= $package['name'] ?>">
                                                    </div>
                                                </td>

                                                <td><?= $package['status'] == '1' ? 'Hidden' : 'Visible' ?></td>


                                                <td><?php echo date("H:i:s d-M-Y", strtotime($package['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="edit-package.php?pId=<?= $package['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <button href="delete-package.php?pId=<?= $package['id'] ?>" class="btn btn-danger shadow btn-xs sharp" disabled><i class="fa fa-trash"></i></button>
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