<?php
include "db_conn.php";

$id = $_GET['editid'];
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    $file = $_FILES['file']['name'];
    $temp_file = $_FILES['file']['tmp_name'];
    $profile = "./image/" . $file;

    if (!empty($temp_file)) {
        move_uploaded_file($temp_file, $profile);
    } else {
        $file = isset($_POST['hidden_file']) ? $_POST['hidden_file'] : '';
    }

    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    $sql = "UPDATE `post_table` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email',  `msg` = '$msg',`file` = '$file' WHERE `post_table`.`post_id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        $sqlMeta = "UPDATE `meta_post` SET `value` = '$caption' WHERE `meta_post`.`id` = $id AND `key`='caption'";
        $resultMeta = mysqli_query($conn, $sqlMeta);
        if ($resultMeta) {
            $sqlMeta2 = "UPDATE `meta_post` SET `value` = '$hashtag' WHERE `meta_post`.`id` = '$id' AND `key`='hashtag'";
            $resultMeta2 = mysqli_query($conn, $sqlMeta2);
            if ($resultMeta2){
                header("location: viewpost.php");
            }
        }

    }
}

$sql2 = "SELECT * FROM `post_table` INNER JOIN `meta_post` ON post_table.post_id = meta_post.id WHERE post_table.post_id = $id";

$result2 = mysqli_query($conn, $sql2);

$data = array();

while ($row = mysqli_fetch_array($result2)) {
    if (!isset($data[$id])) {
        $data[$id] = array(
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'msg' => $row['msg'],
            'file' => $row['file'],
            'caption' => '',
            'hashtag' => ''
        );
    }

    if ($row['key'] === 'caption') {
        $data[$id]['caption'] = $row['value'];
    } elseif ($row['key'] === 'hashtag') {
        $data[$id]['hashtag'] = $row['value'];
    }
}

$first_name = ''; // Initialize the variable outside the loop
$last_name = '';
$email = '';
$msg = '';
$file = '';
$caption = '';
$hashtag = '';

foreach ($data as $id => $row) {
    $first_name = isset($row['first_name']) ? $row['first_name'] : '';
    $last_name = $row['last_name'];
    $email = $row['email'];
    $msg = $row['msg'];
    $file = $row['file'];
    $caption = isset($row['caption']) ? $row['caption'] : '';
    $hashtag = isset($row['hashtag']) ? $row['hashtag'] : '';
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

<?php include "footer.php" ?>

