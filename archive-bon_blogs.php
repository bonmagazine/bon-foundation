<?php get_header(); ?>

  <div class="archive-main main <?php if( get_query_var('yearly') ): ?>archive-compact<?php endif; ?>" role="main">

    <?php get_template_part( 'partials/header', 'bon_blogs' ); ?>

  <?php if ( $top_banner ) : ?>
    <div class="homepage-top-banner">
      <?php echo $top_banner->post_content ?>
    </div>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>
    <section id="blog-list" class="bon-blog-list archive-blog-list archive-compact infinite-scroll">
	  <h1 class="archive-title">Arkiv</h2>  

      <?php $index_date = new DateTime("+12 months"); ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <?php if( get_query_var('yearly') == 1 ): // Dates for yearly archive ?>
          <?php $post_date = new DateTime( $post->post_date ); ?>
          <?php if ($index_date->format('Y') != $post_date->format('Y')
                ||  $index_date->format('n') !== $post_date->format('n')): 
                $index_date = $post_date; ?>
            <h1 class="hentry year date-separator small-medium-title">
              <?php echo $post_date->format('F'); ?> <?php echo $post_date->format('Y'); ?> 
            </h1>
          <?php endif; ?>
        <?php endif; ?>
		<header>
		    <time class="the-day" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j') ?></time>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
      <?php endwhile; ?>
    </section>
    <?php if( get_query_var('yearly') !== 1 ): // hide disqus from yearly archive?>
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
  <?php endif;?>

    <nav id="nav-below">
      <div class="nav-next alignleft">
        <?php next_posts_link( 'Older posts' ); ?>
      </div>
      <div class="nav-previous alignright">
        <?php previous_posts_link( 'Newer posts' ); ?>
      </div>
    </nav>

  </div><!-- .main -->
    
<?php get_footer(); ?>