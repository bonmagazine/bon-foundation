<?php get_header(); ?>
 
  <div class="index-main main" role="main">

    <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
    <?php endif; ?>

    <section id="blog-list">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/excerpt' ); ?>
      <?php endwhile; ?>
    <?php endif;?>
    </section>

  <?php if ( function_exists('bon_pagination') ) { bon_pagination(); } else if ( is_paged() ) { ?>
    <nav id="post-nav">
      <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'bon' ) ); ?></div>
      <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'bon' ) ); ?></div>
    </nav>
  <?php } ?>

  </div>
    
<?php get_footer(); ?>