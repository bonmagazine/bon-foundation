<?php

function widgets_init_bon() {

  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s widget-sidebar">',
    'after_widget' => '</section>'
  ) );

  register_sidebar( array(
    'name' => 'Home Top Banner Ad',
    'id' => 'top_banner',
    'before_widget' => '<div class="home-top-banner top-banner">',
    'after_widget' => '</div>'
  ) );

  register_sidebar( array(
    'name' => 'Article Top Banner Ad',
    'id' => 'article_top_banner',
    'before_widget' => '<div class="article-top-banner top-banner">',
    'after_widget' => '</div>'
  ) );

  register_sidebar( array(
    'name' => 'Section Top Banner Ad',
    'id' => 'section_top_banner',
    'before_widget' => '<div class="section-top-banner top-banner">',
    'after_widget' => '</div>'
  ) );

  register_sidebar( array(
    'name' => 'Bonbon Top Banner Ad',
    'id' => 'bonbon_top_banner',
    'before_widget' => '<div class="bonbon-top-banner top-banner">',
    'after_widget' => '</div>'
  ) );

  register_sidebar( array(
   'name' => 'Bon Blogs Top Banner Ad',
   'id' => 'bonblogs_top_banner',
   'before_widget' => '<div class="bon-blogs-top-banner top-banner">',
   'after_widget' => '</div>'
  ) ); 

  register_widget( 'Most_Read_Posts_Widget' );

  register_widget( 'Bon_Twitter_Widget' );

  register_widget( 'Advanced_Recent_Posts_Widget' );

  register_widget( 'Recent_Tag_Posts_Widget' );

  register_widget( 'Bon_HR' );

  register_widget( 'Bon_Blogs_Widget' );

}

add_action( 'widgets_init', 'widgets_init_bon' );

/*
 *********************************
 *
 * Plugin Name: Bon Twitter Widget 
 *
 *********************************
 */

class Bon_Twitter_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'bon_twitter', // Base ID
      'Bon Twitter Widget', // Name
      array( 
        'description' => __( 'Bon Twitter Widget', 'text_domain' ), 
        'height' => __( 'height', 'text_domain' ) ) // Args
    );
  }

  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $height = apply_filters( 'widget_height', $instance['height'] );

    echo $before_widget;
    if ( ! empty( $title ) )
      echo $before_title . $title . $after_title;

    if ( ! empty( $height ) ) $height = 500;

    ?>
    <div id="twitter_div"></div>
    <?php

    echo $after_widget;
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['height'] = strip_tags( $new_instance['height'] );

    return $instance;
  }

  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'text_domain' );
    }

    if ( isset( $instance[ 'height' ] ) ) {
      $height = $instance[ 'height' ];
    }
    else {
      $height = __( '850', 'text_domain' );
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
    </p>
    <?php 
  }

}

/*
Plugin Name: Recent Section Posts Widget
Description: Adds a widget that can display recent posts from a section.
Version: 1
Author: Afonso Duarte
Author URI: http://afn.so
*/

class Advanced_Recent_Posts_Widget extends WP_Widget {
  
  /** constructor */  
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'section-posts', 
      'description' => __('Shows recent posts from specified section.')
    );
    parent::__construct('advanced-recent-posts', __('Section Recent Posts'), $widget_ops);
  }

  function widget($args, $instance) {

      extract( $args );
    
      $title = apply_filters( 'widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);  
      
      if ( ! $number = absint( $instance['number'] ) ) $number = 5;
          
      if( ! $cats = $instance["cats"] )  $cats='';
              
      $default_sort_orders = array('date', 'title', 'comment_count', 'rand');
      
        if ( in_array($instance['sort_by'], $default_sort_orders) ) {
      
        $sort_by = $instance['sort_by'];
      
        $sort_order = (bool) $instance['asc_sort_order'] ? 'ASC' : 'DESC';
      
        } else {
      
        // by default, display latest first
      
        $sort_by = 'date';
      
        $sort_order = 'DESC';
      
      }
      
      
      // post info array.
      
      $my_args=array(
               
        'showposts' => $number,
      
        'post_type' => 'post',

        'tax_query' => array(
          array(
            'taxonomy' => 'section',
            'field' => 'id',
            'terms' => $cats[0]
          )
        ),
      
        'orderby' => $sort_by,
      
        'order' => $sort_order
        
      );
      
      $term = get_term( $cats[0], 'section' );
      
      $adv_recent_posts = null;
      
      $adv_recent_posts = new WP_Query($my_args);
          
      echo "<section class='widget section-posts ".$term->slug."'>";
      
      
      // Widget title
      
      echo $before_title;
      
      echo $instance["title"];
      // echo __( $term->name, 'bon');
      
      echo $after_title;
            
      // Post list
      
      
      while ( $adv_recent_posts->have_posts() ) {

        $adv_recent_posts->the_post();

      ?>

      <article class="recent-post-item">

        <?php echo get_the_post_thumbnail(get_the_ID(), 'square-thumbnail'); ?>

        <h3><a  href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="post-title"><?php the_title(); ?></a></h3>

        <p class="post-date"><?php the_time("j M Y"); ?></p>

        <p class="author">—<?php echo __('by', 'bon') ?> <?php the_author(); ?></p>

      </article>

      <?php

      }

      wp_reset_query();

      echo "</section>";      
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['cats'] = $new_instance['cats'];
    $instance['sort_by'] = esc_attr($new_instance['sort_by']);
    $instance['show_type'] = esc_attr($new_instance['show_type']);
    $instance['asc_sort_order'] = esc_attr($new_instance['asc_sort_order']);
    $instance['number'] = absint($new_instance['number']);
    $instance['date'] =esc_attr($new_instance['date']);
    return $instance;
  }
   
  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
    $show_type = isset($instance['show_type']) ? esc_attr($instance['show_type']) : 'post';
    ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
 
         <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Sections:');?>           
            <?php
              $i = 0;
              $categories=get_terms('section', array('hide_empty'=> 0)); 
              // $categories=  get_categories('hide_empty=0');
              echo "<br/>";
              foreach ($categories as $cat) {
                $option='<input type="radio" id="'. $this->get_field_id( 'cats' ) .'['.$i.']" name="'. $this->get_field_name( 'cats' ) .'[]"';
                if (is_array($instance['cats'])) {
                    foreach ($instance['cats'] as $cats) {
                        if($cats==$cat->term_id) {
                             $option=$option.' checked="checked"';
                        }
                    }
                }
                $option .= ' value="'.$cat->term_id.'" />';

                $option .= '<label for="'. $this->get_field_id( 'cats' ) .'['.$i.']">'.$cat->name.'</label>';
                
                $option .= '<br />';
                echo $option;
                $i++;
              }
                
            ?>
            </label>
        </p>        
        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

    <?php
  }
}

/*
Plugin Name: Recent Tag Posts Widget
Description: Adds a widget that can display recent posts from a tag.
Version: 1
Author: Afonso Duarte
Author URI: http://afn.so
*/

class Recent_Tag_Posts_Widget extends WP_Widget {
  
  /** constructor */  
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'tag-posts', 
      'description' => __('Shows recent posts from specified tag.')
    );
    parent::__construct('recent-tag-posts', __('Tag Recent Posts'), $widget_ops);
  }

  function widget($args, $instance) {

      extract( $args );
    
      $title = apply_filters( 'widget_title', empty($instance['title']) ? 'Tag Posts' : $instance['title'], $instance, $this->id_base);  
      
      if ( ! $number = absint( $instance['number'] ) ) $number = 5;
          
      if( ! $tags = $instance["tags"] )  $tags='';
              
      $default_sort_orders = array('date', 'title', 'comment_count', 'rand');
      
        if ( in_array($instance['sort_by'], $default_sort_orders) ) {
      
        $sort_by = $instance['sort_by'];
      
        $sort_order = (bool) $instance['asc_sort_order'] ? 'ASC' : 'DESC';
      
        } else {
      
        // by default, display latest first
      
        $sort_by = 'date';
      
        $sort_order = 'DESC';
      
      }
      
      
      // post info array.
      
      $my_args=array(
               
        'showposts' => $number,
      
        'post_type' => 'post',

        'tag' => $tags,
      
        'orderby' => $sort_by,
      
        'order' => $sort_order
        
      );
            
      $adv_recent_posts = null;
      
      $adv_recent_posts = new WP_Query($my_args);
          
      echo "<section class='widget tag-posts ".$tags."'>";
      
      
      // Widget title
      
      echo $before_title;
      
      echo $instance["title"];
      // echo __( $tags, 'bon');
      
      echo $after_title;
            
      // Post list
      
      
      while ( $adv_recent_posts->have_posts() ) {

        $adv_recent_posts->the_post();

      ?>

      <article class="recent-post-item">

        <?php echo get_the_post_thumbnail(get_the_ID(), 'square-thumbnail'); ?>

        <h3><a  href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="post-title"><?php the_title(); ?></a></h3>

        <p class="post-date"><?php the_time("j M Y"); ?></p>

        <p class="author">—<?php echo __('by', 'bon') ?> <?php the_author(); ?></p>

      </article>

      <?php

      }

      wp_reset_query();

      echo "</section>";
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['tags'] = $new_instance['tags'];
    $instance['sort_by'] = esc_attr($new_instance['sort_by']);
    $instance['show_type'] = esc_attr($new_instance['show_type']);
    $instance['asc_sort_order'] = esc_attr($new_instance['asc_sort_order']);
    $instance['number'] = absint($new_instance['number']);
    $instance['date'] =esc_attr($new_instance['date']);
    return $instance;
  }
   
  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
    $tags = isset($instance['tags']) ? esc_attr($instance['tags']) : 'tag';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
    $show_type = isset($instance['show_type']) ? esc_attr($instance['show_type']) : 'post';
    ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
 
         <p>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Tags:');?>
            <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo $tags; ?>" /></p>

            </label>
        </p>        
        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

    <?php
  }
}

/*
Plugin Name: Bon Blogs Posts Widget
Description: Widget for Bon Blogs posts.
Version: 1
Author: Afonso Duarte
Author URI: http://afn.so
*/

class Bon_Blogs_Widget extends WP_Widget {
  
  /** constructor */  
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'bon-blogs-posts', 
      'description' => __('Shows recent posts from specified Bon Blogs.')
    );
    parent::__construct('bon-blogs-posts', __('Bon Blogs Posts'), $widget_ops);
  }

  function widget($args, $instance) {

    extract( $args );

    $title = apply_filters( 'widget_title', empty($instance['title']) ? 'Most Read' : $instance['title'], $instance, $this->id_base);  
              
    if( ! $author = $instance["author"] )  $author='';
    
    // post info array.
    
    $my_args=array(
             
      'showposts' => 1,
    
      'post_type' => 'bon_blogs',

      'author_name' => $author,
    
      'orderby' => 'date',
    
      'order' => 'DESC'
      
    );
          
    $bon_blogs_posts = null;
    
    $bon_blogs_posts = new WP_Query($my_args);

    echo "<article class='bon-blogs-widget ".$author."'>";
          
    // Post list
    
    while ( $bon_blogs_posts->have_posts() ) {

      $bon_blogs_posts->the_post();

      $blogTitle = get_the_author_meta( 'bon_blog_title' );
	  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(300,9999) );


    ?>
    <a class="no-ajax" href="/blogs/<?php echo get_the_author_meta( 'user_nicename' ); ?>" title="<?php the_title_attribute(); ?>" class="bon-blog-link">
      <div class="bon-blog-thumbnail" style="background-image:url(<?php echo $thumb['0']; ?>)">
        <?php echo $url; ?>
      </div>
      <div class="bon-blog-meta">
	    <div class="centered">
        <h1 class="bon-blog-title"><?php echo $blogTitle; ?></h1>
        <h2 class="bon-blog-post-title post-title"><?php the_title(); ?></h2>
        <p class="post-date"><?php echo get_the_date(); ?></p>
	    </div>
      </div>
    </a>

    <?php

    }

    wp_reset_query();

    echo "</article>";
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['author'] = $new_instance['author'];
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }
   
  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Most Read';
    $author = isset($instance['author']) ? esc_attr($instance['author']) : '';
    $bloggers = get_users( array('role' => 'bon_blogger') );
    ?>
         <p>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="hidden" value="<?php echo $author; ?>">
            <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Author:');?>
              <select id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>">
                <?php foreach ($bloggers as $blogger): ?>
                  
                <option value="<?php echo $blogger->user_nicename ?>" 
                        <?php if($blogger->user_nicename === $author): ?>selected<?php endif; ?> >
                  <?php echo $blogger->display_name ?>
                </option>

                <?php endforeach; ?>
              </select>
            </label>
        </p>        

    <?php
  }
}

/*
 * Plugin Name: Most Read Posts
*/

class Most_Read_Posts_Widget extends WP_Widget {
  
  /** constructor */  
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'most-read-posts', 
      'description' => __('Shows most read posts.')
    );
    parent::__construct('most-read-posts', __('Most Read'), $widget_ops);
  }

  function widget($args, $instance) {

      extract( $args );
    
      $title = apply_filters( 'widget_title', empty($instance['title']) ? 'Most Read' : $instance['title'], $instance, $this->id_base);  
      
      if ( ! $number = absint( $instance['number'] ) ) $number = 10;  

      if ( ! $date = absint( $instance['date'] ) ) $date = 3;      
      
      $lang = isset($_COOKIE['lang'])? $_COOKIE['lang'] : 'se';

      // post info array.    
      
      $my_args=array(

        'meta_key' => 'post_views_count', 

        'orderby' => 'meta_value_num',

        'order' => 'DESC',

        'category_name' => $lang,
               
        'showposts' => $number,
      
        'post_type' => 'post'
        
      );

      $GLOBALS['filter_where_string'] = " AND post_date > DATE_SUB(now(), INTERVAL ".$date." MONTH)";

      add_filter( 'posts_where', 'filter_where' );
            
      $most_read_posts = new WP_Query($my_args);

      remove_filter( 'posts_where', 'filter_where' );
          
      echo "<section class='widget most-read-posts ".$term->slug."'>";
      
      
      // Widget title
      
      echo $before_title;
      
      echo $instance["title"];
      
      echo $after_title;
            
      // Post list
            
    while ( $most_read_posts->have_posts() )

    {

      $most_read_posts->the_post();

      ?>

      <article class="recent-post-item">

        <?php echo get_the_post_thumbnail(get_the_ID(), 'square-thumbnail'); ?>

        <h3><a  href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="post-title"><?php the_title(); ?></a></h3>

        <p class="post-date"><?php the_time("j M Y"); ?></p>

        <p class="author">—<?php echo __('by', 'bon') ?> <?php the_author(); ?></p>

      </article>

      <?php

    }

    wp_reset_query();

    echo "</section>";      

  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = absint($new_instance['number']);
    $instance['date'] =esc_attr($new_instance['date']);
    return $instance;
  }
  
  
  
  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Most Read';
    $number = isset($instance['number']) ? absint($instance['number']) : 10;
    $date = isset($instance['date']) ? absint($instance['date']) : 3;

    ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
  
        <p><label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Number of months back:'); ?></label>
        <input id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $date; ?>" size="3" /></p>


    <?php
  }
}

/*
Plugin Name: Dividing Line
Description: Adds a dividing line to the sidebar.
Version: 1
Author: Afonso Duarte
Author URI: http://afn.so
*/

class Bon_HR extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'bon_hr', // Base ID
      'Bon_HR', // Name
      array( 'description' => __( 'Dividing Line', 'text_domain' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo '<hr class="widget dividing-line">';
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );

    return $instance;
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {

  }

}

?>