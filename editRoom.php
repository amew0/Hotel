<html>
<head>
	<title>Edit Room</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h3>Edit Room</h3>
	<?php  
		
		$username = "root";
		$password = "";
		$database = "clinic"; 
		$url = "localhost";

		$conn = new mysqli($url,$username,$password,$database);

		$roomAddress = $_POST['hEdit'];

		echo "<form method='post' action='updateRoom.php'>
				Room Address: <input type='number' name='rAddress' value=$roomAddress readonly><br><br>
				Room Type: <input type='text' name='rType'><br><br>
				Room Status: <input type='text' name='rStatus'><br><br>
				<input class='btn' type='submit' name='btnEdit1' value='Update'>
			   </form>";
		echo "<form method='post' action='adminHomePage.php'>
				<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>
			</form>";

	?> </center>
</body>
</html>