<?php
	$page = "Trail Rush Outdoors - Products";
	include('includes/header.php');
    session_start();
    $_SESSION['page'] = 'products.php';
?>
<?php
    $query = "SELECT * FROM products";
?>
        <main id="products" class="fullwidth margin-center">
            <div id="productsBgCover" class="bg-cover h-1000 fullheight-vertical-80">
                <div class="black-bg-05 flex-center fullwidth fullheight-vertical-80">
                    <h1 class="ebony medium fade-scale">Products</h1>
                </div>
            </div>
            <div id="asideGrid" class="w-2000 margin-center">
            <aside id="aside" class="fade-in padding">
                <div id="asideFixed" class="margin-none">
                <h3 class="ebony green-underline flex-between margin-none">Filter By<img src="images/filter.svg" alt="Filter" class="filter-icon open-categories margin-bottom-light hover"></h3>
                <ul id="categoryAside" class="margins-light margin-top no-list-style">
                    <li><input type="radio" name="option" value="All" id="allOptionDesktop" checked><label for="allOptionDesktop">All</label>
                    <li><input type="radio" name="option" value="Camping" id="campingOptionDesktop"><label for="campingOptionDesktop">Camping</label>
                    <li><input type="radio" name="option" value="Fishing" id="fishingOptionDesktop"><label for="fishingOptionDesktop">Fishing</label>
                    <li><input type="radio" name="option" value="Rafting" id="raftingOptionDesktop"><label for="raftingOptionDesktop">Rafting</label>
                    <li><input type="radio" name="option" value="Cycling" id="cyclingOptionDesktop"><label for="cyclingOptionDesktop">Cycling</label>
                </ul>
                <div id="categoryMenu" class="white-bg position-fixed-left fullwidth fullheight-vertical padding">
                    <h3 class="ebony green-underline flex-between fade-bottom">Select Category: <span class="exit-categories margin-none red-hover">&#10006;</span></h3>
                    <ul class="no-list-style margins-light fade-right">
                        <li><input type="radio" name="option" value="All" id="allOptionMobile" checked><label for="allOptionMobile">All</label>
                        <li><input type="radio" name="option" value="Camping" id="campingOptionMobile"><label for="campingOptionMobile">Camping</label>
                        <li><input type="radio" name="option" value="Fishing" id="fishingOptionMobile"><label for="fishingOptionMobile">Fishing</label>
                        <li><input type="radio" name="option" value="Rafting" id="raftingOptionMobile"><label for="raftingOptionMobile">Rafting</label>
                        <li><input type="radio" name="option" value="Cycling" id="cyclingOptionMobile"><label for="cyclingOptionMobile">Cycling</label>
                    </ul>
                </div>
                </div>
            </aside>
            <div id="productGrid" class="fade-in padding">
            <?php
                
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
        <script src="filter.js"></script>
        <script src="application.js"></script>
	</body>
</html>
