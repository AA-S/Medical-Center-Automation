<?php
    session_start();
    if ((isset($_SESSION['patient'])&& $_SESSION['patient']=='admin@gmail.com') || 
				(isset($_COOKIE['user']) &&$_COOKIE['patient']=='admin@gmail.com')) 
    	include 'adminHeader.php';
    else
		include 'doctorPersonalHeader.php';
	include 'databaseConnection.php';

?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/fileUpload_style.css">


		    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <STYLE TYPE="text/css">
       
input:focus{
         background:#fff;
        border:2px solid #330066;
    background-repeat:no-repeat;
     }
  
   
 
 input:focus:invalid {
         background-image: url('images/redx.jpg');
         background-position:right;
         background-repeat:no-repeat;
         -moz-box-shadow:none;
     }
  
    
      input:required:valid {
        background-image: url('images/green_check.jpg');
        background-position:right;
        background-repeat:no-repeat;
        -moz-box-shadow:none;
     }
   
    
   .help {
    display:none;
    font-size:90%;
}
    
  input:focus + .help {
    display:inline-block;
}

   
</STYLE>


	</head>

	<center>
	<body>
		<br><br>
		<div class="maindiv8">

			

			<div class="upload">

				<form action="fileUpload.php" method="POST" enctype="multipart/form-data">
					<h4>Enter E-mail address file to be sent</h4>
					<input type="email" name="emailId" placeholder="Enter E-mail to be sent file" style="width:300px;height:35px;padding-left:8px;" required><br><br>

					<h4>Select file category</h4>
					<select name="fileCategory" style="width:300px;height:35px;padding-left:8px;" required>
						<option value="">File Category</option>
						<option value="prescription">Prescription</option>
						<option value="report">Report</option>

					</select><br><br>
					<h4>Short description about file</h4>
					<textarea name="desc" placeholder="Short description about file" style="width:300px;height:85px;padding-left:8px;"  required> </textarea><br><br>
					<h4>Upload file</h4>
					<input type="file" name="fileUp" required><br><br>

					<input type="submit" name="submit" value="Upload File" style="width:300px;height:35px"><br>

				</form>


				<?php


					if(isset($_SESSION['doctor']))
    {
    	$email1 = $_SESSION['doctor'];
    	$check = 1;
    }
		
	else if(isset($_COOKIE['dortorUser']))
	{
		$email1 = $_COOKIE['dortorUser'];
		$check = 1;
	}
		
	else if(isset($_SESSION['patient']) && $_SESSION['patient']=='admin@gmail.com')
	{
		$email1 = $_SESSION['patient'];
		$check = 2;
	}
		

	else if(isset($_COOKIE['user']) && $_COOKIE['user']=='admin@gmail.com')
	{
		$email1 = $_COOKIE['user'];
		$check = 2;
	}

	else
	{
		//header('Location:home.php');
		die("You have to login first");
	}
		


					if(isset($_POST['submit']))
					{
						$email = $_POST['emailId'];
						$category = $_POST['fileCategory'];
						$description = $_POST['desc'];

						//$description = "It is ".$category."<br>".$description;
						$date = date("D, d M Y H:i:s A");

						if($_FILES['fileUp']['error']>0)
                        {
                            echo "Upload error occured<br>";
                        } 

                        else
                        {
                            $imageName = time().$_FILES['fileUp']['name'];
                            $imageLink = "upload/".$imageName;

                            move_uploaded_file($_FILES['fileUp']['tmp_name'],$imageLink);

                                        
                            $imageDatabaseLink = "upload/".$imageName;
                            //echo "File Moved";
                        }

                        $insert = "INSERT INTO `upload_table` VALUES(
                        	'','$email','$email1','$category','$description','$imageDatabaseLink','$date')";

						if(mysql_query($insert))
						{
							?>
									<script type="text/javascript">
										 window.alert("File Uploaded succesfully");
									</script>
							<?php
							
						}
						else
							echo "Error Occured";
					}

				?>

			</div>

		</div>
	</body>
	<br>
	<?php 

		include 'footer.php';

	?>
	</center>
</html>

