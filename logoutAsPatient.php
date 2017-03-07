<?php

session_start();
//$q = $_GET['app2'];
if(session_destroy())
{
	setcookie("user","",time()-60);
	header('Location:loginAsPatient.php');
}


?>