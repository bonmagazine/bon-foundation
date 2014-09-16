<?php get_header(); ?>

  <div class="archive-main main archive-compact" role="main">

    <?php get_template_part( 'partials/header', 'bon_blogs' ); ?>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php /*
  <?php $posts_by_date = bon_get_bon_blog_posts_by_date( get_the_author_meta( 'ID' ) ); ?>
  <?php foreach ( $posts_by_date as $year_key => $y ): ?>
    <h1><?php echo $year_key; ?></h1>
    <?php foreach ( $y as $month_key => $m ): ?>
      <h2><?php echo $month_key; ?></h2>
      <?php foreach ( $m as $post ): ?>
        <p><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
      <?php endforeach; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
  */ ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="bon-blog-list infinite-scroll">
      <?php $index_date = new DateTime("+12 months"); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php $post_date = new DateTime( $post->post_date ); ?>
        <?php if ( $index_date->format('Y') !== $post_date->format('Y') ): $index_date = $post_date; ?>
          <h1 class="hentry bon_blogs year date-separator">
            <?php echo $post_date->format('Y'); ?>
          </h1>
        <?php endif; ?>
        <?php if (  $index_date->format('n') !== $post_date->format('n') ): $index_date = $post_date; ?>
          <h2 class="hentry bon_blogs month date-separator">
            <?php echo $post_date->format('n'); ?>
          </h2>
        <?php endif; ?>
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