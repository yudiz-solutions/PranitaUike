<?php
include "db_conn.php";

$id = $_GET['editid'];

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $file = $_FILES['file']['name'];
    $temp_file = $_FILES['file']['tmp_name'];
    $profile = "./uploads/".$file;

    if (!empty($temp_file)) {
        move_uploaded_file($temp_file, $profile);
    } else {
        $file = isset($_POST['hidden_file']) ? $_POST['hidden_file'] : '';
    }

    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    // Update the post_table
    $sql = "UPDATE `post_table` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email',  `msg` = '$msg',`file` = '$file' WHERE `post_table`.`post_id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update the caption in meta_post table
        $sqlMeta = "UPDATE `meta_post` SET `meta_value` = '$caption' WHERE `meta_post`.`id` = $id AND `meta_key`='caption'";
        $resultMeta = mysqli_query($conn, $sqlMeta);
        if ($resultMeta) {
            // Update the hashtag in meta_post table
            $sqlMeta2 = "UPDATE `meta_post` SET `meta_value` = '$hashtag' WHERE `meta_post`.`id` = $id AND `meta_key`='hashtag'";
            $resultMeta2 = mysqli_query($conn, $sqlMeta2);
            if ($resultMeta2) {
                header("location: viewpost.php");
                exit();
            }
        }
    }
}


// Retrieve data from the database
$sql = "SELECT * FROM `post_table` WHERE `post_id` = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$msg = $row['msg'];
$file = $row['file'];

$sqlMeta = "SELECT * FROM `meta_post` WHERE `id` = $id";
$resultMeta = mysqli_query($conn, $sqlMeta);

$caption = '';
$hashtag = '';

while ($rowMeta = mysqli_fetch_assoc($resultMeta)) {
    if ($rowMeta['meta_key'] === 'caption') {
        $caption = $rowMeta['meta_value'];
    } elseif ($rowMeta['meta_key'] === 'hashtag') {
        $hashtag = $rowMeta['meta_value'];
    }

}

?>


<?php include "header.php" ?>

<div class="container my-5">
    <h2 style="text-align:center;">Post Register Form</h2>
    <form method="post" style="border: solid; margin: 5px; padding-top: 10px;" enctype="multipart/form-data">

        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">First Name</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['first_name'] ?? ''; ?>
                </span>
                <input type="text" id="first_name" class="form-control first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Last Name</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['last_name'] ?? ''; ?>
                </span>
                <input type="text" id="last_name" class="form-control last_name" name="last_name" value="<?php echo $last_name; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Email</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['email'] ?? ''; ?>
                </span>
                <input type="text" id="email" class="form-control email" name="email" value="<?php echo $email; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Message</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['msg'] ?? ''; ?>
                </span>
                <input type="text" id="msg" class="form-control massage" name="msg" value="<?php echo $msg; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Profile</label>
            <div class="col-md-3">
                <input type="file" class="form-control" id="profile" name="file" value="">
                <input type="hidden" name="hidden_file" value="<?php echo $file ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Caption</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['caption'] ?? ''; ?>
                </span>
                <input type="text" id="caption" class="form-control" name="caption" value="<?php echo $caption ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right">Hashtag</label>
            <div class="col-md-3">
                <span class="error">*
                    <?php echo $error['hashtag'] ?? ''; ?>
                </span>
                <input type="text" id="hashtag" class="form-control" name="hashtag" value="<?php echo $hashtag ?>">
            </div>
        </div><br>
        <div class="text-center" style="padding-bottom: 10px;">
            <button type="submit" id="submit" class="btn btn-outline-success" name="submit" value="submit">Update</button>
        </div>
    </form>
</div>

<?php include "footer.php"
 ?>
