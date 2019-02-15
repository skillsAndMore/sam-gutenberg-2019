<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
	?>
	<div class="header-intro">
		<div class="wrap">
			<h1>Diventa uno skillato!</h1>
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

//remove_action( 'lifterlms_single_course_after_summary', 'lifterlms_template_course_author',             40 );
//remove_action( 'lifterlms_single_course_after_summary', 'lifterlms_template_single_difficulty',         20 );
//add_action( 'lifterlms_single_course_after_summary', 'sam_template_single_difficulty',         20 );
//function sam_template_single_difficulty(){
//	global $course;
//	$difficulty = $course->get_difficulty();
//}

//* Aggiungo la lista dei corsi disponibili con la membership
add_action( 'genesis_after_entry_content', 'sam_show_membership_courses' );
function sam_show_membership_courses(){
    $args = array(
        'post_type' => 'course',
        'posts_per_page' => -1
    );

    $courses_loop = new WP_Query( $args );
    if( $courses_loop->have_posts() ):
        ?>
        <h2>Ecco i corsi che sbloccherai una volta iscritto alla nostra membership.</h2>
        <div class="courses">
            <div class="flex wrap">
                <?php
                while( $courses_loop->have_posts() ) : $courses_loop->the_post();
                    ?>
                    <div class="f-1-4" href="<?php the_permalink(); ?>">
                        <a href="<?php the_permalink(); ?>">    
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>

        </div>

        <?php
    endif;
    wp_reset_query();
}

//* Replico pricing table
//add_action( 'genesis_entry_footer', 'lifterlms_template_pricing_table', 4 );

//* Sezione eventi
add_action( 'genesis_entry_footer', 'sam_eventi', 14 );
function sam_eventi(){
    $post_eventi = get_post(17378);
    $content =  apply_filters( 'the_content', $post_eventi->post_content );
    ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php echo $post_eventi->post_title; ?></h1>
        </header>

        <div class="entry-content">
            <?php echo $content; ?>
        </div>
    <?php
}

//* Sezione testimonials

add_action( 'genesis_after_entry', 'sam_testimonials_markup_open', 1 );
function sam_testimonials_markup_open(){
    //Chiudo main, div.content-sidebar-wrap, div.site-inner
    ?>
            </main>
        </div>
    </div>
    <?php
}

add_action( 'genesis_after_entry', 'sam_testimonials', 2 );

add_action( 'genesis_after_entry', 'sam_testimonials_markup_close', 3 );
function sam_testimonials_markup_close()
{
    //Apro main, div.content-sidebar-wrap, div.site-inner
    ?>
        <div class="site-inner">
            <div class="content-sidebar-wrap">
                <main class="content">
    <?php
}
//* Replico pricing table
//add_action( 'genesis_after_entry_content', 'lifterlms_template_pricing_table' );

//* Aggiungo la sezione dedicata ai testimonials
//add_action( 'genesis_before_footer', 'sam_testimonials', 1 );

add_action( 'genesis_after_entry', 'sam_forum', 4 );
function sam_forum(){
    $page_forum = get_post(17381);
    $page_forum_content =  apply_filters( 'the_content', $page_forum->post_content );
    ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php echo $page_forum->post_title; ?></h1>
        </header>
        <div class="entry-content">
            <?php echo $page_forum_content; ?>
        </div>
    <?php
}

//* Aggiungo CTA newsletter
add_action( 'genesis_after_loop', 'sam_cta_newsletter');
function sam_cta_newsletter(){
    ?>
        <p>Se ancora non ti senti pronto a fare un passo del genere lo capiamo perfettamente, <strong>ma non te ne andare!</strong></p>
        <p>Ti suggerisco di <a href="/newsletter">iscriverti alla nostra newsletter</a> e leggere gli articoli che gratuitamente pubblichiamo per aiutarti a conoscere le nuove tecnologie e metodi che ti aiuteranno nel tuo lavoro.</p>
    <?php
}

//* Aggiungo la sezione degli articoli
add_action( 'genesis_before_footer', 'sam_display_post_course_archive', 5 );

genesis();
