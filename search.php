<?php get_header(); ?>

  <div class="archive-main main inner-wrap-row" role="main">
    <h2 class="section">Sökresultat för:</h2>
    <h1 class="archive-title">
      <?php if ( is_search() ) echo the_search_query(); ?>
    </h1>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="blog-list infinite-scroll masonry">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php if( is_post_type_archive('bon_se_film') ): ?>
          <?php $children = get_children( array('post_parent' => get_the_ID(), 'post_type'   => 'bon_se_film', ) ); ?>
          <?php if( count( $children ) > 0 ): ?>
          <?php get_template_part( 'partials/excerpt', 'film' ); ?>
          <?php endif; ?>
        <?php elseif( is_post_type_archive('bon_minimagazine') ): ?>
          <?php get_template_part( 'partials/excerpt', 'bonbon' ); ?>
        <?php elseif( is_post_type_archive('dagbok') ): ?>
          <?php get_template_part( 'partials/excerpt', 'dagbok' ); ?>
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