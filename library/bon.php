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
    $format = get_post_format();
    if ( false === $format ) $format = 'standard';

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

// old output    $output = "<ul data-orbit class='slick-orbit' data-options='timer_speed:0;timer:false;'>\n";
    if ( $format != 'gallery' ) $output = "<div class='slick-orbit'>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'large');
        $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
		$caption = $attachment->post_excerpt;


        if ( $format != 'gallery' ) $output .= "<div>\n";
        
		$output .= "<figure class='figure-in-hentry'>";
        $imgtag = "<img src=\"{$img[0]}\" />";
        $imgtag = bon_the_post_video_thumbnail_html( $imgtag, $attachment->ID  );
        $output .= $imgtag;
        $output .= "\n<figcaption>".$caption."</figcaption>";
        $output .= "</figure>";
        
        if ( $format != 'gallery' ) $output .= "</div>\n";
    }

    if ( $format != 'gallery' ) $output .= "</div>\n";

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
    'order' => 'meta_value_num',
    'meta_query' => array(
        array(
            'key' => 'Ad_placement',
            'value' => $type
            ),
        array(
            'key' => 'end_date',
            'value' => current_time( 'mysql' ),
            'compare' => '>=',
            'type' => 'date'
            )
        )
    );
  return get_posts($campaign_args);
}


/* 
 * Skin
 * Return the skin data: image url and background colour
 */

function bon_get_skin() {

    $skin_args = 'post_type=bon_skin&posts_per_page=1';
    $skin_post = get_posts($skin_args);
    foreach ($skin_post as $post): setup_postdata( $post );
        $image_id = get_post_meta( $post->ID, 'background', true );
        $image_url = wp_get_attachment_url( $image_id );
        $background_colour = get_post_meta( $post->ID, 'background_colour', true );
    endforeach; wp_reset_postdata();

    $skin = '<style>
    body {
      background-image: url('.$image_url.');
      background-color: '.$background_colour.';
      background-attachment:fixed;
    }
    </style>';
    echo $skin;
}

/*
 * Add line breaks to excerpts
 *		
 */


/*
 *	Filter to check for and add videos in lieu of featured images.
    Based on http://premium.wpmudev.org/blog/add-drama-wordpress-posts-video-for-featured-images/
 */

function bon_the_post_video_thumbnail_html( $html  , $post_thumbnail_id  ) {
	
	if ( wp_is_mobile() ) return $html;
	global $is_chrome;
		
	/* get the basic url, width and height of the featured image */
	$fi_attr = wp_get_attachment_image_src ( $post_thumbnail_id , 'full' );
	
	/* get the original url - we need this to search for the video */	
	$fi_url = wp_get_attachment_url ( $post_thumbnail_id );
	
	/* work out the name */
	$fi_url_exploded = explode( '/' , $fi_url );
	$fi_name = $fi_url_exploded[ count( $fi_url_exploded ) - 1 ];
	$fi_name_exploded = explode( '.' , $fi_name );
	$fi_filename = $fi_name_exploded[0];

	/* now search the medial library for any matches */
	$args = array( 'post_type' => 'attachment' , 'post_status' => 'inherit' ,
				'meta_query' => array(
					array(
						'key' => '_wp_attached_file',
						'value' => $fi_name_exploded[0] . '.',
						'compare' => 'LIKE'
					)
				));
				
	$query = new WP_Query( $args );
	$thequery = "Last SQL-Query: {$query->request}";
	$found = count( $query->posts );
	
	/* Will always find featured image so we need more than one match */
	if ($found > 1) {
	
		$new_html = '';
		
		/* loop through the matches and process those with a video mime type */	
		foreach( $query->posts AS $attach ){
		
			if ( substr( $attach->post_mime_type , 0 , 5 ) == 'video' ) {
		
				if ( $new_html == '') {
				
					$controls = ( $is_chrome == true ) ? 'controls' : '';
				
					$new_html = '<video class="featuredvideo" ' . $controls . ' autoplay preload loop poster="' . $fi_attr[0] . '">';
				}
				
				$new_html .= '<source class="' . $sourceclass . '" src="' . $attach->guid . '" type="' . $attach->post_mime_type . '">';
			
			} 	

		}
		
		/* if video files were found then update the html */
		if ( $new_html != '' ) $html = $new_html . $html . '</video>';
		
	}
	return $html;
}


?>