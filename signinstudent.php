<?php
	//User Authentication
	session_start();
	if(isset($_POST['login']))
	{
		//echo 'ok';
		
		//Recieve the data and filter it
		$conn= mysqli_connect("localhost", "root", "");
		$db=mysqli_select_db($conn,"test");
		
		$uname = strip_tags(mysql_real_escape_string($_POST['username']));
		$password = strip_tags(mysql_real_escape_string($_POST['password']));
		$query = "SELECT * FROM registerstudent WHERE ROLLNO='$uname' LIMIT 1";
		$query_run = mysql_query($query);
		confirm_query($query_run);
		$num_rows = mysql_num_rows($query_run);
		
		if($num_rows == 0){
			echo $msg="<script>alert('Invalid RollNo');</script>";
				
			//redirect the user to next page after a sec
			header('refresh:0;url=signinstudent.php');
			exit();
			include 'includes/mysql_close.php';
		}
		else
		{
			$query = "SELECT * FROM registerstudent WHERE ROLLNO='$uname' and PASSWORD='$password' LIMIT 1";
			$query_run = mysql_query($query);
			confirm_query($query_run);
			$num_rows = mysql_num_rows($query_run);
			if($num_rows == 1)
			{
				echo $msg="<script>alert('Welcome');</script>";
				
				//redirect the user to next page after a sec
				header('refresh:0;url=loginstudent.php');
				exit();
			}
			else
			{
				echo $msg="<script>alert('Invalid ROLLNO and password Combination');</script>";
				
				//redirect the user to next page after a sec
				header('refresh:0;url=signinstudent.php');
				exit();
			}
		}
	}
?>
<!DOCTYPE html>

 <html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        
        <title>Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <div class="codrops-top">
                
                <div class="clr"></div>
            </div>
            <header>
                <h1><span></span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1>Log in as Student</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="login" value="login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="registerstudent.html" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>
					</div>
                </div>  
            </section>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br>
			<br>
					<div class="logo">
		<img class = "logos" src="pmslogo.png" >
		</div>
        </div>

    </body>
</html>