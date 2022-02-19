<html>
<head>
	<title>Customer Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php
	if (isset($_POST["cusername"])) {	
		$username = "root";
		$password = "";
		$database = "hotel";
		$url = "localhost";
		
		$conn = new mysqli($url, $username, $password, $database);
		
		$t1 = $_POST["cusername"];
		$t2 = $_POST["cpassword"];

		session_start();
		$_SESSION['username'] = $t1; 

		$query = "SELECT * FROM hotel.customers WHERE username = '$t1' AND password = '$t2';";
		$result = $conn->query($query);
		if ($result->num_rows == 0) {
			echo "<h4>Invalid username or password. Please try again.</h4>";
			include "customerLogin.php";
		}
		else {
			echo "<script>window.location='http://localhost/hotel/customerHomePage'</script>

				";
		}
	}
	?></center>
</body>
</html>