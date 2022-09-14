<?php
	$page = "Trail Rush Outdoors - Description";
	include('includes/header.php');

    if(isset($_GET['id'])) {
        session_start();
        $_SESSION['page'] = "description.php?id=".$_GET['id']."";
    }

?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id=$id";	
?>
    <main id="description" class="w-1500 fullwidth margin-center">
        <div class="double-layout padding">
        <?php
            $sql = mysqli_query($connection, $query);	
            $row = mysqli_fetch_array($sql);
            print '<div id="productImgContainer" class="double-half margins fade-in">';
                print '<img src="thumbnails/'.$row['image'].'" alt="'.$row['product'].'" class="product-img margin-none">';
            print '</div>';
        
            print '<div id="productContent" class="double-half margins fade-in" data-id="'.$row['id'].'" data-name="'.$row['product'].'" data-image="'.$row['image'].'" data-price="'.$row['price'].'">';

            print '<h2 class="ebony small green-underline">'.$row['product'].'</h2>';

            print '<div class="double-narrow">'; 
                print '<div class="container margin-none">';
                print '<h4 class="x-small"> Price: <span class="span-price turquoise">$'.$row['price'].' CAD</span></h4>';
                print '<h4 class="x-small">'.$row['category'].'</h4>';
                print '</div>';
                print '<div class="container margin-none">';
                print '<input type="submit" value="Add To Cart" id="'.$row['id'].'" class="ebony turquoise-bg gold-bg-hover fullwidth margin-none padding button purchase-button pointer">';
                print '</div>';
            print '</div>';
        
                print '<p>'.$row['description'].'</p>';
        
                print '<h3 class="ebony x-small">Specifications:</h3>';
        
                    print '<table id="specs" class="fullwidth">';
                        print '<tbody class="margin-none">';
                        print '<tr id="properties" class="navy-bg fullwidth margin-none padding">';
                            print $row['properties'];
                        print '</tr>';
                        print '<tr id="values" class="fullwidth margin-none padding">';
                            print $row['values'];
                        print '</tr>';
                        print '</tbody>';
                    print '</table>';
        
            print '<p class="margin-none"><a href="products.php" class="red-hover margin-none">&#8592; Click here to return to products.</a></p>';
        
            print '</div>';
        ?>
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

