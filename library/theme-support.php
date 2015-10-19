<?php
function bon_theme_support() {
    // Add language support
    load_theme_textdomain('bon', get_template_directory() . '/languages');

    // Add menu support
    add_theme_support('menus');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 300 );
    update_option('medium_size_w', 680);
    update_option('medium_size_h', 1000);
    update_option('large_size_w', 800);
    update_option('large_size_h', 1200);

    // New image sizes
    add_image_size('cover-big', 780, 9999); // Front Cover Big image
    add_image_size('cover-medium', 460, 9999); // Front Cover Medium
    add_image_size('tb', 300, 9999); // Thumbnails
    add_image_size('xxx-large', 1600, 1600); // Large fullscreen images

    // Image sizes 
    add_image_size('blog-header', 1000, 240, 1);
    add_image_size('square-thumbnail', 48, 48, 1);

    // Deprecated
    // add_image_size('big-cover-image', 540, 9999); // 7 columns wide, no height limit
    // add_image_size('big-cover-image-portrait', 380, 9999); // 5 columns wide, no height limit
    // add_image_size('small-cover-image', 220, 154, 1); // 3 columns wide, 7 baselines high, cropped
    // add_image_size('small-thumbnail', 220, 9999); // 3 columns wide, no height limit

    // Old image sizes?
    // add_image_size('post-article', 706);
    // add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
    // add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)

    // rss thingy
    add_theme_support('automatic-feed-links');

}

add_action('after_setup_theme', 'bon_theme_support'); 


function bon_add_base_post_data(&$post) {
  $post->post_author_name = $post->author->name;
  $post->post_nice_date = strftime("%A, %e %B, %Y", strtotime($post->date));
  $post->fields = (object) get_fields();
  $post->small_thumbnail = get_the_post_thumbnail($post->id, 'small-thumbnail');
}
?>