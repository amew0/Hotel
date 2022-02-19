<html>
<head>
	<title>Book a Room</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h1>Book a Room</h1>
	<?php  
		
			$username = "root";
			$password = "";
			$database = "clinic"; 
			$url = "localhost";
			
			$t1 = $_POST["roomAddress"];
			$t2 = $_POST["cusername"];
			
			$conn = new mysqli($url,$username,$password,$database);
			
			$query = "insert into hotel.bookings (roomid, customerusername) values ('$t1', '$t2')";
			$result = $conn->query($query) or die($conn->error);;
			
			$query2 = "update hotel.room set roomstatus = 'Booked' where roomaddress = $t1";
			$result1 = $conn->query($query2);	
			
			session_start();
			$_SESSION['username'] = $t2;

			if($result and $result1) {
				echo "<h1>Your booking is successful!</h1>
				<form id = 'form' method = 'post' action = 'customerHomePage.php'>
					<input class='btn' type= 'submit' name = 'bt1' value = 'Back to Homepage'></br>
				</form>";
			}
			else {
				echo '<h1>Something went wrong with your booking.</h1>';
			}
			if (!empty($_POST["reservationId"])){
				$resId = $_POST["reservationId"];
				$query3 = "delete from hotel.reservation where reservationId=$resId";
				$result3 = $conn->query($query3) or die($conn->error);

			}
	?> 
	</center>
</body>
</html>