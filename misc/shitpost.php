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
	<title>Meems</title>
	<link rel="icon" type="image/png" href="../images/icon.png"/>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
	<?php drawTopBar(); ?>

	<br>
	<h1 align="center">hehexd</h1>
	<br>
	<div id="filtroArchivos" align="center">
		<form method="post">
			<div id="filter">
				<b>Filter:</b>
				<select name="type">
					<option value"all" selected="selected">all</option>
					<option value="txt">txt</option>
					<option value="jpg">jpg</option>
					<option value="png">png</option>
					<option value="gif">gif</option>
					<option value="mp3">mp3</option>
					<option value="mp4">mp4</option>
				</select>
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
	
	<br>
	<?php drawFilesTable(); ?>
	<br><br>
	
	<form enctype="multipart/form-data" action="uploadfile.php" method="POST" align="center">
		<div id="uploadfile">Select file to upload:
			<input type="file" name="fileToUpload" id="fileToUpload" value="File">
			<input type="submit" value="Upload" name="submit">
    	</div>
	</form>
	<br><br>
</body>
</html>