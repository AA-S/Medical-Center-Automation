<?php

	//include 'header.php';
session_start();
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/about_style.css">
		
		
		<script
			src="http://maps.googleapis.com/maps/api/js">
		</script>

		<script>
			var myCenter=new google.maps.LatLng(22.899662,89.501021);

			function initialize()
			{
				var mapProp = {
  				center:myCenter,
  				zoom:17,
  				mapTypeId:google.maps.MapTypeId.ROADMAP
  			};

			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker=new google.maps.Marker({
 			position:myCenter,
  			});

			marker.setMap(map);

			var info = new google.maps.InfoWindow({
			content:"KUET Medical Center"

		});
			info.open(map,marker);


			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>


	</head>

	<center>
	<body>
<div class="maindiv10">

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

			<div class="listdiv1">
				
            	<ul class="list1">
            		
             		<li> <a href="home.php"> Home </a> </li>
             		<li> <a href="about.php">About</a> </li>
             		<li> <a href="appointment.php">Appointment</a> </li>

             		<li> <a href="viewDoctors.php">View Doctor's</a></li> 

             		<li> <a href="">Contact</a> </li>
             		

             		<li> <a href="">Services</a> </li>
					<li> <a href="registerAsPatient.php" target="">Register</a> </li>

					

					<?php

						if((isset($_SESSION['patient']) && $_SESSION['patient']=='admin@gmail.com')||(isset($_COOKIE['user']) && $_COOKIE['user']=='admin@gmail.com'))
						{
							echo '<li> <a href=""> [Admin]</a>

								<ul>
									<li> <a href="viewProfile.php">Profile</a> </li>
									<li> <a href="registerAsDoctor.php">Add Doctor</a></li>
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
 

		<div class="maindiv2">

			<div class="marqu" style="width: 960px;height: 80px;background-color: black;margin-top:0px;margin-bottom:5px;">
			<marquee id="test" behavior="scroll" direction="left" height="40" scrolldelay="3" scrollamount="6" style="padding:10px;margin-left:200px;margin-right:200px;" 
			onMouseOver="document.all.test.stop()" onMouseOut="document.all.test.start()">
			 <h1 style="color:red;">Welcome to Our KUET Online Medical Center Service</h1></marquee>
			 </div>

			<div class="submenu">

						<p>Other Important Links</p>

						<ul>
					<br>
							<li><a href="home.php">Home</a></li>
							<li><a href="appointment.php">Make an Appointment</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="viewDoctors.php">Show All Doctors</a></li>
							<li><a href="">Condact Us</a></li>
							<li><a href="about.php">Our Location</a></li>
							<li><a href="">Checkout Medical Services</a></li>
							<li><a href="http://www.kuet.ac.bd" target="_blank">KUET</a></li>
							<li><a href="http://cse.kuet.ac.bd" target="_blank">CSE of KUET</a></li>


						</ul>
			</div>

			<div class="map"> <h1>This is Google map position of us</h1>
			<div id="googleMap" style="width:660px;height:380px;">
			</div>
			</div>


			<div class="mission">

					 <br>
	   <h2 style="background-color:#330066;color:#FFF;width:540px;height:30px;margin-left:10px;padding:5px;border:2px solid #C0C0C0;border-radius:10px;"> <font style="margin-left:150px;margin-top:100px"><i>About Our Mission</i></font></h2>
       <br>
       				<p style="margin-left:10px;margin-right:20px;font-family:verdana;font-size:14px;color:white;">
	   
	   We provide quality health services that meet the needs of our community.</p>
	   <br>

        <p style="margin-left:10px;margin-right:20px;font-family:verdana;font-size:14px;color:white;">This simple statement has powerful undertones.
		It means that we will always be a work-in-progress. We will grow as the community grows in order to meet its needs. 
		As new technologies evolve, we will utilize them. Actually, we have trying to do an automated registration system 
        for the medical service.</p>
		<br>
		
		<p style="margin-left:10px;margin-right:20px;font-family:verdana;font-size:14px;color:white;">
		Our Mission is to bring healthcare of international standards within the reach of every individual. 
		We are committed to the achievement and maintenance of excellence in education, research and 
		healthcare for the benefit of humanity.


		
		</p>


			</div>	

			
		<div class="footer">
		 	<h4>&copy;All Right Reserved, Developed By Abdul Aziz Sorkar(Dept. of CSE, 2K12)</h4>
		</div>
		

	</body>
<br>
	</center>

</html>