<?php get_header(); ?>

  <div class="main single-main inner-wrap-row" role="main">

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('videoplayer') ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <p class="entry-pre-title"><?php echo get_the_title($post->post_parent); ?></p>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <div class="entry-content">
        <?php get_template_part( 'partials/videoplayer' ); ?>
      </div>
      <footer>
        <div class="extra-buttons">

          <div class="info-wrapper btn-wrapper">
            <button class="btn" data-dropdown="info-drop">» Info</button>
            <div class="f-dropdown content" data-dropdown-content id="info-drop">
              <div><?php echo get_post_meta( get_the_ID(), 'info', true ); ?></div>
            </div>
          </div>

          <div class="embed-wrapper btn-wrapper">
            <button class="btn" data-dropdown="embed-drop">» Dela</button>
            <div class="f-dropdown content" data-dropdown-content id="embed-drop">
              <textarea class="embed-code"><style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src="<?php echo bon_get_film_share_url(); ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe></div></textarea>
            </div>
          </div>

        </div>
      </footer>
    </article>
    <?php $siblings = bon_get_sibling_posts(get_post_type(), $post->post_parent, $post->ID); ?>
    <?php if($siblings): ?>
    <aside class="related-content">
      <h1 class="aside-title"><span class="title-label"><?= __('Mer från', 'bon'); ?></span>&thinsp;<?php echo get_the_title($post->post_parent); ?></h1>
      <div class="masonry blog-list">
      <?php foreach ($siblings as $post): setup_postdata( $post ); ?>
        <?php get_template_part( 'partials/excerpt', 'film' ); ?>
      <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </aside><!-- .related-content -->
    <?php endif; ?>

  <?php endwhile; ?>

  </div>

<?php get_footer(); ?>