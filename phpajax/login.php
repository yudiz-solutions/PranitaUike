<?php 
include 'db_conn.php';
session_start();

if(isset($_SESSION['email'])){
	header("Location: index.php");
	exit();
}

if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) == 1){
		$row = mysqli_fetch_assoc($result);

		if(password_verify($password, $row['password'])){
			$_SESSION['email'] = $row['email'];
			header("Location: logout.php");
			exit();
		} else {
			echo "Incorrect password";
		}
	} else {
		echo "Email not found";
	}
}
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<title>Login</title>
</head>
<body>
    <a href="register.php"> Go To Register </a>
    <?php include 'script.php'; ?>
	<h2>Login</h2>
	<form  autcomplete = "off" method="POST">
		<label>Email:</label><br>
		<input type="email" name="email"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br>
		<br>
		<div>
		<!-- <button type="button" class="btn btn-primary" onclick="submitData();">login</button> -->
		
		 <input type="submit" value="Login" class= 'btn btn-info'>
	</div>
	</form>
</body>
</html> 

 
