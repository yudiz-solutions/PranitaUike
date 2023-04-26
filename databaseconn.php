<!DOCTYPE html>
<html>
    <title>Document</title>
    
    <body>
        <?php
          
          $servername = "localhost:3306
          ";
          $username = "root";
          $password = "";
          $database = "mydb";
          
          $connection = new mysqli($servername,$username,$password,$database);
          echo "connected";
          var_dump($connection);
          if($connection->connect_error){
           die("connection failed :" . $connection->connect_error);
          }
          
        ?>
        
    </body>
</html>