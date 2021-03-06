<?php
	require_once('../login/connect.php');
	session_start();

	function drawTopBar() {
		echo '<div class="topnav">';

			//<!-- Centered link -->
			echo '<div class="topnav-centered">';

			echo '<a href="../main/homepage.php" class="active">Home</a>';

			echo '</div>';

			//<!-- Left-aligned links (default) -->
			if ($_SESSION['userloggedin'] == 'admin') {
				echo '<a href="../main/adminmain.php">Management</a>';
				echo '<a href="../main/main.php">Servers</a>';
			} else {
				echo '<a href="../main/main.php">Servers</a>';
			}
		
			echo '<a href="../misc/shitpost.php">Repo</a>';
			echo '<a href="../misc/misc.php">Specs</a>';
			echo '<a href="../misc/chat.php">Chat</a>';
			echo '<a>Users online: ' . getUsuariosConectados() . '</a>';

			//<!-- Right-aligned links -->
			echo '<div class="topnav-right">';
				echo '<a href="../main/twitch.php">Twitch</a>';
				echo '<a href="../main/contact.php">Contact</a>';
				if (!$_SESSION['userloggedin']) {
					echo '<a href="../login/login.php">Login</a>';
				} else {
					echo '<a href="../login/logout.php"> (' . $_SESSION['userloggedin'] . ') Logout</a>';
				}
			echo '</div>';
		echo '</div>';
	}

	function getAllExtensions() {
		$dir_path = "shitpost";
		if (is_dir($dir_path)) {
			$files = scandir($dir_path);
		}
		
		$extensiones = array(sizeof($files));
		for ($i = 0; $i < sizeof($files); $i++) {
			if ($files[$i] != '.' && $files[$i] != '..') {
				$path = '' .$dir_path. '/' .$files[$i]. '';
				$sizefull = filesize($path) / 1024;
				$size = round($sizefull, 2);
				$ext = pathinfo($path,PATHINFO_EXTENSION);
				$extensiones[$i] = $ext;
			}
		}
		
		$extensiones = array_unique($extensiones);
		
		return $extensiones;		
	}

	function drawFilesTable() {
		$dir_path = "shitpost";
		if (is_dir($dir_path)) {
			$files = scandir($dir_path);
		}

		echo '<div><table id="servers" align="center">';  // opening table tag
		echo '<th><div align="center">File</th><th><div align="center">Size</th><th><div align="center">Type</th><th><div align="center">Last modification</th>'; //table headers
		for ($i = 0; $i < sizeof($files); $i++) {
			if ($files[$i] != '.' && $files[$i] != '..') {
				$path = '' .$dir_path. '/' .$files[$i]. '';
				$sizefull = filesize($path) / 1024;
				$size = round($sizefull, 2);
				$extension = pathinfo($path,PATHINFO_EXTENSION);
				$lastmodification = date("F d Y H:i:s", filemtime($path));
				if ($size > 1024) {
					$size = round($size / 1024, 2);
					$size = '' .$size. ' MBytes';
				} else {
					$size = '' .$size. ' KBytes';
				}
				if (!isset($_POST["type"]) || $_POST["type"] == "all" || $_POST["type"] == $extension) {
					echo '<tr>';
					echo '</i></div><td><a href="' .$path. '">' .$files[$i]. '</a></td><td>' .$size. '</td><td>' .$extension. '</td><td>' .$lastmodification. '</td>';
					echo '</tr>';
				}
			}
		}
		echo '</table></div>';
	}

	function formatearFecha($fecha) {
		return date('H:i', strtotime($fecha));
	}

	function getUsuariosConectados() {
		include '../login/connect.php';
		
		$sql = "SELECT * FROM `login` WHERE conectado='1'";
		$result = mysqli_query($connection, $sql);
		$usuariosConectados = mysqli_num_rows($result);
		if (!$result)
			$usuariosConectados = "xd";
		return $usuariosConectados;
	}

	function limpiarChat() {
		include '../login/connect.php';
		
		if (getUsuariosConectados() == 0) {
			$sql = "DELETE FROM `chat`";
			$result = mysqli_query($connection, $sql);
		}
	}
?>