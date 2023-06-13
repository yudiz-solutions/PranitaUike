<?php
include 'db_conn.php';
include "header.php";
session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location:index.php");
//     exit;
// }
?>


<!-- Fetch posts from the database -->
<div id="post-container">

    <?php
    $limit = 3; 
    $sql = "SELECT * FROM post_table LIMIT $limit";
    $result = mysqli_query($conn, $sql);
   
    if($result->num_rows > 0){
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr >";
        echo "<th>Sr.No.</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Message</th>";
        echo "<th>File</th>";
        echo "<th>Meta Data</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        

        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $msg = $row['msg'];
            $file = $row['file'];

            $number++;

            // Fetch meta data for the post
            $meta_sql = "SELECT meta_key, meta_value FROM meta_post WHERE post_id = $post_id";
            $meta_result = mysqli_query($conn, $meta_sql);
            $meta_data = array();
            
            // echo '<pre>sds';
            //     print_r($meta_sql);
            //     echo '</pre>sds';

            if( !empty($meta_result) &&  $meta_result->num_rows > 0){
                while ($meta_row = mysqli_fetch_assoc($meta_result)) {

                    
                    $meta_key = $meta_row['meta_key'];
                    $meta_value = $meta_row['meta_value'];
                                         
                    $meta_data[$meta_key] = $meta_value;
                }
            }


            
            // Display the post details
            echo "<tr>";
            echo "<td>$number</td>";
            echo "<td>$first_name</td>";
            echo "<td>$last_name</td>";
            echo "<td>$email</td>";
            echo "<td>$msg</td>";
            echo "<td><img src='$file' alt='File' width='80' height='100'></td>";

            // Display the meta data
            echo "<td>";
            if (!empty($meta_data)) {
                foreach ($meta_data as $meta_key => $meta_value) {
                    echo "<p>$meta_key: $meta_value</p>";
                }
            } else {
                echo "No meta data found.";
            }
            echo "</td>";
            echo "<td>";
            echo "<a href='post_update.php?edit_id=$post_id' class='btn btn-primary'>Edit</a>";
            echo " ";
            echo "<a href='post_delete.php?delete_id=$post_id' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        $sql_count = "SELECT COUNT(*) AS total_posts FROM post_table";
        $count_result = mysqli_query($conn, $sql_count);
        $total_posts = 0;
        
        if ($count_result && mysqli_num_rows($count_result) > 0) {
            $row_count = mysqli_fetch_assoc($count_result);
            $total_posts = $row_count['total_posts'];
        }
        
        $all_posts_displayed = mysqli_num_rows($result) >= $total_posts;
       
        if ($all_posts_displayed) {
            echo "<script>$('#load-more-btn').hide();</script>";
        }

     }
    //  else {
    //     echo "<p>No posts found.</p>";
    //}

    mysqli_close($conn);
    ?>
</div>
<button id="load-more-btn" class="btn btn-primary learn-more-btn">Load More</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?"); // Display confirmation dialog
    }
</script>

<?php

include 'header.php';


if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    // File upload handling
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_error = $file['error'];

    if ($file_error === 0) {
        $file_destination = 'uploads/' . $file_name;
        move_uploaded_file($file_tmp_name, $file_destination);
    } else {
        // Handle file upload error
    }

    // Perform database insertion
    $query = "INSERT INTO post_table (first_name, last_name, email, message,file, caption, hashtag)
              VALUES ('$first_name', '$last_name', '$email', '$message', '$file_destination', '$caption', '$hashtag')";
    
    if (mysqli_query($conn, $query)) {
        // echo  'Data inserted successfully';
        echo json_encode(['status' => 1]);
        exit;
    } else {
        // Database insertion error
        echo json_encode(['status' => 0, 'error' => 'Failed to insert data into the database.']);
        exit;
    }
}

// ...
?>

<!-- Your HTML form code here -->

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $("#post-form").on("submit", function(event) {
      event.preventDefault();
      
      
    });
    
   
  });
</script> -->

<?php include 'footer.php'; ?>
