<?php
// Template Name:Team
get_header();

$team_banner = get_field('team_banner');

$team = get_field('team');
$team_member = $team['team_member'];

$assessment_section = get_field('assessment_section');
?>
<!--******************* Banner Section Start *********************-->
<?php if (isset($team_banner)) { ?>
    <div class="home-banner">
        <div class="banner"
            style="background: #5C5C5C url('<?php echo $team_banner['team_image']['url'] ?>') no-repeat center center / cover;">
            <div class="container">
                <h1>
                    <?php echo $team_banner['team_heading'] ?>
                </h1>
            </div>
        </div>
    </div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <?php if (isset($team_member)) { ?>
        <?php foreach ($team_member as $repeater) { ?>
            <section class="common-section member-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="team-box"
                                        style="background: #015e7d url('<?php echo $repeater['image']['url'] ?>') no-repeat center center / cover;">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="member-title">
                                        <h3>
                                            <?php echo $repeater['member_hading'] ?>
                                        </h3>
                                        <p>
                                            <?php echo $repeater['member_content_heading']; ?>
                                        </p>
                                    </div>
                                    <p>
                                        <?php echo $repeater['member_content']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    }
    ?>
    <?php if (isset($assessment_section)) { ?>
        <section class="assessment-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>
                            <?php echo $assessment_section['heading'] ?>
                        </h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="assessment.html" class="theme-btn white-btn">
                            <?php echo $assessment_section['apply_now_button']['title'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php get_footer(); ?>