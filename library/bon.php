<?php

/**
 * A fallback when no navigation is selected by default.
 */
function bon_menu_fallback() {
    echo '<div class="alert-box secondary">';
    // Translators 1: Link to Menus, 2: Link to Customize
    printf( __( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'bon' ),
        sprintf(  __( '<a href="%s">Menus</a>', 'bon' ),
            get_admin_url( get_current_blog_id(), 'nav-menus.php' )
        ),
        sprintf(  __( '<a href="%s">Customize</a>', 'bon' ),
            get_admin_url( get_current_blog_id(), 'customize.php' )
        )
    );
    echo '</div>';
}

// Add Foundation 'active' class for the current menu item
function bon_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'bon_active_nav_class', 10, 2 );

/**
 * Use the active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch
 */
function bon_active_list_pages_class( $input ) {

    $pattern = '/current_page_item/';
    $replace = 'current_page_item active';

    $output = preg_replace( $pattern, $replace, $input );

    return $output;
}
add_filter( 'wp_list_pages', 'bon_active_list_pages_class', 10, 2 );


/**
 * Replace default gallery with Foundation Orbit Slider
 */
function orbit_slider($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need

    $output = "<ul data-orbit data-options='timer_speed:0;timer:false;'>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<li>\n";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
        $output .= "</li>\n";
    }

    $output .= "</ul>\n";

    return $output;
}
add_filter('post_gallery', 'orbit_slider', 10, 2);




/*
 * Campaigns
 * $type can be: top-banner, article-top-banner, article-insert, overlay
 */

function bon_get_campaign($type = 'overlay') {
  $campaign_args = array(
    'post_type' => 'bon_campaigns',
    'posts_per_page' => '1',
    'orderby' => 'meta_value',
    'meta_key' => 'end_date',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'Ad_placement',
            'value' => $type
            ),
        array(
            'key' => 'end_date',
            'value' => date("Y-m-d"),
            'compare' => '>=',
            'type' => 'NUMERIC'
            )
        )
    );
  return get_posts($campaign_args);
}

?>