<?php

if (!function_exists('bon_scripts')) :
  function bon_scripts() {

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    // enqueue modernizr, jquery and foundation
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.js', array(), '1.0.0', false );

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery/jquery.min.js', array(), '1.0.0', false );

    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/bower_components/foundation/js/foundation/foundation.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/bower_components/foundation/js/foundation/foundation.dropdown.js', array('foundation'), '1.0.0', true );

    wp_enqueue_script( 'top-bar', get_template_directory_uri() . '/bower_components/foundation/js/foundation/foundation.topbar.js', array('foundation'), '1.0.0', true );

    wp_enqueue_script( 'offcanvas', get_template_directory_uri() . '/bower_components/foundation/js/foundation/foundation.offcanvas.js', array('foundation'), '1.0.0', true );

    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/bower_components/foundation/js/foundation/foundation.dropdown.js', array('foundation'), '1.0.0', true );

    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/bower_components/masonry/dist/masonry.pkgd.min.js', '', '1.0.0', true );

    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/bower_components/jquery-waypoints/waypoints.min.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'infinitescroll', get_template_directory_uri() . '/js/infinitescroll/infinitescroll.js', array('waypoints'), '1.0.0', true );

    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.min.js', array('waypoints'), '1.0.0', true );

    // wp_enqueue_script( 'infinitescroll', get_template_directory_uri() . '/js/infinitescroll/infinitescroll.min.js', array('jquery'), '1.0.0', true );

    // wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky/jquery.sticky.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'jwplayer', get_template_directory_uri().'/js/jwplayer/jwplayer.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'videoplayer', get_template_directory_uri() . '/js/videoplayer/videoplayer.js', array('jquery'), '1.0.0', true );


    wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array('foundation'), '1.0.0', true );

  }

  add_action( 'wp_enqueue_scripts', 'bon_scripts' );
endif;

?>