<?php
	require_once('connect.php');
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
		} else {
			$failure = TRUE;
		}
	}

	if (isset($_POST['password']) && isset($_POST['username'])) {
		if ($_SESSION['userLoggedIn']) {
			if ($username == "admin") {
				echo $username;
				$_SESSION['isLogged'] = TRUE;
				$_SESSION['isAdmin'] = TRUE;
				header('location: ../main/adminmain.php');
			} else {
				$_SESSION['isLogged'] = TRUE;
				header('location: ../main/main.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<?php if ($failure){ ?><div class="alert alert-danger" role="alert"> Invalid user or password. </div> <?php $failure = FALSE; } ?>
	<?php if ($alreadyin){ ?><div class="alert alert-success" role="alert"> User already logged in. </div> <?php $alreadyin = FALSE; } ?>

	<form method="POST" align="center">
		<h2>Please log in</h2>
		<input type="text" name="username" placeholder="Username" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input class="button1" type="submit" value="Login">
	</form>
	<hr>
	<form action="../index.html" align="center">
		<input class="button1" type="submit" value="Index">
	</form>
</body>
</html>



