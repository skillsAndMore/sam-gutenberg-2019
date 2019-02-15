<?php


remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
    ?>
    <div class="header-intro">
        <div class="wrap">
            <h1>Pagina termine: <?php the_title(); ?></h1>
        </div>
    </div>
    <?php
}

add_action( 'genesis_before_footer', 'sam_display_post_course_archive', 5 );

if( !is_user_logged_in() ) {
    add_action('genesis_before_footer', 'sam_testimonials', 4);

    add_action( 'genesis_before_footer', 'sam_price_table', 6 );
}


genesis();
