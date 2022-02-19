<!DOCTYPE html>
<html>
<head>
	<title>Reserve a room</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php 
		$username = "root";
		$password = ""; 
		$database = "hotel"; 
		$url = "localhost"; 
		
		$t1 = $_POST["cusername"];
		$t2 = $_POST["roomAddress"];
		
		$conn = new mysqli($url,$username,$password,$database); 

		$query0 = "insert into hotel.reservation (roomId, cUsername) values ('$t2','$t1')";
		$result0 = $conn->query($query0) or die($conn->error);

		$query1 = "update hotel.room set roomStatus='Reserved' where roomAddress='$t2'";
		$result1 = $conn->query($query1) or die($conn->error);

		if ($result0 and $result1)
			echo "<h2>Your reservation is successful!</h2>
				<h5>Note that you can't logout without booking your reservation.</h5>
				<form method = 'post' action = 'customerHomePage.php'>
					<input class='btn' type= 'submit' name = 'bt1' value = 'Back to Homepage'></br>
				</form>";
		else 
			echo "<h2>Something went wrong with your booking.</h2>
				<form method = 'post' action = 'customerHomePage.php'>
				<input class='btn' type = 'submit' name = 'bt1' value = 'Back to Homepage'></br>
				</form>";
	?></center>
</body>
</html>