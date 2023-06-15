<?php
include 'db_conn.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $hobby = isset($_POST['hobby']) ? implode(',', $_POST['hobby']) : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';

    $profile_image = isset($_FILES["profile_image"]["name"]) ? $_FILES["profile_image"]["name"] : '';
    $tempimg = isset($_FILES["profile_image"]["tmp_name"]) ? $_FILES["profile_image"]["tmp_name"] : '';
    $folder = '';
    if (!empty($tempimg)) {
        $folder = "./uploads/" . $profile_image;
        move_uploaded_file($tempimg, $folder);
    }

    $sql = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `email`, `password`, `confirm_password`, `dob`, `hobby`, `gender`, `country`, `profile_image`)
            VALUES ('$first_name','$last_name','$username','$email','$password','$confirm_password','$dob','$hobby','$gender','$country','$folder')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
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
    <a href="index.php" class="btn btn-primary">Login</a>
    <br><br>
    <form autocomplete="off" id="registration-form" enctype="multipart/form-data" method="POST">
        <div>
            <label for="first_name">First Name*</label>
            <input type="text" name="first_name" id="first_name" required>
            <span id="firstcheck" style="display:none; color:red;">Please enter a first name</span>
        </div>
        <br>
        <div>
            <label for="last_name">Last Name*</label>
            <input type="text" name="last_name" id="last_name" required>
            <span id="lastcheck" style="display:none; color:red;">Please enter a last name</span>
        </div>
        <br>
        <div>
            <label for="username">Username*</label>
            <input type="text" name="username" id="username" required>
            <span id="usercheck" style="display:none; color:red;">Please enter a valid username</span>
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
            <span id="passcheck" style="display:none; color:red;">Please enter a valid password</span>
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
            </select>
        </div>
        <br>

        <div>
            <label for="profile_image">Profile Picture</label>
            <input type="file" name="profile_image" id="profile_image" style="display: none;">
            <input type="hidden" name="image" id="image" value="">
            <button type="button" id="upload-button">Upload Image</button>
        </div>

        <br>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>


    <script>
    document.getElementById("upload-button").addEventListener("click", function() {
        document.getElementById("profile_image").click();
    });

    document.getElementById("profile_image").addEventListener("change", function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById("image").value = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>

</body>

</html>