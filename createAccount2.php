<html>
<head>
	<title>Register</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php
	if (isset($_POST["rusername"]) && isset($_POST["rpassword"]))
	{
		$username = "root";
		$password = "";
		$database = "hotel";
		$url = "localhost";
		$conn = new mysqli($url, $username, $password, $database);
		$t1 = $_POST["rusername"];
		$t2 = $_POST["rpassword"];
		$query = "insert into hotel.customers values ('$t1', '$t2')";
		$result = $conn->query($query);
		if($result) {
			echo "<h1>Your registration is successful</h1>";
			include "index.html";
		}
		else {
			echo "<h1>Error! Please try again. Username might be taken</h1>";
			include "createAccount.php";
		}
	}
	?>
	</center>
</body>
</html>