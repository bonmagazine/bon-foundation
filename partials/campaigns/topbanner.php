<?php $top_banner = bon_get_campaign('top-banner'); ?>
<?php if($top_banner): ?>
<div class="top-banner">
  <?php foreach ($top_banner as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
  <?php endforeach; wp_reset_postdata(); ?>
</div>
<?php endif; ?>