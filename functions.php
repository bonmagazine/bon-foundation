<?php

// External Libraries
require_once('library/vendor/Tax-meta-class/Tax-meta-class.php');

// Various clean up functions
require_once('library/cleanup.php'); 

// Hooks that modify default behaviour
require_once('library/hooks.php'); 

// General funtions
require_once('library/bon.php');

// Add admin menu to manage cover order
require_once('library/cover-order.php');

// Add custom fields
require_once('library/custom-fields.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

// Add Roles
require_once('library/roles.php');

// Add Rewrites
require_once('library/rewrites.php');

// Add Post Types
require_once('library/post-types.php');

// Add User Profile extra fields
require_once('library/user-profile.php');

// Filters for content
require_once('library/filters.php');

// Add oEmbed providers
require_once('library/oembed.php');

/*
 *
 * MODELS
 * Page specifc functions
 *
 */

foreach ( glob(get_template_directory()."/library/models/*.php") as $filename) {
  require_once $filename;
}
?>
