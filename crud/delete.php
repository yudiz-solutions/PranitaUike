<?php
include "db_conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM `entries_tb` WHERE id = $id";
$result = mysqli_query($conn,$sql);


if ($result) {
    header("Location: index.php?msg=Record delete successfully");

}else{
    echo "Failed:" . mysqli_error($conn);
}
?>