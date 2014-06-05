<?php get_header(); ?>

  <div class="archive-main main" role="main">
    <h1 class="archive-title">
      <?php wp_title(); ?>
    </h1>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="blog-list">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php if( is_post_type_archive('bon_se_film') ): ?>
          <?php get_template_part( 'partials/excerpt', 'film' ); ?>
        <?php else: ?>
          <?php get_template_part( 'partials/excerpt' ); ?>
        <?php endif; ?>
      <?php endwhile; ?>
    </section>
  <?php endif;?>

    <nav id="nav-below">
      <div class="nav-next alignleft">
        <?php next_posts_link( 'Older posts' ); ?>
      </div>
      <div class="nav-previous alignright">
        <?php previous_posts_link( 'Newer posts' ); ?>
      </div>
    </nav>

  </div>
    
<?php get_footer(); ?>