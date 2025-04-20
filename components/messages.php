<?php

if (isset($_SESSION['user_data']['interaction'])) {

?>

    <div class="col-12 col-md-12">
        <!-- stats -->
        <div class="stats">
            <p class="stats__alert">Hey <strong><?= $_SESSION['user_data']['fullName'] ?></strong> Welcome to Chain Crest Capital, we
                are ready for you!</p>

            <!-- design elements -->
            <span class="stats__dodger stats__dodger--left stats__dodger--orange"></span>
            <span class="stats__dodger stats__dodger--right stats__dodger--orange"></span>
        </div>
        <!-- end stats -->
    </div>

<?php
    unset($_SESSION['user_data']['interaction']);
}

if (isset($_SESSION['errorMessage'])) {

?>

    <div class="col-12 col-md-12">
        <!-- stats -->
        <div class="stats">
            <p class="stats__alert text-danger">Hey <strong><?= $_SESSION['errorMessage'] ?></strong></p>

            <!-- design elements -->
            <span class="stats__dodger stats__dodger--left stats__dodger--red"></span>
            <span class="stats__dodger stats__dodger--right stats__dodger--red"></span>
        </div>
        <!-- end stats -->
    </div>

<?php
    unset($_SESSION['errorMessage']);
}

if (isset($_SESSION['successMessage'])) {

?>

    <div class="col-12 col-md-12">
        <!-- stats -->
        <div class="stats">
            <p class="stats__alert text-success">Hey <strong><?= $_SESSION['successMessage'] ?></strong></p>

            <!-- design elements -->
            <span class="stats__dodger stats__dodger--left stats__dodger--green"></span>
            <span class="stats__dodger stats__dodger--right stats__dodger--green"></span>
        </div>
        <!-- end stats -->
    </div>

<?php
    unset($_SESSION['successMessage']);
}
