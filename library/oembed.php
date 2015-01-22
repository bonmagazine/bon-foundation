<?php

// Register oEmbed providers
function bon_oembed_provider() {
  wp_oembed_add_provider( 'http://bon.se', 'http://bon.se/oembed*', false );
}

// Hook into the 'init' action
add_action( 'init', 'bon_oembed_provider' );