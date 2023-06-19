<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
    .tab {
      display: none;
    }
  </style>
  <script>
   
    function openTab(tabName) {
      var i, tabContent;
      tabContent = document.getElementsByClassName("tab");
      for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
    }
  </script>
  <style>
    .navbar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 120px;
      background-color: #333;
      overflow: hidden;
      padding: 0px;
      display: block;
    }

    .navbar a {
      display: block;
      color: #fff;
      text-align: center;
      padding: 10px 5px;
      text-decoration: none;
      font-size: 17px;
      text-align: left;
    }

    .navbar a:hover {
      background-color:palevioletred;
      color: black;
    }

    .content {
      margin-left: 150px;
    }

    
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <div class="navbar">
    <a href="home.php">Dashboard</a>
    <!-- <a href="post.php">Post</a> -->
    <li>
          <a href="post.php" class="myBtn" data-toggle="collapse" data-target="#my-sub" title="Post" aria-expanded="false">
            <span class="icon"><i class="fas fa-list"></i></span>
            <span class="link-text">Post</span>
            <span class="ml-auto myCaret"></span>
          </a>
          <div id="my-sub" class="collapse bg-secondary">
            <a href="add_post.php" title="View Post">
              <span class="icon"><i class="fas fa-copy"></i></span>
              <span class="link-text">Add Post</span>
            </a>
            <a href="post.php" title="View Post">
              <span class="icon"><i class="fas fa-copy"></i></span>
              <span class="link-text">View Post</span>
            </a>
          
          </div>
    </li>
    <a href="user_registerpanel.php">User Data</a>
    <a href="logout.php">Logout</a>
    

  </div>


  <div class="content">
 
  <div>