<?php
    // Store File in a name : DisplayPhoto.php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'test';
 
    // some basic sanity checks
    if(isset($_POST['id']) && is_numeric($_POST['id'])) {
        //connect to the db
        $conn = mysqli_connect("$host", "$user", "$pass")
        or die("Could not connect: " . mysql_error());
        
        // select our database
        mysqli_select_db($conn,"$db") or die(mysql_error());
        
        // get the image from the db
        $sql = "SELECT image FROM upload WHERE id=" .$_POST['id'] . ";";
        
        // the result of the query
        $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
        
        // set the header for the image
        header("Content-type: image/jpeg");
        echo mysql_result($result, 0);
        
        // close the db link
        mysql_close($conn);
    }
    else {
    echo 'Please use a real id number';
    }
?>