<?php

function bon_register_menus() {

  $menus = array(
    'main-menu' => __( 'Main Menu' ),
    'bonblogs-menu' => __( 'Bon Blogs Menu' )
  );

  $blogusers = get_users( 'role=bon_blogger' );
  // Array of WP_User objects.
  foreach ( $blogusers as $user ) {
    $menus['bon-blog-menu-'.$user->display_name] = 'Bon blog Menu for '.$user->display_name;
  }

  register_nav_menus( $menus );
}
add_action( 'init', 'bon_register_menus' );

?>