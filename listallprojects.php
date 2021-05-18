<?php 


$conn= mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($conn,"test");

$sql = "SELECT * FROM project";


$records = mysqli_query($conn, $sql);

echo "<table>";
if($records)
{
	echo "<th>SNO</th><th>PROJECTNAME</th><th>ORGANIZATION</th><th>STUDENTS</th><th>ABSTRACTNAME</th><th>GUIDE</th><th>YEAR</th>";
}
while($row = mysqli_fetch_array($records))
{
	echo "<tr><td>".$row['SNO']."</td><td>".$row['PROJECTNAME']."</td><td>".$row['ORGANIZATION']."</td><td>".$row['STUDENTS']."</td><td>".$row['ABSTRACTNAME']."</td><td>".$row['GUIDE']."</td><td>".$row['YEAR']."</td><td>";
}
echo "</table>";
mysqli_close($conn);

?>

	
