<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php bon_the_entry_meta(); ?>
		<span class="comment-count"><a href="<?php echo $item->permalink ?>#disqus_thread"></a></span>
	</header>
	<div class="entry-content">
		<?php the_content(__('Continue reading...', 'bon')); ?>
	</div>
	<footer class="entry-tags">
	  <?php echo get_the_term_list(get_the_ID(), 'bon_blogs_tag', '<p><span class="small-sys-title">Taggar – </span>', ', ', '</p>'); ?>
	</footer>
</article>