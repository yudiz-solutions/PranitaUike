<!DOCTYPE html>
<html>
    <title>Document</title>
    
    <body>
        <?php
          
          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $database = "social";

           $conn = new mysqli($servername,$username,$password,$database);
        //   echo "connected";
        //  var_dump($conn);
        // if($conn){
        //   echo "hello";
        // }
      
          if($conn->connect_error){
           die("connection failed :" . $conn->connect_error);
          }
          
        ?>
        
    </body>
</html>