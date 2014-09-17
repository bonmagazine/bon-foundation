<?php $article_insert = bon_get_campaign('article-insert'); ?>
<?php if($article_insert): ?>
<div class="article-insert">
  <?php foreach ($article_insert as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
  <?php endforeach; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
<script>
var $dest = document.querySelector(".entry-content p:nth-child(3)"),
    $ad = document.querySelector(".article-insert");
$dest.appendChild($ad);
</script>