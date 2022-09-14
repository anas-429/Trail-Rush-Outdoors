<?php
	$page = "Trail Rush Outdoors - Checkout";
	include('includes/noheader.php');
    session_start();
?>
    <dialog id="shoppingCartDialog" class="dialog black-bg-05 position-fixed-left fullwidth fullheight-vertical">
        <div class="w-500 h-500 white-bg fullwidth fullheight-vertical margin-none padding scrollable fade-scale">
            <h2 class="ebony green-underline flex-between margin-bottom fade-right">Shopping Cart<span class="exit-modal margin-none pointer">&#10006;</span></h2>
            <div id="finalized" class="margin-none">
            </div>
            <div id="finalizedTab" class="flex-end">
                <p class="fade-right"><span class="bold">Total Cost:</span> <span id="finalizedTotal"></span></p>
            </div>
        </div>
    </dialog>
    <main id="checkout" class="double-half w-1000 margin-center margins padding">

        <article class="fullwidth">
            <h2 class="ebony green-underline flex-between margin-bottom">Checkout <i class="foundicon-cart margin-none final-icon pointer"></i></h2>
            <p class="margin-none">Before you can fill out your payment information, you will need to provide your mailing address and contact information. We want to make sure that you can keep track of your shipment.</p>
        </article>

        <div class="fullwidth">
                
            <p class="bold italic">Please fill out the form down below</p>

            <form action="checkout.php" method="post" class="margin-none"> 

            <div class="double-wide">
            <div class="form-element">
				<input type="text" name="firstname" 
				id="firstname" class="input-text fullwidth margin-none padding-light" placeholder="First Name" required>
            </div>
            <div class="form-element">
				<input type="text" name="lastname" 
				id="lastname" class="input-text fullwidth margin-none padding-light" placeholder="Last Name" required>
            </div>
            </div>

            <div class="double-wide">
            <div class="form-element">
				<input type="text" name="address" 
				id="address" class="input-text fullwidth margin-none padding-light" placeholder="Home Address" required>
            </div>
            <div class="form-element">
                <input type="text" name="postalcode" id="postalcode" 
                class="input-text fullwidth margin-none padding-light" placeholder="Postal Code" required>
            </div>
            </div>
            
            <div class="double-wide">
            <div class="form-element">
                <select name="province" id="province" class="fullwidth margin-none padding-light">
	                <option value="AB">Alberta
	                <option value="BC">British Columbia
                    <option value="MB">Manitoba
                    <option value="NB">New Brunswick
                    <option value="NL">Newfoundland and Labrador
                    <option value="NT">Northwest Territories
                    <option value="NS">Nova Scotia
                    <option value="NU">Nunavut
                    <option value="ON">Ontario
                    <option value="PE">Prince Edward Island
                    <option value="QC">Quebec
                    <option value="SK">Saskatchewan
                    <option value="YT">Yukon
                </select>
            </div>
            <div class="form-element">
				<input type="text" name="city" 
				id="city" class="input-text fullwidth margin-none padding-light" placeholder="City" required>
            </div>
            </div>

            <div class="double-wide margin-none">
            <div class="form-element">
                <input type="text" name="email" 
				id="email" class="input-text fullwidth margin-none padding-light" placeholder="Email" required>
            </div>
			    <input type="submit" id="completeButton" name="submit" value="Checkout" class="turquoise-bg gold-bg-hover bold fullwidth margin-none padding-light pointer">
            </div>

            <input type="hidden" name="hiddenProducts" 
            id="hiddenProducts" value="">

            <input type="hidden" name="hiddenPrice" 
            id="hiddenPrice" value="">

			</form>

        </div>

        <a href="<?php if(isset($_SESSION['page'])) {print $_SESSION['page']; } else {print 'index.php';}?>">&#8592; Click here to return to the previous page.</a>
        
    </main>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $connection = mysqli_connect('localhost', 'root','', 'trailrush');

    if(!$connection) {
        die(mysqli_connect_error());
    }

    if(isset($_POST['firstname'])) {

        $fullname = mysqli_real_escape_string($connection, $_POST['firstname']." ".$_POST['lastname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $products = mysqli_real_escape_string($connection, $_POST['hiddenProducts']);
        $price = mysqli_real_escape_string($connection, $_POST['hiddenPrice']);
        $residence = mysqli_real_escape_string($connection, $_POST['city']." ".$_POST['province']);
        $postalCode = mysqli_real_escape_string($connection, $_POST['postalcode']);
        
        $query = "INSERT INTO orders (customer,email,products,total,residence,postalcode) VALUES
        ('$fullname','$email','$products','$price','$residence','$postalCode')";

        if (mysqli_query($connection, $query)) {

            print '<dialog id="paymentCompleteDialog" class="dialog black-bg-05 position-fixed-left flex-center fullheight-vertical fullwidth" open>
            <div class="white-bg w-500 h-500 margins padding fade-scale">
                <h2 class="ebony green-underline flex-between fade-right">Payment Complete!</h2>
                <p>You should receive an email confirming the details of your order. All you have to do is wait for the order to arrive at your residence.</p>
                <button class="ebony turquoise-bg gold-bg-hover margin-none padding-light fullwidth pointer"><a href="index.php" class="margin-none white">Return to Homepage</a></button>
            </div>
        </dialog>';

        print '<script src="complete.js"></script>';

        } 

    }

    }

    ?>
    <script src="checkout.js"></script>
    </body>
</html>
