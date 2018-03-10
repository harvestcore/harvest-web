<?php
	require_once('connect.php');
	if (isset($_POST) & !empty($_POST)) {
		$name = mysqli_real_escape_string($connection, $_POST['servername']);
		$ip = mysqli_real_escape_string($connection, $_POST['serverip']);

		$sql = "INSERT INTO `servers` (name, ip) VALUES ('$name', '$ip')";
		$result = mysqli_query($connection, $sql);
		if ($result) {
			$add_success = TRUE;
		} else {
			$add_failed = TRUE;
		}
	}
?>