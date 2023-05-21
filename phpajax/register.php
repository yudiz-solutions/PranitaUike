<?php
include "db_conn.php";

$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
if (isset($_POST['hobby']) && is_array($_POST['hobby'])) {
	    $hobby = implode(',', $_POST['hobby']);
	} else {
	    $hobby = '';
	}
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
 $profile_image = '';

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $profile_image = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    $upload_dir = 'uploads/';
    $target_file = $upload_dir . basename($profile_image);
    move_uploaded_file($tmp_name, $target_file);
} else {
    $profile_image = ''; // or handle the case where no file was uploaded
}



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO user(`first_name`, `last_name`, `username`, `email`, `password`, `confirm_password`, `dob`, `hobby`, `gender`, `country`, `message`, `profile_image`) 
VALUES ('$first_name','$last_name','$username','$email','$password','$confirm_password','$dob','$hobby','$gender','$country','$message','$profile_image')";

if (mysqli_query($conn, $sql)) {
    //  echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head> 

<body>
    <a href="login.php" class="btn btn-primary ">Login</a>
	<a href="user_registerpanel.php" class="btn btn-primary ">User Data</a>
	<br><br>

	<?php  include 'script.php';
    ?>
	<form  autocomplete ="off" id="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<div>
			<label for="first_name">First Name*</label>
			<input type="text" name="first_name" id="first_name" required>
		</div>
	    <br>
		<div>
			<label for="last_name">Last Name*</label>
			<input type="text" name="last_name" id="last_name" required>
		</div>
		<br>
		<div>
			<label for="username">Username*</label>
			<input type="text" name="username" id="username" required>
		</div>
		<br>
		<div>
			<label for="email">Email Address*</label>
			<input type="email" name="email" id="email" required>
		</div>
		<br>
		<div>
			<label for="password">Password*</label>
			<input type="password" name="password" id="password" required>
		</div>
		<br>
		<div>
			<label for="confirm_password">Confirm Password*</label>
			<input type="password" name="confirm_password" id="confirm_password" required>
		</div>
		<br>
		<div>
			<label for="dob">Date of Birth</label>
			<input type="date" name="dob" id="dob">
		</div>
		<br>
		<div>
			<label for="hobby">Hobby</label>
			<input type="checkbox" name="hobby[]" value="reading">Reading
			<input type="checkbox" name="hobby[]" value="writing">Writing
			<input type="checkbox" name="hobby[]" value="coding">Coding
		</div>
		<br>
		<div>
			<label for="gender">Gender</label>
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
		</div>
		<br>
		<div>
			<label for="country">Country</label>
			<select name="country" id="country">
				<option value="">--Select Country--</option>
				<option value="India">India</option>
				<option value="USA">USA</option>
				<option value="UK">UK</option>
				<option value="Australia">Australia</option>
			</select>
		</div>
		<br>
		<div>
			<label for="message">Message</label>
			<textarea name="message" id="message"></textarea>
		</div>
		<br>
		<div>
			<label for="profile-image">Profile Image</label>
			<input type="file" name="profile_image" id="profile_image">
		</div>
		<br><br>
		<div>
			<input type="submit" value="Submit" class="btn btn-success">
		
			
		</div>
	</form>
</body>
</html>


