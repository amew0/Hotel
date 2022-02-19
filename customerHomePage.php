<html>
<head>
	<title>Customer Homepage</title>
</head>
<link rel="stylesheet" href="styles.css">
<body>
	<center>
	<?php

		if(!isset($_SESSION))
    	    session_start(); 

		$t1 = $_SESSION['username'];

		echo "<h1>$t1's Homepage</h1>
			<form method='post' action='logout.php'>
				<input class='btn' type='submit' name='logoutbtn' value='Logout'>
			</form>";

		echo "<form method='post' action='bookRoom.php'>
				<input class='btn' type='submit' name='bookbtn' value='Book a Room'>
				<input type='hidden' name= 'cusername' value = '$t1'>
			</form>";
		
		echo "<form method='post' action='viewBookings.php'>
				<input class='btn' type='submit' name= 'viewbtn' value='My Bookings'>
				<input type='hidden' name= 'cusername' value = '$t1'>
			</form>";
	?>
	</center>
</body>
</html>