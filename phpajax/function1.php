<?php
require 'db_conn.php';
session_start();
 
if(isset($_post["action"])){
    if($_POST["action"] == "register"){
        register();
    }
    else if($_POST["action"]== "login"){
        login();
    }
}

function register(){
    global $conn;
    $first_name = $_POST["first_name"];
    $last_name =$_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $dob = $_POST["dob"];
    $hobby = $_POST["hobby"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $message = $_POST["message"];
    $profile_image = $_POST["profile_image"];

    if(empty($first_name) || empty($last_name) || empty($username) || empty($email)
    || empty($password) || empty($confirm_password) || empty($dob) || empty($hobby)
    || empty($gender) || empty($country) || empty($message) || empty($profile_image)){
        echo "please fill the form!";
        exit;
    }
    
    
    $user = mysqli_query($conn,"SELECT * FROM user_details WHERE email = '$email'");
    if(mysqli_num_rows($user)>0){
        echo "email has already taken";
        exit;
    }
}


function login(){
    global $conn;

    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    $user = mysqli_query($conn,"SELECT * FROM user_details WHERE email = '$email'");
    if(mysqli_num_rows($user)>0){
        $row = mysqli_fetch_assoc($user);
        if($password == $row["password"]){
            echo "Login successful";
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

        }else{
            echo "wrong password";
            exit;
        }
        
    }else{
        echo "User not Registered";
        exit;
    }
     

}
?>
 