<?php
session_start();
date_default_timezone_set('Africa/lagos');

require 'Database.php';
require 'User.php';
require 'Package.php';
require 'WalletAddress.php';
require 'Record.php';
require 'Transaction.php';
require 'Settings.php';
require 'Contact.php';
require 'email.php';

$database = new Database();

$user = new User($database);

$package = new Package($database);

$walletAddress = new WalletAddress($database);

$record = new Record($database);

$transaction = new Transaction($database);

$settings = new Settings($database);

$contact = new Contact($database);

// Check for User Access

if (isset($_SESSION['user_data']['userId'])) {
    $userAccess = $record->getRecord('users', $_SESSION['user_data']['userId'])['access'];
}

function authCheck()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    }
}

function authCheckUser()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    }
}

function authCheckUserBySlug($slug, $page)
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if (!isset($slug) || ($slug == "")) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function authCheckById($id, $page)
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    } else if (!isset($id) || ($id == "")) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function authCheckBy2records($slug, $page, $table, $column1, $column2, $column1Data, $column2Data)
{
    global $record;
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if (!isset($slug) || ($slug == "") || ($record->getRecordBy2Cols($table, $column1, $column2, $column1Data, $column2Data) == null)) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function adminAuth()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "1") {
        $_SESSION['message'] = "You are not authorized to access this page. Not a Super Admin!";
        header("location: index.php");
        exit(0);
    }
}

// function authConfirm()
// {
//     if (isset($_SESSION['user_data']['fullName']) && isset($_SESSION['user_data']['email'])) {
//         $_SESSION['message'] = "You are already logged in!";
//         header("location: index.php");
//         exit(0);
//     } 
// }

function logoutUser()
{
    if (isset($_GET['logout']) == 'true') {
        session_unset();
        session_destroy();
        header('location: login.php');
        exit();
    }
}

function image_processing($image)
{
    $image_name = $image['name'];

    if ($image_name != null) {
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        return [
            'image_name' => $image_name,
            'image_size' => $image_size,
            'image_tmp_name' => $image_tmp_name,
            'image_extension' => $image_extension,
            'filename' => $filename,
            'valid_extensions' => $valid_extensions
        ];
    } else {
        return null;
    }
}

function move_image($filename, $image_tmp_name)
{
    $destination = "../../images/events/$filename";
    move_uploaded_file($image_tmp_name, $destination);
}

function unlink_image($old_image, $filename, $image_tmp_name)
{
    $olDestination = "../../images/events/$old_image";

    if (file_exists($olDestination)) {
        unlink($olDestination);
    }

    $destination = "../../images/events/$filename";
    move_uploaded_file($image_tmp_name, $destination);
}

function unlink_image_only($path)
{
    if (file_exists($path)) {
        unlink($path);
    }
}

function textToSlug($text)
{
    // Remove special characters (except hyphens and spaces)
    $text = preg_replace('/[^a-z0-9- ]/i', '', $text);

    // Replace spaces with hyphens
    $text = str_replace(' ', '-', $text);

    // Convert to lowercase
    $text = strtolower($text);

    // Remove consecutive hyphens
    $text = preg_replace('/-+/', '-', $text);

    // Trim hyphens from the beginning and end
    $text = trim($text, '-');

    return $text;
}

function setActivePage($currentPage, $linkPage)
{
    if ($currentPage === $linkPage) {
        return 'active';
    } else {
        return '';
    }
}

function save_visitors()
{
    global $database;

    // Get the visitor's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    //Get page url
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $query_string = $_SERVER['QUERY_STRING'];
    if (!empty($query_string)) {
        $url .= "?" . $query_string;
    }
    $stmt = $database->getConnection()->prepare("SELECT * FROM visitors WHERE ip_address = ? AND page_url=?");
    $stmt->execute([$ip_address, $url]);
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        $stmt = $database->getConnection()->prepare("INSERT INTO visitors (ip_address,page_url) VALUES (?,?)");
        if ($stmt->execute([$ip_address, $url])) {
            return True;
        } else {
            return False;
        }
    }
}

function web_visitor_count()
{
    global $database;
    $sql = 'SELECT COUNT(*) as total FROM visitors';
    $stmt = $database->getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_visitors = $result['total'];
    return $total_visitors;
}
