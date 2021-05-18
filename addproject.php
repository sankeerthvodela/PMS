<html>
	<head>
		<title>Upload - photo</title>
		<style>
			.up_pho
			{
			border:1px solid #BEBEBE;
			margin:50px 400px 40px 40px;
			padding:10px 10px 10px 10px;
			}
		</style>
	</head>
	<body>
		<div class=up_pho >
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post enctype="multipart/form-data" >
				<div class="line"><label for="projectnamename">PROJECTNAME *: </label><input type="text" id="PROJECTNAME" name="PROJECTNAME"/></div>
				<div class="line"><label for="organization">ORGANIZATION *: </label><input type="text" id="ORGANIZATION" name="ORGANIZATION"/></div>
				<div class="line"><label for="students">STUDENTS *: </label><input type="text" id="STUDENTS" name="STUDENTS"/></div>
				
				<div class="line"><label for="guide">GUIDE *: </label><input type="text" id="GUIDE" name="GUIDE"/></div>
				<div class="line"><label for="year">YEAR *: </label><input type="text" id="YEAR" name="YEAR"/></div
				
				<input type=hidden name="MAX_FILE_SIZE" value="1000000" />
				<input type="file" name="image">
				<input type=submit value=submit />
			</form>
			<?php
 
				// Checking the file was submitted
				if(!isset($_FILES['image'])) { echo '<p>Please Select a file</p>'; }
				
				else{ 
					try {
						$msg = upload(); // function calling to upload an image
						echo $msg;
					}
					catch(Exception $e) {
						echo $e->getMessage();
						echo 'Sorry, Could not upload file';
					}
				}
 
				function upload() {
					//include "database/dbco.php";
					$maxsize = 10000000; //set to approx 10 MB
				
					//check associated error code
					if($_FILES['image']['error']==UPLOAD_ERR_OK) {
				
						//check whether file is uploaded with HTTP POST
						if(is_uploaded_file($_FILES['image']['tmp_name'])) {
				
							//checks size of uploaded image on server side
							if( $_FILES['image']['size'] < $maxsize) {
				
								//checks whether uploaded file is of image type
								if($_FILES['image']['type']=="image/gif" ||$_FILES['image']['type'] =="image/jpg"|| $_FILES['image']['type']== "image/png" || $_FILES['image']['type']== "image/jpeg" || $_FILES['image']['type']== "image/JPEG" || $_FILES['image']['type']== "image/PNG" || $_FILES['image']['type']== "image/GIF"||$_FILES['image']['type'] == "image/JPG") {
								
								// prepare the image for insertion
								$imgData =file_get_contents($_FILES['image']['tmp_name']);
								
								// put the image in the db...
								// database connection
								$host = 'localhost';
								$user = 'root';
								$pass = '';
								$db = 'test';
				
								$conn=mysqli_connect($host, $user, $pass) OR DIE (mysqli_error());
								
								// select the db
								mysqli_select_db ($conn,$db) OR DIE ("Unable to select db".mysqli_error());
								
								// our sql query
								$PROJECTNAME = $_POST['PROJECTNAME'];
								$ORGANIZATION = $_POST['ORGANIZATION'];
								$STUDENTS = $_POST['STUDENTS'];
								$GUIDE = $_POST['GUIDE'];
								$YEAR = $_POST['YEAR'];
								
								$ft = $_FILES['image']['name'];
								echo '"'.$ft.'"';
								$fileTmpLoc = $_FILES["image"]["tmp_name"];
								$moveResult = move_uploaded_file($fileTmpLoc, "http://localhost/mini_project/images/$ft");
								if ($moveResult != true) {
									header("location: ../message.php?msg=ERROR: File upload failed");
									
								}
								mysqli_query($conn,"INSERT INTO project
								(PROJECTNAME,ORGANIZATION,STUDENTS,ABSTRACTNAME,GUIDE,YEAR)
								VALUES
								('$PROJECTNAME','$ORGANIZATION','$STUDENTS', '{$_FILES['image']['name']}','$GUIDE','$YEAR')") 
								or die("Error in Query insert: " . mysql_error());
								// insert the image
								
								$msg='<p>Image successfully saved in database . </p>';
							}
							else
								$msg="<p>Uploaded file is not an image.</p>";
							}
							else {
								// if the file is not less than the maximum allowed, print an error
								$msg='<div>File exceeds the Maximum File limit</div>
								<div>Maximum File limit is '.$maxsize.' bytes</div>
								<div>File '.$_FILES['image']['name'].' is '.$_FILES['image']['size'].
								' bytes</div><hr />';
							}
						}
						else
							$msg="File not uploaded successfully.";
						}
					else {
						$msg= file_upload_error_message($_FILES['image']['error']);
					}
					return $msg;
				}
	
				// Function to return error message based on error code
	
				function file_upload_error_message($error_code) {
					switch ($error_code) {
						case UPLOAD_ERR_INI_SIZE:
						return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
						case UPLOAD_ERR_FORM_SIZE:
						return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
						case UPLOAD_ERR_PARTIAL:
						return 'The uploaded file was only partially uploaded';
						case UPLOAD_ERR_NO_FILE:
						return 'No file was uploaded';
						case UPLOAD_ERR_NO_TMP_DIR:
						return 'Missing a temporary folder';
						case UPLOAD_ERR_CANT_WRITE:
						return 'Failed to write file to disk';
						case UPLOAD_ERR_EXTENSION:
						return 'File upload stopped by extension';
						default:
						return 'Unknown upload error';
					}
				}
			?>
		</div>
	</body>
</html>