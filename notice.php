<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "trailrush";

	//The function values should be in the exact same order.
	$connection = mysqli_connect($server, $username, $password, $database);
	
	//You have to ask MySQL to know what your errors are.

	// If the connection ceases to work
	if(!$connection) {
		//Any code below it cease to function, and show me an mySQL error.
		die(mysqli_connect_error());
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Trail Rush Outdoors - Notice</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="foundation_icons_general/stylesheets/general_foundicons.css">
	</head>
    <body class="navy-bg padding">
        <h2 class="margin-bottom-light">Website Blocked</h2>
		<p>This website is not compatible with this browser.</p>
	</body>
</html>