    <!DOCTYPE html>
    <html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <head>
        <title>Form Validation</title>
    </head>
      <!-- <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">   
      <table>   
     <tr><td>Name:</td><td> <input type="text" name="name"/></td></tr>  
     <tr><td>Password:</td><td> <input type="password" name="password"/></td></tr>   
     <tr><td colspan="2"><input type="submit" >  </td></tr>  
     </table>  
     </form>   -->
     

     <!-- form action="upload.php" method="post" enctype="multipart/form-data">
    select image to upaload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form> -->

    <!-- <style>
    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
    </style> -->
 
<!-- <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav> -->


<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    select image to upaload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form> -->

<!-- cookies
setcookie("test_cookie", "test", time() + 3600, '/'); -->

<!-- session
session_start(); -->

<body>
    <!-- <?php

        //include
            echo " This is form";
            include 'task3.php' ?> -->

            <!-- // echo "Today is " . date("Y/m/d") . "<br>";
            // echo "Today is " . date("Y.m.d") . "<br>";
            // echo "Today is " . date("Y-m-d") . "<br>";
            // echo "Today is " . date("l");
        -->


     <?php
    //  open $ close File 
    // $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    // echo fgets($myfile);
    // fclose($myfile);
    

    //Simple form
    // $name =$_POST["name"];
    // $password =$_POST["password"];
    // echo "Welcome : $name, your password is : $password";
     
      
   //form validation
//         $nameErr = $emailErr = $genderErr = "";
//         $name = $email = $gender = $comment = "";

    
//         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             $name = myfunction_input($_POST["name"]);
//             $email = myfunction_input($_POST["email"]);
//             $address = myfunction_input($_POST["address"]);
//             $mobile = myfunction_input($_POST["mobile"]);
//             $comment = myfunction_input($_POST["comment"]);
//             $gender = myfunction_input($_POST["gender"]);
//         }
//         function myfunction_input($data)
//         {
//             $data = trim($data);
//             $data = stripslashes($data);
//             $data = htmlspecialchars($data);
//             return $data;
//         }

//         if ($_SERVER["REQUEST_METHOD"] == "POST") {

//             if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
//                 $nameErr = "Only letters and white space allowed";
//               }
//             } else {
//               $name = myfunction_input($_POST["name"]);
//             }
            

//             if (empty($_POST["email"])) {
                
//               } else {
//                 $email = myfunction_input($_POST["email"]);
                
//                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                   $emailErr = "Invalid email format";
//                 }
//               }
            

//             if(empty($_POST["address"])){
//                 $address = "Address is requires";
//             }else{
//                 $address = myfunction_input($_POST["address"]);
//             }


//             if( !preg_match("/^[a-zA-Z-' ]*$/",$name)) {
//                 $nameErr = "Only letters and white space allowed";
              
//             }else{
//                 $mobile = myfunction_input($_POST["mobile"]);
//             }

//             if (empty($_POST["comment"])) {
//                 $comment = "";
//               } else {
//                 $comment = myfunction_input($_POST["comment"]);
//               }
        

//         echo "<h4>Your Input:</h4>";
//         echo $name;
//         echo "<br>";
//         echo $email;
//         echo "<br>";
//         echo $address;
//         echo "<br>";
//         echo $comment;
//         echo "<br>";
//         echo $gender;
//         echo "<br>";
//         echo $mobile;
       
        
//     
//     <div class="container">
// <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">

<!-- //     Name: <input type="text" name="name">
//     <span class="error">* <?php echo $nameErr;?></span>
//     <br><br>

//     Email: <input type="text" name="email">
//     <span class="error">* <?php echo $emailErr;?></span>
//     <br><br>

//     Address:<input type="text" name="address">

//     <br><br>
//     Mobile:<input type="number" name="mobile">
//     <br><br>
//     Gender:
//   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
//   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
//   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
//   <span class="error">* <?php echo $genderErr;?></span>
//   <br><br>
//     <br><br>
//     <textarea name="comment" cols="40" row="5"></textarea>
//     <br><br>

//     <input type="submit" name="submit" value="submit">
// </form>
// </div> -->
?>

<!-- Upload Form 
<?
//  $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }


// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }


// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }


// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }


// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";

// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// } -->
?>
  

//cookies
<?

// if(count($_COOKIE) > 0) {
//     echo "Cookies are enabled.";
//   } else {
//     echo "Cookies are disabled.";
//   }
?>
 

//session
<?

// $_SESSION["favcolor"] = "hii";
// $_SESSION["favanimal"] = "hello";
// echo "Session variables are set.";

?>
</body>

</html>