<?php
    session_start();
    include 'databaseConnection.php';


    if (!isset($_SESSION['patient']) && !isset($_COOKIE['user']) && !isset($_SESSION['doctor']) && !isset($_COOKIE['doctorUser'])) {
		
		header('Location:home.php?app="login1"');
	
	}


    $check = 0; 
    $userName = "";
    $image = "";

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
		die("You have to login first");

	if($check==1)
	{
		$query2 = "SELECT `name`,`imageLink` FROM `doctor_table` WHERE `email`='$email1'";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_array($result2);

		$userName = $row2['name'];
		$image = $row2['imageLink'];

	}
	else if ($check==2) 
	{
		$query2 = "SELECT `firstName`,`lastName`,`imageLink` FROM `patients_table` WHERE `email`='$email1'";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_array($result2);

		$userName = $row2['firstName']." ".$row2['lastName'];
		$image = $row2['imageLink'];
	}

	
	$qs = urldecode(filter_var(trim($_GET['q'])));
	

    $date = date("D, d M Y, H:i:s A");

    if($email1=='admin@gmail.com')
    	$query = "DELETE FROM `comment_table` WHERE `id`='$qs'";
    else
		$query = "DELETE FROM `comment_table` WHERE `id`='$qs' AND `email`='$email1'";

		if(mysql_query($query))
		{
			/*echo $qs;*/
			//echo "<br>Comment Submited";
		}

		else
		{
			echo "error occured";
		}


	 $query1 = "SELECT * FROM `comment_table` ORDER BY `id` DESC";

	$result1 = mysql_query($query1);

	while($row1 = mysql_fetch_array($result1))
	{
	?>
		
			<fieldset style="margin-right:50px;margin-bottom:30px;padding:20px;color:black;background-color:white;">
			<h1>
				<div style="float:left;width:170px;height:120px;">
					<img src="<?php echo $row1['imageLink']; ?>" style="width:150px;height:100px;">
				</div>

				<div style="float:left;width:270px;height:120px;">
				 	<span style="color:blue;font-family: Monotype Corsiva;"><?php echo $row1['userName']."<br>" ;?> </span>
				 	<p style="color:blue;font-size:15px; font-family: Monotype Corsiva;"><?php echo "(E-mail address : ".$row1['email'].")" ;?></p>
			    </div> 
			</h1><br>
				
				<div style="float:left;">
					<h3 style="color:blue;font-family: Monotype Corsiva;">Comment:</h3>
					<h4> <?php echo $row1['userComment'];?> </h4>

				</div>
				<div style="color:red;float:right;text-align:bottom;"> <h5> <?php echo $row1['date'];?> </h5></div>
				<?php
				if($email1=='admin@gmail.com'){
					?>
				<form action="contact.php" method="POST">
					<input type="button" name="button" value="Delete Comment" onclick="deleteComment(<?php echo $row1['id']; ?>)" style="width:120px;height:30px;margin:10px;margin-left:350px;background-color:yellow;">
				</form>
				<?php
				}

				if($email1==$row1['email']){
					?>
				<form action="contact.php" method="POST">
					<input type="button" name="button" value="Delete Comment" onclick="deleteComment(<?php echo $row1['id']; ?>)" style="width:120px;height:30px;margin:10px;margin-left:350px;background-color:yellow;">
				</form>
				<?php
				}


				?>

			</fieldset>	
		
	<?php
	}


?>