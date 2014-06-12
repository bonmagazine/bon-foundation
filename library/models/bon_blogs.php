<?php 

function bon_the_bon_blog_header_image() {
  $imageId = get_the_author_meta( 'bon_blog_header_image_id' );
  $headerImage = wp_get_attachment_image( $imageId, 'blog-header' );
  echo $headerImage;
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

?>