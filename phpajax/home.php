<?php
session_start();
// error_reporting(0);

if (!isset($_SESSION['uname'])) {
  header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="stylesheet" href="main.css" />
</head>

<body>
  <?php
  include "connection.php";

  $name=$_SESSION['uname'];
  // $id = isset($_GET['userid']) ? $_GET['userid'] : null;
  $sql = "SELECT * FROM `registerform` WHERE `uname`='$name'";

  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $id= isset($row['id'])?$row['id']:'';
  $fname = isset($row['fname'])?$row['fname']:'';
  $lname = isset($row['lname'])?$row['lname']:'';

  ?>
  <div class="main">
    <div class="navbar-side">
      <h6>
        <span class="icon"><i class="fas fa-code"></i></span>
        <span class="link-text">Admin Panel</span>
      </h6>
      <ul>
        <li><a href="dashboard.php?userid='<?php echo $id;?>'" class="link-active" title="Dashboard">
            <span class="icon"><i class="fas fa-chart-bar"></i></span>
            <span class="link-text">Dashboard</span>
          </a></li>
        <li>
          <a href="#" class="myBtn" data-toggle="collapse" data-target="#my-sub" title="Post" aria-expanded="false">
            <span class="icon"><i class="fas fa-list"></i></span>
            <span class="link-text">Post</span>
            <span class="ml-auto myCaret"></span>
          </a>
          <div id="my-sub" class="collapse bg-secondary">
            <a href="postView.php?userid=<?php echo $id;?>" title="View Post">
              <span class="icon"><i class="fas fa-copy"></i></span>
              <span class="link-text">View Post</span>
            </a>
            <a href="postAdd.php?userid='<?php echo $id;?>'" title="Add Post">
              <span class="icon"><i class="fas fa-pen-fancy"></i></span>
              <span class="link-text">Add Post</span>
            </a>
          </div>
        </li>
        <li><a href="UserViewForm.php?userid='<?php echo $id;?>'" title="Profile">
            <span class="icon"><i class="fas fa-user-circle"></i></span>
            <span class="link-text">User View</span>
          </a></li>

        <li><a href="logout.php" title="Sign Out">
            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="link-text">Sign Out</span>
          </a></li>
      </ul>
    </div>
    <div class="content">
      <nav class="navbar navbar-dark bg-dark py-1">

        <a href="#" id="navBtn">
          <span id="changeIcon" class="fa fa-bars text-light"></span>
        </a>

        <div class="d-flex">
          <a class="nav-link text-light px-2" href="#"><i class="fas fa-search"></i></a>
          <a class="nav-link text-light px-2" href="#"><i class="fas fa-bell"></i></a>
          <a class="nav-link text-light px-2" href="#"><i class="fas fa-sign-out-alt"></i></a>
        </div>

      </nav>


      <div class="container-fluid">
        <div class="row">
        </div>

        <h3>HELLO</h3>
        <h4>
          <?php echo $fname . " " . $lname ?>
        </h4>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>

</html>

