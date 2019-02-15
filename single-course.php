<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
	?>
	<div class="header-intro">
		<div class="wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<?php
}

//* Rimuovo le post info dai corsi
add_filter( 'genesis_post_info', 'sam_post_info_filter' );
function sam_post_info_filter($post_info) {
	if ( is_singular( 'course' ) ) {
		$post_info = '';
		return $post_info;
	}
}
if( !is_user_logged_in() ) {
	add_action('genesis_before_footer', 'sam_testimonials');
} 
//remove_action( 'lifterlms_single_course_after_summary', 'lifterlms_template_course_author',             40 );
//remove_action( 'lifterlms_single_course_after_summary', 'lifterlms_template_single_difficulty',         20 );
//add_action( 'lifterlms_single_course_after_summary', 'sam_template_single_difficulty',         20 );
//function sam_template_single_difficulty(){
//	global $course;
//	$difficulty = $course->get_difficulty();
//}

// Riposiziono le testimonianze
remove_action('lifterlms_single_course_after_summary', 'lifterlms_template_single_reviews', 100);
add_action('lifterlms_single_course_after_summary', 'lifterlms_template_single_reviews', 65);

// Replico pricing table
add_action( 'genesis_after_entry_content', 'lifterlms_template_pricing_table' );

genesis();
