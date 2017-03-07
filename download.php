<?php

   session_start();
   include 'patientPersonalHeader.php';
   include 'databaseConnection.php';

   if(isset($_SESSION['doctor']))
    {
      $email1 = $_SESSION['doctor'];
      $check = 1;
    }
    
  else if(isset($_COOKIE['dortorUser']))
  {
    $email1 = $_COOKIE['dortorUser'];
    $check = 1;
  }
    
  else if(isset($_SESSION['patient']))
  {
    $email1 = $_SESSION['patient'];
    $check = 2;
  }
    

  else if(isset($_COOKIE['user']))
  {
    $email1 = $_COOKIE['user'];
    $check = 2;
  }

  else
  {
    header('Location:home.php?app="login1"');
   // die("You have to login first");
  }
   $sql="SELECT * FROM `upload_table` WHERE `toFile`='$email1'";

   $result=mysql_query($sql);
  ?>


   	<!DOCTYPE html>
   	<html>
   	<head>
   		<title></title>
      <link rel="stylesheet" type="text/css" href="css/download_style.css">
   		<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style>
table, th, td {
    /*border: 1px solid black;*/
    padding-left: 15px;
    padding-right: 15px;
    /*background-color: red;*/
    
}
    td
    {
      padding-top: 10px;
      padding-bottom: 10px;
      
    }
    td:hover{color:red;}
    tr:hover{background-color: white;}
</style>

   	</head>

    <center>
   	<body>
      <div class="maindiv9">
        <br>
        <h2 style="color:blue;font-family: Monotype Corsiva;">You can doawnload your your prescription or report sent by medical authority or doctor</h2>
          <br>
      <table>
        <tr> 
          <th>Serial</th><th>Category</th> <th>Description</th> <th>Download</th>  <th>File From</th>  <th>Upload Date</th> 
        </tr>

   <?php
      $serial=1;
      while ($row = mysql_fetch_array($result))
      {

   ?>
   
   <tr>
    <td><?php echo $serial."."; ?></td>
     <td><?php echo $row['category']; ?></td>
     <td><?php echo $row['description']; ?></td>
      
      <td>
   	  <label>
        <a href="downloadFile.php?f=<?php echo $row['fileLink'];?>"> <button type="button" style="width:100px;height:25px;">Download File</button></a>
      </label>
      </td>

     <td><?php echo $row['fromFile']; ?></td>
     <td><?php echo $row['date']; ?></td>
    </tr>
    
   <?php 
     $serial++; 
  } 

  ?>
   

    </table>

   	</div>
   	</body>
<br><br><br>
    <?php

      include 'footer.php';

    ?>
    </center>

</html>


  

