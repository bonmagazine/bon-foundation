<?php
if(!function_exists('bon_entry_meta')) :
  function bon_the_entry_meta() {
    bon_the_entry_author();
    bon_the_entry_date();    
  }

  function bon_the_entry_date() {
    echo '<p class="date updated"><time datetime="'. get_the_time('c') .'" pubdate>'. get_the_date() .'</time></p>';
  }

  function bon_the_entry_author() {
    echo '<p class="byline author"><span class="label">av</span> <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
  }
endif;
?>