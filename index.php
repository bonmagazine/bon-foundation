<?php get_header(); ?>

  <div class="index-main main" role="main">
  <?php if(is_home() && !get_query_var('paged')): // Only show Poster and Cover posts on home page, first page ?>
    <?php $poster_posts = bon_get_posters(); ?>
    <?php if($poster_posts): ?>
    <section id="poster" class="fullwidth-row">
      <?php foreach ($poster_posts as $post): setup_postdata( $post ); ?>
        <?php get_template_part( 'partials/excerpt', 'poster' ); ?>
      <?php endforeach; wp_reset_postdata(); ?>
    </section>
    <?php endif;?>


    <?php $cover_posts = bon_get_cover_posts(); ?>
    <?php if($cover_posts): ?>
    <section id="cover" class="inner-wrap-row">
      <?php foreach ($cover_posts as $post): setup_postdata( $post ); ?>
        <?php get_template_part( 'partials/excerpt', 'cover' ); ?>
      <?php endforeach; wp_reset_postdata(); ?>
    </section>
    <?php endif;?>



  <?php endif; // End homepage ?>

  <?php if ( have_posts() ) : ?>
  <div class="inner-wrap-row">
    <section id="blog-list" class="blog-list infinite-scroll masonry">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/excerpt' ); ?>
      <?php endwhile; ?>
    </section>
  </div>
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