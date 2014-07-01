<?php get_header(); ?>

  <div class="main single-main" role="main">

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <div class="section">
          <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
        </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_the_entry_meta(); ?>
        </div>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <p><?php the_tags(); ?></p>
      </footer>
    </article>
    <aside class="related-content">

      <?php $author_posts = bon_get_author_posts(); ?>
      <?php if($author_posts): ?>
      <section class="same-author-posts">
        <h1 class="aside-title"><?= __('Other texts by', 'bon'); ?> <?php the_author_posts_link(); ?></h1>
        <p class="aside-text bio"><?php the_author_meta('description'); ?></p>
        <?php foreach ($author_posts as $post): setup_postdata( $post ); ?>
          <?php get_template_part( 'partials/excerpt', 'small' ); ?>
        <?php endforeach; wp_reset_postdata(); ?>
      </section>
      <?php endif;?>

      <?php related_posts(); ?>

    </aside><!-- .related-content -->
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>