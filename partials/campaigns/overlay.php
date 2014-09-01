<?php $overlay = bon_get_campaign('overlay'); ?>
<?php if($overlay): ?>
	<?php foreach ($overlay as $post): setup_postdata( $post ); ?>
<div class="campaign-promo-container">
  <div class="campaign-promo-wrap">
    <button class="btn btn-skip section">Klicka här för att gå vidare till bon.se »</button>
    <?php the_content(); ?>
  </div>
</div>
	<?php endforeach; wp_reset_postdata(); ?>
<?php endif; ?>