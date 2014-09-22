<?php

/**
 *
 * Filters for output content
 *
 */

// Clean up image tags and use figure el
function bon_html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
    $image_src = wp_get_attachment_image_src($id, $size);
    $html5 = "<figure id='post-$id media-$id' class='figure-in-hentry align-$align size-$size'>";
    $html5 .= "<img src='$image_src[0]' alt='$title' class='size-$size' />";
    if($caption) $html5 .= "<figcaption>$caption</figcaption>";
    $html5 .= "</figure>";
    return $html5;
}
add_filter( 'image_send_to_editor', 'bon_html5_insert_image', 10, 9 );


// Register the html5 figure-non-responsive code fix.
function bon_img_caption_shortcode_filter($dummy, $attr, $content) {
  $atts = shortcode_atts( array(
      'id'      => '',
      'align'   => 'alignnone',
      'width'   => '',
      'caption' => '',
      'class'   => '',
    ), $attr, 'caption' );

  $atts['width'] = (int) $atts['width'];
  if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
      return $content;

  if ( ! empty( $atts['id'] ) )
      $atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';

  $class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

  return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
      . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';

  // Return nothing to allow for default behaviour!!!
  return '';
}
add_filter( 'img_caption_shortcode', 'bon_img_caption_shortcode_filter', 10, 3 );
