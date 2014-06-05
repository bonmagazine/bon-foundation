<?php
if(!function_exists('bon_entry_meta')) :
  function bon_the_entry_meta() {
    bon_the_entry_author();
    bon_the_entry_date();    
  }

  function bon_the_entry_date() {
    echo '<time class="date updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_date() .'</time>';
  }

  function bon_the_entry_author() {
    echo '<p class="byline author">av <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
  }
endif;
?>