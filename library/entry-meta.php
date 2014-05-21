<?php
if(!function_exists('bon_entry_meta')) :
    function bon_entry_meta() {

    	$meta = '<p class="byline author">av <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';

    	$meta .= '<time class="date updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_date() .'</time>';
      

      echo $meta;
    }
endif;
?>