

<?php
function my_load_scripts() {

    //style start //

	
    wp_register_style( 'style2', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style ( 'style2');

    wp_register_style( 'style', get_template_directory_uri().'/style.css');
	wp_enqueue_style ( 'style');

    wp_register_style( 'slick2', get_template_directory_uri().'/css/slick-theme.css');
	wp_enqueue_style ( 'slick2');

    wp_register_style( 'fancybox', get_template_directory_uri().'/css/fancybox.css');
	wp_enqueue_style ( 'fancybox');

    wp_register_style( 'fancybox-min', get_template_directory_uri().'/css/fancybox.min.css');
	wp_enqueue_style ( 'fancybox-min');

    wp_register_style( 'animate-min', get_template_directory_uri().'/css/animate.min.css');
	wp_enqueue_style ( 'animate-min');
  
    wp_register_style( 'animate-compat', get_template_directory_uri().'/css/animate.compat.css');
	wp_enqueue_style ( 'animate-compat');

	wp_register_style( 'slick', get_template_directory_uri().'/css/slick.css');
	wp_enqueue_style ( 'slick');

    //style end //

    //script start//

    wp_register_script( 'min', get_template_directory_uri().'/js/jquery-3.6.4.min.js');
	wp_enqueue_script ( 'min');

    wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');
	wp_enqueue_script ( 'bootstrap');

    wp_register_script( 'script1', get_template_directory_uri().'/js/script.js');
	wp_enqueue_script ( 'script1');

	wp_register_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js');
	wp_enqueue_script ( 'fancybox');

    wp_register_script( 'min2', get_template_directory_uri().'/js/slick.min.js');
	wp_enqueue_script ( 'min2');
   
    
    wp_register_script( 'popper', get_template_directory_uri().'/js/popper.min.js');
	wp_enqueue_script ( 'popper');

	//script end //

}
add_action('wp_enqueue_scripts', 'my_load_scripts');

// function custom_logo_display() {
//     if (function_exists('the_custom_logo')) {
//         the_custom_logo();
//     }
// }

function theme_setup_one_setup(){
	$logo_width  = 50;
	$logo_height = 40;
	
	add_theme_support(
		'custom-logo',
		array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
			)
			);

			register_nav_menus( array(
				'header_menu' => __( 'Header Menu', 'theme' )
				) );
				
				add_theme_support('post-thumbnails');
				
			}

            add_action( 'after_setup_theme', 'theme_setup_one_setup' );
			
            
			// svg image 
			function cc_mime_types( $mimes ){
				$mimes['svg'] = 'image/svg+xml';
				return $mimes;
			}
			add_filter( 'upload_mimes', 'cc_mime_types' );


			/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1 ', 'theme' ),
		'id'            => 'footer-sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',  // '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</ul>',
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );


	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'theme' ),
		'id'            => 'footer-sidebar-2',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'theme' ),
		'id'            => 'footer-sidebar-3',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'theme' ),
		'id'            => 'footer-sidebar-4',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 5', 'theme' ),
		'id'            => 'footer-sidebar-5',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 6', 'theme' ),
		'id'            => 'footer-sidebar-6',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>', 
		'before_title'  => '<li>',
		'after_title'   => '</li>',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );
//hook and function menu

//side bar end //


// register custom post field to our page //
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */

 function custom_post_type() {
  
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'story', 'Post Type General Name', 'twentytwentyone' ),
            'singular_name'       => _x( 'story', 'Post Type Singular Name', 'twentytwentyone' ),
            'menu_name'           => __( 'story', 'twentytwentyone' ),
            'parent_item_colon'   => __( 'Parent story', 'twentytwentyone' ),
            'all_items'           => __( 'All story', 'twentytwentyone' ),
            'view_item'           => __( 'View story', 'twentytwentyone' ),
            'add_new_item'        => __( 'Add New story', 'twentytwentyone' ),
            'add_new'             => __( 'Add New', 'twentytwentyone' ),
            'edit_item'           => __( 'Edit story', 'twentytwentyone' ),
            'update_item'         => __( 'Update story', 'twentytwentyone' ),
            'search_items'        => __( 'Search story', 'twentytwentyone' ),
            'not_found'           => __( 'Not Found', 'twentytwentyone' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'category', 'twentytwentyone' ),
            'description'         => __( 'story news and reviews', 'twentytwentyone' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'Category' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'story', $args );



        $labels = array(
            'name'              => _x( 'Category', 'taxonomy general name', 'theme' ),
            'singular_name'     => _x( 'Category', 'taxonomy singular name', 'theme' ),
            'search_items'      => __( 'Search Category', 'theme' ),
            'all_items'         => __( 'All Category', 'theme' ),
            'parent_item'       => __( 'Parent Category', 'theme' ),
            'parent_item_colon' => __( 'Parent Category:', 'theme' ),
            'edit_item'         => __( 'Edit Category', 'theme' ),
            'update_item'       => __( 'Update Category', 'theme' ),
            'add_new_item'      => __( 'Add New Category', 'theme' ),
            'new_item_name'     => __( 'New Category Name', 'theme' ),
            'menu_name'         => __( 'Category', 'theme' ),
        );
    
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'genre' ),
        );
    
       

        register_taxonomy('news-category', 'story', $args);


        $labels = array(
            'name'                       => _x('Type', 'taxonomy general name', 'theme'),
            'singular_name'              => _x('Type', 'taxonomy singular name', 'theme'),
            'search_items'               => __('Search Type', 'theme'),
            'popular_items'              => __('Popular Type', 'theme'),
            'all_items'                  => __('All Type', 'theme'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __('Edit Writer', 'theme'),
            'update_item'                => __('Update Writer', 'theme'),
            'add_new_item'               => __('Add New Writer', 'theme'),
            'new_item_name'              => __('New Writer Name', 'theme'),
            'separate_items_with_commas' => __('Separate Type with commas', 'theme'),
            'add_or_remove_items'        => __('Add or remove Type', 'theme'),
            'choose_from_most_used'      => __('Choose from the most used Type', 'theme'),
            'not_found'                  => __('No Type found.', 'theme'),
            'menu_name'                  => __('Type', 'theme'),
        );
    
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array('slug' => 'news-type'),
        );
    
        register_taxonomy('news-type', 'story', $args);
		flush_rewrite_rules();
    }
      
    add_action( 'init', 'custom_post_type', 0 );
    add_theme_support('custom-support');

?>
 