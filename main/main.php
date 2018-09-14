<?php
	require_once('../login/connect.php');
	require('../utils/utils.php');
	session_start();

	if(!$_SESSION['isLogged']) {
		header("location: ../login/login.php"); 
		die(); 
	}
	
	function drawServersTable() {
		require('../login/connect.php');
		
		$query = "SELECT id, name, ip FROM servers";
		$tabla = mysqli_query($connection, $query);

		echo '<br><div><table id="servers" border=1px align="center">';
		echo '<th><div align="center">Server name</th><th><div align="center">IP</th>';
		while($data = mysqli_fetch_array($tabla)) {
			echo '<tr>';
			echo '</i></div></td><td><div align="center">'.$data['name'].'</div></td><td><div align="center">'.$data['ip'].'</div></td>';
			echo '</tr>';
		}
		echo '</table></div>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Servers</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<?php drawTopBar(); ?>
	<br>
	<?php drawServersTable(); ?>
</body>
</html>