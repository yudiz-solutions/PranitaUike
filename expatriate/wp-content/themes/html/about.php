<?php 
// Template Name:about us
get_header() ;
// About Us Banner
$about_us_banner = get_field('about_us_banner');

// About Us
$about_us = get_field('about_us');

// Assessment Section
$assessment_section = get_field('assessment_section');

// echo"<pre>";
// print_r($assessment_section);
// die();
?>
<!--******************* Banner Section Start *********************-->
<?php if(isset($about_us_banner)){ ?>
<div class="home-banner">
    <div class="banner" style="background: #5C5C5C url('<?php echo $about_us_banner['image']['url']?>') no-repeat center center / cover;">
        <div class="container">
            <h1><?php echo $about_us_banner['about_heading'] ?></h1>
        </div>
    </div>
</div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <section class="common-section about-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="bg-img-block">
                        <div class="heading-block">
                            <h2><?php echo $about_us['about_us_heading']?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="desc-block">
                        <h3><?php echo  $about_us['about_us_content_heading'] ?></h3>
                        <p><?php echo $about_us['about_us_content'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($assessment_section)){?>
    <section class="assessment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?php echo $assessment_section['assessment_heading']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="assessment.html" class="theme-btn white-btn"><?php echo $assessment_section['apply_button']['title'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php get_footer(); ?>