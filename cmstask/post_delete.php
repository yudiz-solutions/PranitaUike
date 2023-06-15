<?php
include 'db_conn.php';
session_start();

if (isset($_GET['delete_id'])) {
    $post_id = $_GET['delete_id'];

    // Delete the post
    $delete_post_sql = "DELETE FROM post_table WHERE post_id = $post_id";
    $delete_post_result = mysqli_query($conn, $delete_post_sql);

    // Delete the associated meta data
    $delete_meta_sql = "DELETE FROM meta_post WHERE id = $id"; // Changed $id to $post_id
    $delete_meta_result = mysqli_query($conn, $delete_meta_sql);

    if ($delete_post_result && $delete_meta_result) {
        echo "Post deleted successfully.";
        header("Location: viewpost.php");
        exit;
    } else {
        echo "Failed to delete post.";
    }
}

mysqli_close($conn);
?>

<!-- Rest of your HTML code -->

<?php include "header.php" ?>

<div class="container my-5">
    <!-- Your form and other HTML code -->
</div>

<?php include "footer.php" ?>
