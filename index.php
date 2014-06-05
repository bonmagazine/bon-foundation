<?php get_header(); ?>

  <div class="index-main main" role="main">
  <?php if(is_home() && !get_query_var('paged')): // Only show Poster and Cover posts on home page, first page ?>

    <?php $poster_posts = bon_get_poster_posts(); ?>
    <?php if($poster_posts): ?>
    <section id="poster">
      <h1 class="hide">Poster</h1>
      <div class="poster-container">
        <ul class="poster-wrapper" 
            data-orbit 
            data-options="timer_speed: 4000; 
                          next_on_click: false;
                          navigation_arrows: true;
                          slide_number: false;
                          timer_show_progress_bar: false;
                          pause_on_hover: false;
                          timer: true">
        <?php foreach ($poster_posts as $post): setup_postdata( $post ); ?>
          <li><?php get_template_part( 'partials/content', 'poster' ); ?></li>
        <?php endforeach; wp_reset_postdata(); ?>
        </ul>
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

  <?php endif; // End homepage ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="blog-list">
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