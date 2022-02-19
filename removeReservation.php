<html>
<head>
	<title>My Bookings</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h1>My reservations</h1>
	<?php 
		session_start();
		$username = "root";
		$password = ""; 
		$database = "hotel"; 
		$url = "localhost"; 
		
		$conn = new mysqli($url,$username,$password,$database); 

		$resID = $_POST['reservationId'];
		$rID = $_POST['roomAddress'];
		
		$query0 = "delete from hotel.reservation where reservationId=$resID";
		$query0result = $conn->query($query0);

		$query1 = "update hotel.room set roomStatus='Available' where roomAddress=$rID";
		$query1result = $conn->query($query1);

		
		if($query0result and $query1result)
			echo "<script>window.location='http://localhost/hotel/customerHomePage.php'</script>";		
	?></center>
</body>
</html>