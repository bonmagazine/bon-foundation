<div class="jwplayer-wrapper flex-video" id="jwplayer-<?php the_ID(); ?>-wrapper"> 
	<video id="jwplayer-<?php the_ID(); ?>" 
				 class="jwplayer-video" 
				 width="100%" 
				 height="auto"
				 controls="controls" 
				 preload="none" 
				 poster="<?php echo bon_get_film_poster(); ?>" 
				 data-videotype="<?php echo bon_get_film_type() ?>" 
				 data-skin="<?php echo bon_get_film_skin(); ?>" 
				 data-permalink="<?php the_permalink(); ?>"
				 data-share="<?php echo bon_get_film_field('share'); ?>"
				 data-releasedate="<?php echo bon_get_film_release_date(); ?>"
				 data-timetorelease="<?php echo bon_get_film_time_to_release(); ?>"
				 data-autostart="<?php echo bon_get_film_field('autostart'); ?>" > 
		<?php $sources = bon_get_film_sources(); ?>
		<?php foreach ($sources as $source): ?>
		<source src="<?php echo $source ?>" />
		<?php endforeach; ?>
	</video>
</div>