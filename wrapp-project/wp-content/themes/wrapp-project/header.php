

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Project Webpage</title>

<!-- Bootstrap -->

<!-- slick -->


<!-- Stylesheet -->
<!-- <link rel="stylesheet" href="./css/style.css"> -->

<!-- Fancybox -->


<!-- Animate css -->


  <?php
  wp_head();
  ?>
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#"><?php echo the_custom_logo(); ?> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        
          <?php
        wp_nav_menu(
                    array(
                        'menu_class' => 'navbar-nav nav ml-auto',
                        'container' => 'ul'
                    )
                );

                ?>
          
          
            <ul>
          
          <!-- <div class="rightnav">
            <ul>
                <li>
                    <a href="#">Log In</a>
                </li>
                <li>
                    <a href="#" class="btn">Start For Free</a>
                </li>
            </ul>
        </div> -->
      </div>
    </div>
  </nav>
<!-- Navbar ends -->

