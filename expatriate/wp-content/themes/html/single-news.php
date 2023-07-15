<?php 
// Template Name: inner News
get_header(); 

$news_inner_banner = get_field('news_inner_banner');
$apply_now = get_field('apply_now');

$main_news_sections = get_field('main_news_sections');

$content = $main_news_sections['content'];

$articles_tags = $main_news_sections['articles_tags']; 

?>
<!--******************* Banner Section Start *********************-->
<?php if(isset($news_inner_banner)){ ?>
<div class="home-banner">
    <div class="banner" style="background: #5C5C5C url('<?php echo $news_inner_banner['image']['url'] ?>') no-repeat center center / cover;">
        <div class="container">
            <h1><?php echo $news_inner_banner['heading'] ?></h1>
        </div>
    </div>
</div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <section class="common-section article-detail">
        <div class="container">
            <div class="row">
                <?php if(isset($main_news_sections)){ ?>
                    <?php if(have_posts()){ the_post();?>
                <div class="col-sm-8 right-border">
                    <div class="article-detail-inner">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo $main_news_sections['home']['url'] ?>"><?php echo $main_news_sections['home']['title'] ?></a></li>
                            <li><a href="<?php echo $main_news_sections['news']['url'] ?>"><?php echo $main_news_sections['news']['title'] ?></a></li>
                            <li class="active"><?php echo get_the_excerpt() ?></li>       
                        </ol>
                        <h5 class="article-title"><?php echo get_the_excerpt() ?></h5>
                        <div class="featured-articles feature1">
                        </div>
                        <div class="articles-meta">
                            <?php $category = get_the_terms(get_the_ID(), 'news-category') ?>
                            <p class="item-meta">
                                <span class="category">
                                <?php foreach($category as $cat){
                                        echo $cat->name;
                                       }?>
                                </span> <?php echo  get_the_date(); ?></p>

                            <div class="social-share-block">
                                <p class="share-label">share</p>
                                <?php dynamic_sidebar('social_icon') ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php if(isset($content)){ ?>
                        <div class="articles-content">
                       <?php foreach($content  as $curContent){ ?>
                             <?php if(isset($curContent['content_heading'])){ ?>
                           <p class="bold"><?php echo $curContent['content_heading']; ?></p>
                           <?php } ?>
                             <?php if(isset($curContent['content_text'])){ ?>
                            <p><?php echo $curContent['content_text']; ?></p> 
                            <?php } }?>                           
                           
                        </div>
                        <?php } ?>
                        <div class="articles-footer-meta">
                            <div class="row">
                                <?php if(isset($articles_tags)){ ?>
                                <div class="col-md-6">
                                    <ul class="articles-tags">
                                        <?php 
                                        $count = 0;
                                        foreach($articles_tags as $cur_art){ 
                                            if($count == 1){
                                            ?>
                                        <li class="active"><a href="#"><?php echo $cur_art['articles_tags_link']['title'] ?></a></li>
                                        <?php }else{ ?>
                                            <li><a href="#"><?php echo $cur_art['articles_tags_link']['title'] ?></a></li>
                                        <?php } $count++;}?>
                                        
                                    </ul>
                                </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="social-share-block">
                                        <p class="share-label">share</p>
                                    
                                        <?php dynamic_sidebar('social_icon') ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } 
                }?>


                <div id="sticky_item" class="col-sm-4">
                    <div class="sidebar">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#popular">Popular</a></li>
                            <li><a data-toggle="tab" href="#recommended">Recommended</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- popular -->
                            <div id="popular" class="tab-pane fade in active">
                           <?php
                            $popular_posts_args = array(
                                  'post_type'=>'news',
                                  'posts_per_page' => 3,
                                  'meta_key' => 'my_post_viewed',
                                  'orderby' => 'meta_value_num',
                                  'order'=> 'DESC'
                                 );
                            $popular_posts_loop = new WP_Query( $popular_posts_args );
                            if($popular_posts_loop->have_posts()):
                            while( $popular_posts_loop->have_posts() ):
                               $popular_posts_loop->the_post();
                                    ?>
                                    <div class="article-tab-item">
                                    <div class="article-img">
                                        <img class="full-img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="article-img">
                                    </div>
                                    <div class="article-desc">
                                        <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a></h4>
                                        <?php $news_cate = get_the_terms(get_the_ID(), 'news-category') ;
                                            ?>
                                            <p>
                                            <?php foreach ($news_cate as $new) { ?>
                                                <span class="category"><?php echo $new->name; ?></span> 
                                                <?php } ?>
                                                <?php echo get_the_date() ?>
                                            </p>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                                endwhile;
                                wp_reset_query();
                                endif;
                                
                                ?>
                             </div>   
                            <!-- recommended -->
                            <div id="recommended" class="tab-pane fade">
                            <?php
                            $recommended_posts_args = array(
                                  'post_type'=>'news',
                                  'post_status' => array('publish'),
                                  'orderby' => 'meta_value_num',
                                  'order'=> 'DESC'

                                 );
                            $recommended_posts_loop = new WP_Query( $recommended_posts_args ); ?>
                             <?php 
                                //    echo "<pre>";
                                //    print_r($recommended_posts_loop);
                                //    echo "</pre>"; 
                                   ?>

                                 <?php 
                                 if($recommended_posts_loop->have_posts()):
                                 while($recommended_posts_loop->have_posts()): 
                                   $recommended_posts_loop -> the_post();
                                    ?>
                                <div class="article-tab-item">
                                    <div class="article-img">
                                        <img class="full-img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="article-img">
                                    </div>
                                    <div class="article-desc">
                                        <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a></h4>

                                        <?php $news_cate = get_the_terms(get_the_ID(), 'news-category') 
                                            ?>
                                            <p>
                                            <?php foreach ($news_cate as $new) { ?>
                                                <span class="category"><?php echo $new->name; ?></span> 
                                                <?php } ?>
                                                <?php echo get_the_date() ?>
                                            </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <?php endwhile;
                                wp_reset_query();
                                endif; 
                                ?>
                                
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($apply_now)){ ?>
    <section class="assessment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?php echo $apply_now['heading']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo $apply_now['apply_now_button']['url'] ?>" class="theme-btn white-btn"><?php echo $apply_now['apply_now_button']['title'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php get_footer(); ?>
