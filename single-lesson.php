<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
	global $post;
	$lesson = new LLMS_Lesson( $post->ID );
	$parent_course_link = get_permalink( $lesson->get_parent_course() );
	$parent_course_tit = get_the_title( $lesson->get_parent_course() );
	?>
	<div class="header-intro">
		<div class="wrap">
			<h4><a href="<?php echo $parent_course_link; ?>" title="Torna a <?php echo $parent_course_tit; ?>"><?php echo $parent_course_tit; ?></a></h4>
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<?php
}

//* Rimuovo le post info dai corsi
add_filter( 'genesis_post_info', 'sam_post_info_filter' );
function sam_post_info_filter($post_info) {
	$post_info = '';
	return $post_info;
}

//* Inserisco la tabella prezzi
if( !is_user_logged_in() ) {
	add_action('genesis_entry_footer', 'sam_template_pricing_table');
	function sam_template_pricing_table($post_id = null)
	{
		?>
			<h2>Ti &egrave; piaciuta la lezione gratuita?</h2>
			<p>Approfondisci ulteriormente le tue conoscenze acquistando questo singolo corso o iscrivendoti alla nostra membership!</p>
		<?php
		if (!$post_id) {
			global $post;
			$lesson = new LLMS_Lesson($post->ID);
			$parent_course = $lesson->get_parent_course();
			//var_dump( $parent_course );
		}

		llms_get_template('product/pricing-table.php', array(
			'product' => new LLMS_Product($parent_course),
		));

	}
}

//* Rimuovo link ritorno corso di LifterLMS
remove_action( 'lifterlms_single_lesson_before_summary', 'lifterlms_template_single_parent_course', 10 );

//* Force sidebar-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

//* Rimuovo il riassunto dalle lezioni
add_filter('llms_show_preview_excerpt', '__return_false');

genesis();
