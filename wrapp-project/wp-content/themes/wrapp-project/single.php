<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage wrapp_One
 * @since wrapp-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();


        the_title();

        the_content();

		// Parent post navigation.
		the_post_navigation();
	
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	
	
	
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.

endwhile; // End of the loop.
?>
<?php
get_footer();
?>

