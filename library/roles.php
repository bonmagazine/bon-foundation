<?php

// ROLES
function bon_create_roles() {

  // Bon Blogger Capabilities
  $capabilitiesArr = array(
    'read' => true,
    'upload_files' => true,
    'edit_files' => true,
    'edit_bon_blogs_post' => true,
    'edit_bon_blogs_posts' => true,
    'read_bon_blogs_post' => true,
    'read_bon_blogs_posts' => true,
    'delete_published_bon_blogs_posts' => true,
    'edit_published_bon_blogs_posts' => true,
    'edit_published_bon_blogs_post' => true,
    'publish_bon_blogs_posts' => true,
    'delete_private_bon_blogs_posts' => true,
    'edit_private_bon_blogs_posts' => true,
    'read_private_bon_blogs_posts' => true,
    'unfiltered_html' => true

    );

  // remove_role('bon_blogger');
  add_role( 'bon_blogger', 'Bon Blogger', $capabilitiesArr );

  $extraCapabilites = array('edit_others_bon_blogs_posts' => true,
                            'delete_others_bon_blogs_posts' => true
                            );

  $adminCapabilites = array_merge($capabilitiesArr, $extraCapabilites);

  $admin = get_role( 'administrator' );

  foreach ($adminCapabilites as $cap => $value) {
    $admin->add_cap( $cap );
  }
}

add_action( 'admin_init', 'bon_create_roles');