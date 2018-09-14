<?php
	require_once('../login/connect.php');
	session_start();

	function sincronizarBD() {
		$dir_path = "shitpost";
		if (is_dir($dir_path)) {
			$files = scandir($dir_path);
		}
		
		
		
		for ($i = 0; $i < sizeof($files); $i++) {
			if ($files[$i] != '.' && $files[$i] != '..') {
				$sql = "INSERT INTO `votes` (name) VALUES (" . $files[$i] . ")";
				//$result = mysqli_query($connection, $sql);
				echo("<script>console.log('PHP: ". $sql ."');</script>");
			}
			
		}
		
	}

?>