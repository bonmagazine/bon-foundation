<?php
if(!function_exists('bon_entry_meta')) :
  function bon_the_entry_meta() {
    bon_the_entry_author();
    bon_the_entry_date();    
  }

  function bon_the_entry_date() {
    echo '<p class="date updated"><time datetime="'. get_the_time('c') .'" pubdate>'. get_the_date() .'</time></p>';
  }

  function bon_the_entry_author() {
    echo '<p class="byline author"><a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
  }
  function bon_get_the_entry_photographers() {
	  $terms = get_the_terms( $post->ID , 'bon_photographers' );
	  if ( count($terms) == 0 ) return;
	  $n = 1;
	  foreach ( $terms as $term ) {
	  	$photographer = $photographer . $term->name;
	  	if ( count($terms) > 0 && $n < count($terms) ) $photographer = $photographer . ", ";
	  	$n++;
  	  }
  	  return $photographer;	  
  }
  function bon_get_the_entry_stylists() {
	  $terms = get_the_terms( $post->ID , 'bon_stylists' );
	  if ( count($terms) == 0 ) return;
	  $n = 1;
	  foreach ( $terms as $term ) {
	  	$stylist = $stylist . $term->name;
	  	if ( count($terms) > 0 && $n < count($terms) ) $stylist = $stylist . ", ";
	  	$n++;
  	  }
  	  return $stylist;	  
  }

endif;
?>