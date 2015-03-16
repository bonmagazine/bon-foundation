<?php get_header(); ?>

  <div class="main single-main inner-wrap-row" role="main">

  <?php get_template_part( 'partials/header', 'bon_blogs' ); ?>

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <div class="section">
          <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
        </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_the_entry_date(); ?>
        </div>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>

        <?php get_template_part( 'partials/campaigns/articleinsert' ); ?>
      </div>
      <footer class="entry-tags">
        <?php echo get_the_term_list(get_the_ID(), 'bon_blogs_tag', '<p><span class="small-sys-title">Taggar – </span>', ', ', '</p>'); ?>
      </footer>
    </article>
    <?php if(is_single() && comments_open() ): ?>
      <div id="disqus_thread"></div>
      <script type="text/javascript">
          var disqus_shortname = 'bonmagazine';
          (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
          })();
      </script>
    <?php endif; ?>
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>