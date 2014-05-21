<?php
/**
 * The default template for displaying excerpts. Used for index/archive/search.
 *
 * @subpackage Bon
 * @since bon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( the_cover_template_class() ); ?>>
  <header>
    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  </header>
  <div class="main">
    <div class="entry-meta">
      <div class="section">
        <p class="small-sys-title"><?php the_terms( $post->ID, 'section' ); ?></p>
      </div>
      <div class="author-and-date">
        <?php bon_entry_meta(); ?>
      </div>
      <div class="social-media">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class=" fb main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Facebook.png" width="24"></a>
        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" class="twitter main-nav-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png" width="24"></a>
      </div>
    </div>
    <div class="thumbnail">
      <?php the_cover_thumbail(); ?>
    </div>
    <div class="entry-content">
      <?php if( in_category( array('short-post', 'ad') ) ): ?>
        <?php the_content(); ?>
      <?php else: ?>
        <p><?php the_excerpt(); ?></p>
        <p class="read-more"><a href="<?php the_permalink(); ?>">»&nbsp;Läs mer</a></p>
      <?php endif; ?>
    </div>
  </div>
</article>

<?php /*
<?php if($item->type == 'post'): ?>
  <article class="item blog-item <?=$column?> <?=$item->categories_classes?> front-page-template-<?=$item->fields->front_page_template?>">
    <div class="item-wrap" >
      <p class="small-sys-title indent"><?=$item->section?></p>
      <h1 class="title"><a href="<?=$item->permalink?>"><?=$item->post_title?></a></h1>
      <p class="author-and-date"><?=__('by', 'bon')?> <?=$item->post_author_name?> &mdash; <?=$item->post_nice_date?></p>
      <a class="thumb_link" href="<?=$item->thumblink?>">
        <?php if(!empty($item->thumb[0])): ?>
          <?php
          $thumb_data = ($item->fields->front_page_template == '4')? $item->big_cover_image : $item->small_cover_image;
          ?>
          <?php echo $thumb_data ?>
        <?php endif; ?>
      </a>
      <?php
      $min_height = ($item->fields->columns > 1 && !empty($item->thumb[0])) ? 'min-height:'.$height.'px' : '';
      ?>
      <div class="body" style="<?=$min_height?>">
        <?=$item->post_excerpt?>
        <a class="read_more_link" href="<?=$item->permalink?>">
          <?=ucfirst(html_no_break(__('read more', 'bon')))?>
        </a>
      </div>
    </div>
  </article>
<?php elseif($item->type == 'post_ad'): ?>
  <article class="item blog-item <?='col_'.$item->fields->columns?> <?=$item->categories_classes?> front-page-template-<?=$item->fields->front_page_template?>" >
    <div class="body" >
      <?=$item->post_content?>
    </div>
  </article>
<?php elseif($item->type == 'short_post' || $item->type == 'film'): ?>
  <article class="item blog-item <?=$item->categories_classes?> front-page-template-<?=$item->fields->front_page_template?>" >
    <div class="item-wrap" >
      <p class="small-sys-title indent"><?=$item->section?></p>
      <h1 class="title"><?=$item->post_title?></h1>
      <p class="author-and-date"><?=__('by', 'bon')?> <?=$item->post_author_name?> &mdash; <?=$item->post_nice_date?></p>
      <?php if($item->embed): ?>
        <?php echo $item->embed; ?>
      <?php elseif(!empty($item->thumb[0])): ?>
        <?php echo $item->big_cover_image ?>
      <?php endif; ?>

      <div class="body" >
        <?=$item->post_content?>
      </div>
    </div>
  </article>
<?php endif; ?>

*/ ?>