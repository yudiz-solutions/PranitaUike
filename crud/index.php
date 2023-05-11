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
        
        SQL CRUD
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

        <a href="add_new.php" class="btn btn-dark">Add new</a>


                    <table class="table table-hover text-center ">
                    
                    <thead class= "table-dark mb-3">
                <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">gender</th>
                <th scope="col">country</th>
                <th scope="col">state</th>
                <th scope="col">city</th>
                <th scope="col">bio</th>
                <th scope="col">profile</th>
                <th scope="col">Accounts</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                       
                       
                include "db_conn.php";

                  $sql = "SELECT * FROM entries_tb";
                  $result = mysqli_query($conn,$sql);

                  while($row = mysqli_fetch_assoc($result)) {
                       
                  ?>
                        <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['bio']; ?></td>
                        <td><?php 
                        echo $row['profile'] 
                        ?></td>
                        <td>
                        <img src="flower.jpg" alt="" width="30" height="30">
                        </td>
                        <td><?php echo $row['accounts'] ?></td>

                        
                        <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><button>Edit</button></a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark d-inline" ><button>Delete</button></a>
                        <a href="show_post.php?id=<?php echo $row['id'] ?>" class="link-dark"><button > View Post</button></a>
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
    










