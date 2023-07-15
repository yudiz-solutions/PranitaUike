<?php
// Template Name: Services
get_header();


$services_banner = get_field('services_banner');
$assessment = get_field('assessment');
$post_object = get_field('post_object');
// print_r($post_object) ;
?>
<!--******************* Banner Section Start *********************-->
<?php if (isset($services_banner)) { ?>
    <div class="home-banner">
        <div class="banner"
            style="background: #5C5C5C url('<?php echo $services_banner['image']['url'] ?>') no-repeat center center / cover;">
            <div class="container">
                <h1>
                    <?php echo $services_banner['heading'] ?>
                </h1>
            </div>
        </div>
    </div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <section class="common-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 service-sidebar">
                    <div class="panel-group" id="accordion">
                        <?php
                        $slide_count = 1;
                        $bool = 1;
                        $custom_term = get_terms('services-category');
                        
                        foreach ($custom_term as $cur_term) {
                           
                            ?>
                            <div class="panel">
                                <div>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cur_term->term_id?>">
                                        <?php echo $cur_term->name; ?>
                                    </a>
                                </div>
                                <div id="collapse<?php echo $cur_term->term_id ?>" class="panel-collapse collapse <?php echo $cur_term->term_id == 5 ? 'in' : ''; ?>">

                                    <ul class="nav nav-tabs">
                                        <?php
                                        $args1 = array(
                                            'post_type' => 'services',
                                            'post-status' => 'publish',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'services-category',
                                                    'field' => 'slug',
                                                    'terms' => $cur_term->slug,
                                                ),
                                            ),

                                        );
                                        $arrival_services = new WP_Query($args1);
                                        if ($arrival_services->have_posts()):
                                            while ($arrival_services->have_posts()):
                                                $arrival_services->the_post();

                                                ?>
                                                <li><a data-toggle="tab" href="#service<?php echo get_the_ID(); ?>"
                                                        data-target="#service<?php echo get_the_ID(); ?>" <?php echo $slide_count == 1 ? 'class="current"' : ''; ?>><?php the_title() ?></a></li>

                                                <?php
                                                $slide_count++;

                                                // echo $bool;
                                            endwhile;
                                            // $bool++;
                                            wp_reset_postdata();
                                        endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php 
                    
                    } ?>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9 service-content">
                    <div class="tab-content">
                        <?php
                        $post_arrival_args = array(
                            'post_type' => 'services',
                            'post_status' => 'publish',
                            'post_per_page' => -1
                        );

                        $arrival_services_detail = new WP_Query($post_arrival_args);
                        if ($arrival_services_detail->have_posts()):
                            while ($arrival_services_detail->have_posts()):
                                $arrival_services_detail->the_post();
                                
                                if(get_the_ID() == $post_object){
                                ?>
                                <div id="service<?php echo get_the_ID() ?>" class="tab-pane fade in active">
                                <?php } else{?>
                                    <div id="service<?php echo get_the_ID() ?>" class="tab-pane fade in">
                                <?php } ?>
                                    <figure>
                                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-responsive"
                                            alt="EASI Service" />
                                    </figure>
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <p><strong>
                                            <?php echo get_the_excerpt() ?>
                                        </strong></p>
                                    <p>
                                        <?php the_content(); ?>
                                    </p>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (isset($assessment)) { ?>
        <section class="assessment-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>
                            <?php echo $assessment['heading'] ?>
                        </h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?php $assessment['apply_now_button']['url'] ?>" class="theme-btn white-btn"><?php echo $assessment['apply_now_button']['title'] ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->


<?php get_footer() ?> 