<?php
/*
  In questa pagina personalizzo i risultati di ricerca ottenuti
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title', 10 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta', 10 );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
    ?>
    <div class="header-intro">
        <div class="wrap">
            <h1>Hai cercato per: "<?php the_search_query(); ?>"</h1>
        </div>
    </div>
    <?php
}

add_action( 'genesis_entry_footer', 'sam_read_more' );
function sam_read_more(){
    ?>
        <a href="<?php the_permalink(); ?>" class="btn gray">Continua a leggere</a>
    <?php
}
genesis();
