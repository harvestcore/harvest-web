<?php 
	require_once('connect.php');
	session_start();
	if (isset($_POST) & !empty($_POST)) {
		if ($_SESSION['guyCanRegister'] == TRUE) {
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

			$_SESSION['guyCanRegister'] == FALSE;
		}
	}

	if ($_SESSION['guyCanRegister'] == FALSE) {
		header('location: ../index.html');
	}

	if ($registersuccess == TRUE) {
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<?php if ($registersuccess){ ?><div class="alert alert-success" role="alert"> User registration successful. </div> <?php $registersuccess = FALSE; } ?>
	<?php if ($registerfailed){ ?><div class="alert alert-danger" role="alert"> User registration failed. </div> <?php $registerfailed = FALSE; } ?>
	
	<br><br>
	
	<form method="POST" align="center">
		<h2>Please register</h2>
		<input type="text" name="username" placeholder="Username" required><br>
		<input type="email" name="email" placeholder="Email address" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<?php if($_SESSION['guyCanRegister'] == TRUE && $_SESSION['register1tap'] == TRUE) { ?><input class="button1" type="submit" value="Register"><?php $_SESSION['register1tap'] = FALSE; } else { ?><input class="button1" type="submit" value="Register" disabled><?php } ?>
	</form>
	<hr>
	<form action="login.php" align="center">
		<br>
		<input class="button1" type="submit" value="Login">
	</form>
	<form action="../index.html" align="center">
		<input class="button1" type="submit" value="Index">
	</form>
</body>
</html>
