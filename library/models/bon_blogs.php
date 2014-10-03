<?php 

function bon_the_bon_blog_header_image() {
  $imageId = get_the_author_meta( 'bon_blog_header_image_id' );
  $headerImage = wp_get_attachment_image_src( $imageId, 'blog-header' );
  echo $headerImage[0];
}

function bon_the_bon_blog_title() {
  echo get_the_author_meta( 'bon_blog_title' );
}

function bon_the_bon_blog_subtitle() {
  echo get_the_author_meta( 'bon_blog_subtitle' );
}

function bon_the_bon_blog_stylesheet() {
  echo get_the_author_meta( 'bon_blog_style_box' );
}

function bon_the_bon_blog_about_url() {
  echo get_permalink( get_the_author_meta( 'about_page_id' ) );
}

function bon_the_bon_blog_url() {
  echo "/blogs/". get_the_author_meta('user_nicename');
}

function bon_get_bon_blog_posts_by_date($author_ID) {

  $bon_blog_posts_args = array(
    'post_type' => 'bon_blogs',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'author' => $author_ID
   );
  $collection = get_posts($bon_blog_posts_args);

  $results = array();

  // Loop through years, starting with present
  for($year=date('Y'); $year>2012; $year--):
    // Loop through months
    for($month=12; $month>0; $month--):
      // Loop through posts and compare to current year/month
      foreach ( $collection as $post ):
        // Continue unless months and years match
        $post_year = date('Y', strtotime( $post->post_date ));
        $post_month = date('n', strtotime( $post->post_date ));
        if ( $post_year != $year || $post_month != $month ) continue;
        $results[$year][$month][] = $post;
      endforeach;
    endfor;
  endfor;

  return $results;
}

// Hook for yearly archive query
function bon_blogs_yearly_archive_hook($query) {

  // Retrieve all posts organised by year and month
  // !is_admin() prevents the backend query being modified
  if ( $query->is_main_query()
    && get_query_var('yearly') == 1
    && !is_admin()
    ) {
      $query->set( 'posts_per_page', -1 );
      return;
  }

}

?>