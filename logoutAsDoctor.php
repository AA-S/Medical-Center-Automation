<?php

session_start();
if(session_destroy())
{
	setcookie("doctorUser","",time()-60);
	header('Location:loginAsDoctor.php');
}


?>