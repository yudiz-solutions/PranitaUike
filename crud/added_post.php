<?php
include "db_conn.php";

if (isset($_POST['submit'])) {

    $sql = "INSERT INTO `post` (`id`, `post_image`, `caption`, `hashtag`) 
    VALUES (NULL, '$post_image', '$caption', '$hashtag')";

    
    if (mysqli_query($conn, $sql)){
        echo " Data Inserted ";
    } else {
        echo "error" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>php crud </title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">

        POST NEW DATA
    </nav>


    <div class="container">
        <div class="text-center mb-4">
            <h3>ADD DATA</h3>
            <p class="text-muted">Click submit after changing any details</p>
        </div>


        <div class="container d-flex justify-content-center">
            <form action=" " method="post" style="width : 50vw; min-width : 300px;">
                <div class="row mb-3">

                    <div>
                        <label class="form-lable">Post Image:</lable>
                            <input type="file" id="myFile" name="post_image" value="<?php echo $row['post_image']?>">
                            <!-- <input type="submit"> -->
                    </div>

                    <div>
                        <label for="bio">Caption:</label></p>
                        <textarea id="caption" name="caption"  rows="4" cols="50" value="<?php echo $row['caption']?>">
                    </textarea>
                    </div>

                    <div>
                        <label for="hashtag">Hashtag:</label></p>

                        <textarea id="hashtag" name="hashtag" rows="4" cols="50" value="<?php echo $row['hashtag']?>">

                    </textarea>
                     

                    <div>
                    <!-- <button type="submit" class="btn btn-success" name="submit">Post</button> -->
                    <a href="show_post.php" class="btn btn-success" name="submit">Post</a> 
                    </div>  
                   
                </div>
                    
                </form>
                    
                    

        </div>
    </div>

</body>

</html>