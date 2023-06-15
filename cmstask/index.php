

<?php 
include 'db_conn.php';
session_start();

// if(isset($_SESSION['email'])){
// 	header("Location: index.php");
// 	exit();
// }

if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	if($result->num_rows >0){
	
		
			$row = mysqli_fetch_assoc($result);
		$hashedPassword = $row['password'];

		
			$_SESSION['email'] = $row['email'];
			header("Location: dashboard.php");
			
	
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
	<!-- <a href="register.php">Go To Register</a> -->
	
	<h2>Login</h2>
	<form autocomplete="off" method="post" action="">
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" name="email" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<br>
		<input type="submit" value="Login" class="btn btn-info">
	</form>
    <p>Don't have an account? <a href="register.php">Sign up</a></p>
</body>
</html>                      
