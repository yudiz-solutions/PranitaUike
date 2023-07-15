<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>EASI</title>
    <!--Favicon Included-->
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri() ?>/images/fevicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/fevicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/fevicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/fevicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/fevicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">


    <script type="text/javascript">

        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style');
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            );
            document.querySelector('head').appendChild(msViewportStyle);
        }
        
    </script>
    <style>
        .featured-articles {
    margin: 24px 0 12px;
    background: url("<?php echo get_the_post_thumbnail_url(); ?>") no-repeat center center / cover;
    height: 320px;
    border-radius: 2px;
}
        </style>
    <?php wp_head() ?>
</head>

<body>
    <!--******************* Header Section Start *********************-->
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    // $logo = get_field('image', 'Options');
                    //   echo "<pre>";
                    //   print_r($logo);
                    //   die();
                    ?>
                    <a class="navbar-brand default-logo" href="index.html">
                        <?php echo the_custom_logo() ?>
                    </a>
                    <a class="navbar-brand sticky-logo" href="index.html">
                        <?php dynamic_sidebar('cantact') ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">

                    <?php
                    wp_nav_menu(
                        array(
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'container' => 'ul',
                            'theme_location' => 'primary-menu'
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <!--******************* Banner Section Start *********************-->