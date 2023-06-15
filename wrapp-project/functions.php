

<?php
function my_load_scripts() {

    //style start //

    wp_register_style( 'style', get_template_directory_uri().'/css/style.css');
	wp_enqueue_style ( 'style');

    wp_register_style( 'style2', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style ( 'style2');


    wp_register_style( 'slick', get_template_directory_uri().'/css/slick.css');
	wp_enqueue_style ( 'slick');

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

    //style end //

    //script start//

    wp_register_script( 'min', get_template_directory_uri().'/js/jquery-3.6.4.min.js');
	wp_enqueue_script ( 'min');

    wp_register_script( 'min2', get_template_directory_uri().'/js/slick.min.js');
	wp_enqueue_script ( 'min2');
   
    wp_register_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js');
	wp_enqueue_script ( 'fancybox');

    wp_register_script( 'popper', get_template_directory_uri().'/js/popper.min.js');
	wp_enqueue_script ( 'popper');

    wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');
	wp_enqueue_script ( 'bootstrap');
  
    wp_register_script( 'script1', get_template_directory_uri().'/js/wrapp-project/js/script.js');
	wp_enqueue_script ( 'script1');

}
add_action('wp_enqueue_scripts', 'my_load_scripts');


?>
<?php
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
				'header_menu' => __( 'Header Menu', 'textdomain' )
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
?>
