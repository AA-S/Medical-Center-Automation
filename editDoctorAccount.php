<?php

	session_start();
	include 'doctorPersonalHeader.php';
	include 'databaseConnection.php';

if (!isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
    
    header('Location:home.php?app="login1"');
  
  }

?>

<html>
	<head>
		<title></title>
    <link rel="stylesheet" type="text/css" href="css/editDoctor_style.css">
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
	<body>
<div class="maindiv11">
		
			<?php
			if(!isset($_SESSION['doctor']) && !isset($_COOKIE['dortorUser']))
			{
				/*echo "sadsa";*/die();
			}
				

				if(isset($_SESSION['doctor']))
					$update = $_SESSION['doctor'];

				else if(isset($_COOKIE['dortorUser']))
					$update = $_COOKIE['dortorUser'];

				$query = "SELECT * FROM `doctor_table` WHERE `email`='$update'";

				$result = mysql_query($query);

				$row = mysql_fetch_array($result);

			?>

		<!-- </div> -->
 

 		<div class="register_form" style="margin-top: 0px;text-align:left;">

                        <h3><marquee>Fill-up the following requirement for completing Registration</marquee></h3>
                        <br>

       			  <form action="update.php" method="post" >

                              <fieldset style="margin-left:200px;margin-right:250px;">

                                    <legend align="center"> <h3>Update Doctor Account</h3> </legend>

              
                        
                              <p style="padding:50px;font-size:18px;">

                              Name: <br>
                              <input type="text" name="name" value="<?php echo $row['name'] ;?>" placeholder="Your Name" pattern="[A-Za-z ]*" title="Only Alphabet and Space Allow" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required>     

                              <!-- <input type="text" name="lastName" placeholder="Last Name" pattern="[A-Z]*[a-z]*" style="margin-top:03px;padding-left:5px;height:25px;width:100px;border-radius:5px;" required><br><br> -->
<br><br>
       				 Email Address:<br>
                                    <input type="email" name="email" value="<?php echo $row['email'] ;?>" placeholder="Enter your Email" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                Change Password:<br>
                                    <input type="password" name="password" value="<?php echo $row['password'] ;?>" placeholder="Enter Password" pattern=".{3,}" title="Three or more characters" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                Confirm Password:<br>
                                    <input type="password" name="confirmPassword" value="<?php echo $row['password'] ;?>" placeholder="Confirm Password" pattern=".{3,}" title="Three or more characters"  style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>                                    
                              
                               Clinial Interest:<br>
                                    <input type="text" name="clinicalInterest" value="<?php echo $row['clinicalInterest'] ;?>" placeholder="Clinial Interest" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              

       				 Title:<br>
                                    <input type="text" name="title" value="<?php echo $row['title'] ;?>" placeholder="Title" pattern=".{5,}"  style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                               Medical College:<br>
                                    <input type="text" name="medicalCollege" value="<?php echo $row['medicalCollege'] ;?>" placeholder="Medical College" pattern=".{5,}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              Residence:<br>
                                    <textarea name="residence" value="" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" placeholder="Your Residence or address"><?php echo $row['residence'];?></textarea><br><br>

                              Board Certification:  <br>    
                                    <input type="text" name="certification" value="<?php echo $row['certification'] ;?>" placeholder="Board Certification" maxlength="50" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                              
                              Doctor's ID No:<br>
                                     <input type="text" name="idNumber" value="<?php echo $row['idNumber'] ;?>" placeholder="ID Number 4 Digit" maxlength="4" pattern="[0-9]{4}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              Speciality:<br>
                              <select name="doctorSpeciality" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required>

                                <?php
                                  $speciality = array("<---Select Department--->","Allergy","Anticoagulation","Audiology","Arthritis",
                                  "Breast Center","Cancer Surgery","Cadiac Surgery","Cadiology","Cardiology(Children)",
                                  "Cockliar Implant","Colon and Rectal","Community Women's Care","Cosmetic Surgey",
                                  "CT Scan Worcester","Diabetes","Diagnostic Imaging","Ear Nose and Throat","Endoscopy","Eye Center","Foot and Ankle",
                                  "Gastroenterology","Genrel Surgery","Heart Station","Hematology","Imunology","Infection Disease",
                                  "Kidney","Kidny for Children","Liver","Living Donor(Kidney and Liver)","Lung","Lung(children)",
                                  "Mammography","Maternal Fetal Medicine","MRI","Nephrology","Neurodiagnostic","Neurology","Neusergery",
                                  "Nuclear Medicine","Nutrition","Medicine");

                                  $speciality[0]=$row['speciality'];
                                  for($i=0;$i<count($speciality);$i++)
                                 {

                              ?>
                                 <option value="<?php echo $speciality[$i]; ?>">
                              <?php
        
                                  echo $speciality[$i];
                      //echo $speciality
                     
                    
                                }
                  
                              ?>              
                                  </option>

                             </select> <br><br>

                             Appointment per Day:
                             <select name="perDayAppointment" style="width:100px;height:33px;" required>
                                <?php
                                    for ($i=5; $i <=100; $i=$i+5) 
                                    { 

                                ?>   
                                       <option value="<?php echo $i;?>">          
                                         
                                <?php
                                  echo $i;
                                
                                    } 
                                 ?>
                                    </option>

                             </select> <br><br>

                              Mobile Phone:      <br>
                                    <input type="tel" name="mobileNo" value="<?php echo $row['mobileNo'] ;?>" placeholder="+8801" maxlength="11" pattern="[0-9]{11}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>


                               Date of Birth:<br>
                                    <input type="date" name="birthDate" value="<?php echo $row['birthDate'] ;?>" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              <!--  
                              Gender:<br>
                              <select name="gender" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required>
                                    <option value=""> Choose </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Other"> Other </option>
                              </select><br><br>
 -->
                              <!-- Change your Image:
                               <input type="file" name="uploadImage" value="<?php //echo $row['imageLink'] ;?>" style="margin-left:10px;padding-left:5px;height:35px;width:265px;border-radius:5px;" required>

                              <br><br> -->

                                

                               <input type="reset" name="reset" value="Reset All" style="margin-left:10px;padding-left:5px;height:33px;width:235px;border-radius:5px;">

                               <input type="submit" name="submit" value="Update" style="margin-left:10px;padding-left:5px;height:33px;width:235px;border-radius:5px;">
                               
                               <br><br>
       				 </p>
                              </fieldset>
                              
       			  </form>



                              <?php

                              /*$query = "SELECT * FROM `doctor_table`";

                        if(mysql_query($query))
                        {
                              echo '<h1 style="text-align: center;">query found</h1>';
                              if(isset($_POST['submit']))
                              {
                                    
                                    $name = $_POST['name'];
                                    $password = $_POST['password'];
                                    $confirmPassword = $_POST['confirmPassword'];
                                    $email = $_POST['email'];
                                    $clinicalInterest = $_POST['clinicalInterest'];
                                    $title = $_POST['title'];

                                    $medicalCollege = $_POST['medicalCollege'];
                                    $residence = $_POST['residence'];
                                    $certification = $_POST['certification'];
                                    $idNumber = $_POST['idNumber'];
                                    $doctorSpeciality = $_POST['doctorSpeciality'];

                                    $perDayAppointment = $_POST['perDayAppointment'];
                                    $mobileNo = $_POST['mobileNo'];
                                    $birthDate = $_POST['birthDate'];
                                    $gender = $row['gender'];
                                    $date = $row['date'];

                                    if($_FILES["uploadImage"]["error"]>0)
                                    {
                                      echo "Upload error occured<br>";
                                    }
                                    else
                                    {
                                      $imageName = time().$_FILES["uploadImage"]["name"];
                                      $imageLink = "upload/".$imageName;

                                      move_uploaded_file($_FILES["uploadImage"]["tmp_name"],$imageLink);

                                        
                                        $imageDatabaseLink = "upload/".$imageName;
                                       // echo "File Moved";
                                    }

                                    



                                    if(!empty($name)&&!empty($email)&&!empty($clinicalInterest)&&!empty($title)&&!empty($medicalCollege)&&!empty($mobileNo)&&!empty($birthDate))
                                    {

                                        if(isset($_SESSION['doctor']))
                                              $update2 = $_SESSION['doctor'];

                                        else if(isset($_COOKIE['dortorUser']))
                                               $update2 = $_COOKIE['dortorUser'];

                                          $insert = "UPDATE doctor_table SET 
                                                name='$name',email='$email',password='$password',clinicalInterest='$clinicalInterest',title='$title',
                                                medicalCollege='$medicalCollege',residence='$residence',certification='$certification',idNumber='$idNumber',
                                                speciality='$doctorSpeciality',appointmentPerDay='$perDayAppointment',mobileNo='$mobileNo',birthDate='$birthDate',
                                                imageLink='$imageDatabaseLink' WHERE email='$update2'";
                                          if($password==$confirmPassword)
                                          {
                                                if(mysql_query($insert))
                                                {
                                                      echo '<h1 style="text-align: center">Update Completed</h1>';
                                                }

                                                else
                                                      echo '<h1 style="text-align: center">Update error</h1>';

                                          }
                                          else
                                          {
                                                echo '<h1 style="text-align: center">password mismatch</h1>';
                                          }
                                    }

                                    else
                                    {
                                          echo '<h1 style="text-align: center">Fill up all the fields.</h1>';
                                    }
                              }
                        }

                        else
                            {
                              echo '<h1 style="text-align: center">Query not Found</h1>';
                            }*/

                            if (isset($_GET['str'])) {$_GET['str'] = "";
                              ?>
                              <script type="text/javascript">
                              window.onload = function(){alert("Data Updated")}</script>
                              <?php

                            }

                        ?>
                       
                        </div>

</div>
	</body>
  <br>
  <?php

    include 'footer.php';

  ?>
  </center>
</html>