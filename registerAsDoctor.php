<?php
session_start();
      include 'databaseConnection.php';
       
       include 'adminHeader.php';


       function doctorEmailCheck($value)
       {
          $queryC = "SELECT `email` FROM `doctor_table` WHERE `email`='$value'";
          $resultC = mysql_query($queryC);
          $nr = mysql_num_rows($resultC);
          if($nr>=1)
          {
            return 1;
          }
          else
            return 0;
       }

       function doctorIdCheck($value1)
       {
          $queryC1 = "SELECT `idNumber` FROM `doctor_table` WHERE `idNumber`='$value1'";
          $resultC1 = mysql_query($queryC1);
          $nr = mysql_num_rows($resultC1);
          if($nr>=1)
          {
            return 1;
          }
          else
            return 0;
       }

?>



<html>
	<head>
		<title>Registration|KUET Medical Center</title>
		<link rel="stylesheet" type="text/css" href="css/register_style.css">

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
	 	<div class="register_form" style="margin-top: -18px;">

                 <img src="images/doctor.jpg" >

                        <h3><marquee>Fill-up the following requirement for completing Registration</marquee></h3>
                        <br>

       			  <form action="registerAsDoctor.php" method="POST" enctype="multipart/form-data">

                              <fieldset style="margin-left:50px;margin-right:50px;margin-bottom:50px;margin-top:0px;">

                                    <legend align="center"> <h3>Registration Form for Doctors</h3> </legend>

       				 <br>
                        
                              <p style="padding-left:160px;font-size:18px;">

                              Name: <br>
                              <input type="text" name="name" placeholder="Your Name" pattern="[A-Za-z ]*" title="Only Alphabet and Space Allow" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required>     

                              <!-- <input type="text" name="lastName" placeholder="Last Name" pattern="[A-Z]*[a-z]*" style="margin-top:03px;padding-left:5px;height:25px;width:100px;border-radius:5px;" required><br><br> -->
<br><br>
       				 Email Address:<br>
                                    <input type="email" name="email" placeholder="Enter your Email" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                Enter Password:<br>
                                    <input type="password" name="password" placeholder="Enter Password" pattern=".{3,}" title="Three or more characters" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                Confirm Password:<br>
                                    <input type="password" name="confirmPassword" placeholder="Confirm Password" pattern=".{3,}" title="Three or more characters"  style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>                                    
                              
                               Clinial Interest:<br>
                                    <input type="text" name="clinicalInterest" placeholder="Clinial Interest" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              

       				 Title:<br>
                                    <input type="text" name="title" placeholder="Title" pattern=".{5,}"  style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                               Medical College:<br>
                                    <input type="text" name="medicalCollege" placeholder="Medical College" pattern=".{5,}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              Residence:<br>
                                    <textarea name="residence" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" placeholder="Your Residence or address"></textarea><br><br>

                              Board Certification:  <br>    
                                    <input type="text" name="certification" placeholder="Board Certification" maxlength="50" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                              
                              Doctor's ID No:<br>
                                     <input type="text" name="idNumber" placeholder="ID Number 4 Digit" maxlength="4" pattern="[0-9]{4}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

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

                           
                                <!-- Working Days:<br>
                                <input type="checkbox" name="workingDay" value="Saturnday to Monday">Saturnday to Monday<br>
                                <input type="checkbox" name="workingDay" value="Tuesday to Thursday">Tuesday to Thursday<br>
                            
                                <input type="checkbox" name="workingDay" value="All Days">All Days

                             <br><br> -->


                              Mobile Phone:      <br>
                                    <input type="tel" name="mobileNo" placeholder="+8801" maxlength="11" pattern="[0-9]{11}" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>


                               Date of Birth:<br>
                                    <input type="date" name="birthDate" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                               
                              Gender:<br>
                              <select name="gender" style="margin-left:0px;padding-left:5px;height:33px;width:500px;border-radius:5px;" required>
                                    <option value=""> Choose </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Other"> Other </option>
                              </select><br><br>

                              Upload an Image:
                               <input type="file" name="uploadImage" style="margin-left:10px;padding-left:5px;height:35px;width:265px;border-radius:5px;" required>

                              <br><br>

                                

                               <input type="reset" name="reset" value="Reset All" style="margin-left:10px;padding-left:5px;height:33px;width:240px;border-radius:5px;">

                               <input type="submit" name="submit" value="Register" style="margin-left:10px;padding-left:5px;height:33px;width:240px;border-radius:5px;">
                               
                               <br><br>
       				 </p>
                              </fieldset>
                              
       			  </form>



                              <?php

                              $query = "SELECT * FROM `doctor_table`";

                        if(mysql_query($query))
                        {
                              //echo '<h1 style="text-align: center;">query found</h1>';
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

                                   // $working = $_POST['checkbox'];

                                    $mobileNo = $_POST['mobileNo'];
                                    $birthDate = $_POST['birthDate'];
                                    $gender = $_POST['gender'];
                                    $date = date("D, d M Y H:i:s A");

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

                                    



                                    if(!empty($name)&&!empty($email)&&!empty($clinicalInterest)&&!empty($title)&&!empty($medicalCollege)&&!empty($mobileNo)&&!empty($birthDate)&&!empty($gender))
                                    {
                                          $insert = "INSERT INTO `doctor_table` VALUES(
                                                '$name','$email','$password','$clinicalInterest','$title','$medicalCollege','$residence',
                                                '$certification','$idNumber','$doctorSpeciality','$perDayAppointment','$mobileNo','$birthDate','$gender','$imageDatabaseLink','$date')";
                                          if($password==$confirmPassword)
                                          {

                                            if ( doctorIdCheck($idNumber) ) 
                                                {

                                                  ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("This doctor ID already exist, try again");

                                                      }
                                                    </script>

                                                  <?php
                                                  //header('Location:registerAsDoctor.php');
                                                  //die();

                                                }

                                                else if ( doctorEmailCheck($email) ) 
                                                {

                                                  ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("This email already exist, try again");
                                                      }
                                                    </script>

                                                  <?php
                                                  //header('Location:registerAsDoctor.php');
                                                  //die();

                                                }


                                                


                                                else if(mysql_query($insert))
                                                {
                                                  ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("Doctor Addition Completed");
                                                      }
                                                    </script>

                                                  <?php
                                                }

                                                else;
                                                      //echo '<h1 style="text-align: center">Registration error</h1>';

                                          }
                                          else
                                          {
                                                ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("Your Password Missmatch, Please try again");
                                                      }
                                                    </script>

                                                  <?php
                                          }
                                    }

                                    else
                                    {
                                          //echo '<h1 style="text-align: center">Fill up all the fields.</h1>';
                                    }
                              }
                        }

                        else
                            {
                              //echo '<h1 style="text-align: center">Query not Found</h1>';
                            }

                        ?>
                       
                        </div>

            <?php
              include 'footer.php';
            ?>
      
       </center>
	</body>
</html>
