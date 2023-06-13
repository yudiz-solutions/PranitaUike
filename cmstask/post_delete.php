<?php
include 'db_conn.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete_id'])) {
    $post_id = $_GET['delete_id'];

    // Delete the post
    $delete_post_sql = "DELETE FROM post_table WHERE post_id = $post_id";
    $delete_post_result = mysqli_query($conn, $delete_post_sql);

    // Delete the associated meta data
    $delete_meta_sql = "DELETE FROM meta_post WHERE id = $post_id";
    $delete_meta_result = mysqli_query($conn, $delete_meta_sql);

    if ($delete_post_result && $delete_meta_result) {
        echo "Post deleted successfully.";
        header("Location: post.php");
        exit;
    } else {
        echo "Failed to delete post.";
    }
}

mysqli_close($conn);
?>
