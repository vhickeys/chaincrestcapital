<?php
require('webadmin/classes/functions.php');
$webSetting = $settings->getSettings('1', '0');
include 'components/head.php';
// include 'components/header.php';
?>

<!-- page wrap -->
<div class="section section--content py-5">
    <div class="section__content py-5">
        <!-- form -->
        <form id="adminLogin" class="form form--content">
            <div class="form__logo-wrap">
                <a href="index.php" class="form__logo">
                    <img src="img/settings/<?= $webSetting['logo'] ?? 'chaincrestcapital_logo.png' ?>" alt="Coin GainX Logo">
                </a>
            </div>

            <div id="userAlert">

            </div>

            <div class="form__group">
                <input type="text" class="form__input" id="adminEmail" name="adminEmail" placeholder="Email">
            </div>

            <div class="form__group">
                <input type="password" class="form__input" id="adminPassword" name="adminPassword" placeholder="Password">
            </div>

            <button class="form__btn" name="adminLoginSubmit" id="adminLoginSubmit" type="button">Sign In</button>

            <span class="form__text form__text--center">Already have an account? <a href="register.php">Register</a></span>

            <!-- design elements -->
            <span class="block-icon block-icon--purple">
                <i class="ti ti-logout"></i>
            </span>
            <span class="screw screw--big-tr"></span>
            <span class="screw screw--big-bl"></span>
            <span class="screw screw--big-br"></span>
        </form>
        <!-- end form -->
    </div>

    <!-- animation background -->
    <!-- <div class="section__canvas section__canvas--full section__canvas--third" id="canvas3"></div> -->
</div>
<!-- end page wrap -->

<?php
include 'components/footer.php';
include 'components/scripts.php';
?>