<?php
	
	if(isset($_POST["project_name"])&&isset($_POST["search"]))
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
		$project_name = $_POST["project_name"];
		
		$query = "SELECT * FROM project where ABSTRACTNAME='$project_name'";		
		
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)==1)
		{
		  
		  echo "project is already done";
		}
		else
		{
			echo "this project is not done";
		}
		
	}