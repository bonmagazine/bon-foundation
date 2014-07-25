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
    <h2 class="title"><?php the_title(); ?></h2>
    <div class="author-and-date"><?php bon_the_entry_date(); ?></div>
  </header>
  <div class="thumbnail">
      <?php the_post_thumbnail('tb'); ?>
  </div>
</article>