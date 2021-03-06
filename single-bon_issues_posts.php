<?php get_header(); ?>

  <div class="main single-main inner-wrap-row" role="main">

  <?php //get_template_part( 'partials/campaigns/topbanner', 'single' );?>

  <?php while (have_posts()) : the_post(); ?>
    <article <?php 
	    $classes = array('post','single-post');
		post_class( $classes ) ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <p class="section">
          <?php bon_the_bon_issue($post->ID); ?>
        </p>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_the_entry_meta(); ?>
        </div>
      </header>
      <!-- Hide for now 
	    <div class="entry-social">
        <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_the_permalink()); ?>&amp;width=50&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=395965657184574" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:65px; margin-right: 30px" allowTransparency="true"></iframe>

        <iframe allowtransparency="true" frameborder="0" scrolling="no"
                src="https://platform.twitter.com/widgets/tweet_button.html?count=vertical"
                style="width:60px; height:65px;"></iframe>
      </div>-->
      <div class="entry-content">
        <?php the_content(); ?>
        <?php get_template_part( 'partials/campaigns/articleinsert' ); ?>
      </div>
      <footer class="entry-footer">
        <div class="tags">
          <h2 class="footer-title label"><?= __('Taggar', 'bon'); ?>:</h2>
          <p>
            <?php the_tags(''); ?>
          </p>
        </div>
      </footer>
    </article>
    <!-- hide for now as well
    <aside class="related-content">

      <?php $author_posts = bon_get_author_posts(); ?>
      <?php if($author_posts): ?>
      <section class="same-author-posts">
        <h1 class="aside-title"><span class="title-label"><?= __('Mer från', 'bon'); ?></span>&thinsp;<?php the_author_posts_link(); ?></h1>
        <?php if(the_author_meta('description')): ?>
        <p class="aside-text bio"><?php the_author_meta('description'); ?></p>
        <?php endif; ?>
        <div class="blog-list">
        <?php foreach ($author_posts as $post): setup_postdata( $post ); ?>
          <?php get_template_part( 'partials/excerpt' ); ?>
        <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </section>
      <?php endif;?>

      <?php related_posts(); ?>

    </aside><!-- .related-content -->
  <?php endwhile;?>

  </div>

<?php get_footer(); ?>
