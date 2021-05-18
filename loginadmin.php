<?php

if(isset($_POST["uname"])&&isset($_POST["pass"]))
{
	
	session_start();
	$_SESSION["uname"] = $_POST["uname"];
	$_SESSION["stime"] = time();
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$stime = $_SESSION["stime"];
	
	
	if($uname=="admin"&&$pass=="xyz")
	{
		header("refresh:1; url=loginadmin.php");
	}
}

?>
<?php

	if(isset($_POST["logout"]))
			header("Location=logoutadmin.php");
?>

<html>
<head>
<title>
WELCOME PAGE FOR ADMIN
</title>
<link  rel="stylesheet" type="text/css" href="styleforwelcomeadmin.css">
</link>
</head>
<body background="1st year building.jpg">
<div align="center">
<center class="h1">
<h1>
WELCOME !!!!
YOU ARE SUCCESSFULLY LOGGED IN AS ADMIN
</h1>
</center>
<ul class="button">
<li>
<a href="listallprojects.php" >
	<input class="buttons" type="button" name="List All Projects" value="List All Projects">
</a>
</li>
<li>
<a href="searchproject.html">
	<input class="buttons" type="button" name="Search For A Project" value="Search For A Project">
</a>
</li>
<li>
<a href="addproject.php">
	<input class="buttons" type="button" name="Add Project" value="Add Project">
</a>
</li>
<li><br><br><br>
<a href="registeredstudents.php">
	<input class="buttons" type="button" name="Registered Students" value="Registered Students">
</a>
</li>
<li>
<a href="registeredfaculty.php">
	<input class="buttons" type="button" name="Registered Faculty" value="Registered Faculty">
</a>
</li>
</ul>
<br><br><br><br>
<a class ="a1" href="logoutadmin.php">
	<input class="buttons" type ="button" name ="LOGOUT" value ="LOGOUT">
</a>
</div>
</body>
</html>