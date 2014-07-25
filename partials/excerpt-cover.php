<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( the_cover_template_class() ); ?>>
  <header>
    <div class="section">
      <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
    </div>
    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="author">
      <?php bon_the_entry_author(); ?>
    </div>
  </header>
  <div class="main">
    <div class="entry-meta">
      <div class="section">
        <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
      </div>
      <div class="date">
        <?php bon_the_entry_date(); ?>
      </div>
      <?php get_template_part( 'partials/socialmedia' ); ?>
    </div>
    <div class="thumbnail">
      <a href="<?php the_permalink(); ?>">
      <?php the_cover_thumbail(); ?>
      </a>
    </div>
    <div class="entry-excerpt">
      <?php if( in_category( array('short-post', 'ad') ) ): ?>
        <?php the_content(); ?>
      <?php else: ?>
        <p>
          <?php the_excerpt(); ?> 
          <a class="read-more" href="<?php the_permalink(); ?>">»&nbsp;Läs mer</a>
        </p>
        
      <?php endif; ?>
    </div>
  </div>
</article>