<html>
<head>
<title>
image upload 
</title>
</head>
<body>
<form action="imageuploaddemo.php" method="post" enctype="multipart/form-data">
<input type="file" name="image" >
<input type="submit" value ="submit" name="submit">
</body>
</html>
<?php
//if(isset($_POST["submit"])
//{
	$conn= mysqli_connect("localhost", "root", "");
    $db=mysqli_select_db($conn,"test");
	$imagename = mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
	$imagedata = mysqli_real_escape_string($conn,file_get_contents($_FILES["image"]["tmp_name"]));
	
	$imagetype = mysqli_real_escape_string($conn,$_FILES["image"]["type"]);
	
	if(substr($imagetype,0,5)=="image")
		
		{
			mysqli_query($conn, "INSERT INTO 'imageupload' VALUES('','$imagename','$imagetype')");
			
			echo "IMAGE UPLOADED SUCCESSFULLY";
			
			
		}
		else
		{
			echo "please choose an image file";
		}
	


?>