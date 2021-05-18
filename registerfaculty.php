<?php
	$conn= mysqli_connect('localhost', 'root','');
	if(!$conn){
		echo 'Not connected to server';
	}
	if(!mysqli_select_db($conn,'test')){
		echo 'Database not selected';
	}

	$name=$_POST['NAME'];
	$empid=$_POST['EMPID'];
	$password=$_POST['PASSWORD'];
	$dob=$_POST['DOB'];
	$email=$_POST['EMAIL'];
	$phone=$_POST['PHONE'];

	$query="INSERT INTO registerfaculty (NAME,EMPID,PASSWORD,DOB,EMAIL,PHONE) VALUES ('$name','$empid','$password','$dob','$email','$phone')";
	if(!mysqli_query($conn,$query)){
		echo "registration failed";
	}
	else{
		echo "registration is complete";
	}
	header("refresh:2; url=loginfaculty.html");
?>
