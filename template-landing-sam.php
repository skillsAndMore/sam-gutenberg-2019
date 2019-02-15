<?php

/**
 * Template Name: Landing SAM
 *
 * @package WordPress
 * @subpackage SkillsAndMore
 */

// Add custom class.
add_filter('body_class', 'cannasci_add_student_dashboard_wrapper_class' );
function cannasci_add_student_dashboard_wrapper_class( $classes ){
	$classes[] = 'landing-page-sam';
	return $classes;
}

// Add featured image
add_action( 'genesis_before_content', 'sam_add_featured_image' );
function sam_add_featured_image(){
	the_post_thumbnail();
}

// remove_action( 'genesis_entry_header', 'genesis_do_post_title' );



genesis();
