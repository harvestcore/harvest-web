<!DOCTYPE html>
<html>
<head>
	<title>Server specs</title>
	<link rel="stylesheet" type="text/css" href="../styles/stylesmisc.css">
  <link rel="icon" type="image/png" href="../images/icon.png" />
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
  <h1 align="center">Misc</h1>
  <br>
  <br>
  <h2 align="center">¯\_(ツ)_/¯</h2>
  <br>
  <br>

  <h3 align="center">Web server specs</h3>

  <table align="center">
    <tr>
      <th></th>
      <th>Load Balancer (x2)</th>
      <th>Node (x2)</th>
      <th>NAS (x1)</th>
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

  <br>
  <form action="shitpost.php" align="center">
    <input class="bgbutton bgbutton1" type="submit" value="Shitpost">
  </form>
  <form action="../index.html" align="center">
    <input class="bgbutton bgbutton1" type="submit" value="Index">
  </form>
</body>
</html>