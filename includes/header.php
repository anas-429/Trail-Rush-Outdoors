<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "trailrush";

	$connection = mysqli_connect($server, $username, $password, $database);

	if(!$connection) {
		die(mysqli_connect_error());
	}

    if ($_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko') {
        header("Location: notice.php");
        exit();
    } 
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php print $page ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="foundation_icons_general/stylesheets/general_foundicons.css">
	</head>
    <body>
	<header class="navy-bg fullwidth padding">
        <div class="header-img flex-center fade-in">
            <a href="index.php">
                <img src="images/logo.svg" alt="Trail Rush Logo">
            </a>
        </div>
        <nav id="desktopMenu" class="fade-in">
        <ul class="flex-center">
            <li class="hamburger pointer"><a>&#9776;</a>
            <li class="link"><a href="index.php">Home</a>
            <li class="link"><a href="products.php">Products</a>
            <li class="link"><a href="about.php">About</a>
            <li class="link"><a href="contact.php">Contact</a>
            <li class="toggle pointer"><a href="#"><i class="open-cart foundicon-cart"></i></a><span class="quantity-icon canary-bg">0</span>
        </ul>
        </nav>
    </header>
    <aside id="shoppingCart" class="white-bg position-fixed-right fullheight fullwidth pop-up">
        <div class="scrollable fullheight-vertical">
            <form method="post" action="checkout.php">
            <div id="cartHeading" class="padding">
                <h2 class="ebony small green-underline flex-between">Shopping Cart <span class="exit-cart red-hover pointer">&#10006;</span></h2>
            </div>
            <div id="cartContent">
                <div id="items">
                    <p>There aren't any items in your cart.</p>
                </div>
                <div id="tab" class="fullwidth margins padding">
                </div>
            </div>
            </form>
        </div>
    </aside>
    <div class="fullscreen">
        <div id="mobileMenu" class="white-bg position-fixed-left fullheight-vertical fullwidth margins padding">
            <nav id="mobileNav">
            <h3 class="ebony green-underline flex-between fade-bottom pointer">Main Menu <span class="exit-mobile margin-none red-hover">&#10006;</span></h3>
            	<ul class="pointer fade-right">
                    <li><a href="index.php">Home</a>
                    <li><a href="products.php">Products</a>
                    <li><a href="about.php">About</a>
                    <li><a href="contact.php">Contact</a>
            	</ul>
			</nav>
        </div>
    </div>
	