<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( the_cover_template_class() ); ?>>
  <?php if( !$ad_post ): ?>
  <div class="poster">
	  <div class="posterimage"><?php the_post_thumbnail($page->ID); ?></div>
	  <div class="postermeta">
		  <div class="centered">
		  <header>
		    <p class="section"><?php the_terms( $post->ID, 'section' ); ?></p>
		    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		  </header>
		  <p><?php the_excerpt(); ?></p>
	  
	 	  <div class="author">
		    <?php bon_the_entry_author(); ?>
		  </div>
		  </div>
	  </div>
  </div>
<?php endif; ?>
</article>

