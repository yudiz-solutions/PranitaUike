<?php
include "db_conn.php";

$sql = "SELECT * FROM `post_table` INNER JOIN `meta_post` ON post_table.post_id = meta_post.post_id";
$result = mysqli_query($conn, $sql);

// Query error
// echo "<pre>";
// print_r($result->num_rows);
// echo "</pre>";

// die;

$data = array(); // Array to store fetched data

while ($row = mysqli_fetch_array($result)) {
    $post_id = $row['post_id'];
    if (!isset($data[$post_id])) {
        $data[$post_id] = array(
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'msg' => $row['msg'],
            'file' => $row['file'],
            'caption' => '',
            'hashtag' => ''
        );
    }

    // Check if the current row has the "caption" or "password" key
    if ($row['meta_key'] === 'caption') {
        $data[$post_id]['caption'] = $row['meta_value'];
    } elseif ($row['meta_key'] === 'hashtag') {
        $data[$post_id]['hashtag'] = $row['meta_value'];
    }
}    

?>                               

<?php include "header.php"?>

<div class="container my-5">
    <div style="padding-bottom: 10px;">
        <a href="add_post.php"><button class="btn btn-primary">Add Post</button></a>
    </div>

    <table class="table" id="TableForm">
        <thead>
            <tr class="alert alert-info">
                <th scope="col">Sl no</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Profile</th>
                <th scope="col">Massage</th>
                <th scope="col">Caption</th>
                <th scope="col">Hashtag</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 0;
            foreach ($data as $post_id => $row) {
                $num++;
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $msg = $row['msg'];
                $file = $row['file'];
                $caption = $row['caption'];
                $hashtag = $row['hashtag'];

                ?>
                <tr>
                    <th scope="row"><?php echo $num; ?>Heyy</th>
                    <td scope="row"><?php echo $first_name; ?></td>
                    <td scope="row"><?php echo $last_name; ?></td>
                    <td scope="row"><?php echo $email; ?></td>
                    <th scope="row"><img src="<?php echo $file; ?>" width="200" height="120"></th>
                    <td scope="row"><?php echo $msg; ?></td>
                    <td scope="row"><?php echo $caption; ?></td>
                    <td scope="row"><?php echo $hashtag; ?></td>
                    <td>
                        <a href="post_update.php?editid=<?php echo $post_id; ?>"><button class="btn btn-success">Edit</button></a>
                        <a href="post_delete.php?deleteid=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>
    
<?php include "footer.php" ?>
