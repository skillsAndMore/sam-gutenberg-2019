<?php

/**
 * Template Name: Pagina FAQ
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

add_action( 'genesis_entry_content', 'sam_mostra_faq', 11 );
function sam_mostra_faq(){
    $entries = get_post_meta( get_the_ID(), '_faq_domande', true );
    ?>
    <ul class="accordion">
    <?php
    foreach ( (array) $entries as $key => $entry ) {
        ?>
        <li>
            <input type="checkbox" checked>
            <i></i>
            <h3><?php echo $entry['domanda']; ?></h3>
            <div class="faq-content"><?php echo wpautop( $entry['risposta'] ); ?></div>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
}



genesis();
