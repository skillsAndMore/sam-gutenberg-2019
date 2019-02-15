<?php

/**
 * Template Name: Big Title
 *
 * @package WordPress
 * @subpackage SkillsAndMore
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
    ?>
    <div class="header-intro">
        <div class="wrap">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <?php
}


genesis();
