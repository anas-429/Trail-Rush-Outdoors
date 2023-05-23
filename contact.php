<?php
	$page = "Trail Rush Outdoors - Contact";
	include('includes/header.php');
	session_start();
    $_SESSION['page'] = 'contact.php';
?>
<?php
			
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		print '<dialog id="formDialog" class="dialog black-bg-05 position-fixed-left flex flex-center fullheight fullwidth" open>
        <div class="w-500 h-500 white-bg padding fade-scale">
            <h2 class="ebony small green-underline flex flex-between margin-bottom fade-right">Form Submitted!<span class="exit-modal pointer margin-none">&#10006;</span></h2>
            <p class="margin-none">Someone from customer service will reach out to you as soon as possible. We are open to resolving
			any customer concerns.</p>
        </div>
    	</dialog>';

    }

?>
        <main id="contact" class="fullwidth margin-center">
            <div class="w-1000 margin-center padding">
            <div class="border-right margin-bottom fade-in">
                <h2 class="ebony medium green-underline margin-bottom-light">Contact</h2>
                <p class="margin-bottom">If you want to know the status of your order or just want to ask general questions, please fill out the form. Make sure to include your name and contact information.</p>
                <p class="italic green-underline-light">All fields must be filled.</p>
			</div>
            <form method="post" action="contact.php" class="margin-none margins">
                <div class="double-wide">
                <div class="form-element fade-in">
                    <label for="first-name">First Name</label>
				    <input type="text" name="first-name" 
				    id="first-name" class="fullwidth margin-top margin-none padding" required>
                </div>
                <div class="form-element margin-none fade-in">
                    <label for="last-name">Last Name</label>
				    <input type="text" name="last-name" 
				    id="last-name" class="fullwidth margin-top margin-none padding" required>
                </div>
                </div>
                   
                <div class="double-wide">
                <div class="form-element fade-in">
                    <label for="email">E-Mail</label>
				    <input type="text" name="email" 
				    id="email" class="fullwidth margin-top margin-none padding" required>
                </div>
                <div class="form-element margin-none fade-in"> 
                    <label for="subject">Subject</label>
				    <input type="text" name="subject" 
				    id="subject" class="fullwidth margin-top margin-none padding" required>
                </div>
                </div>
                <div class="form-element margin-none fade-in">
                    <label for="message">Message</label>
				    <textarea name="message" id="message" rows="4" cols="80" class="fullwidth margin-top padding fade-in">
				    </textarea>
                </div>
                    
				<input type="submit" value="Submit"
				class="ebony turquoise-bg beige-bg-hover fullwidth margin-none padding fade-in pointer">
			</form>
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
