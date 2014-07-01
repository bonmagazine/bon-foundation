<header class="title-header-bon_blogs sticky">
  <a href="<?php bon_the_bon_blog_url(); ?>">
    <?php bon_the_bon_blog_header_image() ?>
    <h1 class="archive-title"><?php bon_the_bon_blog_title(); ?></h1>
    <?php if( bon_the_bon_blog_subtitle() ):?>
    <p class="intro-text">
      <?php bon_the_bon_blog_subtitle(); ?>
    </p>
    <?php endif; ?>
  </a>
</header>