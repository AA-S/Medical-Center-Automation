<?php

	session_start();
	//include 'patientPersonalHeader.php';
	include 'databaseConnection.php';

	

?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/viewProfile_style.css">
	</head>
	<center>
	<body>
		<div class="maindiv2">


		<?php
			//$check=0;
			if ((isset($_SESSION['patient'])&& $_SESSION['patient']=='admin@gmail.com') || 
				(isset($_COOKIE['user']) && $_COOKIE['user']=='admin@gmail.com') || isset($_SESSION['doctor']) || isset($_COOKIE['user'])) 
			{
				//echo "<h1>You Have To Login First</h1>";
				//header('Location')
				//die();
				include 'adminHeader.php';

				if(isset($_COOKIE['user']))
		 			$profile = $_COOKIE['user'];

		 		else if(isset($_SESSION['patient']))
		 			$profile = $_SESSION['patient'];
		 	//echo $profile;
    	 	$query = "SELECT * FROM `patients_table`";
	?>

<div class="marqu" style="width: 960px;height: 80px;background-color: black;margin-top:0px;margin-bottom:5px;">
			<marquee id="test" behavior="scroll" direction="left" height="40" scrolldelay="3" scrollamount="6" style="padding:10px;margin-left:200px;margin-right:200px;" 
			onMouseOver="document.all.test.stop()" onMouseOut="document.all.test.start()">
			 <h1 style="color:red;">Welcome to Our KUET Online Medical Center Service</h1></marquee>
			 </div>

	<?php
    	 	//$check=1;
				$result = mysql_query($query);
				while ($row = mysql_fetch_array($result)) 
				{
					if($row['email']=='admin@gmail.com')
						continue;

		?>

				

				<fieldset style="width:auto;height:auto;margin-bottom:30px;">
				<legend align="center"><p style="	font: bold;font-weight: bolder;font-style: italic;color: red;
						" id="legend">My Profile</p></legend>

					<div class="profilediv">

					<div class="imagediv"><img src="<?php echo $row['imageLink'] ?>"></div>

					<div class="infodiv">
						<h3>My Profile:</h3>
					<p class="information">
					<?php

					echo "Name : ".$row['firstName']." ".$row['lastName']."<br>";
					echo "E-mail : ".$row['email']."<br>";
					//echo "Clinical Interest : ".$row['clinicalInterest']."<br>";

					//echo "Title : ".$row['title']."<br>";
					//echo "Medical College : ".$row['medicalCollege']."<br>";
					//echo "Residence : ".$row['residence']."<br>";
					//echo "Certification : ".$row['certification']."<br>";
					echo "User Name : ".$row['userName']."<br>";

					echo "Mobile No : ".$row['mobileNo']."<br>";
					echo "Date Of Birth : ".$row['birthDate']."<br>";
					echo "Gender : ".$row['gender']."<br>";
					echo "Date of joining : ".$row['date']."<br>";

					?>
					</p></div>
			
					</div>
				</fieldset>
				
			<?php
			}
			}

			/*else if(isset($_SESSION['doctor']) || isset($_COOKIE['doctorUser']))
			{
				include 'doctorPersonalHeader.php';
				//$check=2;

				if(isset($_COOKIE['doctorUser']))
		 			$profile = $_COOKIE['doctorUser'];

		 		else if(isset($_SESSION['doctor']))
		 			$profile = $_SESSION['doctor'];

		 			$query = "SELECT * FROM `doctor_table` WHERE `email`='$profile'";

			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) 
			{

		?>

				<fieldset style="width:auto;height:auto;margin-bottom:30px;">
				<legend align="center"><p style="	font: bold;font-weight: bolder;font-style: italic;color: red;
						" id="legend">Doctor ID No : <?php echo $row['idNumber'];?> </p></legend>

					<div class="doctordiv">

					<div class="imagediv">
						<img src="<?php echo $row['imageLink'] ?>">

						<div>
							<fieldset style="padding:7px;">
							<legend align="center"><h4 style="color:red">Appointments Info </h4></legend>
							<?php
								$count=1;
								$value2=$row['idNumber'];
								$query2 = "SELECT * FROM `appointment_table` WHERE `doctorId`='$value2'";
								$result2 = mysql_query($query2);

								echo "Total appointments: ".mysql_num_rows($result2)."<br>";

								while ($row2 = mysql_fetch_array($result2)) 
								{
									echo "Appointment ".$count++.": Date - ".$row2['serviceDate'].", Time - ".$row2['serviceTime']."<br>";
								}

							?>
							</fieldset>
						</div>

					</div>



					<div class="infodiv">
						<h3>Doctor's Profile:</h3>
					<p class="information">
					<?php

					echo "Name of the Doctor : ".$row['name']."<br>";
					echo "E-mail : ".$row['email']."<br>";
					echo "Clinical Interest : ".$row['clinicalInterest']."<br>";

					echo "Title : ".$row['title']."<br>";
					echo "Medical College : ".$row['medicalCollege']."<br>";
					echo "Residence : ".$row['residence']."<br>";
					echo "Certification : ".$row['certification']."<br>";
					echo "Speciality : ".$row['speciality']."<br>";

					echo "Mobile No : ".$row['mobileNo']."<br>";
					echo "Date Of Birth : ".$row['birthDate']."<br>";
					echo "Gender : ".$row['gender']."<br>";
					echo "Date of joining : ".$row['date']."<br>";

					?>
					</p></div>
			
					</div>
				</fieldset>
				
			<?php
			}
			

			}*/
			else header('Location:loginAsPatient.php');

			/*if($check==1)
			{
				header('Location:loginAsPatient.php');
			}

			else if($check==2)
			{
				header('Location:loginAsDoctor.php');
			}
			else die();*/
			
			?>

			</div>

	</body>
	<?php
		include 'footer.php';
	?>
	</center>

</html>