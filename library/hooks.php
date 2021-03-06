<?php

// Modify the loop before query is made
add_action('pre_get_posts','bon_se_film_hook');
add_action('pre_get_posts','bonbon_hook');
add_action('pre_get_posts','bon_landing_hook');
add_action('pre_get_posts','bon_blogs_yearly_archive_hook');

function add_query_vars_filter( $vars ){
  // Add query variable vid and embed to allowed list (for embed videos)
  $vars[] = "vid";
  $vars[] = "embed";

  // Bon blog yearly archive
  $vars[] = "yearly";

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

// Add Feed link to Bon blogs
function bon_add_bon_blogs_feed() {
  if('bon_blogs' == get_post_type()) {
    echo '<link rel="alternate" type="application/rss+xml" title="RSS 2.0 Feed" href="'.get_bloginfo('rss2_url').'?author_name='.get_the_author_meta( 'user_nicename', $post->post_author ).'&post_type='.get_post_type().'" />'; 
  }
}
add_action('wp_head', 'bon_add_bon_blogs_feed');

// Add oEmbed links to film pages
function bon_add_oembed_links() {
  if('bon_se_film' == get_post_type()) {
    echo '<link href="/oembed?url='.urlencode( get_the_permalink() ).'" rel="alternate" type="application/json+oembed" />';
  }
}
add_action('wp_head', 'bon_add_oembed_links');

?>