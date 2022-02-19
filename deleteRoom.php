<html>
<head>
	<title>Delete Room</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<?php  
		
		$username = "root";
		$password = "";
		$database = "clinic"; 
		$url = "localhost";

		$conn = new mysqli($url,$username,$password,$database);

		$roomAddress = $_POST['hDelete'];

		$deleteQuery = "delete from hotel.room where roomAddress = '$roomAddress'";
		$deleteResult = $conn -> query($deleteQuery) or die($conn->error);
		
		echo "delete from hotel.room where roomAddress = '$roomAddress'";
		
		if($deleteResult) echo "<script>window.location='http://localhost/hotel/adminHomePage.php'</script>";
		else echo "sth went wrong";
	?> 
	</center>
</body>
</html>