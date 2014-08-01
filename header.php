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
    <?php bon_get_skin(); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php get_template_part( 'partials/svg' ); ?>
  <div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <div class="inner-wrap-row">

    <?php get_template_part( 'partials/campaigns/overlay' ); ?>

    <?php get_template_part( 'partials/campaigns/topbanner' ); ?>

    <header class="site-header" role="banner">
      <?php if( is_home() ): ?>
      <h1 class="site-name">
        <a class="site-name-link" 
           href="<?php bloginfo('url'); ?>" 
           title="<?php bloginfo('name'); ?>">

            <div class="logo">
              <svg class="icon"><use xlink:href="#bon-logo" /></svg>
            </div>

            <span class="logo-text"><?php bloginfo('name'); ?></span>
        </a>
      </h1>
      <?php endif; ?>

      <div class="fixed nav-menu-wrapper">
        <nav class="tab-bar">
          <ul class="title-area">
            <li class="left-small">
              <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
            </li>
            <li class="name middle tab-bar-section">
              <h1 class="site-name">
                <a href="/" title="<?php bloginfo('name'); ?>">
                  <div class="logo">
                    <svg class="icon"><use xlink:href="#bon-logo" /></svg>
                  </div>
                  <span class="logo-text"><?php bloginfo('name'); ?></span>
                </a>
              </h1>
            </li>
            <li class="social right tab-bar-section">
              <ul>
                <li class="social-item">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ); ?>" class="share-btn fb main-nav-link" target="_blank">                    <svg class="icon"><use xlink:href="#facebook-logo" /></svg>

                  </a>
                </li>
                <li class="social-item">
                  <a href="https://twitter.com/share?via=bonmagazine&amp;lang=en&amp;url=<?php echo urlencode( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ); ?>" class="share-btn twitter main-nav-link" target="_blank">
                    <svg class="icon"><use xlink:href="#twitter-logo" /></svg>
                    </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

      <section class="left-off-canvas-menu">
        <h1 class="off-canvas-title"><a href="/">Bon.se</a></h1>
        <?php wp_nav_menu( 
                array( 
                  'theme_location' => 'main-menu',  
                  // 'items_wrap'      => '%3$s',
                  'menu_class' => 'nav-menu off-canvas-list',
                  'walker' => new top_bar_walker()
                ) 
              ); ?>
      </section>

      <a class="exit-off-canvas exit-offcanvas-menu"></a>

    </header>

    <section class="container" role="document">
