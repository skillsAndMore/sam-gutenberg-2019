<?php
/**
 * Generic loop template
 *
 * utilized by both courses and memberships
 *
 * @author 		LifterLMS
 * @package 	LifterLMS/Templates
 * @since       1.0.0
 * @version     3.0.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header( 'llms_loop' ); ?>

<?php do_action( 'lifterlms_before_main_content' ); ?>



<?php do_action( 'lifterlms_archive_description' ); ?>

<?php if ( have_posts() ) : ?>

	<?php
		/**
		 * lifterlms_before_loop hook
		 * @hooked lifterlms_loop_start - 10
		 */
		do_action( 'lifterlms_before_loop' );
	?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php llms_get_template_part( 'loop/content', get_post_type() ); ?>

	<?php endwhile; ?>

	<?php
		/**
		 * lifterlms_before_loop hook
		 * @hooked lifterlms_loop_end - 10
		 */
		do_action( 'lifterlms_after_loop' );
	?>
	<?php if( isset($price) ) : ?>

<div class="price"><?php echo $price; ?></div>
<?php endif; ?>

	<?php llms_get_template_part( 'loop/pagination' ); ?>

<?php else : ?>

	<?php llms_get_template( 'loop/none-found.php' ); ?>

<?php endif; ?>

<?php do_action( 'lifterlms_after_main_content' ); ?>

<?php do_action( 'lifterlms_sidebar' ); ?>

<?php get_footer(); ?>
