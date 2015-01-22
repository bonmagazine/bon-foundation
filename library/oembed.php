<?php

// Register oEmbed providers
function bon_oembed_provider() {
  wp_oembed_add_provider( 'bon.se', 'http://bon.se/oembed*', false );
  wp_oembed_add_provider( 'bon.dev', 'http://bon.dev/oembed*', false );
}

// Hook into the 'init' action
add_action( 'init', 'bon_oembed_provider' );