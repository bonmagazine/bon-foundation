<?php get_header(); ?>

  <div class="archive-main main" role="main">
    <header class="title-header sticky">
      <a href="<?php bon_the_bon_blog_url(); ?>">
        <?php bon_the_bon_blog_header_image() ?>
        <h1 class="archive-title"><?php bon_the_bon_blog_title(); ?></h1>
        <?php if( bon_the_bon_blog_subtitle() ):?>
        <p class="intro-text">
          <?php bon_the_bon_blog_subtitle(); ?>
        </p>
        <?php endif; ?>
      </a>
    </header>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="bon-blog-list infinite-scroll">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/content' ); ?>
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