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
	<div class="login">
		<p><a href="login.php">Log in</a></p>
	</div>
	<div class="regis">
		<p><a href="registration.php">Registration</a></p>
	</div>

</div>
<hr/>
<h2 style="padding: 50px 300px;">Welcome to XCompany</h2>


	<div class="free">
		<p> </p>
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

			$sql = "SELECT * FROM products";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					echo "<b>ID : " . $row["p_id"]."<br><br>";
					echo "Product Name : " . $row["p_name"]."<br><br>";
					echo "Description : ".$row["description"]."<br><br>";
					echo "Quantity : ".$row["quantity"]."<br><br><br></b>";
					//echo "<a href='pEdit.php?p_id=$row[p_id]&p_name=$row[p_name]&quantity=$row[quantity]&description=$row[description]'>Edit</a> | <a href='pDelete.php?p_id=$row[p_id]&p_name=$row[p_name]&quantity=$row[quantity]&description=$row[description]'>Delete</a><br><br>";
					
					//echo "<a href='pEdit.php'>Edit</a>";
					//echo "     ";
					//echo "<a href='pDelete.php'>Delete</a><br><br>";
						
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</div>
</div>


</body>
</html>
