<?php
session_start();
	if (!isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
		//if($_SESSION['patient']!='admin@gmail.com' && $_COOKIE['user']!='admin@gmail.com')
		header('Location:home.php?app="login1"');
	
	}
	include 'databaseConnection.php';

?>




<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/deletePatient_style.css">

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
	<?php include 'doctorPersonalHeader.php';?>
	<body>
		<div class="maindiv3">
		
			<form action="deleteDoctor.php" method="POST">

				<?php 

					if(isset($_GET['error']) && $_GET['error']=='yes')
					{
						?>
						<br>
							<h3 style="color:red;">Your E-mail and Password is not match<br>Try again"</h3>
						<?php
					}
						

				?>
			<label>
				<br>
				<h3>Your E-mail<br>
				<input type="email" name="email1" placeholder="Enter your E-mail address" style="width:600px;height:40px;padding-left:10px;" required>
				</h3><br>
				<h3>Your Password <br>
				<input type="password" name="password1" placeholder="Enter your Password" style="width:600px;height:40px;padding-left:10px;" required></h3>
				<br>
				<input type="reset" name="reset" value="Reset All" style="width:290px;height:40px;margin-right:20px;border-radius:15px;background-color:blue;">
				<input type="submit" name="submit" value="Delete" style="width:290px;height:40px;border-radius:15px;background-color:yellow;">
				<br>
			</label><br>

		</form>

		</div>

	</body>
	<br>
	<?php
	echo "";
		include 'footer.php';
	?>
</center>
</html>


<?php

if(isset($_POST['submit']))
{
	$email1 = $_POST['email1'];
	$password1 = $_POST['password1'];


	$query1="DELETE FROM `doctor_table` WHERE `email`='$email1' AND `password`='$password1'";
	$query2 = "SELECT * FROM `doctor_table` WHERE `email`='$email1' AND `password`='$password1'";
	
	$nor1 = mysql_num_rows(mysql_query($query2));
	$result1 = mysql_query($query1);
    echo $nor1;
	if($nor1)
	{
/*?>
		<script type="text/javascript">

			window.alert("Your account has been deleted Succesfully");

		</script>
<?php*/
		header('Location:logoutAsDoctor.php');
	}

	else
	{
		header('Location:deleteDoctor.php?error=yes');
	}
}
	

?>
