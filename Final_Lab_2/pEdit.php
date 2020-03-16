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

				$sql = "SELECT p_id,p_name,description,quantity FROM products WHERE p_id='".$_GET["p_id"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
					while($row = $result->fetch_assoc()) {
						
						$p_id=$row["p_id"];
						$p_name=$row["p_name"];
						$description=$row["description"];
						$quantity=$row["quantity"];
						
						
					}
					
				} else {
					echo "0 results";
				}

				$conn->close();
				
				
			 ?>
		<form method="post">
		
				<b>Product Name :</b>
				<input type="text" name="nname" value="<?php echo $p_name; ?>" />
				
				<br><br>
				<b>Description :</b></td>
				<input type="text" name="ndes" value="<?php echo $description; ?>"/>
				
				<br><br>
				<b>Quantity :</b></td>
				<input type="text" name="nquan" value="<?php echo $quantity; ?>"/>
				
				<br><br>
				<input type="submit" value="submit">
			
		
			
		
	</form>
			
		</div>
	</div>
	
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
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
							$sql="UPDATE products SET p_name='".$_POST["nname"]."',description='".$_POST["ndes"]."',quantity='".$_POST["nquan"]."' WHERE p_id='".$p_id."'";
							if ($conn->query($sql) === TRUE) {
								echo "Product Updated successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						

					
			
		}
		
		
	?>
</body>
</html>