<?php

	session_start();
	
	include 'databaseConnection.php';

  if (!isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
    
    header('Location:home.php?app="login1"');
  
  }
?>


<?php

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
                                    /*$gender = $row['gender'];
                                    $date = $row['date'];*/

                                   /* if($_FILES["uploadImage"]["error"]>0)
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
                                    }*/



                                    if(isset($_SESSION['doctor']))
                                              $update2 = $_SESSION['doctor'];

                                        else if(isset($_COOKIE['dortorUser']))
                                               $update2 = $_COOKIE['dortorUser'];

                                          $insert = "UPDATE doctor_table SET 
                                                name='$name',email='$email',password='$password',clinicalInterest='$clinicalInterest',title='$title',
                                                medicalCollege='$medicalCollege',residence='$residence',certification='$certification',idNumber='$idNumber',
                                                speciality='$doctorSpeciality',appointmentPerDay='$perDayAppointment',
                                                mobileNo='$mobileNo',birthDate='$birthDate' WHERE email='$update2'";
                                          if($password==$confirmPassword)
                                          {
                                                if(mysql_query($insert))
                                                {
                                                	header('Location:editDoctorAccount.php?str="set"');
                                                      //echo '<h1 style="text-align: center">Update Completed</h1>';
                                                }

                                                else
                                                      echo '<h1 style="text-align: center">Update error</h1>';

                                          }
                                          else
                                          {
                                                echo '<h1 style="text-align: center">password mismatch</h1>';
                                          }

?>