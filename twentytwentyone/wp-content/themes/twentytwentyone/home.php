
<?php
// Template Name: Home

get_header();
?>
            <div align ="center" class="pranita">
                <?php
                // global $wp_query;

                $args = array(
                    'post_type' => 'story',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'paged' => 1
                );

                $story = new WP_Query($args);

                if ($story->have_posts()) {
                    while ($story->have_posts()) {
                        $story->the_post();

                        the_title('<h2>', '</h2>');
                        the_post_thumbnail(array(400,400));
                        the_excerpt();
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
            
            <center>
<button id="load-more-button"  class="misha_loadmore">Load more Posts</button>
            </center>

<?php
get_footer();
