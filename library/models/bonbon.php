<?php

function bonbon_hook($query) {

  // Prevent child pages from being displayed
  // !is_admin() prevents the backend query being modified
  if ( is_post_type_archive( 'bon_minimagazine' ) 
    && is_main_query() 
    && !is_admin() 
    && !$query->query['post_parent']
    ) {
      $query->set( 'post_parent', 0 );
      return;
  }

}

function bon_get_bonbon_children_pages() {
  $bonbon_args = array(
    'post_type'=>'bon_minimagazine', 
    'post_parent'=> get_the_ID(), 
    'orderby'=>'menu_order date', 
    'order'=>'ASC', 
    'posts_per_page'=>-1
    );
  return get_posts($bonbon_args);
}