<?php
// Template Name: Home
get_header();

$home_page = get_field('home_page');
// echo '<pre>';
// print_r($home_page);
// echo'</pre>';

// content_box_section
 $content_box_section = get_field('content_box_section');
 $section2 = $content_box_section['section2'];
//  content_box_section end 

// brainstorm_section
$brainstorm_section = get_field('brainstorm_section');
// brainstorm_section end

// row_bottompart
$row_bottompart = get_field('row_bottompart');
$images = $row_bottompart['images'];
// row_bottompart

// heading_section
$heading_section = get_field('heading_section');
$heading_sub = get_field('heading_sub');

// $heading_section

//brainstrom
$brainstorm_now = get_field('brainstorm-now');
$business_section = get_field('business_section');


// use for posts
$section_starts = get_field('section_starts');

// echo '<pre>';
// print_r($business_section);
// echo'</pre>';
// brainstrom end




?>
<!-- After nav section -->
<section class="afternav-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if(isset($home_page ['top_heading']) ){ ?>
                <h1><?php  echo $home_page ['top_heading']  ?></h1>
                <?php 
                } 
                ?>
                
                <?php if(isset($home_page ['sub_heading'])){ ?>
                <p><?php  echo $home_page ['sub_heading']?> </p>
                <?php 
                } 
                ?>

                <?php if(isset($home_page['get_started']['title'])){ ?>
                    <a href=" <?php echo $home_page['get_started']['url']?>" class="btn">
                        <?php echo $home_page['get_started']['title']?> </a>
                    <?php 
                    } 
                    ?>

            </div>
        </div>
        <div class="watch-demo text-center">
            <?php if(isset($home_page['banner_img']['url'])){ ?>
            <figure>
                <img src=" <?php echo $home_page['banner_img']['url']?>" alt="watch demo">
            </figure>
            <?php 
            } 
            ?>

            <?php
                if (!empty($home_page)) {
                ?>
            <a href="<?php  echo $home_page['watch_video'] ?>" data-src="<?php echo $home_page['watch_video1']  ?>" data-fancybox>
            <?php 
            }
            ?>

            <?php
             if(isset($home_page['icon1']['url'])) {
            ?>
            <img src="<?php  echo $home_page['icon1']['url']?>" alt="icon">
            <?php 
            } 
            ?>

            <?php if(isset($home_page['watch_demo2'])){ 
            ?>
            
            <?php echo $home_page['watch_demo2'];
             ?>
            <?php 
            } 
            ?>
            </a>
        </div>
    </div>
   </section>
   <!-- After nav section ends-->

   <!-- content-box section -->
   <?php if(isset($section2)) { ?>
   <section class="content-box">
    <div class="container">
        <div class="innercontainer">
            <div class="row">
                
                <?php foreach( $section2 as $curr){ 
                //     echo "<pre>";
                //   print_r($curr);
                //   echo"<pre>";

                //   echo $curr['image1']['url'];
                //   die();
                    ?>
            <div class="col-md-6 col-sm-12 col-lg-3">
                    <div class="content-1">
                        <figure>
                            <?php if(isset($curr['image1'])){ ?>
                            <img src="<?php echo $curr['image1']['url']?>" alt="image">
                            <?php 
                            } 
                            ?>
                        </figure>

                        <?php if(isset($curr['heading1'] )) { ?>
                        <h3><?php echo $curr['heading1'] ?></h3>
                        <?php 
                        } 
                        ?>

                        <?php if(isset($curr['para1'])) { ?>
                        <p><?php echo $curr['para1']  ?></p>
                        <?php 
                        } 
                        ?>

                    </div>
                </div>
                   <?php 
                   }
                   ?>        
                     
            </div>
        </div>
    </div>
   </section>
   <?php 
   } 
   ?>
   <!-- content-box section ends-->

   <!-- brainstorm section-->
   <section class="brainstorm">
    <div class="brainstorm-wrapper">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-6 col-xxl-6 brain-img">
                <?php if(isset($brainstorm_section['image2']['url'])) { ?>
                <figure>
                    <img src="<?php echo $brainstorm_section['image2']['url']?>" alt="brainstorm-img">
                    <!-- ./images/easily-brain-1.svg" -->
                </figure>
                <?php 
                } 
                ?>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-6 col-xxl-6 brain-text">
                <div class="brainright">
                    <?php if(isset($brainstorm_section['title1'] )){ ?>
                    <h4><?php echo $brainstorm_section['title1'] ?></h4>
                    <?php 
                    } 
                    ?>
                    <?php if(isset($brainstorm_section['title2'])){ ?>
                    <h2><?php echo $brainstorm_section['title2'] ?></h2>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($brainstorm_section['paragraph'])){ ?>
                    <p><?php echo $brainstorm_section['paragraph'] ?></p>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($brainstorm_section['start_button'])){ ?>
                    <a href="<?php echo $brainstorm_section['start_button']['url']?>" class="btn"><?php echo $brainstorm_section['start_button']['title']?> </a>
                    <?php 
                    } 
                    ?>
                </div>  
            </div>
            </div>
        </div>

        <!-- Gallery  start-->

        <div class="row bottompart">
                <div class="col-md-12">
                        <?php 
                        if(isset($images)) { 
                             ?>
                    <div class="row">
                    <?php
                        $counter_variable = 0;
                        foreach ($images as $curr_img) {
                        $image = $curr_img['url'];
                        $class = ($counter_variable % 2 == 0) ? 'col-md-4 col-sm-12 col-12' : 'col-md-2 col-sm-12 col-12';
                    ?>
                    
                    <div class="<?php echo $class; ?>">
                
                        <img src="<?php echo $curr_img['url']; ?>" alt="brainstorm-img">
                    </div>
                    <?php
                        $counter_variable++;
                        }
                    ?>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
                </div>

        
    <!-- gallery end -->

   </section>
   <!-- brainstorm section ends-->
    
   <!-- find similar section starts-->
   <section class="find-similar">
        <div class="container">
            <div class="find-top text-center common-padding">
                <?php if(isset($section_starts['heading_section'])) { ?>
                <h2><?php echo $section_starts['heading_section'] ?></h2>
                <?php 
                } 
                ?>
                <?php if(isset($section_starts['heading_sub'] )) { ?>
                <p><?php  echo $section_starts['heading_sub']  ?></p>
                <?php 
                } 
                ?> 
            </div>
        <div class="find-similar-parent single-item">
    
        <?php  
           $args=array(
            'post_type' => array('story'),
            'post_status' => 'publish',
            );
           $story = new WP_Query($args);
        //    echo"<pre>";
        //    print_r($storage);
        //    echo"</pre>";
           if($story->have_posts()):
            while($story->have_posts()):
                $story->the_post();
                
           ?>
            <div class="inner-find-similar ">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                        <figure>
                            <!-- <img src="<?php //echo get_template_directory_uri() ?>./images/slider-1.svg"
                                alt="slider-image"> -->
                                <?php the_post_thumbnail() ?>
                        </figure>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
                
                        <div class="text-content">
                            <?php $news_cate = get_the_terms(get_the_ID(),'news-category');
                            foreach($news_cate as $new){
                                
                               echo "<h4>".$new->name."</h4>";
                                
                            } ?>
                            <p>
                              <?php the_excerpt(); ?>
                           </p>
                            <a href="<?php  the_permalink(); ?>">Read Full Story </a>
                        </div>
                    
                    </div>
                </div>
            </div>
            <?php endwhile;
            endif;
             ?>

        

     </div>

    </div>
</div>
</section>
   <!-- find similar section ends-->

   <!-- get your business section -->
<section class="growfast">
    <div class="container">
        <div class="grow-wrapper">
            <div class="grow-top text-center common-padding">
                 <?php if(isset($business_section['heading1'])) { ?>
                <h2><?php  echo $business_section['heading1']; ?></h2>
                <?php 
                } 
                ?>
               
                <?php if(isset($business_section['heading2'])) { ?>
                <p><?php  echo $business_section['heading2']; ?></p>
                <?php 
                } 
                ?>
                
                <?php if(isset($business_section['get_start'])) { ?>
                <a href="<?php  echo $business_section['get_start']['url']; ?>" class="btn"><?php  echo $business_section['get_start']['title']; ?></a>
                <?php 
                } 
                ?>
                
            </div>
            <div class="row right-grow-side">
                
                <div class="col-md-12 col-lg-12 col-12 col-xl-6 only-for-position">
                    <?php if(isset($business_section['image1']['url'])){ ?>
                    <img src=" <?php echo $business_section['image1']['url']?>  "alt="desktop"> 
                    <!-- ./images/desktop.svg" -->
                    <?php 
                    } 
                    ?>

                    <?php if(isset($business_section['image2']['url'])){ ?>
                    <img src="<?php echo $business_section['image2']['url']?> " alt="image">
                    <?php 
                    } 
                    ?>

                    <?php if(isset($business_section['image3']['url'])){ ?>
                    <img src="<?php echo $business_section['image3']['url']?> " alt="mobile-image" class="onlyfor-smallscreen">
                    <?php 
                    } 
                    ?>

                    <?php if(isset($business_section['image4']['url'])) { ?>
                    <img src="<?php echo $business_section['image4']['url']?> " alt="image">
                    <?php 
                    } 
                    ?>
                </div>
                <div class="col-md-12 col-lg-12 col-12 col-xl-6 align-self-center">

                    <?php if(isset($business_section['heading3'])) { ?>
                    <h4><?php  echo $business_section['heading3']; ?></h4>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($business_section['heading4'])) { ?>
                    <h2><?php  echo $business_section['heading4']; ?></h2>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($business_section['heading5'])) { ?>
                    <p><?php  echo $business_section['heading5']; ?></p>
                    <?php 
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demo code here ends -->

<!-- Get your business ends -->
    <section class="brainstorm-now common-padding">
        <div class="container">
            <div class="row">
                <div class="co-md-12 text-center">
                    <?php if(isset($brainstorm_now['heading_now'])) { ?>
                    <h4><?php echo $brainstorm_now['heading_now']  ?></h4>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($brainstorm_now['brainstorm-now_sub'])) { ?>
                    <h2><?php echo $brainstorm_now['brainstorm-now_sub']  ?></h2>
                    <?php 
                    } 
                    ?>

                    <?php if(isset($brainstorm_now['paragraph'])) { ?>
                    <p><?php echo $brainstorm_now['paragraph']  ?></p> 
                    <?php 
                    } 
                    ?>

                    <?php if(isset($brainstorm_now['get_start'])) { ?>
                    <a href="<?php echo $brainstorm_now['get_start']['url']?>" class="btn"><?php echo $brainstorm_now['get_start']['title']?></a>
                    <?php 
                    } 
                    ?>

                </div>
            </div>

        </div>
    </section>

<?php
get_footer();
?>