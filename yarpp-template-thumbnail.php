<?php
/*
YARPP Template: Bon Thumbnails
Description: Requires a theme which supports post thumbnails
Author: Afonso Duarte (http://afn.so)
*/ ?>
<?php if (have_posts()):?>
<section class="related-posts">
  <h1 class="aside-title"> Relaterat </h1>
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part( 'partials/excerpt' ); ?>
  <?php endwhile; ?>
</section>
<?php endif; ?>
