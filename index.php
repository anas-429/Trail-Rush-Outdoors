<?php
	$page = "Trail Rush Outdoors - Home";
	include('includes/header.php');
    session_start();
    $_SESSION['page'] = 'index.php';
?>
        <main id="home" class="fullwidth margin-center">
            <div id="homeBgCover" class="bg-cover flex-center fullheight-vertical">
                <article class="black-bg-05 w-1000 margin-center padding fade-in">
                    <h2 class="ebony medium margin-bottom-light">Welcome</h2>
                    <p class="margin-bottom">If you are planning any outdoor activities, then you've come to the right place. This website contains a variety of products divided by category. You can add any of the products to your shopping cart, then click on the shopping cart icon to finalize your purchase.</p>
                    <a href="products.php" class="white semi-bold underline">Click here to explore our products!</a>
                </article>
            </div> 
            <section id="content" class="w-1000 margin-center padding">
                <h2 class="ebony small green-underline margin-bottom-light fade-in">Featured Products</h2>
                <form method="post" action="products.php">
                <div id="featuredGrid">
                <?php

                $query = "SELECT * FROM products LIMIT 4";
                
				//Send a query to the MySQL, allows you to select certain information from the database.
				$sql = mysqli_query($connection, $query);
		
				//Takes all the information gathered and converts it into an array.
				while($row = mysqli_fetch_array($sql)) {

                print "<a href=\"description.php?id=".$row['id']."\" class=\"All ".$row['category']."\" data-price=\"".$row['price']."\">";	
                    print '<figure class="product">';
                    print '<img src="thumbnails/'.$row['image'].'" alt="'.$row['product'].'">';
                    print '<figcaption class="flex-center-start flex-column margins-light">';
				    print '<span class="product-name bold">'.$row['product'].'</span>';
                    print '<span class="product-category">'.$row['category'].'</span>';
                    print '<span class="product-price turquoise">$'.$row['price'].' CAD</span>';
                    print '</figcaption>';
                    print '</figure>';
                print '</a>';
                    
                }
            
                ?>
                </div>
                </form>
            </section>
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