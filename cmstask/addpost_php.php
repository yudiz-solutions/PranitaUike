<?php
include "db_conn.php";

$error = [];
if (isset($_POST['submit'])) {

    // echo "HEYYYY";
    // die;
    $first_name = $_POST['first_name'];
    // echo $first_name;

    if (empty($first_name)) {
        $error['first_name'] = "Required";
    }

    $last_name = $_POST['last_name'];
    if (empty($last_name)) {
        $error['last_name'] = "Required";
    }

    $email = $_POST['email'];
    if (empty($email)) {
        $error['email'] = "Required";
    }

    $msg = $_POST['msg'];
    if (empty($msg)) {
        $error['msg'] = "Required";
    }

    $file = $_FILES["file"]["name"];

    $tempFile = $_FILES["file"]["tmp_name"];
    $folder = "uploads/" . $file;

    move_uploaded_file($tempFile, $folder);

    $caption = $_POST['caption'];
    if (empty($caption)) {
        $error['caption'] = "Required";
    }

    $hashtag = $_POST['hashtag'];
    if (empty($hashtag)) {
        $error['hashtag'] = "Required";
    }

    if (empty($error)) {
        $sql_post = "INSERT INTO `post_table` (`first_name`, `last_name`, `email`, `msg`, `file`) VALUES ('$first_name', '$last_name', '$email', '$msg', '$folder')";
        $result = mysqli_query($conn, $sql_post);
        if ($result = 1) {
            $last_id = mysqli_insert_id($conn);
            if ($last_id) {
                echo "Inserted into post_table successfully";
                // header("location: post.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            
            $not_allowed_fields = array(
                'first_name',
                'last_name',
                'email',
                'msg',
                'file',
                'submit'
            );
            
            // foreach ($_POST as $key => $value) {
            //     if (in_array($key, $not_allowed_fields)) {
            //         continue;
            //     }
                
                $sqlMeta_caption = "INSERT INTO `meta_post` (`post_id`, `meta_key`, `meta_value`) VALUES ('$last_id', 'caption', '$caption')";
                $resultMeta_caption = mysqli_query($conn, $sqlMeta_caption);

                $sqlMeta_hashtag = "INSERT INTO `meta_post` (`post_id`, `meta_key`, `meta_value`) VALUES ('$last_id', 'hashtag', '$hashtag')";
                $resultMeta_hashtag = mysqli_query($conn, $sqlMeta_hashtag);
                if ($resultMeta_caption && $resultMeta_hashtag) {
                echo "Inserted into meta_table successfully";
                 header("location: viewpost.php");
                }
            }
        }
        else {
            $conn->error;
        }
    }
else{
    echo "Outside";
}
?>
