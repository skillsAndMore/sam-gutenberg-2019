<?php

//* Rimuovo la testata
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'sam_error_page' );
function sam_error_page(){
        $url_img = get_bloginfo( 'stylesheet_directory' );
    ?>
    <div class="not-found">
        <div class="bathroom">
            <img src="<?php echo $url_img; ?>/images/404-sam-bagno.png" alt="Non trovo il contenuto che stai cercando">
        </div>

        <h1>Mi sa che questa non &egrave; la pagina che stavi cercando...</h1>
        <a href="/" class="btn cta">Torna alla homepage</a>
    </div>
    <?php
}
//* Rimuovo il Footer
remove_action('genesis_footer', 'genesis_do_footer');
remove_action( 'genesis_footer', 'sam_footer_info', 9 );
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

genesis();
