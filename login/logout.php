<?php
	require("../utils/utils.php");
	session_start();

	// "desconecta" al usuario
	$user = $_SESSION['userloggedin'];
	$sql = "UPDATE `login` SET conectado='0' WHERE username='$user'";
	$result = mysqli_query($connection, $sql);

	limpiarChat();

	session_destroy();
	header('location: ../index.html');
?>