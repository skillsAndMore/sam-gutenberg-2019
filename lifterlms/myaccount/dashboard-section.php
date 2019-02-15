<?php
/**
 * Section template for dashboard index
 * @since    3.14.0
 * @version  3.14.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

?>

<section class="llms-sd-section <?php echo $slug; ?>">

	<?php do_action( 'lifterlms_before_' . $action ); ?>

	<?php echo $content; ?>

	<?php if ( $more ) : ?>
		<footer class="llms-sd-section-footer">
			<a class="llms-button-secondary" href="<?php echo esc_url( $more['url'] ); ?>"><?php echo $more['text']; ?></a>
		</footer>
	<?php endif; ?>

	<?php do_action( 'lifterlms_before_' . $action ); ?>

</section>
