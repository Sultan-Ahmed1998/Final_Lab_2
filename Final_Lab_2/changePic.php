<?php
	session_start();
	$email=$_SESSION["email"];
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<link rel="stylesheet" type="text/css" href="system.css" media="all" />
</head>
<body>
	<div class="head_area">
	<div class="company">
		<h2>XCompany</h2>
	</div>
	<div class="logout">
		<p><a href="login.php">Log out</a></p>
	</div>
	

</div>
<hr/>
	<div class="mid">
	
	<div class="account">
		<h2>Change Picture</h2>
		<p><a href="home.php">Dashboard</a></p><br>
		<p><a href="view.php">View Profile</a></p><br>
		<p><a href="editProf.php">Edit Profile</a></p><br>
		<p><a href="changePic.php">Change Profile Picture</a></p><br>
		<p><a href="changePass.php">Change Password</a></p><br>
		<p><a href="login.php">Log out</a></p><br>
	</div>
	<div class="free">
	
	</div>
		<div class="view">
				
				<form action="upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="submit" value="Upload Image" name="submit">
				</form>
				
			
		</div>
	</div>
	
</body>
</html>