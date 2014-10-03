<?php

/*
 *  Custom URL structure for Bon Blogs
 *
 *
 **/

function bon_blogs_rewrite() {

  // Bon Blog Pages
  add_rewrite_rule('^blogs/([^/]*)/pages/([^/]*)/?',
                   'index.php?author_name=$matches[1]&name=$matches[2]&post_type=bon_blogs_pages',
                   'top');

  // Bon Blog Stream paged
  add_rewrite_rule('^blogs/([^/]*)/page/([^/]*)/?',
                   'index.php?author_name=$matches[1]&post_type=bon_blogs&paged=$matches[2]',
                   'top');

  // Bon Blog Tag Paged
  add_rewrite_rule('^blogs/tag/([^/]*)/page/([^/]*)/?',
                   'index.php?bon_blogs_tag=$matches[1]&post_type=bon_blogs&paged=$matches[2]',
                   'top');

  // Bon Blog Yearly Archive 
  add_rewrite_rule('^blogs/([^/]*)/archive/?',
                   'index.php?author_name=$matches[1]&post_type=bon_blogs&yearly=1',
                   'top');

  // Bon Blog Tag front page
  add_rewrite_rule('^blogs/tag/([^/]*)/?',
                   'index.php?bon_blogs_tag=$matches[1]&post_type=bon_blogs',
                   'top');

  // Bon Blog Article
  add_rewrite_rule('^blogs/([^/]*)/([^/]*)/?',
                   'index.php?author_name=$matches[1]&name=$matches[2]&post_type=bon_blogs',
                   'top');

  // Bon Blog homepage
  add_rewrite_rule('^blogs/([^/]*)/?',
                   'index.php?author_name=$matches[1]&post_type=bon_blogs',
                   'top');
}
add_action('init', 'bon_blogs_rewrite');


function bon_blogs_add_author( $url, $post = null, $leavename = false ) {
  if ( preg_match("/bon_blogs/i", get_post_type( $post ) ) ) {

    $tag = '%author%';
    $author = get_the_author_meta( 'user_nicename', $post->post_author );

    return str_replace($tag, $author, $url);
  }
  return $url;
}
add_filter( 'post_type_link', 'bon_blogs_add_author', 1, 3 );
