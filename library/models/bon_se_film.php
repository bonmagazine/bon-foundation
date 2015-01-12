<?php 
/* 
 * Modify the Bon se Film loop
 */ 

function bon_se_film_hook($query) {

  // Prevent child pages from being displayed
  // !is_admin() prevents the backend query being modified
  if ( is_post_type_archive( 'bon_se_film' ) 
    && is_main_query() 
    && !is_admin() 
    && !$query->query['post_parent']
    ) {
      $query->set( 'post_parent', 0 );
      return;
  }

}

function the_first_child_permalink() {
  $first_child_args = array(
    'post_type' => get_post_type(),
    'post_parent' => get_the_ID(),
    'posts_per_page'=> 1
    );
  $qry = get_posts( $first_child_args );
  $permalink = get_permalink( $qry[0]->ID ); 

  echo $permalink;
}

function bon_get_sibling_posts($post_type, $post_parent, $post_ID) {
  $sibling_args = array(
    'post_type'    => $post_type,
    'post_parent' => $post_parent,
    'exclude' => $post_ID,
    'posts_per_page'=>-1
    );
  return get_posts( $sibling_args );
}

function bon_get_film_skin() {
  $skin = (get_post_meta( get_the_ID(), 'skin', true ))? get_post_meta( get_the_ID(), 'skin', true ) : 'bon';
  return $skin;
}

function bon_convert_to_protocol_relative($url) {
  $protocol_relative_url = str_replace('http://','//',$url);
  $protocol_relative_url = str_replace('https://','//',$protocol_relative_url);
  return $protocol_relative_url;
}

function bon_get_film_src() {
  $src = get_post_meta( get_the_ID(), 'src', true );
  return $src; //bon_convert_to_protocol_relative($src);
}

function bon_the_film_base_src() {
  echo bon_get_film_src();
}

function bon_get_film_sources() {
  $sources = array();
  if(bon_get_film_type() == 'stream'){
    $sources = explode(", ", bon_get_film_src() );
  } else {
    $formats = array('.mp4','.webm');
    foreach ($formats as $ext) {
      $sources[] = bon_get_film_src().$ext;
    }
  }
  return $sources;
}

function bon_get_film_type() {
  if(preg_match("/m3u8|f4m/i", bon_get_film_src() )) {
    $type  = 'stream';
  } else { // VOD
    $type = 'video';
  }
  return $type; 
}

function bon_get_film_poster() {
  $poster = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'poster', true ), 'full' );
  return bon_convert_to_protocol_relative($poster[0]);
}

function bon_get_film_share_url() {
  $share_url = get_bloginfo('url').'/share?embed=video&vid='.get_the_ID();
  return $share_url;
}

function bon_get_film_release_date() {
  if( bon_get_film_field('release_date') ) {
    $release_date = new DateTime();
    $release_date->setTimestamp( bon_get_film_field('release_date') );
    // We want the date in the format 1 January 2014, 20:00
    $return_format = "j F Y, H:i";
    return $release_date->format($return_format ). " CET";
  }
}

function bon_get_film_time_to_release() {
  if( bon_get_film_field('release_date') ) {
    // Recorded date is in local time zone
    // We need to convert it to GMT to calculate 
    // time difference.
    $release_date_local_tz = new DateTime();
    $release_date_local_tz->setTimestamp( bon_get_film_field('release_date') );
    $release_date_gmt_string = get_gmt_from_date( $release_date_local_tz->format('Y-m-d H:i:s') );
    $release_date_gmt = new DateTime($release_date_gmt_string);

    $now = new DateTime('now');
    $diff = $release_date_gmt->getTimestamp() - $now->getTimestamp();
    // is it in the future?
    if( $diff > 0 ) {
      return $diff;
    }
  }
}

function bon_get_film_field($field) {
  $value = get_post_meta( get_the_ID(), $field, true );
  return $value;
}

?>