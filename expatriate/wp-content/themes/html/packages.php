<?php
// Template Name: packages

get_header();
$packages = get_field('packages');

$packages_services = get_field('packages_services');
$services = $packages_services['services'];

$assessment = get_field('assessment');

?>
<!--******************* Banner Section Start *********************-->
<?php if (isset($packages)) { ?>
    <div class="home-banner">
        <div class="banner"
            style="background: #5C5C5C url('<?php echo $packages['image']['url']; ?>') no-repeat center center / cover;">
            <div class="container">
                <h1>
                    <?php echo $packages['header'] ?>
                </h1>
            </div>
        </div>
    </div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <?php if(isset($packages_services)){ ?>
    <section class="common-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php if(isset($services)){ ?>
                    <div class="row">
                        <?php
                        $count = 1;
                        foreach ($services as $repeater) {
                            if ($count % 3 != 0) {
                                ?>
                                <div class="col-sm-6">
                                    <div class="package-box">
                                        <h5><?php echo $repeater['heading']?></h5>
                                        <div class="package-price"><span><?php echo $repeater['price']?></span></div>
                                    </div>
                                </div>
                            <?php
                            } else {
                                ?>
                                <div class="clearfix"></div>
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="package-box">
                                        <h5><?php echo $repeater['heading']?></h5>
                                        <div class="package-price"><span><?php echo $repeater['price']?></span></div>
                                    </div>
                                </div>
                                <?php
                            }
                            $count++ ;
                        } ?>

                    </div>
                    <?php } ?>
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
                    <h2><?php echo $assessment['assessment_heading']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="assessment.html" class="theme-btn white-btn"><?php echo $assessment['apply_now_button']['title']; ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php get_footer() ?>