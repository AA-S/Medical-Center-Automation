<?php
	//session_start();
	include 'header.php';

?>
<html>

	<head>
		<title>
			Home Page|Medical Automation
		</title>	
		<link rel="stylesheet" type="text/css" href="css/home_style.css">

		<link rel="stylesheet" type="text/css" href="slider/themes/bar/bar.css"/>
		<link rel="stylesheet" type="text/css" href="slider/themes/dark/dark.css"/>
		<link rel="stylesheet" type="text/css" href="slider/themes/default/default.css"/>
		<link rel="stylesheet" type="text/css" href="slider/themes/light/light.css"/>
		<link rel="stylesheet" type="text/css" href="slider/themes/nivo-slider.css"/>


		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
    
	<center>

	<body>

		<div class="maindiv2">

			<div class="marqu" style="width: 960px;height: 80px;background-color: black;margin-top:0px;margin-bottom:5px;">
			<marquee id="test" behavior="scroll" direction="left" height="40" scrolldelay="3" scrollamount="6" style="padding:10px;margin-left:200px;margin-right:200px;" 
			onMouseOver="document.all.test.stop()" onMouseOut="document.all.test.start()">
			 <h1 style="color:red;">Welcome to Our KUET Online Medical Center Service</h1></marquee>
			 </div>

					<div class="submenu">

						<h3>Other Links</h3>

						<ul>
<!-- <br> -->
							<li><a href="appointment.php" target="_blank">Make an Appointment</a></li>
							<li><a href="about.php" target="_blank">About Us</a></li>
							<li><a href="viewDoctors.php" target="_blank">Show All Doctors</a></li>
							<li><a href="contact.php" target="_blank">Condact Us</a></li>
							<li><a href="googleMap.php" target="_blank">Our Location</a></li>
							<li><a href="services.php" target="_blank">Checkout Medical Services</a></li>
							<li><a href="http://www.kuet.ac.bd" target="_blank">KUET</a></li>
							<li><a href="http://cse.kuet.ac.bd" target="_blank">CSE of KUET</a></li>


						</ul>

						

					</div>

					<div class="slider">
					<div class="slide-wrapper theme-default fix" style="overflow: visible;">
						<div class="nivoSlider" id="slider" style="width:660px;margin:auto;margin-top:-0px;overflow: visible;">
							<img src="slider/sliderImages/slider_img_01.jpg" alt="" title=""/>
							<img src="slider/sliderImages/slider_img_02.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_03.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_04.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_05.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_06.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_07.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_08.jpg" alt=""/>
							<img src="slider/sliderImages/slider_img_09.jpg" alt=""/>
						</div>
					</div>
					</div>

		</div>

		<script type="text/javascript" src="slider/scripts/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="slider/scripts/jquery.nivo.slider.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
			$('#slider').nivoSlider();
			});
		</script>
	</body>
<br>

<?php

	include 'footer.php';

?>
</center>
</html>


<?php

	if (isset($_GET['app'])) {
		if (!isset($_SESSION['patient']) && !isset($_COOKIE['user']) && !isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
		?>
		<script type="text/javascript">
		window.onload=function(){

			window.alert("You have to login first");
}
		</script>
		<?php
	}
	}

?>
