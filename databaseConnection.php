<?php

	$mysql_host = 'localhost';
      $mysql_user = 'root';
      $mysql_password = '';
     

      if(mysql_connect($mysql_host,$mysql_user,$mysql_password) && mysql_select_db('medical'))
      {
         // echo "Connection Succesful<br>";
      }

      else
      {
            echo "<br>Not connected with Database<br><br>";
      }


?>