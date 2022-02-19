<html>
<head>
	<title>Customer Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<center>
	<h1>Customer Login</h1>
	<form method= "post" action = "customerLogin2.php">
		Username: <input type= "text" name= "cusername"></br></br>
		Password: <input type= "text" name= "cpassword"></br></br>
		<input class='btn' type = "submit" name = "bt1" value = "Login"></br>
	</form>
	<form method="post" action="createAccount.php">
		Creater account here.<input class='btn' type="submit" name="registerbtn" value="Register">		
	</form>
	</center>
</body>
</html>