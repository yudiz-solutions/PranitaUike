<?php
include 'db_conn.php';

?>

<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

  <title>Posts</title>
</head>
<body>
  <!-- Fetch posts from the database -->
  <?php
  $sql = "SELECT * FROM post";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Post ID</th>";
      echo "<th>First Name</th>";
      echo "<th>Last Name</th>";
      echo "<th>Email</th>";
      echo "<th>Message</th>";
      echo "<th>File</th>";
      echo "<th>Meta Data</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $email = $row['email'];
          $msg = $row['msg'];
          $file = $row['file'];

          // Fetch meta data for the post
          $meta_sql = "SELECT meta_key, meta_value FROM meta_post WHERE post_id = $post_id";
          $meta_result = mysqli_query($conn, $meta_sql);

          $meta_data = array();
          if (mysqli_num_rows($meta_result) > 0) {
              while ($meta_row = mysqli_fetch_assoc($meta_result)) {
                  $meta_key = $meta_row['meta_key'];
                  $meta_value = $meta_row['meta_value'];

                  $meta_data[$meta_key] = $meta_value;
              }
          }

          // Display the post details
          echo "<tr>";
          echo "<td>$id</td>";
          echo "<td>$first_name</td>";
          echo "<td>$last_name</td>";
          echo "<td>$email</td>";
          echo "<td>$msg</td>";
          echo "<td><a href='$file'>$file</a></td>";

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

          echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
  } else {
      echo "<p>No posts found.</p>";
  }

  mysqli_close($conn);
  ?>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
-------------------------
<?php
include 'db_conn.php';
include 'header.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data from the form
    $id = $_POST['post_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $file = $_POST['file'];
    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    // Update the post data in the post table
    $update_post_sql = "UPDATE post SET first_name='$first_name', last_name='$last_name', email='$email', msg='$msg', file='$file' WHERE id='$id'";
    if (mysqli_query($conn, $update_post_sql)) {
        echo "<div class='alert alert-success'>Post updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating post: " . mysqli_error($conn) . "</div>";
    }

    // Update the meta data in the meta_post table
    $update_meta_sql = "UPDATE meta_post SET meta_value='$caption' WHERE post_id='$post_id' AND meta_key='caption'";
    mysqli_query($conn, $update_meta_sql);

    $update_meta_sql = "UPDATE meta_post SET meta_value='$hashtag' WHERE post_id='$post_id' AND meta_key='hashtag'";
    mysqli_query($conn, $update_meta_sql);
}

// Retrieve the post details based on the edit_id parameter
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch the post details from the database
    $select_sql = "SELECT * FROM post WHERE id='$edit_id'";
    $result = mysqli_query($conn, $select_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];

        // Fetch the caption from the meta_post table
        $caption = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='caption'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $caption = $meta_row['meta_value'];
        }

        // Fetch the hashtag from the meta_post table
        $hashtag = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='hashtag'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $hashtag = $meta_row['meta_value'];
        }

        // Display the form for updating the post
        ?>
        <div class="container mt-4">
            <h2>Edit Post</h2>
            <form method="POST" action="post_update.php
            ---------------------------------------------------------------------
<post.php>
    

            <?php
include 'db_conn.php';
include "header.php";
?>


<!-- Fetch posts from the database -->
<?php
$sql = "SELECT * FROM post";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Post ID</th>";
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

    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];

        // Fetch meta data for the post
        $meta_sql = "SELECT meta_key, meta_value FROM meta_post WHERE post_id = $post_id";
        $meta_result = mysqli_query($conn, $meta_sql);

        $meta_data = array();
        if (mysqli_num_rows($meta_result) > 0) {
            while ($meta_row = mysqli_fetch_assoc($meta_result)) {
                $meta_key = $meta_row['meta_key'];
                $meta_value = $meta_row['meta_value'];

                $meta_data[$meta_key] = $meta_value;
            }
        }

        // Display the post details
        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$first_name</td>";
        echo "<td>$last_name</td>";
        echo "<td>$email</td>";
        echo "<td>$msg</td>";
        echo "<td>";
        $image_extensions = array('.jpg', '.jpeg', '.png', '.gif');
        $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($file_extension, $image_extensions)) {
            echo "<img src='$file' alt='File'>";
        } else {
            echo "<a href='$file' target='_blank'>View File</a>";
        }
        
        echo "</td>";

        // Display the meta data
        echo "<td>";
        if (!empty($meta_data)) {
            foreach ($meta_data as $meta_key => $meta_value) {
                echo "<p>$meta_key: $meta_value</p>";
                // echo "<p>$meta_value</p>";
            }
        } else {
            echo "No meta data found.";
        }
        echo "</td>";
        echo "<td>";
        echo "<a href='post_update.php?edit_id=$post_id' class='btn btn-primary'>Edit</a>";
        echo " ";
        echo "<a href='post_delete.php?delete_id=$post_id' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>"; // Add onclick event for confirmation
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No posts found.</p>";
}

mysqli_close($conn);
?>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?"); // Display confirmation dialog
    }
</script>
<?php
include "footer.php" ?>

-----------------------------------------------------------------------------------
---------------------------------------------------------------------

post_update

<?php

include 'database.php';
include 'header.php';

$result = array();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data from the form
    $post_id = $_GET['post_id'];

    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';

    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $msg = isset($_POST['msg']) ? $_POST['msg'] : '';

    $profile = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
    $img_tmp = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : '';
    $file = "./uploads" . $file;

    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';

    $hashtag = isset($_POST['hashtag']) ? $_POST['hashtag'] : '';

    $has_error = false;

    if(empty($first_name)){
        $has_error = true;
        $result['first_name'][] = 'Please enter first name';
    }

    if(empty($last_name)){
        $has_error = true;
        $result['last_name'][] = 'Please enter last name';
    }

    if(empty($email)){
        $has_error = true;
        $result['email'][] = 'Please enter email name';
    }

    if(empty($msg)){
        $has_error = true;
        $result['message'][] = 'Please enter message name';
    }

    if(!empty($FILES['file']['tmp_name'])){
        move_uploaded_file($img_tmp,$file);
    }else{
        $file = isset($_POST['hidden_file']) ? $_POST['hidden_file'] : '';
    }

    if(empty($caption)){
        $has_error = true;
        $result['caption'][] = 'Please enter caption name';
    }

    if(empty($hashtag)){
        $has_error = true;
        $result['hashtag'][] = 'Please enter hashtag name';
    }
    if(!$has_error){

    // Update the post data in the post table
    $update_post_sql = "UPDATE post SET first_name='$first_name', last_name='$last_name', email='$email', msg='$msg', file='$file' WHERE id='$post_id'";
    if (mysqli_query($conn, $update_post_sql)) {
        echo "<div class='alert alert-success'>Post updated successfully.</div>";
        header("location:post.php");
    } else {
        echo "<div class='alert alert-danger'>Error updating post: " . mysqli_error($conn) . "</div>";
    }

    // Update the meta data in the meta_post table
    $update_meta_sql = "UPDATE meta_post SET meta_value='$caption' WHERE post_id='$post_id' AND meta_key='caption'";
    mysqli_query($conn, $update_meta_sql);

    $update_meta_sql = "UPDATE meta_post SET meta_value='$hashtag' WHERE post_id='$post_id' AND meta_key='hashtag'";
    mysqli_query($conn, $update_meta_sql);
}

// Retrieve the post details based on the edit_id parameter
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch the post details from the database
    $select_sql = "SELECT * FROM post WHERE id='$edit_id'";
    $result = mysqli_query($conn, $select_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $post_id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];

        // Fetch the caption from the meta_post table
        $caption = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='caption'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $caption = $meta_row['meta_value'];
        }

        // Fetch the hashtag from the meta_post table
        $hashtag = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='hashtag'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $hashtag = $meta_row['meta_value'];
            
        }
    }



        // Display the form for updating the post
        ?>
        <div class="container mt-4">
            <h2>Edit Post</h2>
            <form method="POST" action="post_update.php">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
                    <span class="error text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
                    <span class="error text-danger"></span>

                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    <span class="error text-danger"></span>

                </div>
                <div class="form-group">
                    <label for="msg">Message:</label>
                    <textarea class="form-control" name="msg" id="msg"><?php echo $msg; ?></textarea>
                    <span class="error text-danger"></span>

                </div>

                <div class="form-group">
                    <label for="file">Your File:*</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="file">Drag and drop your file or browse</label>
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <input type="hidden" name="hidden_file" value="<?php echo $file; ?>">
                        <span class="error text-danger"></span>

                    </div>

                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" >
                        <span class="error text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Hashtag</label>
                        <input type="text" class="form-control" id="hashtag" name="hashtag" value="<?php echo $hashtag; ?>">
                        <span class="error text-danger"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Post not found.</div>";
    }
}

include 'footer.php';
    }
}

?>