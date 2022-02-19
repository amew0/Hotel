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
		
		session_start();
		$t1 = $_POST["cusername"];
		$_SESSION['username'] = $t1;

		$conn = new mysqli($url,$username,$password,$database); 
		
		$query = "select * from hotel.bookings where customerusername = '$t1' order by bookingid";
		$result = $conn -> query($query);
		
		$query1 = "select bookingid from hotel.bookings order by bookingid";
		$result1 = $conn -> query($query1) or die($conn->error);

		$bIDs = array();
		while($t = $result1->fetch_assoc()){
			foreach($t as $key => $val)
				array_push($bIDs, $val);	
		}

		$query2 = "select roomid from hotel.bookings order by bookingid";
		$result2 = $conn -> query($query2) or die($conn->error);

		$rIDs = array();
		while($t = $result2->fetch_assoc()){
			foreach($t as $key => $val)
				array_push($rIDs, $val);	
		}

		$i=0;
		echo "<table border = 1>";
		while ($temp = $result->fetch_assoc()) {
			echo "<tr>";
				foreach ($temp as $key => $value)
					echo "<td> $value </td>";
			echo "<td><form method='post' action='cancelBooking.php'>
					<input class='btn Dbtn' type='submit' name='cnclbtn' value='Cancel'>
					<input type='hidden' name='bookingId' value=$bIDs[$i]>
					<input type='hidden' name='roomId' value=$rIDs[$i]>
				</form></td>";

			echo "</tr>";
			$i=$i+1;
		}
		echo "</table></br>";

		$query3 = "select * from hotel.reservation where cUsername='$t1' order by reservationId";
		$result3 = $conn->query($query3) or die($conn->error);
		
		$roomAddress = "select roomId from hotel.reservation where cUsername='$t1' order by reservationId";
		$addresses = $conn -> query($roomAddress) or die($conn->error);

		$arrayAddresses = array();
		while($t = $addresses -> fetch_assoc()){
			foreach($t as $key => $val0)
				array_push($arrayAddresses,$val0);
		}

		$qreservationId = "select reservationId from hotel.reservation where cUsername='$t1' order by reservationId";
		$reservations = $conn -> query($qreservationId) or die($conn->error);

		$arrayReservations = array();
		while($temp1 = $reservations -> fetch_assoc()){
			foreach($temp1 as $key => $val1)
				array_push($arrayReservations,$val1);
		}

		echo "<h3>Your reservations</h3>";
		echo "<table border = 1>";
		$i=0;
		while($t = $result3->fetch_assoc()){
			echo "<tr>";
			foreach($t as $key => $value)
				echo "<td>$value</td>";
			
			echo "<td><form method='post' action='bookRoom2.php'>
					<input class='btn' type='submit' name='bookfromreserve' value='Book'>
					<input type='hidden' name='roomAddress' value=$arrayAddresses[$i]>
					<input type='hidden' name='cusername' value=$t1>
					<input type='hidden' name='reservationId' value=$arrayReservations[$i]>
				</form></td>";

			echo "<td><form method='post' action='removeReservation.php'>
					<input class='btn Dbtn' type='submit' name='removebtn' value='Remove'>
					<input type='hidden' name='roomAddress' value=$arrayAddresses[$i]>
					<input type='hidden' name='cusername' value=$t1>
					<input type='hidden' name='reservationId' value=$arrayReservations[$i]>
				</form></td>";

			echo "</tr>";
			$i=$i+1;
		} echo "</table><br>";


		echo "<form method='post' action='http://localhost/hotel/customerHomePage.php'>
				<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>

			</form>";
	?>
	</center>
</body>
</html>