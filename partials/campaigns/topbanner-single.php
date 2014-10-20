<?php $article_top_banner = bon_get_campaign('article-top-banner'); ?>
<?php if($article_top_banner): ?>
<div class="top-banner">
  <?php foreach ($article_top_banner as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
  <?php endforeach; wp_reset_postdata(); ?>
</div>
<?php endif; ?>