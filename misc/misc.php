<?php
	require('../utils/utils.php');
?>

<html>
	<head>
		<title>Server specs</title>
		<link rel="stylesheet" type="text/css" href="../styles/styles.css">
		<link rel="icon" type="image/png" href="../images/icon.png">
	</head>

	<body>
		<?php drawTopBar(); ?>
		<br><br><br>
		<h2 align="center">¯\_(ツ)_/¯</h2>
		<br>

		<h3 align="center">Web server specs</h3>

		<table align="center" id="servers">
			<tr>
				<th></th>
				<th><div align="center">Load Balancer (x2)</div></th>
				<th><div align="center">Node (x2)</div></th>
				<th><div align="center">NAS (x1)</div></th>
			</tr>
			<tr>
				<td>System</td>
				<td>Raspberry PI 3B</td>
				<td>VM</td>
				<td>Custom</td>    
			</tr>
			<tr>
				<td>CPU</td>
				<td>4C/4T @ 1.2GHz Broadcom BCM2837</td>
				<td>2C/2T @ 3.1GHz Athlon 64 x2 6600</td>
				<td>4C/4T @ 4.3GHz Intel Core i5-4430</td>  
			</tr>
			<tr>
				<td>MoBo</td>
				<td>Proprietary</td>
				<td>Asus M2N-SLI Deluxe</td>
				<td>Gigabyte H81M-C</td>
			</tr>
			<tr>
				<td>RAM</td>
				<td>1GB @ 900MHz LPDDR2</td>
				<td>4GB @ 800MHz DDR2</td>
				<td>8GB @ 1600MHz DDR3</td>
			</tr>
			<tr>
				<td>SSD</td>
				<td>16GB Flash Drive</td>
				<td>none</td>
				<td>240GB</td>
			</tr>
			<tr>
				<td>HDD</td>
				<td>none</td>
				<td>10GB</td>
				<td>640GB</td>
			</tr>
			<tr>
				<td>GPU</td>
				<td>Broadcom VideoCore IV</td>
				<td>none</td>
				<td>NVidia GT 630</td>
			</tr>
			<tr>
				<td>NIC</td>
				<td>1x 10/100</td>
				<td>2x Gigabit, 1x 10/100</td>
				<td>1x Gigabit</td>
			</tr>
			<tr>
				<td>SO</td>
				<td>Raspbian 4.9</td>
				<td>Ubuntu Server 16.04.3</td>
				<td>Ubuntu 17.10</td>
			</tr>
		</table>

		<p align="center"><b>Note: </b>Web server currently running in one Raspberry PI 3B.</p>

	</body>
</html>