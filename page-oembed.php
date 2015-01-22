<?php
$url = get_query_var( 'url' ); 
$post_ID = url_to_postid( $url );
$post = get_post( $post_ID );
setup_postdata( $post ); 

$json = array(
      "version" => "1.0",
      "type" => "video",
      "provider_name" => "Bon",
      "provider_url" => "http://bon.se/",
      "width" => 480,
      "height" => 270,
      "title" => get_the_title(),
      "html" =>
        "<iframe src=\"".bon_get_film_share_url()."\" width=\"480\" height=\"270\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowfullscreen><iframe/>"
  );

wp_send_json($json);