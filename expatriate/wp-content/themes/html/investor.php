<?php 
// Template Name:Investor
get_header(); 

$investor_banner = get_field('investor_banner');

$investor_section = get_field('investor_section');

$assessment = get_field('assessment');
?>
<!--******************* Banner Section Start *********************-->
<?php if(isset($investor_banner)){ ?>
<div class="home-banner">
    <div class="banner" style="background: #5C5C5C url('<?php  echo $investor_banner['image']['url']?>') no-repeat center center / cover;">
        <div class="container">
            <h1><?php  echo $investor_banner['heading']?></h1>
        </div>
    </div>
</div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <?php if(isset($investor_section)){ ?>
    <section class="common-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h3><?php echo $investor_section['content'] ?></h3>  
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if(isset($assessment)){ ?>
    <section class="assessment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?php echo $assessment['heading']  ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="assessment.html" class="theme-btn white-btn"><?php echo $assessment['apply_now_button']['title'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->

<?php get_footer();?>
