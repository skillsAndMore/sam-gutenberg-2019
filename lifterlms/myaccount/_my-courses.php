<?php
/**
 * My Courses List
 * Used in My Account and My Courses shortcodes
 *
 * @version  3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $wp_query;
?>

<div class="llms-sd-section llms-my-courses">
	<h3 class="llms-sd-section-title"><?php echo apply_filters( 'lifterlms_my_courses_title', __( 'Courses In-Progress', 'lifterlms' ) ); ?></h3>

	<?php if ( ! $courses ) : ?>
		<p><?php _e( 'You are not enrolled in any courses.', 'lifterlms' ); ?></p>
	<?php else : ?>
		<ul class="listing-courses">
			<?php foreach ( $courses['results'] as $c ) : $c = new LLMS_Course( $c ); ?>
				<li class="course-item">
				    <article class="course">

					    <section class="info">
						    <div class="course-image llms-image-thumb effect">
						    	<?php echo lifterlms_get_featured_image( $c->get_id() ); ?> 
							</div>

							<div class="meta">

								<h3><?php echo $c->get_title(); ?>Ciao</h3>
								<?php if ( 'yes' === get_option( 'lifterlms_course_display_author' ) ) : ?>
									<p class="author"><?php printf( __( 'Author: %s', 'lifterlms' ), '<span>' . $c->get_author_name() . '</span>' ); ?></p>
								<?php endif; ?>
							</div>
							<div>
								<a href="<?php echo $c->get_permalink(); ?>" class="btn gray"><?php echo apply_filters( 'lifterlms_my_courses_course_button_text', __( 'View Course', 'lifterlms' ) ); ?></a>
							</div>

                            <?php echo apply_filters('lifterlms_my_courses_start_date_html',
                                '<p>' .  __( 'Course Started','lifterlms' ) . ' - ' . $student->get_enrollment_date( $c->get_id(), 'enrolled' ) . '</p>'
                            ); ?>
						</section>
                        <div class="llms-progress">
                            <?php $progress = $c->get_percent_complete( $student->get_id() ); ?>
                            <div class="progress__indicator"><?php printf( __( '%s%%', 'lifterlms' ), $progress ); ?></div>
                            <div class="llms-progress-bar">
                                <div class="progress-bar-complete" style="width:<?php echo $progress ?>%"></div>
                            </div>
                        </div>
					</article>
				</li>

			<?php endforeach; ?>
		</ul>

		<footer class="llms-sd-pagination llms-my-courses-pagination">
			<?php if ( isset( $wp_query->query_vars['my-courses'] ) ) : ?>
				<?php if ( $courses['skip'] > 0 ) : ?>
					<a class="llms-button-text" href="<?php echo add_query_arg( array(
						'limit' => $courses['limit'],
						'skip' => $courses['skip'] - $courses['limit'],
					), llms_person_my_courses_url() ); ?>"><?php _e( 'Back', 'lifterlms' ); ?></a>
				<?php endif; ?>

				<?php if ( $courses['more'] ) : ?>
					<a class="llms-button-text" href="<?php echo add_query_arg( array(
						'limit' => $courses['limit'],
						'skip' => $courses['skip'] + $courses['limit'],
					), llms_person_my_courses_url() ); ?>"><?php _e( 'Next', 'lifterlms' ); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</footer>

	<?php endif; ?>
</div>
