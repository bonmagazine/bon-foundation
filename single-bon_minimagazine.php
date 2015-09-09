<?php get_header(); ?>

  <div class="main single-main single-bonbon inner-wrap-row" role="main">

  <?php get_template_part( 'partials/campaigns/topbanner', 'single' ); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

      <?php $bonbon_pages = bon_get_bonbon_children_pages(); ?>
      <?php if($bonbon_pages): ?>
        <?php $bon_count = 0 ?>
        <?php foreach ($bonbon_pages as $i=>$post): setup_postdata( $post ); ?>
          <div class="page">
            <div class="container">
              <?php if ($bon_count != 1) { ?>
                <?php the_content(); ?>
                <?php $bon_count++; ?>
              <?php } else { ?>
                <?php the_content(); ?>
            </div>
          </div>
          <div class="page">
            <div class="container">                        
                <?php get_template_part( 'partials/campaigns/articleinsert' ); ?>
                <?php $bon_count++; ?>
              <?php } ?>        
            </div>
          </div>
        <?php endforeach; wp_reset_postdata(); ?>
      <?php endif;?>

    </article>
  <?php endwhile;?>

  </div>
    
<?php get_footer(); ?>