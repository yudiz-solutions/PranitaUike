<?php
session_start();

// if (isset($_SESSION['username'])) {
//     header("Location:index.php");
// }
?>

<?php
include 'db_conn.php';
include 'header.php';
include 'addpost_php.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4>POST FORM</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- action="validation.php" -->
        <form id="post-form" method="POST" enctype="multipart/form-data">
            <div class="mb-3"></div>

            <div class="form-group">
                <label for="first_name">First Name:*</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
                <span class="error text-danger"></span>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:*</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
                <span class="error text-danger"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:*</label>
                <input type="email" class="form-control" id="email" name="email">
                <span class="error text-danger"></span>
            </div>

            <div class="form-group">
                <label for="msg">Message:*</label>
                <input type="msg" class="form-control" id="msg" name="msg">
                <span class="error text-danger"></span>
            </div>

            <div class="form-group">
                <label for="file">Your File:*</label>
                <div class="mb-3">
                    <label for="file">Profile Image:</label>
                    <input type="file" class="form-control-file" id="file" name="file" style="display: none;">
                    <input type="hidden" id="image" name="image">
                    <button type="button" class="btn btn-secondary" id="upload-button">Upload Image</button>
                </div>
            </div>

            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" class="form-control" id="caption" name="caption">
                <span class="error text-danger"></span>
            </div>

            <div class="form-group">
                <label for="lastname">Hashtag</label>
                <input type="text" class="form-control" id="hashtag" name="hashtag">
                <span class="error text-danger"></span>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    document.getElementById("upload-button").addEventListener("click", function() {
        document.getElementById("file").click();
    });

    document.getElementById("file").addEventListener("change", function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById("image").value = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>

<?php include 'footer.php'; ?>