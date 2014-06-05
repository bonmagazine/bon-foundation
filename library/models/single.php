<?php 

// Get Related Posts from same author
function bon_get_author_posts($number_of_posts = 6){
  global $authordata, $post;

  $args = array( 'post_type' => 'post'
                ,'posts_per_page' => $number_of_posts
                ,'author' => $authordata->ID
                ,'post__not_in' => array( $post->ID )
                );
  
  return get_posts( $args );
}