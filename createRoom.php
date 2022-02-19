<html>
<head>
	<title>Create a Room</title>
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

			echo "<form method='post' action='insertRoom.php'>
				Room Address: <input type='number' name='rAddress'><br><br>
				Room Type: <input type='text' name='rType'><br><br>
				Room Status: <input type='text' name='rStatus'><br><br>
				<input class='btn' type='submit' name='btnEdit1' value='Create'>
			   </form>";	
			echo "<form method='post' action='adminHomePage.php'>
					<input class='btn' type='submit' name='backbtn' value='Back to Homepage'>
				</form>";		
		?> 
	</center>
	</body> 
</html> 
