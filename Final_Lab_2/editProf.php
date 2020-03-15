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
		<h2>Edit Profile</h2>
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

				$sql = "SELECT id,name,email,username,password FROM users WHERE email='".$_SESSION["email"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
					while($row = $result->fetch_assoc()) {
						
						$cid=$row["id"];
						$cname=$row["name"];
						$cemail=$row["email"];
						$cusername=$row["username"];
						
						
					}
					
				} else {
					echo "0 results";
				}

				$conn->close();
				
				
			 ?>
		<form method="post">
		
				<b>Name :</b>
				<input type="text" name="nname" />
				
				<br>
				<b>Email :</b></td>
				<input type="text" name="nemail"/>
				
				<br>
				<b>User Name :</b></td>
				<input type="text" name="nusername"/>
				
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
							$sql="UPDATE users SET name='".$_POST["nname"]."',email='".$_POST["nemail"]."',username='".$_POST["nusername"]."' WHERE id='".$cid."'";
							if ($conn->query($sql) === TRUE) {
								echo "Profile Updated successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						

					
			
		}
		
		
	?>
</body>
</html>