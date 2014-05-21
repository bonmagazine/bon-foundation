<?php

// Query Posters
function bon_query_posters() {
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
  query_posts($poster_args); 
}

function bon_query_cover() {
  $cover_args = array(
    'category_name' => 'cover',
    'posts_per_page' => 10
   );
  query_posts($cover_args); 
}