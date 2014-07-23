<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <div class="section small-sys-title"><?php the_terms( $post->ID, 'section' ); ?> </div>
    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="author-and-date"><?php bon_the_entry_meta(); ?></div>
  </header>
  <div class="thumbnail">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('tb'); ?>
    </a>
  </div>
  <div class="entry-excerpt">
    <?php if( in_category( array('short-post', 'ad') ) ): ?>
      <?php the_content(); ?>
    <?php else: ?>
      <p><?php the_excerpt(); ?> <a class="read-more" href="<?php the_permalink(); ?>">»&nbsp;Läs mer</a></p>
    <?php endif; ?>
  </div>
</article>