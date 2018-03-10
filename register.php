<?php 
	require_once('connect.php');
	if (isset($_POST) & !empty($_POST)) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = md5($_POST['password']);

		$sql = "INSERT INTO `login` (username, email, password) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($connection, $sql);
		if ($result) {
			$registersuccess = TRUE;
		} else {
			$registerfailed = TRUE;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="icon" type="image/png" href="images/icon.png" />
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
	<div class="container">
		<?php if ($registersuccess){ ?><div class="alert alert-success" role="alert"> User registration successful. </div> <?php $registersuccess = FALSE; } ?>
		<?php if ($registerfailed){ ?><div class="alert alert-danger" role="alert"> User registration failed. </div> <?php $registerfailed = FALSE; } ?>

		<form class="form-signin" method="POST">
			<h2 class="form-signin-heading">Please register</h2>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">@</span>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit" disabled>Register</button>
			<a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
			</form>
		</div>
</body>
</html>
