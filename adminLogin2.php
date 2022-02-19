<html>
<head>
	<title>Admin Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php
	if (isset($_POST["ausername"]) && isset($_POST["apassword"])) {
		$username = "root";
		$password = "";
		$database = "hotel";
		$url = "localhost";
		$conn = new mysqli($url, $username, $password, $database);
		$t1 = $_POST["ausername"];
		$t2 = $_POST["apassword"];
		$query = "SELECT * FROM hotel.admins WHERE username = '$t1' AND password = '$t2';";
		$result = $conn->query($query);
		if ($result->num_rows == 0) {
			echo "<h1>Invalid username or password. Please try again</h1>";
			include "adminLogin.php";
		}
		else {
			 echo "<script>window.location='http://localhost/hotel/adminHomePage.php'</script>"; 
		}
	}
	?></center>
</body>
</html>