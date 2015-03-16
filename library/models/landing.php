<?php

/*
 * Front Page template
 *
 */

// Returns the front page template class from the custom field
function the_cover_template_class() {
    return "front-page-template-".get_post_meta( get_the_ID(), 'front_page_template', true );
}

// Returns the front page image size
function the_cover_thumbail() {
    $template = get_post_meta( get_the_ID(), 'front_page_template', true );
    switch ($template) {
        case 1:
        case 2:
            $image_size = 'cover-medium';
            break;
        case 4:
        case 5:
            $image_size = 'cover-big';
            break;
        case 3:
        default:
            $image_size = '';
            break;
    }
    return the_post_thumbnail($image_size);
}


function bon_get_cover_posts() {
  $cover_args = array(
    'category_name' => 'cover',
    'posts_per_page' => -1,
    'meta_key' => 'bon_cover_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
   );
  return get_posts($cover_args); 
}

function bon_get_posters() {
  $cover_args = array(
    'category_name' => 'poster',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
   );
  return get_posts($cover_args); 
}


function bon_get_bonbons_for_cover() {
  $cover_args = array(
    'post_type' => 'bon_minimagazine',
    'posts_per_page' => 4, 
    'orderby' => 'date',
    'post_parent'=> 0,
    'order' => 'DESC',
   );
  return get_posts($cover_args); 
}

// Hook for main query
function bon_landing_hook($query) {

  // Prevent posts in cover from appearing in main loop
  // !is_admin() prevents the backend query being modified
  if ( is_home() 
    && $query->is_main_query() 
    && !is_admin() 
    ) {
      $cover_cat_ID = get_cat_ID( 'cover' );
      $query->set( 'category__not_in', array($cover_cat_ID) );
      return;
  }

}
