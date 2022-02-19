<html>
<head>
	<title>Book a Room</title>
<link rel="stylesheet" href="styles.css">
</head>
	<body>
		<center>
		<h1>Book a Room</h1>
		<?php
		if (isset($_POST["cusername"])) {
			$username = "root";
			$password = ""; 
			$database = "hotel"; 
			$url = "localhost"; 
			
			$t1 = $_POST["cusername"];
			
			$conn = new mysqli($url,$username,$password,$database); 

			$query = "select * from hotel.room where roomstatus = 'available' order by roomaddress;";
			$result = $conn -> query($query) or die($conn->error);
			
			$roomAddress = "select roomAddress from hotel.room where roomstatus = 'available' order by roomAddress";
			$addresses = $conn -> query($roomAddress) or die($conn->error);

			$arrayAddresses = array();
			while($t = $addresses -> fetch_assoc()){
				foreach($t as $key => $val)
					array_push($arrayAddresses,$val);
			}

			echo "<table border = 1>"; 
			$i = 0;
			echo "<tr><th>Room Id</th>
						<th>Room Type</th>
						<th>Room Status</th>
						<th>Book here</th>
						<th>Reserve here</th></tr>";
			while($temp = $result -> fetch_assoc()) {
				
				echo "<tr>";
				foreach ($temp as $key => $value) 
					echo "<td> $value </td>"; 

				echo "<td><form method='post' action='bookRoom2.php'>
						<input class='btn' type='submit' name='bookinfo' value='Book'>
						<input type='hidden' name= 'cusername' value = '$t1'>
						<input type='hidden' name='roomAddress' value=$arrayAddresses[$i]>
						</form></td>";
				echo "<td><form method='post' action='reserve.php'>
						<input class='btn' type='submit' name='bookinfo' value='Reserve'>
						<input type='hidden' name= 'cusername' value = '$t1'>
						<input type='hidden' name='roomAddress' value=$arrayAddresses[$i]>
						</form></td>";
				echo "</tr>";

				$i = $i+1;
			}
			echo "</table><br>";

			echo "<form method='post' action='customerHomePage.php'>
					<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>
				  </form>";
		}
		?> 
		</center>
	</body> 

</html> 
