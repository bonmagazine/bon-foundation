<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>
<article id="post-<?php the_ID(); ?>">
  <div class="poster">
	  <div class="posterimage"><?php echo bon_the_post_video_thumbnail_html( get_the_post_thumbnail( $post->ID ) , get_post_thumbnail_id($post->ID)  ); ?></div>
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
</article>