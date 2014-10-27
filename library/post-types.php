<?php

// POST TYPES
add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'dagbok',
    array(
      'labels' => array(
        'name' => __( 'Bonstagram' ),
        'singular_name' => __( 'Bonstagram' )
      ),
    'menu_position' => 5,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes'),
    'rewrite' => array('slug' => 'bonstagram', 'with_front' => false),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_post_type( 'bon_se_film',
    array(
      'labels' => array(
        'name' => __( 'Films' ),
        'singular_name' => __( 'Film' )
      ),
    'menu_position' => 5,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes'),
    'rewrite' => array('slug' => 'film', 'with_front' => false),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_post_type( 'bon_se_albums',
    array(
      'labels' => array(
        'name' => __( 'Albums SE' ),
        'singular_name' => __( 'Album' )
      ),
    'menu_position' => 6,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes'),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_post_type( 'bon_posters',
    array(
      'labels' => array(
        'name' => __( 'Posters' ),
        'singular_name' => __( 'Poster' )
      ),
    'menu_position' => 6,
    'hierarchical' => false,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields'),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_taxonomy('language', 'bon_posters',
    array(
      'hierarchical' => true,
      'label' => 'Language',
      'query_var' => true,
      'rewrite' => false,
      'public'=>false,
      'show_ui'=>true,
      'show_in_nav_menus'=>true
    )
  );

  register_post_type( 'bon_minimagazine',
    array(
      'labels' => array(
        'name' => __( 'Bonbon' ),
        'singular_name' => __( 'Bonbon' )
      ),
    'menu_position' => 7,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail'),
    'rewrite' => array('slug' => 'bonbon', 'with_front' => false),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_taxonomy('minimagazine_categories', 'bon_minimagazine',
    array(
      'hierarchical' => true,
      'label' => 'Categories',
      'query_var' => true,
      'rewrite' => false,
      'public'=>true,
      'show_ui'=>true,
      'show_in_nav_menus'=>true
    )
  );

  register_post_type( 'bon_blogs',
    array(
      'labels' => array(
        'name' => __( 'Blog posts' ),
        'singular_name' => __( 'Blog post' )
      ),
    'menu_position' => 7,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>false,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail', 'comments'),
    'taxonomies'=>array('bon_blogs_tag'),
    'rewrite' => array('slug' => 'blogs/%author%', 'with_front' => false),
    'capability_type' => 'bon_blogs_post',
    'map_meta_cap'=>true
    )
  );

  register_post_type( 'bon_blogs_pages',
    array(
      'labels' => array(
        'name' => __( 'Blog Pages' ),
        'singular_name' => __( 'Blog page' )
      ),
    'menu_position' => 20,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => false,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail'),
    // 'taxonomies'=>array('bon_blogs_tag'),
    'rewrite' => array('slug' => 'blogs/%author%/pages', 'with_front' => false),
    'capability_type' => 'bon_blogs_post',
    'map_meta_cap'=>true
    )
  );

  register_taxonomy('bon_blogs_tag', 'bon_blogs',
    array(
      'hierarchical' => false,
      'label' => 'Blog Tags',
      'query_var' => true,
      'rewrite' => array('slug' => 'blogs/tag', 'with_front' => false),
      'public'=>true,
      'show_ui'=>true,
      'show_in_nav_menus'=>true,
      'capabilities' => array(
        'assign_terms' => 'edit_bon_blogs_post',
        'edit_terms' => 'edit_bon_blogs_post'
      )
    )
  );

  register_post_type( 'bon_campaigns',
    array(
      'labels' => array(
        'name' => __( 'Campaigns' ),
        'singular_name' => __( 'Campaign' )
      ),
    'menu_position' => 8,
    'hierarchical' => false,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields'),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );

  register_post_type( 'bon_skin',
    array(
      'labels' => array(
        'name' => __( 'Skins' ),
        'singular_name' => __( 'Skin' )
      ),
    'menu_position' => 9,
    'hierarchical' => false,
    'public' => true,
    'has_archive' => true,
    'show_ui'=>true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'custom-fields'),
    'map_meta_cap'=>true,
    'capabilities'=>array('edit_posts'=>'edit_others_pages', 'edit_others_posts'=>'edit_others_pages', 'publish_posts'=>'edit_others_pages', 'read'=>'edit_others_pages')
    )
  );


  /*
   * BON ISSUES
   *
   */

  register_post_type( 'bon_issues_posts',
    array(
      'labels' => array(
        'name' => __( 'Issue Articles' ),
        'singular_name' => __( 'Issue Article' )
      ),
    'menu_position' => 11,
    'hierarchical' => false,
    'public' => true,
    'has_archive' => true,
    'show_ui' => true,
    'exclude_from_search'=>true,
    'supports'=>array('title', 'editor', 'author', 'post-formats', 'thumbnail'),
    'taxonomies'=>array('bon_issues', 'post_tag', 'bon_photographers', 'bon_stylists'),
    'rewrite' => array('slug' => 'issue/%bon_issues%', 'with_front' => false)
    )
  );

  add_theme_support( 'post-formats', array( 'gallery' ) );
  add_post_type_support( 'bon_issues_posts', 'post-formats' );

  register_taxonomy('bon_issues', 'bon_issues_posts',
    array(
      'hierarchical' => true,
      'label' => 'Issues',
      'query_var' => true,
      'rewrite' => array('slug' => 'issue', 'with_front' => false),
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true
    )
  );
  register_taxonomy_for_object_type( 'bon_issues', 'bon_issues_posts' );

  register_taxonomy('bon_photographers', array('bon_issues_posts', 'posts', 'bon_minimagazine'),
    array(
      'hierarchical' => false,
      'label' => 'Fotograf',
      'query_var' => true,
      'rewrite' => array('slug' => 'fotograf', 'with_front' => false),
      'public' => true,
      'show_ui' => true
    )
  );
  register_taxonomy_for_object_type( 'bon_photographers', 'bon_issues_posts' );
  register_taxonomy_for_object_type( 'bon_photographers', 'posts' );
  register_taxonomy_for_object_type( 'bon_photographers', 'bon_minimagazine' );


  register_taxonomy('bon_stylists', array('bon_issues_posts', 'posts', 'bon_minimagazine'),
    array(
      'hierarchical' => false,
      'label' => 'Stylist',
      'query_var' => true,
      'rewrite' => array('slug' => 'stylist', 'with_front' => false),
      'public' => true,
      'show_ui' => true
    )
  );
  register_taxonomy_for_object_type( 'bon_stylists', 'bon_issues_posts' );
  register_taxonomy_for_object_type( 'bon_stylists', 'posts' );
  register_taxonomy_for_object_type( 'bon_stylists', 'bon_minimagazine' );

  // Bon Issues Image field (uses Tax-meta-class)
  if (is_admin()){
    $prefix = 'bon_';

    $config = array(
      'id' => 'bon_issue_images',          // meta box id, unique per meta box
      'title' => 'Bon Issue Covers',          // meta box title
      'pages' => array('bon_issues'),        // taxonomy name, accept categories, post_tag and custom taxonomies
      'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
      'fields' => array(),            // list of meta fields (can be added by field arrays)
      'local_images' => true,          // Use local or hosted images (meta box images for add/remove)
      'use_with_theme' => get_template_directory_uri().'/library/vendor/Tax-meta-class'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );

    $my_meta = new Tax_Meta_Class($config);

    $my_meta->addImage($prefix.'image_field_id',array('name'=> __('Issue Cover','tax-meta')));

    $repeater_fields[] = $my_meta->addImage($prefix.'image_field_id',array('name'=> __('Issue Cover','tax-meta')),true);

    $my_meta->addRepeaterBlock($prefix.'re_',array('inline' => true, 'name' => __('Add more covers','tax-meta'),'fields' => $repeater_fields));

    $my_meta->Finish();
  }


  /*
   *
   * Bon taxonomy - SECTIONS
   *
   */

  $section_labels = array(
    'name' => _x( 'Sections', 'taxonomy general name' ),
    'singular_name' => _x( 'Section', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sections' ),
    'all_items' => __( 'All Sections' ),
    'parent_item' => __( 'Parent Section' ),
    'parent_item_colon' => __( 'Parent Section:' ),
    'edit_item' => __( 'Edit Section' ),
    'update_item' => __( 'Update Section' ),
    'add_new_item' => __( 'Add New Section' ),
    'new_item_name' => __( 'New Section Name' ),
    'menu_name' => __( 'Section' ),
  );

  register_taxonomy('section', 'post', array(
    'hierarchical' => true,
    'labels' => $section_labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'section', 'with_front' => false ),
  ));

}
