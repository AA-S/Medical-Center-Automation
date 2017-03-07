<?php
      //session_start();
      include 'databaseConnection.php';
       
       include 'header.php';


       function patientEmailCheck($value)
       {
          $queryC = "SELECT `email` FROM `patients_table` WHERE `email`='$value'";
          $r = mysql_query($queryC);
          $nr = mysql_num_rows($r);
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
    <img src="images/patient4.jpg" style="width:958px;height:200px;margin-top:-18px;">
    <div class="register_form" >


                        <h3><marquee style="padding-top:10px;">Fill-up the following requirement for completing Registration</marquee></h3>
                        <br>

              <form action="registerAsPatient.php" method="POST" enctype="multipart/form-data">

                               <fieldset style="margin-left:50px;margin-right:50px;margin-bottom:50px;margin-top:0px;">

                                    <legend align="center"> <h3>Registration Form for Patients</h3> </legend>

               <br>
                          
                              <p style="padding-left:150px;font-size:18px;">

                              Name:<br>
                              <input type="text" name="firstName" placeholder="First Name" pattern="[A-Z]*[a-z ]*" title="Only Alphabet and space allowed" style="padding-left:5px;height:33px;width:245px;border-radius:5px;" required>     

                              <input type="text" name="lastName" placeholder="Last Name" pattern="[A-Z]*[a-z ]*" style="margin-top:03px;padding-left:5px;height:33px;width:245px;border-radius:5px;" required><br><br>

               Email Address:<br>
                                    <input type="email" name="email" placeholder="Enter your Email" style="padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                              
                               User Name:<br>
                                    <input type="text" name="userName" placeholder="Enter User Name" style="padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>
                              

               Enter Password:<br>
                                    <input type="password" name="password" placeholder="Enter Password" pattern=".{3,}" title="Three or more characters" style="padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                               Confirm Password:<br>
                                    <input type="password" name="confirmPassword" placeholder="Confirm Password" pattern=".{3,}" title="Three or more characters"  style="padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                              Mobile Phone:<br>      
                                    <input type="tel" name="mobileNo" placeholder="+8801" maxlength="11" pattern="[0-9]{11}" style="padding-left:10px;height:33px;width:500px;border-radius:5px; " required> <br><br>


                               Date of Birth:<br>
                                    <input type="date" name="birthDate" style="padding-left:5px;height:33px;width:500px;border-radius:5px;" required> <br><br>

                               
                              Gender:<br>
                              <select name="gender" style="height:33px;width:500px;" required>
                                    <option value=""> I am... </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Other"> Other </option>
                              </select>
                              <br><br>

                              Upload an Image: <input type="file" name="uploadImage" style="padding-left:5px;height:25px;width:200px;border-radius:5px;" required>
                              <br><br>

                                 

                               <input type="reset" name="reset" value="Reset All" style="padding-left:5px;height:33px;width:245px;border-radius:5px;">

                               <input type="submit" name="submit" value="Register" style="padding-left:5px;height:33px;width:245px;border-radius:5px;">

                               <br><br></p> 
               
                              </fieldset>
                              
              </form>



                              <?php

                              $query = "SELECT * FROM `patients_table`";

                        if(mysql_query($query))
                        {
                             // echo '<h1 style="text-align: center;">query found</h1>';
                              if(isset($_POST['submit']))
                              {
                                    
                                    $firstName = $_POST['firstName'];
                                    $lastName = $_POST['lastName'];
                                    $email = $_POST['email'];
                                    $userName = $_POST['userName'];
                                    $password = $_POST['password'];
                                    $confirmPassword = $_POST['confirmPassword'];
                                    $mobileNo = $_POST['mobileNo'];
                                    $birthDate = $_POST['birthDate'];
                                    $gender = $_POST['gender'];
                                    $date = date("D, d M Y H:i:s A");

                                    if($_FILES['uploadImage']['error']>0)
                                    {
                                      echo "Upload error occured<br>";
                                    }
                                    else
                                    {
                                      $imageName = time().$_FILES['uploadImage']['name'];
                                      $imageLink = "upload/".$imageName;

                                      move_uploaded_file($_FILES['uploadImage']['tmp_name'],$imageLink);

                                        
                                        $imageDatabaseLink = "upload/".$imageName;
                                       // echo "File Moved";
                                    }


                                    if(!empty($firstName)&&!empty($lastName)&&!empty($email)&&!empty($userName)&&!empty($password)&&!empty($confirmPassword)&&!empty($mobileNo)&&!empty($birthDate)&&!empty($gender))
                                    {
                                          $insert = "INSERT INTO `patients_table` VALUES(
                                                '$firstName','$lastName','$email','$userName','$password','$mobileNo','$birthDate','$gender','$imageDatabaseLink','$date')";
                                          if($password==$confirmPassword)
                                          {


                                               if ( patientEmailCheck($email) ) 
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



                                               else  if(mysql_query($insert))
                                                {
                                                 ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("Registration Completed");

                                                      }
                                                    </script>

                                                  <?php
                                                   //echo "Registration Completed";
                                                }

                                                else
                                                {

                                                  /*<script>
                                                     window.alert("Registration Unsuccesful");
                                                   </script>*/
                                                  //echo '<h1 style="text-align: center">Registration error</h1>';
                                                    //header('Location:registerAsPatient.php');
                                                }
                                                      

                                          }
                                          else
                                          {
                                            ?>

                                                    <script type="text/javascript">
                                                      window.onload=function(){
                                                        alert("password mismatch occured, Please try again.");

                                                      }
                                                    </script>

                                                  <?php
                                                //echo '<h1 style="text-align: center">password mismatch</h1>';
                                               // header('Location:registerAsPatient.php');
                                          }
                                    }

                                    else
                                    {
                                         // echo '<h1 style="text-align: center">Fill up all the fields.</h1>';
                                         // header('Location:registerAsPatient.php');
                                    }
                              }
                        }

                        else
                            {
                              //echo '<h1 style="text-align: center">Query not Found</h1>';

                            }

                        ?>
                       
                        </div>
<br>
            <?php
              include 'footer.php';
            ?>
      
       </center>
  </body>
</html>

<?script
  function alertBox($data)
  {
    window.alertBox
  }
?>
