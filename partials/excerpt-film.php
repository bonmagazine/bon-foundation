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
    <h2 class="title"><a href="<?php the_first_child_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="author-and-date"><?php bon_the_entry_date(); ?></div>
  </header>
  <div class="thumbnail">
    <a href="<?php the_first_child_permalink(); ?>">
    <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), 'thumb', true ), 'tb' ); ?>
    </a>
  </div>
</article>