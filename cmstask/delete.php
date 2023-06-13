<?php  
// echo "hello";
 include "db_conn.php";
if(isset($_GET['deleteid'])){
  

    $id = $_GET['deleteid'];
   
    // $sql = "DELETE * FROM post_table WHERE id = '$id'";
    // echo $sql;
     $sql ="DELETE FROM post_table WHERE `post_table`.`post_id` = $post_id";
    $result = mysqli_query($conn, $sql);
    if($result){
         
         header("location:viewpost.php");
    }else{
        echo "hello";
    }


}

?>