<?php
	$page = "Trail Rush Outdoors - About";
	include('includes/header.php');
    session_start();
    $_SESSION['page'] = 'about.php';
?>
        <main id="about" class="w-2000 fullwidth margin-center padding">
            <div class="double-layout-gap margin-bottom">
                <img src="images/images/supplies-narrow.jpg" alt="Camping Supplies" class="fade-in narrow-img">
                <img src="images/images/supplies-cropped.jpg" alt="Camping Supplies" class="fade-in cropped-img">
                <article class="flex flex-center-start flex-column fade-in">
                    <h2 class="ebony medium green-underline margin-bottom">About</h2>
                    <p class="margin-bottom">Trail Rush is a retail store that specializes in outdoor activities. Just because we are
                    an outdoor retailer doesn't mean we only specialize in camping. Trail Rush has a niche for all kinds of activities.</p>
                    <p class="margin-none">What is unique about our business is that we sell products that are developed and tested in-house. We assure you that our products will be usable and durable for a while.</p>
                </article>
            </div>
            <div class="double-layout-gap">
                <img src="images/images/mug-narrow.jpg" alt="First-Person view of a mug" class="fade-in narrow-img">
                <img src="images/images/mug-cropped.jpg" alt="First-Person view of a mug" class="fade-in cropped-img">
                <article class="flex flex-center-start flex-column fade-in">
                    <h2 class="ebony medium green-underline margin-bottom">Mission</h2>
                    <p class="margin-none">Our mission is not only to sell you outdoor equipment, but to enhance your outdoor experience. We carry equipment for various activities so you will be able to enjoy a host of activities.</p>
                </article>
            </div>
        </main>
        <footer class="navy-bg padding">
            <ul class="no-list-style margin-bottom white-underline-light">
                <li><a href="index.php">Home</a>
                <li><a href="about.php">About</a>
                <li><a href="products.php">Products</a>
                <li class="margin-none"><a href="contact.php">Contact</a>
            </ul>
            <p>© Copyright <?php print date('Y'); ?> Trail Rush Outdoors. All Rights Reserved.</p>
        </footer>
        <script src="application.js"></script>
	</body>
</html>