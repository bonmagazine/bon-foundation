<?php
/*
 * 
 * Social Media Buttons
 * Use inside The Loop
 *
 */
?>

<div class="social-media">
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="share-btn fb main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Facebook.png" width="24"></a>
  <a href="https://twitter.com/share?via=bonmagazine&amp;lang=en&amp;url=<?php the_permalink(); ?>" class="share-btn twitter main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png" width="24"></a>
</div>