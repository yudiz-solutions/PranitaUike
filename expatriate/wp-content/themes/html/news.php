<?php
// Template Name: News1

get_header();


$news_banner = get_field('news_banner');
$apply_now = get_field('apply_now');
$post_object = get_field('post_object');

$args = array(
    'post_type' => ['news'],
    'post_status' => array('publish'),
    'posts_per_page' => 5,
    'paged' => 1,
);
$news = new WP_Query($args);
// echo"<pre>";
// print_r($news);
// echo"</pre>";

?>
<!--******************* Banner Section Start *********************-->
<?php if (isset($news_banner)) { ?>
    <div class="home-banner">
        <div class="banner"
            style="background: #5C5C5C url('<?php echo $news_banner['image']['url'] ?>') no-repeat center center / cover;">
            <div class="container">
                <h1>
                    <?php echo $news_banner['heading'] ?>
                </h1>
            </div>
        </div>
    </div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <?php if(isset($news)){ ?>
    <section class="common-section">
        <div class="container">
            <div class="news-blocks">
                <?php
                $first_post_id = "";
                $count = 0;
                        $news->the_post();
                        if ($count == 0 ) {
                            $first_post_id = (!empty($post_object)) ? $post_object:get_the_ID();
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="image-news"
                                        style="background: #ccc url('<?php echo get_the_post_thumbnail_url($first_post_id) ?>') no-repeat center center / cover;">
                                        <div class="news-inner">
                                            <h6><a href="<?php the_permalink(); ?>"><?php echo get_the_excerpt($first_post_id); ?></a></h6>

                                            <?php $news_cate = get_the_terms($first_post_id, 'news-category') 
                                            ?>
                                            <p>
                                            <?php foreach ($news_cate as $new) { ?>
                                                <span class="category"><?php echo $new->name; ?></span> 
                                                <?php } ?>
                                                <?php echo get_the_date() ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ?>
                            <?php
                            $count =2;
                        }
                ?>

                <div class="row load">
                    <?php
                    while ($news->have_posts()):
                        $news->the_post();
                        $max_page = $news->max_num_pages;
                        // echo $max_page;
                        if ($first_post_id !== get_the_ID()) {
                            ?>

                            <div class="col-md-6 col-sm-12 news-side">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="<?php the_permalink(); ?>" class="news-image"> <?php the_post_thumbnail() ?></a>
                                    </div>
                                    <div class="col-sm-8 paddingl-none">


                                        <h6><a href="news-inner.html"><?php the_excerpt(); ?></a></h6>

                                        <p class="meta">
                                        <?php $news_cate = get_the_terms(get_the_ID(), 'news-category') 
                                            ?>
                                            <?php foreach ($news_cate as $new) { ?>
                                                <span class="category"><?php echo $new->name; ?></span> 
                                                <?php } ?>
                                                <?php echo get_the_date() ?>
                                            </p>

                                        <p><?php echo the_content(); ?><a
                                                href="<?php the_permalink(); ?>" class="read-more">Read More</a></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="max_num" id="max_num" value="<?php echo $max_page;?>">
                        <?php
                        }
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

            </div>
            <div class="text-center">
                <button class="theme-btn">Load More</button>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if(isset($apply_now)){ ?>
    <section class="assessment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        <?php echo $apply_now['heading'] ?>
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="assessment.php" class="theme-btn white-btn">
                        <?php echo $apply_now['apply_now_button']['title'] ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php }?>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php
get_footer();
?>