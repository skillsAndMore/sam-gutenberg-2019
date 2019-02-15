<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'sam_do_post_title' );
function sam_do_post_title(){
    $current_user = wp_get_current_user();
    ?>
    <div class="header-intro">
        <div class="wrap">
            <h1>Entra in SkillsAndMore</h1>
        </div>
    </div>
    <?php
}

genesis();
