<?php
	if(isset($_POST["uname"])&&isset($_POST["pass"]))
	{
		$conn= mysqli_connect('localhost','root','');
		if(!$conn)
		{
			echo 'Not connected to server';
		}
		if(!mysqli_select_db($conn,'test'))
		{
			echo 'Database not selected';
		}
	  session_start();
	  $_SESSION["uname"] = $_POST["uname"];
	  $_SESSION["stime"] = time();
      $myusername = $_POST["uname"];
	  $mypassword = $_POST["pass"];
	  $stime = $_SESSION["stime"];
	  $sql = "SELECT * FROM registerstudent WHERE ROLLNO = '$myusername' and PASSWORD = '$mypassword'";
	  $result = mysqli_query($conn,$sql);
	  if(mysqli_num_rows($result)==1)
	  {
		  header("refresh:1; url=loginstudent.php");
	  }
	}
	else
	{
		
	}
   
?>

<?php

	if(isset($_POST["logout"]))
	{
		header("Location=logoutstudent.php");
	}
?>

<html>

<head>
<title>
WELCOME PAGE FOR STUDENTS
</title>
<link  rel="stylesheet" type="text/css" href="styleforwelcomestudent.css">
</link>
</head>
<body background="1st year building.jpg">
<div align="center" >
<center class="h1">
<h1>
WELCOME !
YOU ARE SUCCESSFULLY LOGGED IN AS STUDENT
</h1></center>
<ul class="button">
<li>
<a href="listallprojects.php" >
<input class="buttons" type="button" name="listallprojects" value="listallprojects">
</a>
</li>
<li>
<a href="searchproject.html">
<input class="buttons" type="button" name="search for a project" value="search for a project">
</a>
</li>
</ul>
<a class="a1"  href ="logoutstudent.php">
<input class="buttons" type="button" name="logout" value="logout">
</a>
</div>

</body>
</html>