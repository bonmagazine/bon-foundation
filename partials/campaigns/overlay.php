<?php $overlay = bon_get_campaign('overlay'); ?>
<?php if($overlay): ?>
	<?php foreach ($overlay as $post): setup_postdata( $post ); ?>
<div class="campaign-promo-container">
  <div class="campaign-promo-wrap">
    <div class="btn btn-skip section">
	    <svg class="close-icon"><use xlink:href="#close-icon" /></svg>
		<p><?php echo get_field( "skip_button_text" ) ?></p>
	    </div>
    <?php the_content(); ?>
  </div>
</div>
	<?php endforeach; wp_reset_postdata(); ?>
<?php endif; ?>