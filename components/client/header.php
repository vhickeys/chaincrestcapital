<?php

require_once 'webadmin/classes/functions.php';
save_visitors();
$webSetting = $settings->getSettings('1', '0');
$userPackages = $package->getPackagesStatus();
logoutUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Chain Crest Capital  Investment Website">
    <meta name="keywords" content="Crypto Currency, Coins, Doge, Bitcoin, Dollars, USD, Investment, Trading, Forex">
    <meta name="author" content="">

    <title><?= $title ?? 'Chain Crest Capital ' ?> | Chain Crest Capital</title>

    <!--favicon icon-->
    <link rel="apple-touch-icon" sizes="180x180" href="client/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="client/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="client/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="client/assets/img/favicon/site.webmanifest">

    <!--google fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

    <!--common style-->
    <link href="client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="client/assets/vendor/bicon/css/bicon.min.css" rel="stylesheet">
    <link href="client/assets/vendor/animate.css" rel="stylesheet">
    <link href="client/assets/vendor/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="client/assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!--custom css-->
    <link href="client/assets/css/main.css" rel="stylesheet">

</head>

<body class="">

    <!--header start-->
    <header class="app-header navbar-purple">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md" id="mainNav">
                        <!--logo-->
                        <a class="navbar-brand mr-5" href="index.php">
                            <img class="chain-logo" src="img/settings/<?= $webSetting['logo'] ?? 'chaincrestcapital.png'  ?>" alt="Chain Crest Capital Logo">
                        </a>
                        <!--logo-->

                        <!--responsive toggle icon-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-bars"> </i>
                            </span>
                        </button>
                        <!--responsive toggle icon-->

                        <!--nav link-->
                        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link <?= setActivePage($current_page, 'index.php') ?>" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= setActivePage($current_page, 'about.php') ?>" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= setActivePage($current_page, 'how-it-works') ?>" href="how-it-works.php">How It Works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= setActivePage($current_page, 'faq') ?>" href="faq.php">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="__blank" href="https://cointelegraph.com/">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= setActivePage($current_page, 'contact') ?>" href="contact.php">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-pill buy-token js-scroll-trigger" href="register.php">Invest Now</a>
                                </li>
                            </ul>
                        </div>
                        <!--nav link-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->