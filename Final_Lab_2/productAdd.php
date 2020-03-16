<?php
	session_start();
	
	
?>
<!DOCTYPE html>
<html>
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
		<h2>Product Add</h2>
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
	<div class="view">


		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			
			
			<b>Product name:</b>
			<input type="text" name="p_name">
			<br><br>
			
			<b>Description</b>
			<input type="text" name="description">
			<br><br>
			
			<b>Quantity:</b>
			<input type="number" name="quantity">
			<br><br>

			
			
			<input type="submit" value="submit">
			

		</form>

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
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$sql = "INSERT INTO products (p_name, description, quantity)
			VALUES ('".$_POST["p_name"]."', '".$_POST["description"]."', '".$_POST["quantity"]."')";

			if ($conn->query($sql) == TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
		?>
	</div>
</div>

</body>
</html>