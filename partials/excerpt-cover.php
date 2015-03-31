<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>
<?php if( in_category( array('short-post', 'ad') ) ) $short_post = true; ?>
<?php if( in_category( array('ad') ) ) $ad_post = true; ?>


<?php if ( (get_the_title() != "Placeholder Blogs Widget") && (get_the_title() != "Placeholder Bonbon Widget") ): ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( the_cover_template_class() ); ?>>
  
  <?php if( !$ad_post ): ?>
  <header>
    <div class="section">
      <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
    </div>
    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="author">
      <?php bon_the_entry_author(); ?>
    </div>
  </header>
  <?php endif; ?>

  <div class="main">
    <?php if( !$ad_post ): ?>
    <div class="entry-meta">
      <div class="section">
        <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
      </div>
      <div class="date">
        <?php bon_the_entry_date(); ?>
      </div>
      <?php get_template_part( 'partials/socialmedia' ); ?>
    </div>
    <?php endif; ?>
    
    <?php if( !$short_post ): ?>
    <div class="thumbnail">
      <a href="<?php the_permalink(); ?>">
      <?php the_cover_thumbail(); ?>
      </a>
    </div>
    <?php endif; ?>

    <div class="entry-excerpt">
      <?php if( $short_post ): ?>
        <?php the_content(); ?>
      <?php else: ?>
      <p>
        <?php the_excerpt(); ?> 
        <a class="read-more" href="<?php the_permalink(); ?>">»&nbsp;Läs&nbsp;mer</a>
      </p>
      <?php endif; ?>
    </div>
  </div>
</article>
<?php endif; ?>

<?php if (get_the_title() == "Placeholder Blogs Widget"): ?>
  	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
  	</section>
  	<div class="fullrow-bg">
	    <section class="cover-blogs">
	  	<h1 class="blogs-top-h">Bloggar på Bon</h1>		    
		<?php dynamic_sidebar( 'sidebar' ); ?>
		</section><!-- #primary-sidebar -->
  	</div>
	<section id="cover" class="inner-wrap-row">
	<?php endif; ?>
<?php endif; ?>


<?php if (get_the_title() == "Placeholder Bonbon Widget"): ?>
	<?php $cover_posts = bon_get_bonbons_for_cover(); ?>
	<?php if($cover_posts): ?>
	<section class="bonbons-cover">
	  <?php foreach ($cover_posts as $post): setup_postdata( $post ); ?>
	    <?php get_template_part( 'partials/excerpt', 'bonbon' ); ?>
	  <?php endforeach; wp_reset_postdata(); ?>
	</section>
	<?php endif;?>
<?php endif;?>

