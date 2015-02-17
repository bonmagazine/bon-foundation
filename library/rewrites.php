<?php

/*
 *  Custom URL structures
 *
 *
 **/

function bon_rewrites() {

  ////////////////////////////////
  // BON BLOGS                  //
  ////////////////////////////////

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

  ////////////////////////////////
  // oEmbed                     //
  ////////////////////////////////
  add_rewrite_rule('^oembed?url=([^/]*)',
                   'index.php?pagename=oembed&url=$matches[1]',
                   'top');
}
add_action('init', 'bon_rewrites');

function bon_query_vars( $query_vars ){
    $query_vars[] = 'url'; // for oEmbed
    return $query_vars;
}
add_filter( 'query_vars', 'bon_query_vars' );

// create oEmbed page
if( !get_page_by_title('oembed') ){
  $page['post_type']    = 'page';
  $page['post_parent']  = 0;
  $page['post_content']  = '';
  $page['post_status']  = 'publish';
  $page['post_title']   = 'oembed';
  $page_id = wp_insert_post($page);
}

function bon_custom_post_permalink( $url, $post = null, $leavename = false ) {

  // BON BLOGS
  if ( preg_match("/bon_blogs/i", get_post_type( $post ) ) ) {
    $tag = '%author%';
    $author = get_the_author_meta( 'user_nicename', $post->post_author );

    $url = str_replace($tag, $author, $url);
  }
  
  // BON ISSUES
  elseif ( $post->post_type == 'bon_issues_posts' ) {
    $tag = '%bon_issues%';
    $issue = bon_get_bon_issue($post->ID, 'slug');
    $issue_slug = $issue? $issue : $tag;
    $url = str_replace($tag, $issue_slug, $url);
  }

  return $url;
}
add_filter( 'post_type_link', 'bon_custom_post_permalink', 1, 3 );
