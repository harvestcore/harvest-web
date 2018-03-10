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
				header('location: adminmain.php');
			} else {
				$_SESSION['isLogged'] = TRUE;
				header('location: main.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
	<link rel="icon" type="image/png" href="images/icon.png" />
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<div class="container">
		<?php if ($failure){ ?><div class="alert alert-danger" role="alert"> Invalid user or password. </div> <?php $failure = FALSE; } ?>
		<?php if ($alreadyin){ ?><div class="alert alert-success" role="alert"> User already logged in. </div> <?php $alreadyin = FALSE; } ?>

		<form class="form-signin" method="POST">
			<h2 class="form-signin-heading">Please login</h2>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">@</span>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>

			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			<a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
		</form>
</body>
</html>