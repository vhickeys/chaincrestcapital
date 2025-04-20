<?php
require('webadmin/classes/functions.php');
$webSetting = $settings->getSettings('1', '0');
include 'components/head.php';
// include 'components/header.php';
?>

<!-- page wrap -->
<div class="section section--content">
    <div class="section__content">
        <!-- form -->

        <form id="adminSignup" name="adminform" class="form form--content">
            <div class="form__logo-wrap">
                <a href="index.php" class="form__logo">
                    <img src="img/settings/<?= $webSetting['logo'] ?? 'chaincrestcapital_logo' ?>" alt="Chain Crest Capital Logo">
                </a>
            </div>

            <div id="userAlert">

            </div>

            <div class="form__group">
                <input type="text" class="form__input" id="adminFname" name="firstname" placeholder="Name">
            </div>

            <div class="form__group">
                <input type="text" class="form__input" id="adminEmail" name="email" placeholder="Email">
            </div>

            <div class="form__group">
                <input type="password" class="form__input" id="adminPassword" name="password" placeholder="Password">
            </div>

            <div class="form__group">
                <input type="password" class="form__input" id="adminConfirm" name="confirmPass" placeholder="Confirm Password">
            </div>

            <input type="hidden" value="0" name="role" id="role">

            <div class="form__group form__group--checkbox">
                <input id="remember" name="remember" type="checkbox" checked>
                <label for="remember">I agree to the <a href="privacy.php">Privacy Policy</a></label>
            </div>

            <button class="form__btn" id="adminSignupSubmit" name="adminform_btn" type="submit">Sign up</button>

            <!-- <span class="form__delimiter">or</span>

            <div class="form__social">
                <a class="fb" href="#"><i class="ti ti-brand-facebook"></i></a>
                <a class="tw" href="#"><i class="ti ti-brand-x"></i></a>
                <a class="gl" href="#"><i class="ti ti-brand-google"></i></a>
            </div> -->

            <span class="form__text form__text--center">Already have an account? <a href="login.php">Login!</a></span>

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