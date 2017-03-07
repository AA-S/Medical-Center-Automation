<?php
   // session_start();
	include 'header.php';
	include 'databaseConnection.php';

?>

<html>
	<head>

		<title></title>
		<link rel="stylesheet" type="text/css" href="css/viewDoctor_style.css">

		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<script>
			function showResult(str)
			{
 				if (str.length==0) { 
    			document.getElementById("searchDoctor").innerHTML="";
    			document.getElementById("searchDoctor").style.border="0px";
    			
    			return;
  			}
  			if (window.XMLHttpRequest) 
  			{
    			xmlhttp=new XMLHttpRequest();
  			}

  			else 
  			{ 
    			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
 			xmlhttp.onreadystatechange=function() 
 			{
    			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
      				document.getElementById("searchDoctor").innerHTML=xmlhttp.responseText;
      				document.getElementById("searchDoctor").style.border="1px solid #A5ACB2";
    			}
  			}

  			xmlhttp.open("GET","searchDoctor.php?q="+str,true);
  			xmlhttp.send();

			}
</script>



	</head>

	<center>
		<body>
			<div class="maindiv1">
			
				<div class="searchdiv">
					<div style="float:left;margin-left:100px">
						<a href="appointment.php"><img src="images/appointment.jpg" style="width:200px;height:56px;margin-top:0px;"></a>
					</div>

					<div style="float:left;margin-left:170px;">
						<form action="viewDoctors.php" method="POST">
							<span style="padding:20px;margin:20px;margin-bottom:30px;">					
								<input type="search" id="mySearch" onkeyup="showResult(this.value)" placeholder="Search Doctors by name" style="width:400px;height:56px;padding:5px;">
								<!-- <input type="submit" name="submit" value=" " style="width:200px;height:56px;background-image:url('images/search.jpg');"> -->
							</span>
						</form>
					</div>
				</div>


			<div style=""id="searchDoctor">

		<?php
			
			$query = "SELECT * FROM `doctor_table`";

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
			?>
			</div>
			</div>
	
		</body>
	
	<?php
  echo "<br><br>";	   
		include 'footer.php';
	?>
	</center>
</html>


