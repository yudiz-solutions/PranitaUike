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



<!DOCTYPE html>
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
    <nav class = "navbar navbar-light justify-content-center fs-3 mb-5" 
    style="background-color:#00ff5573;">
        
         POST 
    </nav>
    <div class="container">
        <?php
          if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
        ?>

        <a href="added_post.php" class="btn btn-dark">Post Data</a>


                    <table class="table table-hover text-center ">
                    
                    <thead class= "table-dark mb-3">
                <tr>
              
                <th scope="col">Post Image</th>
                <th scope="col">Caption</th>
                <th scope="col">Hashtag</th>
                <th scope="col">Action</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                  
                  include "db_conn.php";

                  $sql = "SELECT * FROM post";
                  $result = mysqli_query($conn,$sql);

                  while($row = mysqli_fetch_assoc($result)) {
                       
                  ?>
                        <tr>
                      
                        <td><?php echo $row['post_image'] ?></td>
                        <td><?php echo $row['caption'] ?></td>
                        <td><?php echo $row['hashtag'] ?></td>
                        
                        <td>
                            <a href="added_post.php?id=<?php echo $row['id'] ?>" class="link-dark"><button>EDIT</button></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><button>DELETE</button></a>
                            
                        </td>
                        </tr>
                
                    <?php
                  }
                  ?>
                
                
            </tbody>
            </table>
    </div>
    
</body>
</html>

<!-- ->num_rows > 0 -->
