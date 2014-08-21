<?php

/*
 * Custom fields for bon_se_film
 *
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_film-data-se',
    'title' => 'Film Data SE',
    'fields' => array (
      array (
        'key' => 'field_5',
        'label' => 'Film Source URL',
        'name' => 'src',
        'type' => 'text',
        'instructions' => 'dont write file extension, ie: http://mysite.com/videos/videofile',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_6',
        'label' => 'Info',
        'name' => 'info',
        'type' => 'wysiwyg',
        'instructions' => 'This shows up when the user clicks on more info button',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
      array (
        'key' => 'field_7',
        'label' => 'Poster image',
        'name' => 'poster',
        'type' => 'file',
        'instructions' => 'This image shows before the film plays. Image size must be 854x480px.',
        'save_format' => 'object',
        'library' => 'all',
      ),
      array (
        'key' => 'field_8',
        'label' => 'Thumbnail',
        'name' => 'thumb',
        'type' => 'file',
        'instructions' => 'This is the thumbnail that shows below the video player. Image size must be 218x118px.',
        'save_format' => 'object',
        'library' => 'all',
      ),
      array (
        'key' => 'field_5214bbac60468',
        'label' => 'Video player skin',
        'name' => 'video_player_skin',
        'type' => 'select',
        'choices' => array (
          'bon' => 'bon',
          'plain' => 'plain',
        ),
        'default_value' => 'bon',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'field_52164f5ca6f43',
        'label' => 'Share',
        'name' => 'share',
        'type' => 'true_false',
        'message' => 'Display share buttons in videoplayer',
        'default_value' => 1,
      ),
      array (
        'key' => 'field_53f5d6e30adbb',
        'label' => 'autostart',
        'name' => 'autostart',
        'type' => 'true_false',
        'message' => 'Autoplay video on load',
        'default_value' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'bon_se_film',
          'order_no' => 0,
          'group_no' => 0,
        ),
        array (
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'child',
          'order_no' => 1,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'custom_fields',
        1 => 'discussion',
        2 => 'comments',
        3 => 'slug',
        4 => 'send-trackbacks',
      ),
    ),
    'menu_order' => 2,
  ));
}
