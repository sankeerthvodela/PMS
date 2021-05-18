<?php
	$conn= mysqli_connect("localhost", "root", "");
	$db=mysqli_select_db($conn,"test");
	
	$projectname = $_POST['PROJECTNAME'];
	$organization = $_POST['ORGANIZATION'];
	$students  =  $_POST['STUDENTS'];
	$guide = $_POST['GUIDE'];
	$year  =  $_POST['YEAR'];
	
	$query = "INSERT INTO project (PROJECTNAME,ORGANIZATION,STUDENTS,GUIDE,YEAR) VALUES ('$projectname','$organization','$students','$guide','$year')";
	
	if(!mysqli_query($conn,$query))
	{
		echo "UPDATE SUCCESSFULL";
	}
	else
	{
		echo "UPDATE UNSUCCESSFULL";
	}
?>