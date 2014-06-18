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

    <svg xmlns="http://www.w3.org/2000/svg" display="none"><symbol viewBox="0 0 350 142" fill="none" id="bon-logo"><g stroke="#000" stroke-width="2"><path d="M326.029 22.818l-.311 65.444-70.134-77.774.003 122.329 18.178-.012v-76.799l68.555 75.367v-122.513h-32.587v61.103"/><g><path d="M153.655 26.843c-16.921 7.14-28.793 23.857-28.793 43.337 0 25.975 21.106 47.032 47.145 47.032 26.035 0 47.144-21.058 47.144-47.032 0-25.976-21.108-47.031-47.144-47.031l-.164 16.715c-16.967 0-30.719 13.72-30.719 30.644l-16.18-.384c1.07-20.759 9.067-33.923 28.711-43.281zm82.745 44.156c0 35.479-28.832 64.24-64.394 64.24-35.564 0-64.393-28.761-64.393-64.24 0-35.478 28.829-64.238 64.393-64.238 35.562 0 64.394 28.76 64.394 64.238z"/><path d="M25.366 95.636l16.246-15.732v-14.307h10.104c13.768 0 24.93 11.082 24.93 24.75s-11.162 24.749-24.93 24.749h-26.007l-.343-19.46zm16.336-69.88l-.037 20.182h10.515c5.607 0 10.153-4.514 10.153-10.079 0-5.568-4.546-10.081-10.153-10.081l-10.478-.022zm-16.087-.991v106.94-106.94zm-17.552-14.993s27.074-.038 49.865.042c11.522.04 31.454 17.261 15.957 44.079 0 0 23.911 13.628 19.926 42.202-5.136 36.838-32.327 34.729-33.212 35.17-.885.439-52.536.512-52.536.512v-122.005z"/></g></g></symbol></svg>

  <?php get_template_part( 'partials/campaigns/overlay' ); ?>

  <?php get_template_part( 'partials/campaigns/topbanner' ); ?>

  <div class="inner-wrap">

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

      <div class="contain-to-grid <?php if( is_home() ): ?>sticky<?php else: ?>fixed<?php endif; ?> nav-menu-wrapper">
        <nav  class="top-bar" 
              data-topbar 
              data-options="custom_back_text: true; 
                            back_text: Tillbaka; 
                            mobile_show_parent_link: true; 
                            scrolltop: false">
          <ul class="title-area">
            <li class="social">
              <ul>
                <li class="social-item">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ); ?>" class="share-btn fb main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Facebook.png" width="24"></a>
                </li>
                <li class="social-item">
                  <a href="https://twitter.com/share?via=bonmagazine&amp;lang=en&amp;url=<?php echo urlencode( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ); ?>" class="share-btn twitter main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png" width="24"></a>
                </li>
              </ul>
            </li>

            <li class="name">
              <h1 class="site-name">
                <a href="/" title="<?php bloginfo('name'); ?>">
                  <div class="logo">
                    <svg class="icon"><use xlink:href="#bon-logo" /></svg>
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
