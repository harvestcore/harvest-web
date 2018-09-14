<?php
	require('../utils/utils.php');
?>

<head>
<meta charset="utf-8">
	<title>HC's Twitch</title>
	<link rel="icon" type="image/png" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<?php drawTopBar(); ?>
	
	<br><br><br><br><br><br><br>
	
	<div id="twitch-embed" align="center"></div>
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
        width: 854,
        height: 480,
        channel: "harvestcore",
		layout: "video"
      });
    </script>
</body>
</html>
