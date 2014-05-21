<?php
/**
 * Template for homepage posters.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>