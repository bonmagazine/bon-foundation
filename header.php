<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="stylesheet" href="//f.fontdeck.com/s/css/usizZWFdN2CyQNkbgHeoeWIoXHw/<?php echo $_SERVER['SERVER_NAME']; ?>/30102.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" />
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

  <?php if ( $top_banner ) : ?>
  <div class="top-banner">
    <?php echo $top_banner->post_content ?>
  </div>
  <?php endif; ?>

  <div class="inner-wrap">

    <header class="site-header" role="banner">

      <h1 class="site-name">
        <a class="site-name-link" 
           href="<?php bloginfo('url'); ?>" 
           title="<?php bloginfo('name'); ?>">

            <div class="logo">
              <?php include( 'images/logo.svg' ); ?>
            </div>

            <span class="logo-text"><?php bloginfo('name'); ?></span>
          </a>
        </h1>

      <div class="contain-to-grid nav-menu-wrapper sticky">
        <nav class="top-bar" data-topbar>
          <ul class="title-area">
            <li class="social">
              <ul>
                <li class="social-item">
                  <a href="https://www.facebook.com/bonmagazine" class=" fb main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Facebook.png" width="24"></a>
                </li>
                <li class="social-item">
                  <a href="https://twitter.com/bonmagazine" class="twitter main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png" width="24"></a>
                </li>
                <li class="social-item">
                  <a href="http://instagram.com/bonmagazine" class="instagram main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Instagram.png" width="24"></a>
                </li>
                <li class="social-item">
                  <a href="/feed/" class="rss main-nav-link no-ajax" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/RSS.png" width="24"></a>
                </li>
              </ul>
            </li>

            <li class="name">
              <h1 class="site-name">
                <a href="/" title="<?php bloginfo('name'); ?>">
                  <div class="logo">
                    <?php include( 'images/logo.svg' ); ?>
                  </div>
                  <span class="logo-text"><?php bloginfo('name'); ?></span>
                </a>
              </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"></a></li>
          </ul>
          <section class="top-bar-section">
            <?php wp_nav_menu( 
                    array( 
                      'theme_location' => 'main-menu',  
                      // 'items_wrap'      => '%3$s',
                      'menu_class' => 'nav-menu left',
                      'walker' => new top_bar_walker()
                    ) 
                  ); ?>
          </section>
        </nav>
      </div>
    </header>

    <section class="container" role="document">
