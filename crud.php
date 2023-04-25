<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>CRUD</title>
    </head>
    
        
    <body>
        <div class = "container"> 
         <form action="crud.php" method="Post" >
         
         <label for="name">Name:</label><br>
         <input type="text" id="name" name="name" value=""><br><br>
         <label for="name">Standard:</label><br>
         <input type="text" id="standarad" name="standarad" value=""><br><br>
         <label for="name">Class:</label><br>
         <input type="text" id="class" name="class" value=""><br><br>
         <label for="name">Marks:</label><br>
         <input type="text" id="marks" name="marks" value=""><br><br>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         <button type="button" class="btn btn-danger">Danger</button>
</form> 
</div>

            <?php include 'databaseconn.php';
             
             if(isset($_POST['submit'])){

             $name = $_POST['name'];
             
             $standarad = $_POST['standarad'];
              
             $class = $_POST['class'];
             
             $marks = $_POST['marks'];

             //insert record
            //$sql = "INSERT INTO `new_data`( `name`, `standarad`, `class`, `marks`) VALUES ('$name','$standarad','$class','$marks')";

            $sql = "INSERT INTO new_data (name, standarad, class, marks) VALUES ('$name', '$standarad', '$class','$marks' )";

            $result = mysqli_query($connection,$sql);
            if($result){
                echo "Inserted sucessfully";
            }else{
                die(mysqli_error($connection));
                echo "Error";
            }
        }
        ?>
    </body>
    </html>