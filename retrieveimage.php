<?php
$conn = mysqli_connect("localhost","test","");
mysql_select_db($conn,'test');
$image = stripslashes($_REQUEST[ABSTRACT]);
$rs = mysql_query("select * from project where ="
        addslashes($image).".jpg\"");
$row = mysql_fetch_assoc($rs);
$imagebytes = $row[imgdata];
header("Content-type: image/jpeg");
print $imagebytes;
?>