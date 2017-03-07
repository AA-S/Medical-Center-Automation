<?php
session_start();
    include 'patientPersonalHeader.php';
    include 'databaseConnection.php';
?>

<html>
	<head>
		<title></title>
	</head>
	<center>
	<body>
		<div class="maindiv4" style="width:960px;height:auto;">

		<?php

		if(isset($_COOKIE['user']))
		 		$email1 = $_COOKIE['user'];
		 	else if(isset($_SESSION['patient']))
		 		$email1 = $_SESSION['patient'];
		 	else
		 	{
		 		echo "<br><br><h2>You have not taken any appointment</h2>";
		 		die();
		 	}
		 		

    
	$query = "SELECT * FROM `appointment_table` WHERE `email`='$email1'";
	$result1 = mysql_query($query);

	$appointmentNo=1;

	while($row = mysql_fetch_array($result1))
	{
?>

		<br>
		<fieldset>
			<legend style="color:red;font-style:italic;"> <?php echo "Appointment No : ".$appointmentNo++; ?> </legend>

			<div style="width:450px;height:auto;float:left;text-align:left;padding-left:25px;color:green;font-weight:bolder;">
				<?php
					echo "Name of Patient : ".$row['firstName']." ".$row['lastName']."<br><br>";
					echo "Mobile No : ".$row['mobileNo']."<br><br>";
					echo "My contact Time : ".$row['contactTime']."<br><br>";
					echo "E-mail address : ".$row['email']."<br><br>";
					echo "Residence : ".$row['residance']."<br><br>";
					echo "Date of Birth : ".$row['birthDate']."<br><br>";
					echo "Have I visited Hospital before?? : ".$row['visit']."<br><br>";

				?>

			</div>

			<div style="width:450px;height:auto;float:left;text-align:left;padding-left:25px;color:green;font-weight:bolder;">

				<?php
					echo "Appointed Department : ".$row['department']."<br><br>";					
					echo "Doctor ID No : ".$row['doctorId']."<br><br>";
					echo "Appointment Date : ".$row['serviceDate']."<br><br>";
					echo "Appointment Time : ".$row['serviceTime']."<br><br>";
					echo "Description of Disease : ".$row['disease']."<br><br>";
					echo "Date of taking appointment : ".$row['date']."<br><br>";
					echo "---------------------------o----------------------------";

				?>

			</div>	



		</fieldset>	


<?php


	}

	//if($appointmentNo==1)
		//echo "<h2>You have not taken any appointment</h2>";

?>

	</div>
	</body>
	<br>
	<?php

		include 'footer.php';

	?>
	</center>
</html>

