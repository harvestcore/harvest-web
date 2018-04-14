<?php
  require_once('connect.php');
  session_start();

  if (isset($_POST) & !empty($_POST)) {
    if (isset($_POST['checkcode'])) {
    
      $code = mysqli_real_escape_string($connection, $_POST['code']);

      $sql = "SELECT * FROM `codes` WHERE code='$code' AND active='0'";
      $result = mysqli_query($connection, $sql);
      $count = mysqli_num_rows($result);

      if ($count == 1) {
        $_SESSION['guyCanRegister'] = TRUE;
        $_SESSION['register1tap'] = TRUE;
        $sql = "UPDATE codes SET active='1' WHERE code='$code'";
        $result = mysqli_query($connection, $sql);
        $codeUsed = FALSE;
        header('location: register.php');
      } else {
        $codeUsed = TRUE;
      }
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>SWAP</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<?php if ($codeUsed){ ?><div class="alert alert-danger" role="alert">Sorry, code already used.</div> <?php } ?>
	<br><br>

	<h1 align="center">Insert code</h1>
  <form method="POST" align="center">
    <input type="text" name="code" placeholder="Code" required><br>
    <br>
    <input class="button1" type="submit" name="checkcode" value="Insert code">
  </form>
	<br>
	<hr>
	<br>
  <form action="../index.html" align="center">
    <input class="button1" type="submit" value="Index">
  </form>
</body>
</html>
