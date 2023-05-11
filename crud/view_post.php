<?php
include "db_conn.php";

if (isset($_POST['submit'])) {

    $sql = "SELECT first_name,MAX(orders.total) 
    FROM customers 
    INNER JOIN orders ON customers.customer_id = orders.order_id";
    
    if (mysqli_query($conn, $sql)){
        echo " Data Inserted ";
    } else {
        echo "error" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
        
        Recently Posted Data
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
                   
                  <a href="added_post.php" class="link-dark"><button name="submit">Post</button></a>
                        
                </td>
             
              </div>
        </body>
</html>
