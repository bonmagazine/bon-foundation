<?php

// Register oEmbed providers
function bon_oembed_provider() {
  wp_oembed_add_provider( 'http://bon.se/*', 'http://bon.se/oembed', false );
}
add_action( 'init', 'bon_oembed_provider' );

// Wrap oEmbeds in flex video divs
function bon_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<figure class="flex-video">' . $html . '</figure>';
}
add_filter('embed_oembed_html', 'bon_embed_oembed_html', 99, 4);
