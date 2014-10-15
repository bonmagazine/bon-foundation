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
            <li class="icon-item search-item">
              <form role="search" method="get" class="menu-searchform" action="/">
                <label class="screen-reader-text search-nav-title" for="s">
                  <svg class="icon">
                    <use xlink:href="#search-icon" />
                  </svg>
                </label>
                <div class="search-box">
                  <input type="text" value="" name="s" id="s">
                  <button type="submit">Sök</button>
                </div>
              </form>
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
            <li class="share icon-item right tab-bar-section">
              <svg class="icon"><use xlink:href="#share-icon" /></svg>
              <div class="share-btns">
                <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_the_permalink()); ?>&amp;width=50&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=395965657184574" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:65px; margin-right: 10px" allowTransparency="true"></iframe>

                <iframe allowtransparency="true" frameborder="0" scrolling="no"
                        src="https://platform.twitter.com/widgets/tweet_button.html?count=vertical"
                        style="width:60px; height:65px;"></iframe>
              </div>
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
        <ul class="social">
          <li class="social-item icon-item">
            <a href="https://www.facebook.com/bonmagazine" class="share-btn fb main-nav-link" target="_blank">                    <svg class="icon"><use xlink:href="#facebook-logo" /></svg>

            </a>
          </li>
          <li class="social-item icon-item">
            <a href="https://twitter.com/bonmagazine" class="share-btn twitter main-nav-link" target="_blank">
              <svg class="icon"><use xlink:href="#twitter-logo" /></svg>
              </a>
          </li>
          <li class="social-item icon-item">
            <a href="http://instagram.com/bonmagazine" class="share-btn instagram main-nav-link" target="_blank">
              <svg class="icon"><use xlink:href="#instagram-logo" /></svg>
              </a>
          </li>
        </ul>
      </section>

      <a class="exit-off-canvas exit-offcanvas-menu"></a>

    </header>

    <section class="container" role="document">
