<?php 
error_reporting(0);
?>
<?php
	session_start();
	$myusername = $_SESSION["uname"];
	$stime = $_SESSION["stime"];
	$usedtime = time() - $stime;
	echo "Thank You".$myusername."<br>";
	echo "Usage Time".$usedtime."seconds";
	session_destroy();
?>
<html>
	<head>
	</head>
	<body>
		<a href = "homepage.html">
			<input type ="button" name = "HOMEPAGE" value ="HOMEPAGE">
		</a>
	</body>
</html>