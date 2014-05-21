<?php get_header(); ?>

  <div class="main single-main" role="main">
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header class="entry-main">
        <div class="section">
          <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
        </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="author-and-date">
          <?php bon_entry_meta(); ?>
        </div>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
        <p><?php the_tags(); ?></p>
      </footer>
    </article>
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>