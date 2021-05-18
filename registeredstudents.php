<?php
	$conn= mysqli_connect("localhost", "root", "");
	$db=mysqli_select_db($conn,"test");

	$sql = "SELECT SNO, NAME, ROLLNO, DOB, EMAIL, PHONE FROM registerstudent";


	$records = mysqli_query($conn, $sql);

	echo "<table>";
	if($records)
	{
		echo "<th>SNO</th><th>NAME</th><th>ROLLNO</th><th>DOB</th><th>EMAIL</th><th>PHONE</th>";
	}
	while($row = mysqli_fetch_array($records))
	{
		echo "<tr><td>".$row['SNO']."</td><td>".$row['NAME']."</td><td>".$row['ROLLNO']."</td><td>".$row['DOB']."</td><td>".$row['EMAIL']."</td><td>".$row['PHONE']."</td><td>";
	}
	echo "</table>";
	mysqli_close($conn);
?>