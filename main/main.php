<?php
  require_once('../login/connect.php');

  session_start();
  if(!$_SESSION['isLogged']) {
    header("location: ../login/login.php"); 
    die(); 
  }

  $query = "SELECT id, name, ip FROM servers";
  $tabla = mysqli_query($connection, $query);

  echo '<br><div><table id="servers" border=1px style="width:500px" align="center">';  // opening table tag
  echo '<th><div align="center">Server name</th><th><div align="center">IP</th>'; //table headers
  while($data = mysqli_fetch_array($tabla))
  {
    echo '<tr>'; // printing table row
    echo '</i></div></td><td><div align="center">'.$data['name'].'</div></td><td><div align="center">'.$data['ip'].'</div></td>'; // we are looping all data to be printed till last row in the table
    echo '</tr>'; // closing table row
  }
  echo '</table></div>';  //closing table tag
?>

<!DOCTYPE html>
<html>
<head>
	<title>SWAP</title>
  <link rel="icon" type="image/png" href="../images/icon.png" />
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
  <br>
  <hr>
	<form action="../login/logout.php" align="right">
    <input class="button" type="submit" value="Log out">
  </form>
</body>
</html>