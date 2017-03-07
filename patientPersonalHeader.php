<?php
  //session_start();
  /*include 'databaseConnection.php';*/
?>
<html>

	<head>
		<title>
			Header Page|Medical Automation
		</title>	
		<link rel="stylesheet" type="text/css" href="css/patientPersonalHeader_style.css">

		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
    
	<center>

	<body>
		<div class="maindiv">

			<div class="header">
				<div style="float:left;">
				<img src="images/kuetLogo.jpg" style="width:90px;height:90px;padding:10px;">
				</div>
				<div style="float:left;">
					<h1 id="clock" style="padding-top:0px;padding-left:20px;color:red;"></h1>
					<h4 style="padding-top:0px;padding-left:30px;margin-bottom:5px; color:black;"><?php $date=date("D, d M Y.");echo $date;?></h4>
				</div>
				<div style="float:left;width:auto;text-align:right;color:blue;font-family: Monotype Corsiva;">
				<h1 style="padding-top:10px;padding-left:40px;">KUET Medical Center Automation<br>Khulna,9203.</h1>
				</div>
				
					<script>
					var myVar=setInterval(
						function()
						{
							myTimer()
						},1000);

					function myTimer() 
					{
   					 	var d = new Date();
   				 		document.getElementById("clock").innerHTML = d.toLocaleTimeString();
					}
					</script>


			</div> 
			<div class="listdiv">
				
            	<ul class="list">
            		
             		<li> <a href="home.php"> Home </a> </li>
             		<li> <a href="viewProfile.php">My Information</a> </li>
             		<li> <a href="appointment.php">Take Appointments</a> </li>
             		<li> <a href="patientAppointment.php">My Appointments</a> </li>
             		<li> <a href="download.php">My Reports</a></li>
             		<li> <a href="deletePatient.php">Delete Account</a></li> 

             		
             		<li> <a href="logoutAsPatient.php">logout</a> </li>
             		             		
             	</ul>

		    </div>

		   

		 
		</div>
 

	</body>

	</center>
</html>