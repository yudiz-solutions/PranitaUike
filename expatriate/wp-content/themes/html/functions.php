<?php
function theme_setup_one_setup()
{
    $logo_width = 300;
    $logo_height = 100;

    add_theme_support(
        'custom-logo',
        array(
            'height' => $logo_height,
            'width' => $logo_width, 
            'flex-width' => true,
            'flex-height' => true,
            'unlink-homepage-logo' => true,
        )
    );
    register_nav_menus(
        array('primary-menu' => 'top-menu')
    );

    add_theme_support('post-thumbnails');


}
add_action('after_setup_theme', 'theme_setup_one_setup');
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}
function my_script()
{
    // <!--Font Awsome Included-->
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css');
    wp_enqueue_style('fontawesome');

    // <!-- Bootstrap -->
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('bootstrap');

    // <!-- Slick -->
    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('slick');

    wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
    wp_enqueue_style('slick-theme');

    // <!-- JCF -->
    wp_register_style('jcf', get_template_directory_uri() . '/css/jcf.css');
    wp_enqueue_style('jcf');

    // <!--Main Style Included-->
    wp_register_style('local-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('local-style');
    // <!--Extra Style Included-->
    // <!--Main Js Included-->

    wp_register_script('jquery', get_template_directory_uri() . '/js/lib/jquery.js');
    wp_enqueue_script('jquery');

    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js');
    wp_enqueue_script('modernizr');

    wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.js');
    wp_enqueue_script('slick-js');

    wp_register_script('jcf-js', get_template_directory_uri() . '/js/jcf.js');
    wp_enqueue_script('jcf-js');

    wp_register_script('jcf-select-js', get_template_directory_uri() . '/js/jcf.select.js');
    wp_enqueue_script('jcf-select-js');

    wp_register_script('jcf-select-js', get_template_directory_uri() . '/js/jcf.radio.js');
    wp_enqueue_script('jcf-select-js');

    wp_register_script('custom-file-js', get_template_directory_uri() . '/js/custom-file-input.js');
    wp_enqueue_script('custom-file-js');

    // bootstrap js file

    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js');
    wp_enqueue_script('bootstrap-js');

    // <!-- Sticky Js Included -->

    wp_register_script('sticky-kit', get_template_directory_uri() . '/js/sticky-kit.js', array(), "", true);
    wp_enqueue_script('sticky-kit');

    wp_register_script('custom', get_template_directory_uri() . '/custom.js', array(), "", true);
    wp_enqueue_script('custom');

    wp_register_script('loadmore', get_template_directory_uri() . '/js/Loadmore.js', array(), "", true);
    if(is_page('news-aaa')){

        wp_enqueue_script('loadmore');
    }

    wp_localize_script('loadmore', 'news', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_script');




function wpdocs_theme_slug_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('menu', 'expatriate'),
            'id' => 'menu',
            'description' => __('Widgets in this area will be shown on all  posts and pages.', 'expatriate'),
            'before_widget' => '<ul id="%1$s" class="widget %2$s">',
            'after_widget' => '</ul>',
            'before_title' => '<li>',
            'after_title' => '</li>',

        )
    );
    register_sidebar(
        array(
            'name' => __('cantact', 'expatriate'),
            'id' => 'cantact',
            'description' => __('Widgets in this area will be shown on all  posts and pages.', 'expatriate'),
            // 'before_widget' => '<ul id="%1$s" class="theme-btn white-btn">',
            // 'after_widget' => '</ul>',
            // 'before_title' => '<li>',
            // 'after_title' => '</li>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Social Icon', 'expatriate'),
            'id' => 'social_icon',
            'description' => __('Widgets in this area will be shown on all  posts and pages.', 'expatriate'),
            'before_widget' => '<ul class="social-share-menu">',
            'after_widget' => '</ul>',
            // 'before_title' => '<li>',
            // 'after_title' => '</li>',
        )
    );

}

add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

    // Check function exists.
    if (function_exists('acf_add_options_page')) {

        // Register options page.
        $option_page = acf_add_options_page(
            array(
                'page_title' => __('Theme General Settings'),
                'menu_title' => __('Theme Settings'),
                'menu_slug' => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            )
        );
    }
}

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('services', 'Post Type General Name', 'onlinecourses'),
        'singular_name' => _x('services', 'Post Type Singular Name', 'onlinecourses'),
        'menu_name' => __('services', 'onlinecourses'),
        'parent_item_colon' => __('Parent services', 'onlinecourses'),
        'all_items' => __('All services', 'onlinecourses'),
        'view_item' => __('View services', 'onlinecourses'),
        'add_new_item' => __('Add New services', 'onlinecourses'),
        'add_new' => __('Add New', 'onlinecourses'),
        'edit_item' => __('Edit services', 'onlinecourses'),
        'update_item' => __('Update services', 'onlinecourses'),
        'search_items' => __('Search services', 'onlinecourses'),
        'not_found' => __('Not Found', 'onlinecourses'),
        'not_found_in_trash' => __('Not found in Trash', 'onlinecourses'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('category', 'onlinecourses'),
        'description' => __('services news and reviews', 'onlinecourses'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
        ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies' => array('Category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('services', $args);

    $labels = array(
        'name' => _x('Category', 'taxonomy general name', 'onlinecourses'),
        'singular_name' => _x('Category', 'taxonomy singular name', 'onlinecourses'),
        'search_items' => __('Search Category', 'onlinecourses'),
        'all_items' => __('All Category', 'onlinecourses'),
        'parent_item' => __('Parent Category', 'onlinecourses'),
        'parent_item_colon' => __('Parent Category:', 'onlinecourses'),
        'edit_item' => __('Edit Category', 'onlinecourses'),
        'update_item' => __('Update Category', 'onlinecourses'),
        'add_new_item' => __('Add New Category', 'onlinecourses'),
        'new_item_name' => __('New Category Name', 'onlinecourses'),
        'menu_name' => __('Category', 'onlinecourses'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'genre'),
    );

    register_taxonomy('services-category', 'services', $args);

    flush_rewrite_rules();
}

add_action('init', 'custom_post_type', 0);

function custom_post_type_news()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('news', 'Post Type General Name', 'onlinecourses'),
        'singular_name' => _x('news', 'Post Type Singular Name', 'onlinecourses'),
        'menu_name' => __('news', 'onlinecourses'),
        'parent_item_colon' => __('Parent news', 'onlinecourses'),
        'all_items' => __('All news', 'onlinecourses'),
        'view_item' => __('View news', 'onlinecourses'),
        'add_new_item' => __('Add New news', 'onlinecourses'),
        'add_new' => __('Add New', 'onlinecourses'),
        'edit_item' => __('Edit news', 'onlinecourses'),
        'update_item' => __('Update news', 'onlinecourses'),
        'search_items' => __('Search news', 'onlinecourses'),
        'not_found' => __('Not Found', 'onlinecourses'),
        'not_found_in_trash' => __('Not found in Trash', 'onlinecourses'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('category', 'onlinecourses'),
        'description' => __('news news and reviews', 'onlinecourses'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
        ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies' => array('Category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('news', $args);

    $labels = array(
        'name' => _x('Category', 'taxonomy general name', 'onlinecourses'),
        'singular_name' => _x('Category', 'taxonomy singular name', 'onlinecourses'),
        'search_items' => __('Search Category', 'onlinecourses'),
        'all_items' => __('All Category', 'onlinecourses'),
        'parent_item' => __('Parent Category', 'onlinecourses'),
        'parent_item_colon' => __('Parent Category:', 'onlinecourses'),
        'edit_item' => __('Edit Category', 'onlinecourses'),
        'update_item' => __('Update Category', 'onlinecourses'),
        'add_new_item' => __('Add New Category', 'onlinecourses'),
        'new_item_name' => __('New Category Name', 'onlinecourses'),
        'menu_name' => __('Category', 'onlinecourses'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'genre'),
    );

    register_taxonomy('news-category', 'news', $args);

    flush_rewrite_rules();
}

add_action('init', 'custom_post_type_news', 0);

function load_more_story()
{
    $args = array(
        'post_type' => ['news'],
        'post_status' => array('publish'),
        'posts_per_page' => 4,
        'paged' => $_POST['page'],
    );
    $news = new WP_Query($args);
    ?>

    <div class="row load">
        <?php
        while ($news->have_posts()):
            $news->the_post();
            // if ($first_post_id !== get_the_ID()) {
            ?>

            <div class="col-md-6 col-sm-12 news-side">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="news-inner.html" class="news-image">
                            <?php the_post_thumbnail() ?>
                        </a>
                    </div>
                    <div class="col-sm-8 paddingl-none">


                        <h6><a href="news-inner.html">
                                <?php the_excerpt(); ?>
                            </a></h6>

                        <p class="meta">
                            <?php $news_cate = get_the_terms(get_the_ID(), 'news-category')
                                ?>
                            <?php foreach ($news_cate as $new) { ?>
                                <span class="category">
                                    <?php echo $new->name; ?>
                                </span>
                            <?php } ?>
                            <?php echo get_the_date() ?>
                        </p>

                        <p>
                            <?php echo the_content(); ?><a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            // }
        endwhile;
        wp_die();
        ?>
    </div>
    <?php
}

add_action('wp_ajax_load_more_story', 'load_more_story');
add_action('wp_ajax_nopriv_load_more_story', 'load_more_story');

// Show Most Popular WordPress Posts
function count_post_visits() {
    if( is_single() ) {
       global $post;
       $views = get_post_meta( $post->ID, 'my_post_viewed', true );
       if( $views == '' ) {
          update_post_meta( $post->ID, 'my_post_viewed', '1' ); 
       } else {
          $views_no = intval( $views );
          update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
        //   echo"<pre>";
        //   print_r($views_no);
        //   echo"</pre>";
       }
    }
 }
 add_action( 'wp_head', 'count_post_visits' );