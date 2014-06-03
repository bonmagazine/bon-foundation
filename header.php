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
      <?php if( is_home() ): ?>
      <h1 class="site-name">
        <a class="site-name-link" 
           href="<?php bloginfo('url'); ?>" 
           title="<?php bloginfo('name'); ?>">

            <div class="logo">
              <svg
                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                 xmlns:cc="http://creativecommons.org/ns#"
                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                 xmlns:svg="http://www.w3.org/2000/svg"
                 xmlns="http://www.w3.org/2000/svg"
                 width="350px"
                 height="142px"
                 viewBox="0 0 350 142"
                 version="1.1"
                 id="svg4115">

                <g
                   id="bon-logo"
                   stroke="none"
                   stroke-width="1"
                   fill="none"
                   fill-rule="evenodd">
                  <g
                     id="logo"
                     transform="translate(8.000000, 7.000000)"
                     stroke="#000000"
                     stroke-width="2">
                    <path
                       d="M318.029,15.818 L317.718,81.262 L247.584,3.488 L247.587,125.817 L265.765,125.805 L265.765,49.006 L334.32,124.373 L334.32,1.86 L301.733,1.86 L301.733,62.963"
                       id="Shape" />
                    <g
                       id="Group">
                      <path
                         d="m 145.655,19.843 c -16.921,7.14 -28.793,23.857 -28.793,43.337 0,25.975 21.106,47.032 47.145,47.032 26.035,0 47.144,-21.058 47.144,-47.032 0,-25.976 -21.108,-47.031 -47.144,-47.031 l -0.164,16.715 c -16.967,0 -30.719,13.72 -30.719,30.644 L 116.94425,63.123703 C 118.01443,42.365155 126.01132,29.201159 145.655,19.843 z M 228.4,63.999 c 0,35.479 -28.832,64.24 -64.394,64.24 -35.564,0 -64.393,-28.761 -64.393,-64.24 0,-35.478 28.829,-64.238 64.393,-64.238 35.562,0 64.394,28.76 64.394,64.238 z"
                         id="path4121" />
                      <path
                         d="M17.366,88.636 L33.612,72.904 L33.612,58.597 L43.716,58.597 C57.484,58.597 68.646,69.679 68.646,83.347 C68.646,97.015 57.484,108.096 43.716,108.096 L17.709,108.096 L17.366,88.636 Z M33.702,18.756 L33.665,38.938 L44.18,38.938 C49.787,38.938 54.333,34.424 54.333,28.859 C54.333,23.291 49.787,18.778 44.18,18.778 L33.702,18.756 L33.702,18.756 Z M17.615,17.765 L17.615,124.705 L17.615,17.765 Z M0.063,2.772 C0.063,2.772 27.137,2.734 49.928,2.814 C61.45,2.854 81.382,20.075 65.885,46.893 C65.885,46.893 89.796,60.521 85.811,89.095 C80.675,125.933 53.484,123.824 52.599,124.265 C51.714,124.704 0.063,124.777 0.063,124.777 L0.063,2.772 L0.063,2.772 Z"
                         id="path4123" />
                    </g>
                  </g>
                </g>
              </svg>
            </div>

            <span class="logo-text"><?php bloginfo('name'); ?></span>
        </a>
      </h1>
      <?php endif; ?>

      <div class="contain-to-grid <?php if( is_home() ): ?>sticky<?php else: ?>fixed<?php endif; ?> nav-menu-wrapper">
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
                    <svg
                       xmlns:dc="http://purl.org/dc/elements/1.1/"
                       xmlns:cc="http://creativecommons.org/ns#"
                       xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                       xmlns:svg="http://www.w3.org/2000/svg"
                       xmlns="http://www.w3.org/2000/svg"
                       width="350px"
                       height="142px"
                       viewBox="0 0 350 142"
                       version="1.1"
                       id="svg4115">

                      <g
                         id="bon-logo"
                         stroke="none"
                         stroke-width="1"
                         fill="none"
                         fill-rule="evenodd">
                        <g
                           id="logo"
                           transform="translate(8.000000, 7.000000)"
                           stroke="#000000"
                           stroke-width="2">
                          <path
                             d="M318.029,15.818 L317.718,81.262 L247.584,3.488 L247.587,125.817 L265.765,125.805 L265.765,49.006 L334.32,124.373 L334.32,1.86 L301.733,1.86 L301.733,62.963"
                             id="Shape" />
                          <g
                             id="Group">
                            <path
                               d="m 145.655,19.843 c -16.921,7.14 -28.793,23.857 -28.793,43.337 0,25.975 21.106,47.032 47.145,47.032 26.035,0 47.144,-21.058 47.144,-47.032 0,-25.976 -21.108,-47.031 -47.144,-47.031 l -0.164,16.715 c -16.967,0 -30.719,13.72 -30.719,30.644 L 116.94425,63.123703 C 118.01443,42.365155 126.01132,29.201159 145.655,19.843 z M 228.4,63.999 c 0,35.479 -28.832,64.24 -64.394,64.24 -35.564,0 -64.393,-28.761 -64.393,-64.24 0,-35.478 28.829,-64.238 64.393,-64.238 35.562,0 64.394,28.76 64.394,64.238 z"
                               id="path4121" />
                            <path
                               d="M17.366,88.636 L33.612,72.904 L33.612,58.597 L43.716,58.597 C57.484,58.597 68.646,69.679 68.646,83.347 C68.646,97.015 57.484,108.096 43.716,108.096 L17.709,108.096 L17.366,88.636 Z M33.702,18.756 L33.665,38.938 L44.18,38.938 C49.787,38.938 54.333,34.424 54.333,28.859 C54.333,23.291 49.787,18.778 44.18,18.778 L33.702,18.756 L33.702,18.756 Z M17.615,17.765 L17.615,124.705 L17.615,17.765 Z M0.063,2.772 C0.063,2.772 27.137,2.734 49.928,2.814 C61.45,2.854 81.382,20.075 65.885,46.893 C65.885,46.893 89.796,60.521 85.811,89.095 C80.675,125.933 53.484,123.824 52.599,124.265 C51.714,124.704 0.063,124.777 0.063,124.777 L0.063,2.772 L0.063,2.772 Z"
                               id="path4123" />
                          </g>
                        </g>
                      </g>
                    </svg>
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
