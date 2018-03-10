<?php
  require_once('connect.php');

  session_start();
  if(!$_SESSION['isLogged'] || !$_SESSION['isAdmin']) {
    header("location:login.php"); 
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
     
  $query = "SELECT id, name, ip FROM servers";
  $tabla = mysqli_query($connection, $query);

  echo '<br><div><table id="servers" border=1px style="width:500px" align="center">';  // opening table tag
  echo '<th><div align="center">ID</th><th><div align="center">Server name</th><th><div align="center">IP</th>'; //table headers
  while($data = mysqli_fetch_array($tabla))
  {
    echo'<tr>'; // printing table row
    echo '<td> <div align="center"><i>'.$data['id'].'</i></div></td><td><div align="center">'.$data['name'].'</div></td><td><div align="center">'.$data['ip'].'</div></td>'; // we are looping all data to be printed till last row in the table
    echo'</tr>'; // closing table row
  }
  echo '</table></div>';  //closing table tag

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin management</title>
  <link rel="icon" type="image/png" href="images/icon.png" />
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">

  <div class="container" align="center">
    <form method="POST">
      <h3>Add new server</h3>
      <input type="text" name="servername" placeholder="Server name" required><br>
      <input type="text" name="serverip" placeholder="IP" required><br>
      <input type="submit" name="addserver" class="button" value="Add">
    </form>
    <br>
    <form method="POST">
      <h3>Delete server</h3>
      <input type="text" name="idtodelete" placeholder="ID" required><br>
      <input class="button" type="submit" name="deleteserver" value="Delete">
    </form>
  </div>

  <form action="esp/spain.php" align="right">
    <input class="button" type="submit" value="AE">
  </form>
  <form action="filemanager.php" align="right">
    <input class="button" type="submit" value="File manager">
  </form>
  <form action="main.php" align="right">
    <input class="button" type="submit" value="Main">
  </form>
  <form action="logout.php" align="right">
    <input class="button" type="submit" value="Log out">
  </form>
</body>
</html>