<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
    $current_user = wp_get_current_user();
    if( is_user_logged_in() ):
    ?>
    <div class="header-intro">
        <div class="wrap">
            <?php echo get_avatar( $current_user->ID ); ?>
            <h1><?php echo "La bacheca di $current_user->user_firstname"; ?></h1>
        </div>
    </div>

    <?php else: ?>

        <div class="header-intro">
            <div class="wrap">
                <h1>Recupera la tua password</h1>
            </div>
        </div>

    <?php
    endif;
}

// Remove elements not used
remove_action( 'lifterlms_before_loop_item', 'lifterlms_loop_featured_video', 8  );

remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_author', 10 );
remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_length', 15 );
remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_difficulty', 20 );
remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_enroll_status', 25 );
remove_action( 'lifterlms_after_loop_item_title', 'lifterlms_template_loop_enroll_date', 30 );

genesis();
