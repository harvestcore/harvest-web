<?php
	$connection = mysqli_connect('YOUR_SERVER', 'YOUR_USER', 'YOUR_PASSWORD');
	if (!$connection)
		die("Database Connection Failed" . mysqli_error($connection));

	$select_db = mysqli_select_db($connection, 'YOUR_DATABASE');
	if (!$select_db){
		die("Database Selection Failed" . mysqli_error($connection));
	}
?>
