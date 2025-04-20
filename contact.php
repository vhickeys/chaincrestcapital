<?php

$title = "Contact us";
$current_page = "contact.php";
include 'components/head.php';
include 'components/header.php';

?>

<!-- head -->
<div class="section section--head">
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4">
                <div class="section__title">
                    <h1>Get in touch</h1>
                    <p>Our support team is always on call, and ready to help with all your questions!</p>
                </div>
            </div>
            <!-- end title -->
        </div>
    </div>
</div>
<!-- end head -->

<!-- contact from -->
<div class="section">
    <div class="container">
        <div class="row row--relative">
            <div class="col-12">
                <form class="form">
                    <div class="row">

                        <div id="userAlert">

                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form__group">
                                <label for="name" class="form__label">Name</label>
                                <input id="name" type="text" name="name" class="form__input" placeholder="Full name">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form__group">
                                <label for="mail" class="form__label">Email</label>
                                <input id="email" type="text" name="email" class="form__input" placeholder="example@domain.com">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form__group">
                                <label for="phone" class="form__label">Phone</label>
                                <input id="phone" type="text" name="phone" class="form__input" placeholder="800 543 - 2109">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form__group">
                                <label for="subject" class="form__label">Subject</label>
                                <input id="subject" type="text" name="subject" class="form__input" placeholder="Ex. Support">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form__group">
                                <label for="message" class="form__label">Message</label>
                                <textarea id="message" name="message" class="form__textarea" placeholder="Please enter your message..."></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" id="contact-us" class="form__btn form__btn--small">Submit</button>
                        </div>
                    </div>

                    <!-- design elements -->
                    <span class="block-icon block-icon--purple">
                        <i class="ti ti-mail-up"></i>
                    </span>
                    <span class="screw screw--lines-bl"></span>
                    <span class="screw screw--lines-br"></span>
                    <span class="screw screw--lines-tr"></span>
                </form>
            </div>

            <!-- animation background -->
            <div class="section__canvas section__canvas--page section__canvas--first" id="canvas"></div>
        </div>
    </div>
</div>
<!-- end contact from -->

<?php

include 'components/footer.php';
include 'components/scripts.php';

?>