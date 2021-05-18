<?php
error_reporting(0);
?>
<?php
	session_start();
	$username = $_SESSION["uname"];
	$stime = $_SESSION["stime"];
	$usedtime = time() - $stime;
	echo "thank you".$username."<br>";
	echo "user time:".$usedtime;
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