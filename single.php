<?php

/* Aggiungo thumbnail */
add_action( 'genesis_before_entry', 'featured_post_image', 8 );
function featured_post_image() {
	the_post_thumbnail('post-image');
}

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_before_entry', 'sam_do_post_title', 7);
function sam_do_post_title(){
    $titolo = get_the_title();
    $url = get_the_permalink();
    echo "<h1 class='entry-title'><a href='$url'>$titolo</a></h1>";
}

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_footer', 'genesis_post_info', 8 );

//* Modifico le informazioni nelle post info
add_filter( 'genesis_post_info', 'sam_post_info_filter' );
function sam_post_info_filter($post_info) {

        $post_info = 'Pubblicato il [post_date] [post_comments]';
        return $post_info;
}

add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_action( 'genesis_before_comments', 'sam_related_post' );
function sam_related_post(){
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        echo do_shortcode( '[jetpack-related-posts]' );
    }
}

add_action( 'genesis_after_entry', 'sam_price_table', 4 );

genesis();
