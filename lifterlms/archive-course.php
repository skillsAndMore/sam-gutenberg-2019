<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){ ?>
    <div class="header-intro">
        <div class="wrap">
            <h1><?php lifterlms_page_title(); ?></h1>
        </div>
    </div>
	<?php
}

if( is_tax() ){
    add_action( 'lifterlms_archive_description', 'sam_tax_desc' );
    function sam_tax_desc(){
        $term = is_tax() ? get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ) : $wp_query->get_queried_object();

        if ( $intro_text = get_term_meta( $term->term_id, 'intro_text', true ) )
            $intro_text = apply_filters( 'genesis_term_intro_text_output', $intro_text );
        ?>
            <div class="course-desc">
                <?php echo $intro_text; ?>
            </div>
		<?php
    }

}

remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_difficulty', 20 );

add_action( 'genesis_before_footer', 'sam_price_table', 4 );

add_action( 'genesis_before_footer', 'sam_display_post_course_archive', 5 );

if( !is_user_logged_in() ) {
    add_action('genesis_before_footer', 'sam_testimonials', 6);
}

llms_get_template( 'loop.php' );

