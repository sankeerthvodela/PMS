<?php
error_reporting(0);

?><?php

$conn= mysqli_connect('localhost', 'root','');
if(!$conn)
{
	echo 'Not connected to server';
}
if(!mysqli_select_db($conn,'test'))
{
	echo 'Database not selected';
}	  
	session_start();
	$myusername = $_POST["uname"];
    $mypassword =$_POST["pass"];
	$_SESSION["uname"] = $_POST["uname"];
	$_SESSION["stime"] = time();
    $stime = $_SESSION["stime"];
    $sql = "SELECT * FROM registerfaculty WHERE EMPID = '$myusername' and PASSWORD = '$mypassword'";
    $result = mysqli_query($conn,$sql);
	  if(mysqli_num_rows($result)==1)
	  {
		  
		  header("refresh:1; url=loginfaculty.php");
	  }
   
?>
<?php

	if(isset($_POST["logout"]))
	{
		header("Location=logoutfaculty.php");
	}
?>

<html>
<head>
<title>
WELCOME PAGE FOR FACULTY
</title>
<link  rel="stylesheet" type="text/css" href="styleforwelcomefaculty.css">
</link>
</head>
<body background="1st year building.jpg">
<div align="center">
<center class="h1">
<h1>
WELCOME !!!!
YOU ARE SUCCESSFULLY LOGGED IN AS FACULTY
</h1>
</center>
<ul class="button">
<li>
<a  href="listallprojects.php" >
<input class="buttons" type="button" name="list all projects" value="list all projects">
</a>
</li>
<li>
<a  href="searchproject.html">
<input class="buttons" type="button" name="search for a project" value="search for a project">
</a>
</li>
</ul>
<a class="a1" href="logoutfaculty.php">
<input class="buttons" type="button" name="logout" value="logout">
</a>
</div>
</body>
</html>



