<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('small-excerpt'); ?>>
  <div class="section small-sys-title"><?php the_terms( $post->ID, 'section' ); ?> </div>
  <div class="thumbnail">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('square-thumbnail'); ?>
    </a>
  </div>
  <div class="content">
    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="author-and-date"><?php bon_the_entry_meta(); ?></div>
    <p class="read-more"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
  </div>

</article>