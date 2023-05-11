<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']);
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $bio = $_POST['bio'];
    
    
    $profile = $_FILES['profile']['name'];
    $image_tmp = $_FILES['profile']['tmp_name'];
    $file = "uploads/". $profile;
    
    $accounts = isset($_POST['accounts']);

//     if (isset($_POST['accounts']) && !empty($_POST['accounts'])) {

//     $accounts = explode(',', $_POST['accounts']);

//         foreach ($accounts as $account) {
//         echo '<input type="checkbox" name="accounts[]" value="' . $account . '" checked>' . $account . '<br>';
//     }

// }


    $sql = "INSERT INTO `entries_tb` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `gender`, `country`, `state`, `city`, `bio`, `profile`, `accounts`) 
    VALUES (NULL,'$first_name','$last_name','$user_name','$email','$password','$gender','$country','$state','$city','$bio','$profile','$accounts')";

    if(mysqli_query($conn,$sql)){
        header("Location: index.php?msg=Record Added successfully");
    }else{
        echo "error". $sql . "<br>" . mysqli_error($conn);
    }
    // mysqli_close($conn);

    if (move_uploaded_file($image_tmp, $file)) {

        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>php crud </title>
</head>
                                 
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">

        DATA
    </nav>


    <div class="container">
        <div class="text-center mb-4">
            <h3>ADD DATA</h3>
            <p class="text-muted">Click update after changing any details</p>
        </div>


        <div class="container d-flex justify-content-center">
            <form action=" " method="post" style="width : 50vw; min-width : 300px;">
                <div class="row mb-3">
                    <div> 
                        <label class="form-lable">First Name:</lable>
                            <input type="text" class="form-control" name="first_name">
      </div>

                    <div>
                        <label class="form-lable">last Name:</lable>
                        <input type="text" class="form-control" name="last_name">
       </div>

                    <div>
                        <label class="form-lable">User Name:</lable>
                        <input type="text" class="form-control" name="user_name" >
       </div>

                    <div>
                        <label class="form-lable">Email:</lable>
                        <input type="email" class="form-control" name="email" >
       </div>

                    <div>
                    <label class="form-lable">Password:</lable>
                    <input type="text" class="form-control" name="password" >
       </div>

                </div>


                <div class="form-group mb-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-lable">Male</lable>

                        &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                        <label for="female" class="form-input-lable">Female</lable>

                            <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                            <label for="female" class="form-input-lable">Other</lable>

                </div>
                <div>

                    <label for="country">country:</label>
                    <select name="country" id="country">
                        <option value="India">India</option>
                        <option value="China">China</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Nigeria">Nigeria</option>
                    </select>
                    <br><br>

                    <label for="state"> State:</label>
                    <select name="state" id="state">
                        <option value="Andhra">Andhra Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Pakistan">Gujarat</option>
                        <option value="Nigeria">Nigeria</option>
                    </select>
                    <br><br>


                    <label for="city"> City:</label>
                    <select name="city" id="city">
                        <option value="Ahmadabad">Ahmadabad</option>
                        <option value="Amreli">Amreli</option>
                        <option value="Bharuch">Bharuch</option>
                        <option value="Gandhinagar">Gandhinagar</option>
                    </select>
                    <br><br>


                    <label for="bio">Bio:</label></p>

                    <textarea id="bio" name="bio" rows="4" cols="50">

                    </textarea>

                </div>
                <div>

                <div>
                
                    <label for="profile" class="form-lable">Profile:</lable>
                        <input type="file" id="myFile" name="profile" value="">
                        <!-- <input type="submit">-->
                </div>

                        <br><br>


                            <label class="form-lable">Active Social Media:</lable><br>
                            <input type="checkbox" id="social_media" name="[accounts]" >
                            <label for="Instagram" value = "instagram">Instagram</label><br>
                            <input type="checkbox" id="Instagram" name="[accounts]">
                            <label for="twitter" value = "twitter">twitter</label><br>
                            <input type="checkbox" id="twitter" name="[accounts]">
                            <label for="LInkedIn" value = "linkedin">LInkedIn</label><br>
                            <input type="checkbox" id="LInkedIn" name="[accounts]">
                            <label for="facebook" value = "facebook">Facebook</label><br>
                            <input type="checkbox" id="facebook" name="[accounts]">
                            <label for="whatsapp" value= "whatapp" >Whatsapp</label><br><br>
                                                      

                            <div>
                                <button type="submit" class="btn btn-success" name="submit">submit</button>
                                
                            </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>