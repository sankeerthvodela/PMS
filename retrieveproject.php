<?php
 
// Store File in a name : DisplayPhoto.php
 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';
 
// some basic sanity checks

	$conn= mysqli_connect("localhost","root", "") or die("Could not connect:". mysqli_error());
$db=mysqli_select_db($conn,"test") or
 die(mysqli_error());
 
// get the image from the db
$sql = "SELECT * FROM upload;";
 
// the result of the query
$result = mysqli_query($conn,"$sql") or die("Invalid query: " . mysqli_error());
 
// set the header for the image
//header("Content-type: image/jpg");
echo mysql_result(3,$result);
 
// close the db link
mysqli_close($conn);

?>