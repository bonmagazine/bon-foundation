<header class="title-header-bon_blogs sticky">
  <h1 class="archive-title"
      style="background-image: url(<?php bon_the_bon_blog_header_image() ?>);">
    <a href="<?php bon_the_bon_blog_url(); ?>">
      <?php bon_the_bon_blog_title(); ?>
    </a>
  </h1>
  <?php wp_nav_menu( 
          array( 
            'theme_location' => 'bon-blog-menu-'.get_the_author_meta('user_nicename'),
            'container_class' => 'bon-blog-menu-container',
            'menu_class' => 'bon-blog-menu'
          ) 
        ); ?>
</header>