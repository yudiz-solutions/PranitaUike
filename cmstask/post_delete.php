<?php
include 'db_conn.php';
session_start();

if (isset($_GET['delete_id'])) {
    $post_id = $_GET['delete_id'];

    // Delete the post
    $delete_post_sql = "DELETE FROM post_table WHERE post_id = $post_id";
    $delete_post_result = mysqli_query($conn, $delete_post_sql);

    if ($delete_post_result) {
        echo "Post deleted successfully.";
    } else {
        $error_message = mysqli_error($conn);
        echo "Failed to delete post. Error: " . $error_message;
    }

    // Redirect to viewpost.php
    header("location:viewpost.php");
    exit; // It's a good practice to include exit after header redirection
}

mysqli_close($conn);
?>
