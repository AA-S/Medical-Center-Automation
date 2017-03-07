<?php

	session_start();

?>
<html>

	<head>
		<title>
			Header Page|Medical Automation
		</title>	
		<link rel="stylesheet" type="text/css" href="css/header_style.css">

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
             		<li> <a href="about.php">About</a> </li>
             		<li> <a href="appointment.php">Appointment</a> </li>

             		<li> <a href="viewDoctors.php">View Doctor's</a></li> 

             		<li> <a href="contact.php">Contact</a> </li>
             		

             		<li> <a href="services.php">Services</a> </li>
					<li> <a href="registerAsPatient.php">Register</a> </li>

					<?php

						if((isset($_SESSION['patient']) && $_SESSION['patient']=='admin@gmail.com')||(isset($_COOKIE['user']) && $_COOKIE['user']=='admin@gmail.com'))
						{
							echo '<li> <a href=""> [Admin]</a>

								<ul>
									<li> <a href="viewProfile.php">Profile</a> </li>
									
									<li> <a href="logoutAsPatient.php">logout</a> </li>
								</ul>

							 </li>';
						}

						//Header for  patient accounts
						else if(isset($_SESSION['patient']) || isset($_COOKIE['user']))
						{
							echo '<li> <a href=""> [User Account]</a>
								<ul>
									<li> <a href="viewProfile.php">Profile</a> </li>
									<li> <a href="logoutAsPatient.php">logout</a> </li>
								</ul>

							 </li>';
						}

						else if(isset($_SESSION['doctor']) || isset($_COOKIE['doctorUser']))
						{
							echo '<li> <a href="">[Doctor Account]</a>
								<ul>
									<li> <a href="viewProfile.php">Profile</a> </li>
									<li> <a href="logoutAsDoctor.php">logout</a> </li>
								</ul>

							 </li>';
						}

						else
						{
							echo '<li> <a href=""> Login</a>
								<ul>
									<li> <a href="loginAsPatient.php">As Admin</a></li>
									<li> <a href="loginAsPatient.php">As Patient</a></li>
									<li> <a href="loginAsDoctor.php">As Doctor</a></li>
								</ul>
							 </li>';
						}
							

					?>
					
					
            		

             		
             	</ul>

		    </div>

		   

		 
		</div>
 

	</body>

	</center>
</html>