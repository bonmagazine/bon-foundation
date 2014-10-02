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
	</header>
	<div class="entry-content">
		<?php the_content(__('Continue reading...', 'bon')); ?>
	</div>
	<footer class="entry-footer">
	  <p class="entry-tags"><span class="small-sys-title">Taggar – </span>
	  <?php echo get_the_term_list(get_the_ID(), 'bon_blogs_tag', '', ', '); ?>
	  </p>
	  <span class="comment-count small-sys-title"><a href="<?php the_permalink();  ?>#disqus_thread"></a></span>

	  <div class="entry-social">
	    <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_the_permalink()); ?>&amp;width=50&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=395965657184574" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:65px; margin-right: 30px" allowTransparency="true"></iframe>

	    <iframe allowtransparency="true" frameborder="0" scrolling="no"
	            src="https://platform.twitter.com/widgets/tweet_button.html?count=vertical"
	            style="width:60px; height:65px;"></iframe>
	  </div>
	</footer>
</article>