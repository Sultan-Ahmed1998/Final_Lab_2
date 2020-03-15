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
		<h2>View Profile</h2>
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

			$sql = "SELECT name,email,username,password,picture FROM users WHERE email= '".$_SESSION["email"]."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					echo "<b>Name : " . $row["name"]."<br><br>";
					echo "Email : " . $row["email"]."<br><br>";
					echo "User Name : ".$row["username"]."<br><br>";
					echo "Password : ".$row["password"]."<br></b>";
					$picture=$row["picture"];
					
						
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</div>
	<div class="pic">
		<img src="<?php echo $picture; ?>" alt="" />
	
	</div>
</div>




</body>
</html>