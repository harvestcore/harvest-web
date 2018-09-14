<?php
	require_once('connect.php');
	require('../utils/utils.php');
	session_start();

	if (isset($_POST) & !empty($_POST)) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connection, $sql);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			$_POST['username'] = $username;
			$_POST['password'] = $password;
			$_SESSION['userLoggedIn'] = TRUE;
			$_SESSION['userloggedin'] = $username;
		} else {
			$failure = TRUE;
		}
	}

	if (isset($_POST['password']) && isset($_POST['username'])) {
		if ($_SESSION['userLoggedIn']) {
			if ($username == "admin") {
				//echo $username;
				$_SESSION['isLogged'] = TRUE;
				$_SESSION['isAdmin'] = TRUE;
				header('location: ../main/homepage.php');
			} else {
				$_SESSION['isLogged'] = TRUE;
				header('location: ../main/homepage.php');
			}
			
			$sql = "UPDATE login SET conectado='1' WHERE username='$username'";
			$result = mysqli_query($connection, $sql);
			
			$sql = "SELECT * FROM `login` WHERE upload='1' AND username='$username'";
		    $result = mysqli_query($connection, $sql);
		    $count = mysqli_num_rows($result);

		    if ($count == 1) {
				$_SESSION['canUpload'] = TRUE;
		    } else {
				$_SESSION['canUpload'] = FALSE;
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<?php if ($failure){ ?><div class="alert alert-danger" role="alert"> Invalid user or password. </div> <?php $failure = FALSE; } ?>
	<?php if ($alreadyin){ ?><div class="alert alert-success" role="alert"> User already logged in. </div> <?php $alreadyin = FALSE; } ?>
	<br><br>
	<form method="POST" align="center">
		<h2>Please log in</h2>
		<input type="text" name="username" placeholder="Username" required><br><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<br>
		<input class="button1" type="submit" value="Login">
	</form>
	<br>
	<hr>
	<br>
	<form action="../main/homepage.php" align="center">
		<input class="button1" type="submit" value="Home">
	</form>
	<form action="../index.html" align="center">
		<input class="button1" type="submit" value="Index">
	</form>
</body>
</html>



