
<?php
	session_start();
 	include 'databaseConnection.php';
		
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="viewDoctor_style.css">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

</body>
</html>


<?php

	$searchName = urldecode(filter_var(trim($_GET['q']))); // $_POST['q'] is the search string which user types. It is sent via ajax  

	$q = "SELECT * FROM `doctor_table` WHERE `name` LIKE '%{$searchName}%'";  
	$result = mysql_query($q);

	while ($row = mysql_fetch_array($result)) 
	{

?>

				<fieldset style="width:auto;height:auto;margin-bottom:30px;">
				<legend align="center"><p style="	font: bold;font-weight: bolder;font-style: italic;color: red;
							" id="legend">Doctor ID No : <?php echo $row['idNumber'];?> </p></legend>

					<div class="doctordiv">

					<div class="imagediv">
						<img src="<?php echo $row['imageLink'];?>">

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
			?>

