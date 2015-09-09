<?php get_header(); ?>

  <div class="main single-main inner-wrap-row" role="main">

  <?php get_template_part( 'partials/header', 'bon_blogs' ); ?>

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_the_entry_date(); ?>
        </div>
      </header>
      <div class="entry-content">
        <?php get_template_part( 'partials/campaigns/articleinsert' ); ?>
        <?php the_content(); ?>
      </div>
      <footer class="entry-footer">
       <p class="entry-tags"><span class="small-sys-title">Taggar – </span>
        <?php echo get_the_term_list(get_the_ID(), 'bon_blogs_tag', '', ', '); ?>
        </p>

        <div class="entry-social">
          <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_the_permalink()); ?>&amp;width=50&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=395965657184574" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:65px; margin-right: 30px" allowTransparency="true"></iframe>

          <iframe allowtransparency="true" frameborder="0" scrolling="no"
                  src="https://platform.twitter.com/widgets/tweet_button.html?count=vertical"
                  style="width:60px; height:65px;"></iframe>
        </div>
        
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