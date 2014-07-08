<?php get_header(); ?>

  <div class="author-main main" role="main">
    <h1 class="archive-title">
      <?php wp_title(); ?>
    </h1>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="blog-list infinite-scroll masonry">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/excerpt' ); ?>
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