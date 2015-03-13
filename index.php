<?php get_header(); ?>

  <div class="index-main main" role="main">
  <?php if(is_home() && !get_query_var('paged')): // Only show Poster and Cover posts on home page, first page ?>

    <?php $poster_posts = bon_get_poster_posts(); ?>
    <?php if($poster_posts): ?>
    <section id="poster">
      <h1 class="hide">Poster</h1>
      <div class="poster-container">
        <div class="poster-wrapper <?php if(count($poster_posts) > 1): ?>slick<?php endif; ?>" >
        <?php foreach ($poster_posts as $post): setup_postdata( $post ); ?>
          <div><?php get_template_part( 'partials/content', 'poster' ); ?></div>
        <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php $cover_posts = bon_get_cover_posts(); ?>
    <?php if($cover_posts): ?>
    <section id="cover">
      <?php foreach ($cover_posts as $post): setup_postdata( $post ); ?>
        <?php get_template_part( 'partials/excerpt', 'cover' ); ?>
      <?php endforeach; wp_reset_postdata(); ?>
    </section>
    <?php endif;?>

    <?php $cover_posts = bon_get_bonbons_for_cover(); ?>
    <?php if($cover_posts): ?>
    <section class="bonbons-cover">
      <?php foreach ($cover_posts as $post): setup_postdata( $post ); ?>
        <?php get_template_part( 'partials/excerpt', 'bonbon' ); ?>
      <?php endforeach; wp_reset_postdata(); ?>
    </section>

    <?php endif;?>


  <?php endif; // End homepage ?>

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