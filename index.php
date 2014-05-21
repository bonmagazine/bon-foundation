<?php get_header(); ?>

  <div class="index-main main" role="main">
  <?php if(is_home() && !get_query_var('paged')): ?>
    <?php 
      // Save the blog list for later
      $blog_list_query = clone $wp_query; 
    ?>

    <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
    <?php endif; ?>

    <?php bon_query_posters(); ?>
    <section id="poster">
      <h1 class="hide">Poster</h1>
      <div class="poster-container">
        <ul class="poster-wrapper" data-orbit>
          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <li><?php get_template_part( 'partials/content', 'poster' ); ?></li>
            <?php endwhile; ?>
          <?php endif;?>
        </ul>
      </div>
    </section>

    <?php bon_query_cover(); ?>
    <section id="cover">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/excerpt', 'cover' ); ?>
      <?php endwhile; ?>
    <?php endif;?>
    </section>

    <?php $wp_query = clone $blog_list_query; ?>
  <?php endif; // End homepage ?>
    <section id="blog-list" class="blog-list">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/excerpt' ); ?>
      <?php endwhile; ?>
    <?php endif;?>
    </section>

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