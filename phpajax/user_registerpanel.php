<?php 
include 'db_conn.php';

?>

<html>
<head>
	<title>User List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
			event.preventDefault(); 
	        loadUserList();

	
	        $("#searchBtn").click(function(){
		        event.preventDefault(); 
		        loadUserList();
	        });

	        function loadUserList(){
		
		        var first_name = $("#first_name").val();
		        var email = $("#email").val();
                var profile_image = $("#profile_image").val();

		        $.ajax({
			        url: "register.php",
			        method: "POST",
			        data: {first_name: first_name, email: email, profile_image: profile_image},
			        success: function(response){
				
				        $("#userList").html(response);
			        }
		        });
	        }
        });

    </script>
</head>
<body>
    <div class="container">
	    <div class="row">
		    <div class="col-md-6 offset-md-3 mt-4">
			    <h4>User List</h4>
			    
			    <button class="btn btn-primary" id="searchBtn">Search</button>
		    </div>
	    </div>
	    <div class="row mt-4">
		    <div class="col-md-6 offset-md-3">
			    <table class="table">
				    <thead>
					    <tr>
						    <th>Name</th>
						    <th>Email</th>
						    <th>Profile Image</th>
						    <th>Action</th>
					    </tr>
				    </thead>
				    <tbody id="userList">
                        <?php
                        include "db_conn.php";

                        $query = "SELECT * FROM user";
                        $query_run = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($query_run)) {
                        ?>
                            <tr>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['profile_image'];?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><button>Edit</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
				    </tbody>
			    </table>
		    </div>
	    </div>
    </div>
</body>
</html>
