<?php
	session_start();
	
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
		<h2>Edit Product</h2>
		<p><a href="home.php">Dashboard</a></p><br>
		<p><a href="view.php">View Profile</a></p><br>
		<p><a href="editProf.php">Edit Profile</a></p><br>
		<p><a href="changePic.php">Change Profile Picture</a></p><br>
		<p><a href="changePass.php">Change Password</a></p><br>
		<p><a href="productAdd.php">Product Add</a></p><br>
		<p><a href="viewProd.php">View Product</a></p><br>
		<p><a href="login.php">Log out</a></p><br>
	</div>
	<div class="free">
		<p> </p>
	</div>	
		<div class="viewe">
			
			<?php 
		
			
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "mycompany";

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$sql="DELETE FROM products WHERE p_id='".$_GET["p_id"]."'";
							if ($conn->query($sql) === TRUE) {
								echo "Deleted successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

							$conn->close();
							header("Location:viewProd.php");

					
			
		
		
		
	?>
		
			
		</div>
	</div>
	
	
</body>
</html>