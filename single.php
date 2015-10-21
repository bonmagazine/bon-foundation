<?php get_header(); ?>
<?php 
$format = get_post_format();
if ( false === $format ) {
  $format = 'standard';
}
?>

  <div class="main single-main <?php if ($format == 'standard' ): ?>inner-wrap-row <?endif?><?php echo $format; ?>" role="main">

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php if ( $format == 'standard' ): ?> 
      <header class="entry-main">
        <p class="section">
          <?php the_terms( $post->ID, 'section' ); ?>
        </p>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_the_entry_meta(); ?>
        </div>
      </header>
      <div class="entry-content">
        <?php get_template_part( 'partials/campaigns/articleinsert' ); ?>
        <?php the_content(); ?>
        <?php get_template_part( 'partials/campaigns/articleinsert-bottom' ); ?>
      </div>
      <footer class="entry-footer">
        <div class="tags">
          <h2 class="footer-title label"><?= __('Taggar', 'bon'); ?>:</h2>
          <p>
            <?php the_tags(''); ?>
          </p>
        </div>
      </footer>
    </article>
    <aside class="related-content">

      <?php $author_posts = bon_get_author_posts(); ?>
      <?php if($author_posts): ?>
      <section class="same-author-posts">
        <h1 class="aside-title"><span class="title-label"><?= __('Mer från', 'bon'); ?></span>&thinsp;<?php the_author_posts_link(); ?></h1>
        <?php if(get_the_author_meta('description')): ?>
        <p class="aside-text bio"><?php the_author_meta('description'); ?></p>
        <?php endif; ?>
        <div class="blog-list">
        <?php foreach ($author_posts as $post): setup_postdata( $post ); ?>
          <?php get_template_part( 'partials/excerpt' ); ?>
        <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </section>
      <?php endif;?>

      <?php related_posts(); ?>

    </aside><!-- .related-content -->
  <?php endif  ?>
  <?php if ( $format == 'gallery' ): ?> 
  <div id="poster">
    <div class="postermeta">
      <div class="centered">
      <header>
        <p class="section"><?php the_terms( $post->ID, 'section' ); ?></p>
        <h1 class="title">
          <?php the_title(); ?>
        </h1>
      </header>
      <p><?php the_excerpt(); ?></p>

      <?php if ( get_the_author() != 'Redaktionen' ): ?> 
      <p class="byline author">
        Text <?php echo get_the_author(); ?>
      </p>
      <?php endif ?>
      <?php if ( bon_get_the_entry_photographers()  || bon_get_the_entry_stylists() ) : ?>
      <p class="byline author">
      <?php if ( bon_get_the_entry_photographers() ) : ?>Fotografi <?php echo bon_get_the_entry_photographers() ?><?php endif; ?><?php if ( bon_get_the_entry_photographers() && bon_get_the_entry_stylists() ) echo "</p><p class='byline author'>" ?><?php if ( bon_get_the_entry_stylists() ) : ?>Mode <?php echo bon_get_the_entry_stylists() ?><?php endif; ?>
      </p>      
      <?php endif; ?>
      </div>
    </div>
  </div>    
  <div class="gallery-content">
  <?php the_content(); ?>
  </div>
  <?php if ($endcredits = get_field( "end_credits" )): ?>
  <div class="endcredits">
  <?php echo $endcredits ?>
  </div>
  <?php endif ?>
  <?php
  $media = get_attached_media( 'image' );
  /*
  foreach ($media as $media) {
    echo bon_the_post_video_thumbnail_html( wp_get_attachment_image( $media=> ID, 'full' ) , 444)  ); 

  };
  */
  ?>
  

  <?php endif  ?>
  
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>