<?php
    //  session_start();

      include 'databaseConnection.php';
      include 'header.php';
      
      if(isset($_COOKIE['doctorUser']))
      {
        //$_SESSION['doctor']=$_COOKIE['$email'];
        header('Location:appointment.php');
            die();
      }
     if(isset($_SESSION['doctor']))
     {
            header('Location:home.php');
            die();
     }

     if(isset($_POST['submit']))
     {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if(!empty($email) && !empty($pass))
        {
          $search = "SELECT * FROM `doctor_table` WHERE `email`='$email' AND `password`='$pass'";
          $result = mysql_query($search);
          $nor = mysql_num_rows($result);

          if($nor)
          {
            $_SESSION['doctor']=$email;

            if (isset($_POST['checkbox'])) 
            {                
                  setcookie("doctorUser",$email,time()+90);
                
            }  
            header('Location:home.php');
           
          }

          else
          {
            header('Location:loginAsDoctor.php?loginError=occur');
          }

        }
        

        
      }
      
?> 

        <?php

        

        ?>


<html>
	<head>
		<title>Login|KUET Medical Center</title>
		<link rel="stylesheet" type="text/css" href="css/login_style.css">


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

       		 <div class="login_form">
      		 
                       <marquee style="padding:10px;margin-left:300px;margin-right:300px;">Enter E-mail and Password for login  </marquee>
                       <!--  <br><br> -->

       			  <form action="loginAsDoctor.php" method="POST">

                              <fieldset style="">

                                    <legend align="center"> <h3>Login Form of Doctors</h3> </legend>

       				<!--  <br>        -->
              <?php
                  if(isset($_GET['loginError']) && $_GET['loginError'] == 'occur')
                  {
                ?>

                <b><p style="color:white;">Password and Email Mismatch</p></b> <br>
                <?php
                        
                  
                  }
               ?>          


       				 Please Enter your E-mail:<br>
                                    <input type="email" name="email" placeholder="E-mail Address" style="padding-left:7px;height:35px;width:220px;margin-top:5px;" required><br><br>
       				 Enter Password:<br>
                                    <input type="password" name="password" placeholder="Password" style="padding-left:7px;height:35px;width:220px;margin-top:5px;" required> <br><br>
                                    <input type="checkbox" name="checkbox"><span style="font-size:13px;"> Keep me logged in</span>
                                    <input type="reset" name="reset" value="Reset All" style="margin-left:5px;width:70px;height:25px;"><br>
                                    <input type="submit" name="submit" value="Submit" style="margin:10px;width:220px;height:35px;">
       				 <br><br><br> 
                              </fieldset>
       			  </form>
                       
                        
       		</div>
       
<?php
  include 'footer.php';
?>
      
       </center>
	</body>
</html>

