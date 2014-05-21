<?php

function bon_register_menus() {
  register_nav_menus(
    array(
        'main-menu' => __( 'Main Menu' ),
      'bonblogs-menu' => __( 'Bon Blogs Menu' )
    )
  );
}
add_action( 'init', 'bon_register_menus' );

?>