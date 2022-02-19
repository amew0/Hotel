<html>
<head>
	<title>Log Out</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php
	session_start();
	$t1 = $_SESSION['username'];

	$username = "root";
	$password = "";
	$database = "hotel";
	$url = "localhost";
	
	$conn = new mysqli($url, $username, $password, $database);
	echo "<script>console.log('$t1')</script>";
	$query = "select * from hotel.reservation where cUsername='$t1'";
	$result = $conn->query($query) or die($conn->error);
	if ($result->num_rows != 0){
		echo "<script>alert('Either book or cancel the reservations to LogOut successfully.')</script>";

		include 'customerHomePage.php';

	}
	else 
		echo "<script>window.location='http://localhost/hotel/'</script>";
	?>
	</center>
</body>
</html>