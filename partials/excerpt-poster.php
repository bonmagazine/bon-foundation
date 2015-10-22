<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>
<?php if( in_category( array('short-post', 'ad') ) ) $short_post = true; ?>
<?php if( in_category( array('ad') ) ) $ad_post = true; ?>
<?php if( get_field( "custom_url" ) ) $custom_url = get_field( "custom_url" );  ?>

  <div class="poster">
	  <div class="posterimage"><?php echo bon_the_post_video_thumbnail_html( get_the_post_thumbnail( $post->ID, 'full' ) , get_post_thumbnail_id($post->ID)  ); ?></div>
	  <div class="postermeta">
		  <div class="centered">
		  <header>
		    <p class="section"><?php the_terms( $post->ID, 'section' ); ?></p>
		    <h1 class="title">
			    <?php if (!$short_post) : ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			    <?php else : ?>
			    <?php if ($custom_url) : ?><a href="<?php echo $custom_url; ?>"><?php endif; ?><?php the_title(); ?><?php if ($custom_url) : ?></a><?php endif; ?>
			    <?php endif; ?>
			</h1>
		  </header>
		  <p><?php the_excerpt(); ?></p>

	 	  <?php if (!$short_post) : ?>
	 	        <?php if ( get_the_author() != 'Redaktionen' ): ?> 
			      <p class="byline author">
			        Text <?php echo get_the_author(); ?>
			      </p>
				<?php endif; ?>
		  <?php endif; ?>
			  
	      <?php if ( bon_get_the_entry_metaterm('bon_photographers')  || bon_get_the_entry_metaterm('bon_stylists') || bon_get_the_entry_metaterm('bon_extracredit')) : ?>
	      <p class="byline author">
	      <?php if ( bon_get_the_entry_metaterm('bon_photographers') ) : ?>Fotografi <?php echo bon_get_the_entry_metaterm('bon_photographers') ?><?php endif; ?><?php if ( bon_get_the_entry_metaterm('bon_photographers')&& bon_get_the_entry_metaterm('bon_stylists') ) echo "</p><p class='byline author'>" ?><?php if ( bon_get_the_entry_metaterm('bon_stylists') ) : ?>Mode <?php echo bon_get_the_entry_metaterm('bon_stylists') ?></p><?php endif; ?><?php if ( bon_get_the_entry_metaterm('bon_extracredit') ) : ?><p class='byline author'><?php echo bon_get_the_entry_metaterm('bon_extracredit') ?></p><?php endif ?>
	      </p>      
	      <?php endif; ?>
		  </div>
	  </div>
  </div>