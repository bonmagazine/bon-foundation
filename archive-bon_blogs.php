<?php get_header(); ?>

  <div class="archive-main main" role="main">

    <?php get_template_part( 'partials/header', 'bon_blogs' ); ?>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="bon-blog-list infinite-scroll">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/content', 'bon_blogs' ); ?>
      <?php endwhile; ?>
    </section>
    <script type="text/javascript">
    var disqus_shortname = 'bonmagazine';
    (function () {
    var s = document.createElement('script'); s.async = true;
    s.type = 'text/javascript';
    s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
    (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
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