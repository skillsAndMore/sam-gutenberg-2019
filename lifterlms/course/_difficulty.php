<?php
/**
 * Course difficulty template
 * @author 		LifterLMS
 * @package 	LifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post;

$course = new LLMS_Course( $post );

if ( ! $course->get_difficulty() ) {
	return;
}

$diff_class = strtolower( $course->get_difficulty() );
global $product;
$pricing_plans = $product->get_access_plans();
foreach ( $pricing_plans as $i => $p ){
	if( strpbrk($p->get_price( 'price' ), '1234567890') !== FALSE ){
		$price = $p->get_price( 'price' );
	}
//	echo "<pre>";
//	var_dump( $p->get_price( 'price' ) );
//	echo "</pre>";
}
?>

<div class="llms-meta llms-difficulty">
	<?php if( isset($price) && !is_course() ) : ?>

		<div class="price"><?php echo $price; ?></div>
	<?php endif; ?>
	<div><?php printf( __( '<div class="difficulty %s">%s</div>', 'lifterlms' ), $diff_class, $course->get_difficulty() ); ?></div>
</div>
