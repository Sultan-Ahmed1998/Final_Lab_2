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
		<h2>Change Password</h2>
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

				$sql = "SELECT id,email,password FROM users WHERE email='".$_SESSION["email"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
					while($row = $result->fetch_assoc()) {
						
						$id=$row["id"];
						$pass=$row["password"];
						
					}
					
				} else {
					echo "0 results";
				}

				$conn->close();
				
				
			 ?>
		<form method="post">
			
			<b>Current password :</b>
			<input type="text" name="oldpass" />
				
			<br>
			<b>New password :</b>
			<input type="text" name="newpass"/>
				
			<br>
			<b>Retype New Password :</b>
			<input type="text" name="renewpass"/>
				
			
			<br><br>
			<input type="submit" value="submit">
				
		
		
			
		
	</form>
			
		</div>
	</div>
	
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
					
					if($pass==$_POST["oldpass"])
					{
						if($_POST["newpass"]==$_POST["renewpass"]){
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
							$sql="UPDATE users SET password='".$_POST["newpass"]."' WHERE id='".$id."'";
							if ($conn->query($sql) === TRUE) {
								echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						}
						else{
							echo "Don't match";
						}
						
						
					}
					else{
						echo "Old password incorrect";
					}
					
					

					
			
		}
		
		
	?>
</body>
</html>