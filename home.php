<?php
/*
  Questa e' la pagina dedicata per la lista degli articoli.
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title', 10 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta', 10 );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  ?>
  <div class="header-intro">
      <div class="wrap">
          <h1>Gli articoli di SkillsAndMore</h1>
          <?php if ( 1 == $paged ) : ?>
            <p>All'interno di questo portale pubblichiamo molti articoli per aiutarti a crescere velocemente. Se hai qualcosa di specifico in mente, sfrutta il campo di ricerca qua sotto.</p>
            <?php get_search_form(); ?>
          <?php endif; ?>
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
