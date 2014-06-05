<?php get_header(); ?>

  <div class="main single-main" role="main">
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

      <?php $bonbon_pages = bon_get_bonbon_children_pages(); ?>
      <?php if($bonbon_pages): ?>
        <?php foreach ($bonbon_pages as $post): setup_postdata( $post ); ?>
          <div class="page">
            <div class="container" style="position:relative;"><?php the_content(); ?></div>
          </div>
        <?php endforeach; wp_reset_postdata(); ?>
      <?php endif;?>

    </article>
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>