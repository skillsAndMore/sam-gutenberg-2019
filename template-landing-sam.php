<?php
/**
 * Template Name: Landing SAM
 *
 * @package WordPress
 * @subpackage SkillsAndMore
 */

/**
 *  Add custom bodyclass.
 *
 * @param array $classes La nuova classe per l'elemento body.
 */
function sam_wrapper_class( $classes ) {
	$classes[] = 'landing-page-sam';
	return $classes;
}
add_filter( 'body_class', 'sam_wrapper_class' );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

remove_action( 'genesis_header_right', 'genesis_do_nav' );

genesis();
