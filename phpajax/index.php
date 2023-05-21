<?php 
require 'db_conn.php';
require 'function1.php';
if(isset($_SESSION['id'])){
    $id = $_SESSION["id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE id = $id"));
}else{


	header("Location: logout.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>WELCOME </h2>
    <br>
    <a href=  "logout.php">Logout</a>
</body>
</html>