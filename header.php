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

    <svg xmlns="http://www.w3.org/2000/svg" display="none">

      <!-- BON LOGO -->
      <symbol viewBox="0 0 350 142" fill="none" id="bon-logo"><g stroke="#000" stroke-width="2"><path d="M326.029 22.818l-.311 65.444-70.134-77.774.003 122.329 18.178-.012v-76.799l68.555 75.367v-122.513h-32.587v61.103"/><g><path d="M153.655 26.843c-16.921 7.14-28.793 23.857-28.793 43.337 0 25.975 21.106 47.032 47.145 47.032 26.035 0 47.144-21.058 47.144-47.032 0-25.976-21.108-47.031-47.144-47.031l-.164 16.715c-16.967 0-30.719 13.72-30.719 30.644l-16.18-.384c1.07-20.759 9.067-33.923 28.711-43.281zm82.745 44.156c0 35.479-28.832 64.24-64.394 64.24-35.564 0-64.393-28.761-64.393-64.24 0-35.478 28.829-64.238 64.393-64.238 35.562 0 64.394 28.76 64.394 64.238z"/><path d="M25.366 95.636l16.246-15.732v-14.307h10.104c13.768 0 24.93 11.082 24.93 24.75s-11.162 24.749-24.93 24.749h-26.007l-.343-19.46zm16.336-69.88l-.037 20.182h10.515c5.607 0 10.153-4.514 10.153-10.079 0-5.568-4.546-10.081-10.153-10.081l-10.478-.022zm-16.087-.991v106.94-106.94zm-17.552-14.993s27.074-.038 49.865.042c11.522.04 31.454 17.261 15.957 44.079 0 0 23.911 13.628 19.926 42.202-5.136 36.838-32.327 34.729-33.212 35.17-.885.439-52.536.512-52.536.512v-122.005z"/></g></g></symbol>

      <!-- TWITTER LOGO -->
      <symbol id="twitter-logo" viewBox="0 0 40 40">
        <circle id="svg_1" r="17.7005" cy="21" cx="20" stroke-width="null" fill="#000000"/>
        <g stroke="#000" fill="none" stroke-width="10" id="svg_2">
         <path stroke-width="0" fill="#FFFFFF" d="m31.14407,15.09781c-0.73893,0.32779 -1.5332,0.54923 -2.36663,0.64885c0.85071,-0.50996 1.50418,-1.31749 1.81178,-2.27976c-0.79628,0.4723 -1.6781,0.81515 -2.61679,0.99993c-0.75159,-0.80089 -1.82252,-1.30121 -3.00774,-1.30121c-2.27564,0 -4.12076,1.84491 -4.12076,4.12055c0,0.32297 0.03646,0.6375 0.10676,0.93908c-3.42472,-0.17183 -6.46097,-1.81238 -8.49339,-4.30544c-0.3547,0.60857 -0.55796,1.31638 -0.55796,2.07157c0,1.42966 0.72748,2.6909 1.83317,3.42983c-0.67546,-0.02139 -1.31085,-0.20677 -1.86641,-0.51538c-0.00047,0.01716 -0.00047,0.03444 -0.00047,0.05182c0,1.99646 1.42042,3.66181 3.3055,4.04062c-0.34576,0.0942 -0.7098,0.14452 -1.0856,0.14452c-0.26553,0 -0.52362,-0.02591 -0.77528,-0.07392c0.52442,1.63704 2.04617,2.82838 3.84941,2.86152c-1.41028,1.10528 -3.187,1.76407 -5.11768,1.76407c-0.33261,0 -0.6606,-0.01958 -0.98297,-0.05764c1.82363,1.16926 3.9896,1.85145 6.31666,1.85145c7.57941,0 11.72427,-6.2789 11.72427,-11.72437c0,-0.17866 -0.00402,-0.35631 -0.01195,-0.53316c0.80501,-0.58086 1.50357,-1.30654 2.05601,-2.13294l0.00006,0l0,0l0.00001,0.00001z" id="svg_3" stroke="#000000"/>
        </g>
      </symbol>

      <!-- FB LOGO -->
      <symbol id="facebook-logo" viewBox="0 0 40 40">
       <title transform="translate(33.70050048828125,33.70050048828125) scale(1.3270875215530396) translate(-33.70050048828125,-33.70050048828125) ">Layer 1</title>
          <circle id="svg_1" r="17.7005" cy="21" cx="20" stroke-width="null" fill="#000000"/>
          <path stroke="#000000" id="svg_2" fill="#FFFFFF" d="m21.20086,32.37996l0,-9.81569l3.29464,0l0.49333,-3.82534l-3.78797,0l0,-2.44224c0,-1.10752 0.30754,-1.86226 1.89571,-1.86226l2.02563,-0.00089l0,-3.42142c-0.35032,-0.04662 -1.55276,-0.15077 -2.95169,-0.15077c-2.92052,0 -4.91999,1.7827 -4.91999,5.0565l0,2.82108l-3.30311,0l0,3.82534l3.30311,0l0,9.81569l3.95035,0z"/>
      </symbol>  

      <!-- Search icon -->
      <symbol id="search-icon" viewBox="0 0 40 40">
        <title>Search </title>
        <circle fill="#000000" stroke-width="null" cx="20" cy="20" r="17.7005" id="svg_1"/>
        <path d="m26.90157,21.68046c-2.25975,2.25957 -5.83666,2.3983 -8.25819,0.41623l-0.87637,-0.87658c-1.98246,-2.42152 -1.84335,-5.99824 0.4164,-8.25856c2.4079,-2.40752 6.31104,-2.40713 8.71816,0.00076c2.40732,2.4079 2.4077,6.31046 0,8.71816m2.13233,2.22714c3.61127,-3.61107 3.61127,-9.46655 0,-13.07781c-3.61106,-3.61127 -9.46654,-3.61127 -13.0778,0c-3.23995,3.23994 -3.57116,8.28487 -0.99767,11.89593l-6.59514,6.59529c-0.60178,0.60197 -0.60178,1.57777 0,2.17992c0.60139,0.60198 1.57738,0.60178 2.17954,0l6.59495,-6.59549c3.61126,2.5735 8.65636,2.2421 11.89612,-0.99784" fill="#ffffff" id="svg_3"/>
      </symbol>

    </svg>

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

      <div class="contain-to-grid fixed<?php /* if( is_home() ): ?>sticky<?php else: ?>fixed<?php endif; */ ?> nav-menu-wrapper">
        <nav  class="top-bar" 
              data-topbar 
              data-options="custom_back_text: true; 
                            back_text: « Tillbaka; 
                            mobile_show_parent_link: true; 
                            scrolltop: false">
          <ul class="title-area">
            <li class="social">
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
