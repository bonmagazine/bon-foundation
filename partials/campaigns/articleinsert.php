<?php $article_insert = bon_get_campaign('article-insert'); ?>
<?php if($article_insert): ?>
<div class="article-insert">
  <?php foreach ($article_insert as $post): setup_postdata( $post ); ?>
    <?php the_content(); ?>
  <?php endforeach; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
<script>
var p = document.querySelectorAll(".entry-content p"),
    ad = $(".article-insert").contents();
    dest = (p.length > 5)? document.querySelector(".entry-content p:nth-child(4)") 
                         : document.querySelector(".entry-content p:last-child()");
dest.appendChild(ad);
</script>