<?php
require 'functions.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'registerUser':
            if (isset($_POST)) {
                $adminFname = $_POST['adminFname'];
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];
                $role = $_POST['role'];

                $user->registerUser($adminFname, $adminEmail, $adminPassword, $role);
            }
            break;

        case 'loginUser':
            if (isset($_POST)) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginUser($adminEmail, $adminPassword);
            }
            break;

        case 'changePassword':
            if (isset($_POST)) {
                $userId = $_POST['userId'];
                $new_password = $_POST['new_password'];

                $user->changePassword($userId, $new_password);
            }
            break;

        case 'contactSubmit':
            if (isset($_POST)) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $contact->contactSubmit($name, $email, $phone, $subject, $message);
            }
            break;

        case 'loginAdmin':
            if (isset($_POST['adminLoginSubmit'])) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginAdmin($adminEmail, $adminPassword);
            }
            break;

        case 'logout':
            if (isset($_POST)) {

                $user->logoutUser();
            }
            break;


        case 'create-package':
            if (isset($_POST['submit-package'])) {

                $name = $_POST['name'];
                $slug = textToSlug($name);
                $caption = $_POST['caption'];

                $color = $_POST['color'];
                $percentage = $_POST['percentage'];
                $daily_profit = $_POST['daily_profit'];
                $currency = $_POST['currency'];
                $bonus = $_POST['bonus'];
                $days = $_POST['days'];

                $amount = $_POST['amount'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $status = $_POST['status'] == true ? '1' : '0';

                $package->createPackage($name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $image, $status);
            }
            break;

        case 'create-wallet':
            if (isset($_POST['submit-wallet'])) {

                $name = $_POST['name'];
                $wallet_address = $_POST['wallet_address'];

                $status = $_POST['status'] == true ? '1' : '0';

                $walletAddress->createWalletAddress($name, $wallet_address, $status);
            }
            break;

        case 'edit-wallet':
            if (isset($_POST['update-wallet'])) {

                $wallet_id = $_POST['wallet_id'];
                $name = $_POST['name'];
                $wallet_address = $_POST['wallet_address'];

                $status = $_POST['status'] == true ? '1' : '0';

                $walletAddress->editWalletAddress($name, $wallet_address, $status, $wallet_id);
            }
            break;
            
        case 'delete-wallet':
            if (isset($_POST['delete-wallet'])) {
                $wallet_id = $_POST['deleteModalId'];
                $record->deleteRecord("wallet_addresses", $wallet_id, "Wallet Address", "view-wallet-address.php");
            }
            break;

        case 'settings':
            if (isset($_POST['submit-settings'])) {

                $wallet_address = $_POST['wallet_address'];
                $about = $_POST['about'];

                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $office_address = $_POST['office_address'];

                $withdrawal_error = $_POST['withdrawal_error'];
                $payment_notice = $_POST['payment_notice'];

                $facebook = $_POST['facebook'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];
                $linkedIn = $_POST['linkedIn'];
                $youtube = $_POST['youtube'];

                $logo = $_FILES['logo'];
                $old_image = $_POST['old_image'];
                $status = $_POST['status'] == true ? '1' : '0';

                $settings->modifySettings($wallet_address, $about, $phone, $email, $office_address, $withdrawal_error, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $logo, $old_image, $status, "1");
            }
            break;

        case 'edit-package':
            if (isset($_POST['edit-package'])) {

                $package_id = $_POST['package_id'];
                $name = $_POST['name'];
                $slug = textToSlug($name);
                $caption = $_POST['caption'];

                $color = $_POST['color'];
                $percentage = $_POST['percentage'];
                $daily_profit = $_POST['daily_profit'];
                $currency = $_POST['currency'];
                $bonus = $_POST['bonus'];
                $days = $_POST['days'];

                $amount = $_POST['amount'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $old_image = $_POST['old_image'];
                $status = $_POST['status'] == true ? '1' : '0';

                $package->editPackage($package_id, $name, $slug, $caption, $color, $percentage, $daily_profit, $currency, $bonus, $days, $amount, $description, $image, $old_image, $status);
            }
            break;

        case 'edit-transaction':
            if (isset($_POST['edit-transaction'])) {

                $transaction_id = $_POST['transaction_id'];
                $user_id = $_POST['user_id'];
                $invested_fund = $_POST['invested_fund'];
                $dividend = $_POST['dividend'];
                $referral = $_POST['referral'];
                $withdrawn = $_POST['withdrawn'];

                // print_r($_POST);

                $status = $_POST['status'] == true ? '1' : '0';

                $transaction->editTransaction($transaction_id, $user_id, $invested_fund, $dividend, $referral, $withdrawn, $status);
            }
            break;

        case 'getParticipants':
            if (isset($_POST)) {
                $participantID = $_POST['participantID'];
                // $participant = $participant->getParticipant('registration', $participantID);
                echo json_encode($participant);
            }
            break;

        case 'payment-proof':
            if (isset($_POST['create-proof'])) {
                $user_id = $_POST['user_id'];
                $proof = $_FILES['proof'];

                $transaction->uploadPaymentProof($user_id, $proof);
            }
            break;

        case 'updatePaymentStatus':
            if (isset($_POST['payment_status'])) {
                $payment_id = $_POST['payment_id'];
                $user_id = $_POST['user_id'];
                $payment_status = $_POST['payment_status'];

                if ($payment_status == 1) {
                    // Decline Payment Status i.e Set Status to 2
                    $transaction->updatePaymentStatus($payment_id, $user_id, "2");
                } elseif ($payment_status == 2) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                } elseif ($payment_status == 0) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                }
            }
            break;

        case 'delete-agenda':
            if (isset($_POST['delete-agenda'])) {
                $agenda_id = $_POST['agendaDeleteModalId'];
                // $agenda->deleteAgenda($agenda_id);
            }
            break;

        case 'delete-event':
            if (isset($_POST['delete-event'])) {
                $event_Id = $_POST['eventDeleteModalId'];
                // $event->deleteEvent("events", $event_Id, "Event", "view-events.php");
            }
            break;

        case 'delete-user':
            if (isset($_POST['delete-user'])) {
                $user_Id = $_POST['userDeleteModalId'];
                $record->deleteRecord("users", $user_Id, "User", "view-users.php");
            }
            break;

        case 'changeUserRole':
            if (isset($_POST['changeUserRoleBtn'])) {
                $user_Id = $_POST['userId'];
                $user_role = $_POST['user_role'];
                $user->updateUserRole($user_role, $user_Id);
            }
            break;

        case 'setUserAccess':
            if (isset($_POST['userAccessBtn'])) {
                $userAccess = $_POST['userAccess'];
                $user_Id = $_POST['user_id'];

                $userAccess == 1 ? $userAccess = 0 : $userAccess = 1;
                $user->userAccess($userAccess, $user_Id);
            }
            break;

        default:
            # code...
            break;
    }
}
