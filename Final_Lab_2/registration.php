<?php
// Start the session
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
	<div class="login">
		<p><a href="login.php">Log in</a></p>
	</div>
	<div class="regis">
		<p><a href="registration.php">Registration</a></p>
	</div>

</div>
<hr/>
<h2>Registration Form</h2>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	
	<b>Name:</b>
	<input type="text" name="name">
	<br><br>
	
	<b>Email:</b>
	<input type="text" name="email">
	<br><br>
	
	<b>User Name</b>
	<input type="text" name="username">
	
	
	<br><br>
	
	<b>Password:</b>
	<input type="password" name="password">
	
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
$sql = "INSERT INTO users (name, email, username, password)
VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["username"]."','".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();

?>

</body>
</html>
