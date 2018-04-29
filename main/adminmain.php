<?php
	require_once('../login/connect.php');
	require('../utils/utils.php');

	session_start();

	if(!$_SESSION['isAdmin']) {
		header("location: ../main/homepage.php"); 
		die(); 
	}

	if (isset($_POST['addserver'])) {
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
	}

	if (isset($_POST['deleteserver'])) {
		if (isset($_POST) & !empty($_POST)) {
			$deleteid = mysqli_real_escape_string($connection, $_POST['idtodelete']);
			$sql = "DELETE FROM `servers` WHERE id=$deleteid";
			$result = mysqli_query($connection, $sql);
		}
	}

	if (isset($_POST['addcode'])) {
		if (isset($_POST) & !empty($_POST)) {
			$codetoadd = mysqli_real_escape_string($connection, $_POST['codetoadd']);
			$sql = "INSERT INTO `codes` (code, active) VALUES ('$codetoadd', '0')";
			$result = mysqli_query($connection, $sql);
			
			if ($result) {
				$add_success = TRUE;
			} else {
				$add_failed = TRUE;
			}
		}
	}

	if (isset($_POST['deletecode'])) {
		if (isset($_POST) & !empty($_POST)) {
			$deleteid = mysqli_real_escape_string($connection, $_POST['codetodelete']);
			$sql = "DELETE FROM `codes` WHERE id=$deleteid";
			$result = mysqli_query($connection, $sql);
		}
	}

	if (isset($_POST['changepermission'])) {
		if (isset($_POST) & !empty($_POST)) {
			$idtochange = mysqli_real_escape_string($connection, $_POST['id']);
			$permissiontochange = mysqli_real_escape_string($connection, $_POST['permission']);
			
			if ($permissiontochange == '0' || $permissiontochange == '1') {
				$sql = "UPDATE login SET upload='$permissiontochange' WHERE id='$idtochange'";
				$result = mysqli_query($connection, $sql);	
			}
		}
	}

	function drawServersTable() {
		require('../login/connect.php');
		
		$query = "SELECT id, name, ip FROM servers";
		$tabla = mysqli_query($connection, $query);

		echo '<br><div><table id="servers" align="center">';
		echo '<th><div align="center">ID</th><th><div align="center">Server name</th><th><div align="center">IP</th>';
		while($data = mysqli_fetch_array($tabla)) {
			echo'<tr>';
			echo '<td> <div align="center"><i>'.$data['id'].'</i></div></td><td><div align="center">'.$data['name'].'</div></td><td><div align="center">'.$data['ip'].'</div></td>';
			echo'</tr>';
		}
		echo '</table></div>';
		echo '<br>';	
	}

	function drawCodesTable() {
		require('../login/connect.php');
		
		$query = "SELECT id, code, active FROM codes";
		$tabla = mysqli_query($connection, $query);

		echo '<br><div><table id="servers" align="center">';
		echo '<th><div align="center">ID</th><th><div align="center">Code</th><th><div align="center">Active</th>';
		while($data = mysqli_fetch_array($tabla)) {
			echo'<tr>';
			echo '<td> <div align="center"><i>'.$data['id'].'</i></div></td><td><div align="center">'.$data['code'].'</div></td><td><div align="center">'.$data['active'].'</div></td>';
			echo'</tr>';
		}
		echo '</table></div>';
		echo '<br>';
	}

	function drawPermissionsTable() {
		require('../login/connect.php');
		
		$query = "SELECT id, username, upload FROM login";
		$tabla = mysqli_query($connection, $query);

		echo '<br><div><table id="servers" align="center">';
		echo '<th><div align="center">ID</th><th><div align="center">Username</th><th><div align="center">Upload</th>';
		while($data = mysqli_fetch_array($tabla)) {
			echo'<tr>';
			echo '<td> <div align="center"><i>'.$data['id'].'</i></div></td><td><div align="center">'.$data['username'].'</div></td><td><div align="center">'.$data['upload'].'</div></td>';
			echo'</tr>';
		}
		echo '</table></div>';
		echo '<br>';
	}
?>

<html>
	<head>
		<title>Admin management</title>
		<link rel="icon" type="image/png" href="../images/icon.png" />
		<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	</head>
	<body>
		<?php
			drawTopBar();
			drawServersTable();
			drawCodesTable();
			drawPermissionsTable();
		?>

		<div class="container" align="center">
			<form method="POST">
				<h3>Change permissions</h3>
				<input type="text" name="id" placeholder="ID" required><br>
				<input type="text" name="permission" placeholder="New perm" required><br>
				<input type="submit" name="changepermission" class="button" value="Change">
			</form>
		</div>

		<div class="container" align="center">
			<form method="POST">
				<h3>Add new server</h3>
				<input type="text" name="servername" placeholder="Server name" required><br>
				<input type="text" name="serverip" placeholder="IP" required><br>
				<input type="submit" name="addserver" class="button" value="Add">
			</form>

			<form method="POST">
				<h3>Delete server</h3>
				<input type="text" name="idtodelete" placeholder="ID" required><br>
				<input class="button" type="submit" name="deleteserver" value="Delete">
			</form>

			<form method="POST">
				<h3>Add code</h3>
				<input type="text" name="codetoadd" placeholder="Code" required><br>
				<input class="button" type="submit" name="addcode" value="Add">
			</form>

			<form method="POST">
				<h3>Delete code</h3>
				<input type="text" name="codetodelete" placeholder="ID" required><br>
				<input class="button" type="submit" name="deletecode" value="Delete">
			</form>
		</div>
	</body>
</html>