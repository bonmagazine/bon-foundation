<?php

// Various clean up functions
require_once('library/cleanup.php'); 

// General funtions
require_once('library/bon.php');

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

/*
 *
 * MODELS
 *
 */

// Add Post Types
require_once('library/pages/landing.php');


?>