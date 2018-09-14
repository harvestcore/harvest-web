<?php
	include "../login/connect.php";
	include "../utils/utils.php";

	$query = "SELECT * FROM chat ORDER BY id ASC";
	$result = mysqli_query($connection, $query);
	while($fila = $result->fetch_array()):
?>

<div id="chatMesagges" align="left">
	<span style="color: #4C5AAF"><?php echo $fila['nombre']; ?></span>
	<span style="color: #1E1E1E"><?php echo $fila['mensaje']; ?></span>
	<span style="float: right"><?php echo formatearFecha($fila['fecha']); ?></span>
</div>
		
<?php endwhile; ?>