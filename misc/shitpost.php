<?php 
	function drawtable() {
		$dir_path = "shitpost";
		if (is_dir($dir_path)) {
			$files = scandir($dir_path);
		}

		echo '<div><table align="center">';  // opening table tag
		echo '<th><div align="center">File</th><th><div align="center">Size</th><th><div align="center">Type</th>'; //table headers
		for ($i = 0; $i < sizeof($files); $i++) {
			if ($files[$i] != '.' && $files[$i] != '..') {
				$path = '' .$dir_path. '/' .$files[$i]. '';
				$sizefull = filesize($path) / 1024;
				$size = round($sizefull, 2);
				$extension = pathinfo($path,PATHINFO_EXTENSION);
				if ($size > 1024) {
					$size = round($size / 1024, 2);
					$size = '' .$size. ' MBytes';
				} else {
					$size = '' .$size. ' KBytes';
				}
				echo '<tr>';
				echo '</i></div><td><a href="' .$path. '">' .$files[$i]. '</a></td><td>' .$size. '</td><td>' .$extension. '</td>';
				echo '</tr>';
			}
		}
		echo '</table></div>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Meems</title>
	<link rel="icon" type="image/png" href="../images/icon.png"/>
	<link rel="stylesheet" type="text/css" href="../styles/stylesmisc.css">
</head>
<style type="text/css">
	.bgbutton {
	    background-color: #4CAF50; /* Green */
	    border: none;
	    color: #000000;
	    padding: 10px 20px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 12px;
	    margin: 4px 2px;
	    cursor: pointer;
	    font-family: "Courier New";
	}

	.bgbutton1 {
	    color: #000000;
	    font-size: 12px;
	    text-align: center;
	    background-color: #000000; 
	    color: #00ff00; 
	    border: 1px solid #00ff00;
	}

	.bgbutton1:hover {
	    color: #00ff00;
	    font-size: 12px;
	    text-align: center;
	    background-color: #00ff00; 
	    color: #000000; 
	    border: 1px solid #00ff00;
	}
</style>
<body>
	<br>
	<h1 align="center">hehexd</h1>
	<br>
	<?php drawtable(); ?>
	<br>

	<form action="misc.php" align="center">
      <input class="bgbutton bgbutton1" type="submit" value="Misc">
    </form>
    <form action="../index.html" align="center">
      <input class="bgbutton bgbutton1" type="submit" value="Index">
    </form>
</body>
</html>