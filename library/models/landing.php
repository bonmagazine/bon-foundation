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

// Query Posters
function bon_get_poster_posts() {
  $poster_args = array(
    'post_type' => 'bon_posters',
    'posts_per_page' => -1, 
    'language' => 'SE',
    'meta_key' => 'end_date',
    'meta_value' => date("Y/m/d h:i A"),
    'meta_compare' => '>',
    'orderby' => 'date',
    'order' => 'DESC'
   );
  return get_posts($poster_args); 
}

function bon_get_cover_posts() {
  $cover_args = array(
    'category_name' => 'cover',
    'posts_per_page' => 10
   );
  return get_posts($cover_args); 
}