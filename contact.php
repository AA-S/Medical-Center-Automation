<?php

	include 'header.php';
	include 'databaseConnection.php';

?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/contact_style.css">

<script type="text/javascript">
function showUser() {
	var str = document.getElementById("commentBox").value;
	document.getElementById("commentBox").value = "";

    if (str == "") 
    {
        document.getElementById("showComment").innerHTML = "";
        window.alert("Your comment box is empty. Please comment first then submit");
        //return;
    } 

    else 
    { 
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showComment").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","showingComment.php?q="+str,true);
        xmlhttp.send();
    }
}



function deleteComment(idNo) {
	//var str = document.getElementById("commentBox").value;

    if (0)
    {
       /* document.getElementById("showComment").innerHTML = "";
        window.alert("Your comment box is empty. Please comment first then submit");*/
        //return;
    } 

    else 
    { 
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showComment").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","commentDelete.php?q="+idNo,true);
        xmlhttp.send();
    }
}
</script>


<?php

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
		$email1="";


?>


	</head>
	<center>
	<body>

		<div class="maindiv7">
<br><br><br>
			<div class="comment">
				<fieldset style="margin-right:50px;margin-bottom:30px;margin-top:30px;padding:20px;color:black;background-color:white;">
				<form action="contact.php" method="POST">

					<label>
						<p style="font-size:15px;"><b>Your Comment:</b></p>
						<textarea name="comment1" id="commentBox" style="width:450px;height:150px;padding:5px;" placeholder="Write your Comment Here"></textarea>
						<input type="button" name="button" value="Comment" onclick="showUser()" style="width:100px;height:30px;margin:10px;margin-left:350px;">
					</label>
						

				</form>
				</fieldset>
				<br>

				<?php


	?>


				<br>
             <div id="showComment">

             	<?php
             	if (isset($_SESSION['patient'])||isset($_COOKIE['user'])||isset($_SESSION['doctor'])||isset($_COOKIE['doctorUser'])) 
             	{
             		
             	
             	/*else
             	{
             		//echo "<h1></h1>";
             		die("You have to login first for comment");
             	}*/
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

}
             	?>


              </div><br>
			</div>
			<br>

			<div class="other">
				<h1 style="color:blue;font-family: Monotype Corsiva;">Other Online Contact</h1>
				<div class="other1">
				<ul>

					<div class="logo"><img src="images/facebookLogo.jpg" style="width:30px;height:30px;"></div>
					<div class="link"><a href="http://www.facebook.com">  <li> Facebook/Media</li></a></div>

					<div class="logo"><img src="images/skypeLogo.jpg" style="width:30px;height:30px;"></div> 
					<div class="link"><a href="http://www.skype.com/en/">  <li> Skype ID/Media Center</li></a></div>

					<div class="logo"><img src="images/twitterLogo.jpg" style="width:30px;height:30px;"></div> 
					<div class="link"><a href="https://twitter.com/?lang=en">  <li> Twitter/Media</li></a></div>
					
				</ul>
				</div>

				<div class="other1">
				<ul>

					<div class="logo"><img src="images/phoneLogo.jpg" style="width:30px;height:30px;"></div> 
					<div class="link"><a href="tel:+8801753258105">  <li>Phone/+8801753258105</li></a></div>

					<div class="logo"><img src="images/emailLogo.jpg" style="width:30px;height:30px;"></div> 
					<div class="link"><a href="https://mail.google.com/">  <li>Email/admin@gmail.com</li></a></div>

					<div class="logo"><img src="images/locationLogo.jpg" style="width:30px;height:30px;"></div> 
					<div class="link"><a href="about.php">  <li>Location/Google map</li></a></div>
					
				</ul>
				</div>

				<div class="other2">
					<ul>
						<a href=""><li></li></a>
						<a href=""><li></li></a>
						<a href=""><li></li></a>
					</ul>
				</div>

			</div>
			

		</div>

	</body>
	<br>
	<?php
		include 'footer.php';
	?>
	</center>
</html>


