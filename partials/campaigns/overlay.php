<?php $overlay = bon_get_campaign('overlay'); ?>
<?php if($overlay): ?>
<div class="campaign-promo-container">
  <div class="campaign-promo-wrap">
    <button class="btn btn-skip section">Klicka här för att gå vidare till bon.se »</button>
    <?php foreach ($overlay as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>
</div>
<?php endif; ?>