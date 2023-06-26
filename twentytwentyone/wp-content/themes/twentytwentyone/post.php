<?php 
// Template Name: post

get_header();
?>
<div class="main-container">
<div class="main-grid"> 
	<main 
	class="posts-list"
	data-page="<?=get_query_var('paged') ? get_query_var('paged') : 1; ?>"
	data-max="<?$wp_query->max_num_pages; ?>"
	>


<?php

$args=array(
	'post_type' => array('story'),
	'post_status' => 'publish',
	);
   $story = new WP_Query($args);

   if($story->have_posts()){
	while($story->have_posts()){
		$story->the_post();

         the_title();
		 the_post_thumbnail(array(350,350));
		 the_excerpt();

	}
}
?>
</main>
</div> 
<button class="misha_loadmore">Load more Posts</button>
<br>
<br>
</div>
<?php
get_footer();











