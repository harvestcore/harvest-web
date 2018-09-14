<?php
	require_once('../login/connect.php');
	require('../utils/utils.php');
	session_start();
	if(!$_SESSION['isLogged'] && !$_SESSION['isAdmin']) {
		header("location: ../login/login.php"); 
		die(); 
	}
?>


<html>
<head>
	<title>Chat</title>
	<link rel="icon" type="image/png" href="../images/icon.png"/>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css" />
	<link rel="stylesheet" type="text/css" href="../styles/chat.css" />
	
	<script type="text/javascript">
		function ajax() {
			var req = new XMLHttpRequest();
			
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			
			req.open('GET', 'chatEngine.php', true);
			req.send();
		}
		
		setInterval(function(){ajax();}, 1000);
	
	</script>	
</head>

<body onload="ajax();">
	<?php drawTopBar(); ?>
	
	<div id="chatContainer">
		<div id="chatHeader">
			<h3>Welcome to the chat, <?php echo $_SESSION['userloggedin']; ?>.</h3>
		</div>
		
		<div id="chat"></div>
     	
		<form method="POST" action="chat.php">
			<!-- <textarea name="mensaje" placeholder="Message..." required></textarea> -->
			<input type="text" name="mensaje" placeholder="Message..." required><br>
			<input type="submit" name="enviar" value="Send">
		</form>
		
		<?php
			if (isset($_POST['enviar'])) {
				$nombre = $_SESSION['userloggedin'];
				$msj = $_POST['mensaje'];
				$query = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$msj')";
				$result = mysqli_query($connection, $query);
				header("location: chat.php"); 
			}
		?>
	</div>
	
</body>
</html>