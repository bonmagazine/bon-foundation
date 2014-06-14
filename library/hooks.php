<?php

// Modify the loop before query is made
add_action('pre_get_posts','bon_se_film_hook');
add_action('pre_get_posts','bonbon_hook');


// Add query variable vid and embed to allowed list (for embed videos)
function add_query_vars_filter( $vars ){
  $vars[] = "vid";
  $vars[] = "embed";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


// Modify body class
add_filter('body_class','bon_body_class');
function bon_body_class($classes) {
  // Check if there's an active overlay campaign, and if so activate it
  $overlay = bon_get_campaign();
  if($overlay) {
    $classes[] = 'campaign-active';
  }
  return $classes;
}


?>