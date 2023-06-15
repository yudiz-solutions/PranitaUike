<?php
require "db_conn.php";

if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $dob = $_POST["dob"];
    $hobby = isset($_POST["hobby"]) ? implode(",", $_POST["hobby"]) : "";
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    // Update the database record
    $sql = "UPDATE user 
        SET first_name = '$first_name', last_name = '$last_name', username = '$username', email = '$email', password = '$password', confirm_password = '$confirm_password', dob = '$dob', hobby = '$hobby', gender = '$gender', country = '$country' 
        WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: userdata.php?msg=Record updated successfully");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch the record to be updated
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<htmt lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Edit</title>
</head>
<body>
    <h2>Edit Form</h2>
    <form id="myForm" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div>
            <label for="first_name">First Name*</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'] ?>" required>
        </div>
        <br>
        <div>
            <label for="last_name">Last Name*</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name'] ?>" required>
        </div>
        <br>
        <div>
            <label for="username">Username*</label>
            <input type="text" name="username" id="username" value="<?php echo $row['username'] ?>" required>
        </div>
        <br>
        <div>
            <label for="email">Email Address*</label>
            <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" required>
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
			<input type="checkbox" name="hobby[]" value="reading" <?php if (strpos($row['hobby'], 'reading') !== false) echo 'checked'; ?>>Reading
			<input type="checkbox" name="hobby[]" value="writing" <?php if (strpos($row['hobby'], 'writing') !== false) echo 'checked'; ?>>Writing
			<input type="checkbox" name="hobby[]" value="coding" <?php if (strpos($row['hobby'], 'coding') !== false) echo 'checked'; ?>>Coding
		</div>
        <br>
		<div>
			<label for="gender">Gender</label>
			<input type="radio" name="gender" value="male" <?php if ($row['gender'] === 'male') echo 'checked'; ?>>Male
			<input type="radio" name="gender" value="female" <?php if ($row['gender'] === 'female') echo 'checked'; ?>>Female
		</div>
        <br>
		<div>
			<label for="country">Country</label>
			<select name="country" id="country">
				<option value="">--Select Country--</option>
				<option value="India" <?php if ($row['country'] === 'India') echo 'selected'; ?>>India</option>
				<option value="USA" <?php if ($row['country'] === 'USA') echo 'selected'; ?>>USA</option>
				<option value="UK" <?php if ($row['country'] === 'UK') echo 'selected'; ?>>UK</option>
				<option value="Australia" <?php if ($row['country'] === 'Australia') echo 'selected'; ?>>Australia</option>
			</select>
		</div>
        <br>
		
        <br>
		<div>
			<label for="profile-image">Profile Image</label>
			<input type="file" name="profile_image" id="profile-image">
		</div>
		<div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
		</div>
	</form>
</body>
</htmt>



