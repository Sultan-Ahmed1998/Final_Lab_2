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
	<div class="login">
		<p><a href="index.php">Home</a></p>
	</div>
	<div class="regis">
		<p><a href="registration.php">Registration</a></p>
	</div>

</div>
<hr/><br><br>
	<form  method="post">
		<b>Email :</b></td>
		<input type="text" name="email"/><br><br>
				
			
		<b>Password :</b></td>
		<input type="password" name="password"/><br><br>
				
			
			
		<input type="submit" value="Submit" />
				
		
		
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

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."' and password = '".$_POST["password"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["email"]=$_POST["email"];
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>	
	
	
	
	
	
	
	
</body>
</html>