<?php
    
    //session_start();
	include 'header.php';
	include 'databaseConnection.php';
	if (!isset($_SESSION['patient']) && !isset($_COOKIE['user']) && !isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
		
		header('Location:home.php?app="login1"');
		die();
	
	}

    $query = "SELECT * FROM `appointment_table`";

    if(mysql_query($query))
    {
    	

    	if(isset($_POST['submit']))
    	{
    		$firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $mobileNo = $_POST['mobileNo'];         
            $contactTime = $_POST['checkbox'];
            $email = $_POST['email'];
            $residence = $_POST['residence'];              
            $birthDate = $_POST['birthDate'];	                                     
            $visit = $_POST['visit'];
            $doctorSpeciality = $_POST['doctorSpeciality'];
            $doctorIdNumber = $_POST['doctorId'];
            $serviceDate = $_POST['serviceDate'];
            $serviceTime = $_POST['serviceTime'];
            $description = $_POST['description'];
            $date = date("D, d M Y H:i:s A");

           // $gender = $_POST['gender']; 


            $insert = "INSERT INTO `appointment_table` VALUES('','$firstName','$lastName','$mobileNo','$contactTime',
            	'$email','$residence','$birthDate','$visit','$doctorSpeciality','$doctorIdNumber','$serviceDate','$serviceTime','$description','$date')";
			
			
			$check1 = "SELECT * FROM `appointment_table` WHERE `serviceDate`='$serviceDate' AND `doctorId`='$doctorIdNumber'";
			$check2 = "SELECT `appointmentPerDay` FROM `doctor_table` WHERE `idNumber`='$doctorIdNumber'";


			$row1 = mysql_num_rows(mysql_query($check1));
			$row2 = mysql_num_rows(mysql_query($check2));

			$a = mysql_fetch_array(mysql_query($check2));
			$doctorAppointment = $a['appointmentPerDay'];
			//echo $row1." ".$row2." ".$doctorAppointment;


			if($row1<$doctorAppointment)
			{
				if(mysql_query($insert))
				{
					?>
		<script type="text/javascript">
		window.onload=function(){

			window.alert("Your Appointment is Completed");
}
		</script>
<?php
					//echo "<br> <br>";
				}

				else
				{
					//echo "Error occured";
				}
			}

			else
			{
				?>
		<script type="text/javascript">
			window.onload=function(){
			window.alert("Please Select Another Service Date");
}
		</script>
<?php
				//echo "";
			}

			
    	}
    }
    else
    {
    	//echo "Query Not found";
    }


?>

<html>

	<head>

		<title>Appointment||AAS Medical Center</title>
		<link rel="stylesheet" type="text/css" href="css/appointment_style.css">




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

	<body>
		<center>
			<div class="maindiv">

				<div class="imagediv" style="margin-top: -21px;">
				<p id="image">
					Need a checkup? Not feeling well? Getting <br>the care you need starts with scheduling the 
					<br>correct type of appointment. Everything you<br> need to know is right here.
				</p>
				</div>

				<div class="discissiondiv">

					<div class="marqu" style="width: 310px;height: 60px;background-color: black; margin-top:3px;margin-bottom:5px;">
			<marquee id="test" behavior="scroll" direction="left" height="40" scrolldelay="3" scrollamount="6" style="padding:10px;" 
			onMouseOver="document.all.test.stop()" onMouseOut="document.all.test.start()">
			 <h2 style="color:white;">You must fill up all the fields to make sure your appointment</h2></marquee>
			 		</div>



						<h2>Make an Appointment</h2> 
					<p>For your convenience, you can quickly and easily request an appointment with a call or simple online form.</p> <br>

					<p> <b> <i>Please note: If you are experiencing a medical emergency please call 911.</i></b></p> <br>

					<h4>Option 1: Call AAS-MD (880-2-5451234)</h4><br>

					<ul id="list">
						<li>8 am to 5 pm, Monday to Friday</li>
						<li>If you call after hours, we will follow up with you on the next business day</li>
						<li>Personalized service is available in many languages</li>
					</ul> <br>

					<h4>Option 2: Complete this form</h4><br>

					<ul id="list">
					    <li>Available all day, every day for nonurgent requests</li>
						<li>A team member will contact you within one business day</li>
					</ul> <br>



				</div>
				
				<div class="formdiv" style="float:left;">
                    
					<fieldset style="padding-left:15px;margin:15px;">

						<div style="background-color:#CCCCCC;border-radius:10px;margin-left:0px;"><h1 style="bacground-color:#CCCCCC;">Patient Appointment Request</h1></div>
                    <form action="appointment.php" method="POST" style="padding-left:15px;margin:15px;">
							
						<label class="lab" style="height:60px;bacground-color:red;"> Patient Name* <br>
							<input type="text" name="firstName" pattern="[A-Za-z ]*" title="Only Alphabet and Space Allow" placeholder="First Name" id="name" required>
							<input type="text" name="lastName" pattern="[A-Za-z ]*" title="Only Alphabet and Space Allow" placeholder="Last Name" id="name" required>
							<br><br>
						</label>


						<label>
							<p style="font-size:15px;"><b>Preferred Telephone No*:</b></p>
							<input type="tel" name="mobileNo" maxlength="11" pattern="[0-9]{11}" title="Only Digit allow and maximum length is 11" placeholder="Mobile Number" id="name" required>
							<p style="font-size:12px;">Please provide the best number to reach you</p>
						</label>
						<br>

						<label>
							<h4><b>What is the best time to contact you?*</b></h4>
							<p style="font-size:14px;"> <input type="checkbox" name="checkbox" value="8 am to 12 Noon"> 8 am to 12 Noon </p>
							<p style="font-size:14px;"> <input type="checkbox" name="checkbox" value="12 Noon to 4 pm">12 Noon to 4 pm</p>
							<p style="font-size:14px;"> <input type="checkbox" name="checkbox" value="Both 8 am to 12 Noon and 12 Noon to 4 pm">Both of Them</p>
						</label>

						<br>

						<label> <h2><b>Email*</b></h2>
							<input type="email" name="email" style="font-size:18px;width:350px;height:35px;padding-left:10px;" placeholder="Email Address">
							<br>
							<p style="font-size:12px;">Please provide if you would like an email confirmation of your request.</p>
							<br>
						</label>

						<label>
							<p style="font-size:15px;"><b>Your Residene*</b></p>
							<textarea name="residence" style="width:350px;height:100px;padding:5px;" placeholder="Write short  description of your Residence"></textarea>
						</label>
						<br>

						<label>
							<p style="font-size:15px;"><b>Patient Date of Birth*</b></p>

							<input type="date" name="birthDate" id="name" required>
							<p style="font-size:12px;">This will help us identify you if you are already in our system.</p>
						</label>
						<br>

						<label>
							<p style="font-size:15px;"><b>Have you been seen at AAS Memorial Medical Center before?*</b></p>
							<input type="radio" name="visit" value="yes" required>Yes
							<input type="radio" name="visit" value="no" style="margin-left:50px;" required>No
						</label>
						<br><br>

						<label>
							<p style="font-size:15px;"><b>Which department would you like to contact for an appointment?*</b></p>
							<select name="doctorSpeciality" style="width:250px;height:35px;" required>
								<?php
									$department = array("<---Select Department--->","Allergy","Anticoagulation","Audiology","Arthritis",
										"Breast Center","Cancer Surgery","Cadiac Surgery","Cadiology","Cardiology(Children)",
										"Cockliar Implant","Colon and Rectal","Community Women's Care","Cosmetic Surgey",
										"CT Scan Worcester","Diabetes","Diagnostic Imaging","Ear Nose and Throat","Endoscopy","Eye Center","Foot and Ankle",
										"Gastroenterology","Genrel Surgery","Heart Station","Hematology","Imunology","Infection Disease",
										"Kidney","Kidny for Children","Liver","Living Donor(Kidney and Liver)","Lung","Lung(children)",
										"Mammography","Maternal Fetal Medicine","MRI","Nephrology","Neurodiagnostic","Neurology","Neusergery",
										"Nuclear Medicine","Nutrition");
									for($i=0;$i<count($department);$i++)
									{

									?>
											<option value="<?php echo $department[$i];?>" >
									<?php
											echo $department[$i];
																					
									}
									
								?>
								</option>
							</select>
						</label>
						<br><br>

						<label>
							<h4>Choose Doctor's ID Number: </h4>
							<select name="doctorId" style="width:150px;height:35px;" required>
							
							<?php

								$idQuery = "SELECT `idNumber` FROM `doctor_table`";

								$idResult = mysql_query($idQuery);

								while($idRow = mysql_fetch_array($idResult))
								{
							?>		
									<option value="<?php echo $idRow['idNumber'];?>">
										<?php
											echo $idRow['idNumber'];

								}

							?>

								</option>

							</select>

						</label>
						<br><br>


						<label>
							<p style="font-size:15px;"><b>Please Choose your service Date*</b></p>
							<input type="date" name="serviceDate" id="name" required>
						
						</label>
						<br><br>

						<label>
							<p style="font-size:15px;"><b>Please Choose Time*</b></p>
							<select name="serviceTime" style="width:150px;height:35px;" required>
								<?php
									$time = array("","08:00 AM","09:00 AM","10:00 AM","11:00 AM","12:00 PM","01:00 PM","02:00 PM",
										"03:00 PM","04:00 PM","05:00 PM","06:00 PM","07:00 PM","08:00 PM","09:00 PM");
									for($i=0;$i<count($time);$i++)
									{
								?>
											<option value="<?php echo $time[$i];?>">
										
								<?php		
											echo  $time[$i];
											
									
									}
									
								?>
								</option>
							</select>
						
						</label>
						<br><br>


						<label>
							<p style="font-size:15px;"><b>Please tell us about the reason for your appointment request*</b></p>
							<textarea name="description" style="width:350px;height:200px;padding:5px;" placeholder="Write short  description of your disease"></textarea>
						</label>
						<br>

						<label style="text-align:right;">
							<input type="submit" name="submit" value="Submit" style="width:200px;height:35px;border-radius:10px;bacground-color:#FF6600;" align="right">
						</label>

                    </form>

                    </fieldset>

                    <br><br>

				</div>

			</div>
			<br><br>
		<?php
			include 'footer.php';
		?>

		</center>

	</body>

</html>
