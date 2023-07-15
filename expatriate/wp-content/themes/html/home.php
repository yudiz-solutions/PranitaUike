<?php
//  Template Name:Home
get_header();

// banner Section 
$home_banner = get_field('home_banner');
$home_slider = $home_banner['home_slider'];

// about Section
$about_us = get_field('about_us');

// apply Section
$apply_now = get_field('apply_now');


// Services 
$services = get_field('services');
$pre_arrival_repeater = $services['pre-arrival_repeater'];
$post_arrival_repeater = $services['post-arrival_repeater'];

// news Section
$news = get_field('news');
$news_repeater = $news['news_repeater'];

// echo"<pre>";
// print_r($news_repeater);
// echo"</pre>";

// team Section
$team = get_field('team');
$team_member = $team['team_member'];


// echo"<pre>";
// print_r($home_slider);
// echo"</pre>";
// die();


?>
<!-- banner Section start -->
<?php if(isset($home_banner)){ ?>
<div class="home-banner">
    <div class="home-slider">
        <?php foreach ($home_slider as $banner_repeater) {

            // echo "<pre>";
            // print_r($banner_repeater);
            // echo "</pre>";
            ?>
            <div>
                <div class="slide"
                    style="background: #5C5C5C url('<?php echo $banner_repeater['slider_image']['url']; ?>') no-repeat center center / cover;">
                    <div class="container">
                        <div class="slide-inner">
                            <div class="slide-content">
                                <h1>
                                    <?php echo $banner_repeater['slider_heading']; ?>
                                </h1>
                                <p class="tagline">
                                    <?php echo $banner_repeater['slider_tagline']; ?>
                                </p>
                                <ul class="btn-list">
                                    <li><a href="#" class="theme-btn">
                                            <?php echo $banner_repeater['read_more_button']['title'] ?>
                                        </a></li>
                                    <li><a href="<?php echo $banner_repeater['assessment_button']['url'] ?>" class="theme-btn fill-btn">
                                            <?php echo $banner_repeater['assessment_button']['title'] ?>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->

<!--******************* Middle Section Start ******************-->
<main>
    <!-- About US Section start -->
    <?php if(isset($about_us)){ ?>
    <section class="common-section about-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="bg-img-block">
                        <div class="heading-block">
                            <h2><?php echo $about_us['about_heading'] ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="desc-block">
                        <p><?php echo $about_us['about_content'] ?></p>
                        <a href="<?php echo $about_us['read_more_button']['url'] ?>" class="theme-btn"><?php echo $about_us['read_more_button']['title'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- About US Section End -->
    <!-- service Section Start -->
    <?php if(isset($services)){ ?>
    <section class="common-section services-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-push-8">
                    <div class="services-title">
                        <h2><?php echo $services['heading'] ?></h2>
                        <ul class="nav common-nav">
                            <li class="active">
                                <h3><a data-toggle="pill" href="#pre-arrival"><?php echo $services['pre_arrival']?></a></h3>
                            </li>
                            <li>
                                <h3><a data-toggle="pill" href="#post-arrival"><?php echo $services['pre_arrival']?></a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-sm-pull-4">
                    <div class="tab-content">
                        <?php if(isset($pre_arrival_repeater)){ ?>
                        <div id="pre-arrival" class="tab-pane fade in active">
                            <div class="row">
                             <?php foreach ($pre_arrival_repeater as $arrival_repeater){ ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="service-item">
                                        <img src="<?php echo $arrival_repeater['pre-arrival_image']['url'] ?>" alt="immigration">
                                        <div class="bottom-block">
                                            <p><?php echo $arrival_repeater['pre-arrival_blog']?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(isset($post_arrival_repeater)){?>
                        <div id="post-arrival" class="tab-pane fade">
                            <div class="row">
                                <?php foreach($post_arrival_repeater as $arrival_repeater){?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="service-item">
                                        <img src="<?php echo $arrival_repeater['post-arrival_image']['url']?>" alt="immigration">
                                        <div class="bottom-block">
                                            <p><?php echo $arrival_repeater['post-arrival_blog']?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Services Section End -->
    <!-- Apply Now Section start -->
    <?php if(isset($apply_now)){ ?>
        
    <section class="assessment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?php echo $apply_now['heading_apply_section']?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo $apply_now['apply_button']['url'] ?>" class="theme-btn white-btn"><?php echo $apply_now['apply_button']['title'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Apply Now Section End -->
    <!-- News Section Start -->
    <?php if(isset($news)){ ?>
    <section class="common-section home-news-section">
        <div class="container">
            <div class="home-news-list">
                <div class="col-sm-3">
                    <div class="news-box news-list-title">
                        <div class="news-desc">
                            <h2><?php echo $news['news_heading'] ?></h2>
                        </div>
                    </div>
                </div>
                <?php if(isset($news_repeater)){ 
                $count = 1;
                foreach($news_repeater as $news_Repeater) {?>
                <?php if($count == 1){ ?>
                <div class="col-sm-6">
                <?php }elseif($count == 2){?>
                    <div class="col-sm-3">
                        <?php }elseif($count == 3){?>
                            <div class="col-sm-5"> 
                                <?php }elseif($count == 4){?>
                                    <div class="col-sm-7">
                                        <?php } ?>
                    <div class="news-box"
                        style="background: url('<?php echo $news_Repeater['image']['url'] ?>') no-repeat center center / cover;">
                        <div class="news-desc">
                            <p><span><?php echo $news_Repeater['news_content'] ?></p>
                            <h5><a href="#"><?php echo $news_Repeater['news_heading'] ?></a></h5>
                        </div>
                    </div>
                </div>
                <?php 
                 $count++;
                  } 
                }?>
            </div>
            <div class="text-center">
                <a href="<?php echo $news['more_news_button']['url'] ?>" class="theme-btn"><?php echo $news['more_news_button']['title'] ?></a>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- News Section End -->
    <!-- Team Section start -->
    <?php if(isset($team)){ ?>
    <section class="common-section home-team-section">
        <div class="container">
            <div class="text-center">
                <h2><?php echo $team['team_heading']?></h2>
            </div>
            <div class="row">
                <?php foreach($team_member as $repeater){?>
                <div class="col-sm-4">
                    <div class="team-box"
                        style="background: #015e7d url('<?php echo $repeater['member_image']['url']?>') no-repeat center center / cover;">
                        <div class="team-desc">
                            <h3><?php echo $repeater['member_name']?></h3>
                            <p><?php echo $repeater['member_content']?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="text-center">
                <a href="<?php echo $team['team_button']['url']?>" class="theme-btn white-btn"><?php echo $team['team_button']['title']?></a>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Team Section End -->
</main>
<!--******************* Middle Section End ******************-->

<?php get_footer(); ?>