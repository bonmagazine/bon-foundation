<?php $top_banner = bon_get_campaign('top-banner'); ?>
<?php if($top_banner): ?>
<div class="top-banner">
  <?php foreach ($top_banner as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
    <?php  print_r( get_post_meta( get_the_ID() )); ?>
  <?php endforeach; wp_reset_postdata(); ?>

  <?php echo date("Y-m-d"); ?>

</div>
<?php endif; ?>