<html>
<head>
	<title>My Bookings</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h1>My Bookings</h1>
	<?php 

		$username = "root";
		$password = ""; 
		$database = "hotel"; 
		$url = "localhost"; 
		
		$conn = new mysqli($url,$username,$password,$database); 

		$bID = $_POST['bookingId'];
		$rID = $_POST['roomId'];
		
		$query0 = "delete from hotel.bookings where bookingid=$bID";
		$query0result = $conn->query($query0);

		$query1 = "update hotel.room set roomStatus='Available' where roomAddress=$rID";
		$query1result = $conn->query($query1);
		
		session_start();


		if($query0result and $query1result)
			echo "<script>window.location='http://localhost/hotel/customerHomePage.php'</script>";
		
		
	?>
	</center>
</body>
</html>