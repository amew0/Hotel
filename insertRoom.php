<html>
<head>
	<title>Insert Room</title>
<link rel="stylesheet" href="styles.css">
</head>
	<body>
		<center>
		<h3>Create a Room</h3>
		<?php

			$username = "root";
			$password = "";
			$database = "clinic"; 
			$url = "localhost";

			$conn = new mysqli($url,$username,$password,$database);

			if (! (empty($_POST["rAddress"]) or empty($_POST["rType"]) or empty($_POST["rStatus"]))) {

				$t1 = $_POST["rAddress"]; 
				$t2 = $_POST["rType"]; 
				$t3 = $_POST["rStatus"];

				$query = "insert into hotel.room values ($t1, '$t2', '$t3')"; 
				
				$result = $conn -> query($query) or die($conn->error);
				
				if ($result) echo "<script>window.location='http://localhost/hotel/adminHomePage.php'</script>"; 
				else {
					echo "<h1> Something went wrong. </hl>";
					echo "<form method='post' action='createRoom.php'>
							<input class='btn' type='submit' name='backbtn' value='Back'>
						</form>";	
					echo "<form method='post' action='adminHomePage.php'>
							<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>
						</form>";
				}
			}
			else {
				echo "<h4>Some fields are empty.</h4>";
				echo "<form method='post' action='createRoom.php'>
						<input class='btn' type='submit' name='backbtn' value='Back'>
					</form>";	
				echo "<form method='post' action='adminHomePage.php'>
						<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>
					</form>";		
			}			
		?> 
	</center>
	</body> 
</html> 
