<html>
<head>
	<title>Admin Homepage</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h1>Admin Homepage</h1>
	<form method="post" action="createRoom.php">
		<input type="submit" name="createBtn" value="Create a Room">
	</form>
	<form method='post' action='http://localhost/hotel/'>
		<input class='btn' type="submit" value='Log Out'>
	</form>
	<h3>Available rooms</h3>
	<?php 
			
		$username = "root";
		$password = ""; 
		$database = "hotel"; 
		$url = "localhost"; 
		
		$conn = new mysqli($url,$username,$password,$database); 

		$query = "select * from hotel.room order by roomAddress";
		$result = $conn -> query($query) or die($conn->error);

		$roomAddress = "select roomAddress from hotel.room order by roomAddress";
		$addresses = $conn -> query($roomAddress) or die($conn->error);

		$arrayAddresses = array();
		while($t = $addresses -> fetch_assoc()){
			foreach($t as $key => $val)
				array_push($arrayAddresses,$val);
		}

		$i=0;
		echo "<table border = 1>";
		echo "<tr><th>Room Id</th>
						<th>Room Type</th>
						<th>Room Status</th>
						<th>Edit here</th>
						<th>Delete here</th></tr>"; 
		while($temp = $result -> fetch_assoc()) {
		 echo "<tr>";
		 	foreach ($temp as $key => $value) 
		 		echo "<td> $value </td>"; 
		 
		 echo "<td><form method='post' action='editRoom.php'>
		 			<input class='btn' type='submit' name='btnEdit' value='Edit'> </td>
		 			<input type='hidden' name='hEdit' value=$arrayAddresses[$i]>
		 			</form></td>";
		 echo "<td><form method = 'post' action='deleteRoom.php' > 
		 			<input class='btn Dbtn' type='submit' name='btnDelete' value='Delete' >
		 			<input type='hidden' name='hDelete' value=$arrayAddresses[$i]>
		 			</form></td>";
		 echo "</tr>"; 
		 
		 $i = $i+1;
		} echo "</table><br>";
	?> 
	</center>	
</body>
</html>