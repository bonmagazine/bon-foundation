<?php
add_action( 'show_user_profile', 'bon_display_extra_profile_fields' );
add_action( 'edit_user_profile', 'bon_display_extra_profile_fields' );

function bon_display_extra_profile_fields( $user ) { ?>

	<h3>BON Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>
		<tr>
			<th><label FOR="bildbloggare">Bildbloggare</label></th>
			<td>
				<?php $status = get_the_author_meta( 'bildbloggare', $user->ID ); ?>
				<input TYPE="checkbox" name="bildbloggare" value="1" <?php checked( $status, 1 ); ?> /><br />
				<span CLASS="description">Check this if author will use Bildbloggare template.</span>
			</td>
		</tr>

    <?php 
      //Header image, blog title and subtitle only for bon bloggers
      if($user->roles[0] == 'bon_blogger'): 
    ?>
    <tr>
      <th colspan=2>
        Bon Blogs Settings
      </th>
    </tr>
    <tr>
      <th><label for="bon_blog_title">Blog Title</label></th>
      <td>
        <input type="text" name="bon_blog_title" id="bon_blog_title" value="<?php echo esc_attr( get_the_author_meta( 'bon_blog_title', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Please enter your blog's title.</span>
      </td>
    </tr>
    <tr>
      <th><label for="bon_blog_subtitle">Subtitle</label></th>
      <td>
        <input type="text" name="bon_blog_subtitle" id="bon_blog_subtitle" value="<?php echo esc_attr( get_the_author_meta( 'bon_blog_subtitle', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Please enter your blog's subtitle.</span>
      </td>
    </tr>
    <tr>
      <th><label for="bon_blog_header_image">Blog Header Image</label></th>
       
      <td>
        <img id="upload_header_preview" src="<?php echo esc_attr( get_the_author_meta( 'bon_blog_header_image', $user->ID ) ); ?>"><br>
        <input type="hidden" name="bon_blog_header_image" id="bon_blog_header_image" value="<?php echo esc_attr( get_the_author_meta( 'bon_blog_header_image', $user->ID ) ); ?>" class="regular-text" />
        <input type="hidden" name="bon_blog_header_image_id" id="bon_blog_header_image_id" value="<?php echo esc_attr( get_the_author_meta( 'bon_blog_header_image_id', $user->ID ) ); ?>" class="regular-text" />
        <input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />
        <span class="description">Please upload the image for your blog header.</span>
      </td>
    </tr>
    <tr>
      <th><label for="bon_blog_style_box">Custom style box</label></th>
      <td>
        <?php 
          if( get_the_author_meta( 'bon_blog_style_box', $user->ID ) !== '') {
            $style_box = esc_attr( get_the_author_meta( 'bon_blog_style_box', $user->ID ) );
          } else {
            $style_box = "
header.title-header {
}

h1.article-title {
}

p.intro-text {
}
";
          }
        ?>
        <textarea name="bon_blog_style_box" id="bon_blog_style_box" rows="5" cols="30"><?php echo $style_box; ?></textarea><br>
        <span class="description">Custom stylesheet.</span>
      </td>
    </tr>
    <tr>
      <th><label for="bon_blog_header_image">About page</label></th>
      <td>
        <?php wp_dropdown_pages( array(   'authors' => $user->ID,
                                          'selected'         => get_the_author_meta( 'about_page_id', $user->ID ),
                                          'post_type' => 'bon_blogs_pages') ); ?> 

        <span class="description">Page used for the about page. <a href="http://bon.dev/live/wp-admin/post-new.php?post_type=bon_blogs_pages">Create one</a> if you haven't already.</span>

      </td>
    </tr>


    <?php endif; ?>

	</table>
<?php }

add_action( 'personal_options_update', 'bon_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'bon_save_extra_profile_fields' );

function bon_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'bildbloggare', $_POST['bildbloggare'] );
  update_usermeta( $user_id, 'bon_blog_title', $_POST['bon_blog_title'] );
  update_usermeta( $user_id, 'bon_blog_subtitle', $_POST['bon_blog_subtitle'] );
  update_usermeta( $user_id, 'bon_blog_style_box', $_POST['bon_blog_style_box'] );
  update_usermeta( $user_id, 'bon_blog_header_image', $_POST['bon_blog_header_image'] );
  update_usermeta( $user_id, 'bon_blog_header_image_id', $_POST['bon_blog_header_image_id'] );
  update_usermeta( $user_id, 'about_page_id', $_POST['page_id'] );

}

function bon_profile_upload_js() {
?>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery(document).find("input[id^='uploadimage']").live('click', function(){
      formfield = jQuery('#bon_blog_header_image').attr('name');
      tb_show('Upload a blog header image', 'media-upload.php?type=image&amp;TB_iframe=true', false);
       
      window.send_to_editor = function(html) {
        var imgurl = jQuery('img',html).attr('src'),
            aEl = jQuery(html).attr('rel'), //will be something like <a href="..." rel="attachment wp-att-29761">...</a>
            imgId = aEl.match(/wp\-att\-(\d*)/i)[1];
        jQuery('#bon_blog_header_image').val(imgurl);
        jQuery('#bon_blog_header_image_id').val(imgId);
        tb_remove();

        jQuery('#upload_header_preview').attr('src',imgurl);  
        jQuery('#submit').trigger('click');
      }
       
      return false;
    });
  });
  </script>
<?php
}
add_action('admin_head','bon_profile_upload_js');
 
// the following is the js and css for the upload functionality
function bon_enqueu_scripts_init(){
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'bon_enqueu_scripts_init');


/*
 * Cover Order meta information
 *
 * It can be called with an action of update, delete, and get (default)
 * When called with an action of update $cover_order must be provided.
 * i.e. bon_cover_order( $post->ID, 'update', 4 );
 *
 **/

add_filter('content_save_pre', 'bon_cover_order_default_value');

function bon_cover_order_default_value($post_content) {
  global $post;
  $post_id = $post->ID;
  if( !get_post_meta( $post_id, 'bon_cover_order', 'true' ) ){
    bon_cover_order($post_id, 'update', 1000);
  }

  return $post_content;
}

add_action( 'admin_menu', 'bon_cover_order_menu' );

function bon_cover_order_menu() {
	add_object_page( 'Cover Order', 'Cover Order', 'manage_options','bon-cover-order', 'bon_cover_order_options' );
}

function bon_cover_order_options() {
  //must check that the user has the required capability 
  if (!current_user_can('manage_options'))
  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  // variables for the field and option names 
  $opt_name = 'bon_cover_order';
  $hidden_field_name = 'bon_cover_order_submit_hidden';
  $data_field_name = 'bon_cover_order';

  // See if the user has posted us some information
  // If they did, this hidden field will be set to 'Y'
  if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
      // Save the posted value in the database
      foreach ($_POST[ $data_field_name ] as $id => $value) {
	      bon_cover_order( $id, 'update', $value);
        //echo  $id .':'. $value .'<br>';
      }

      // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Cover Order saved.', 'menu-test' ); ?></strong></p></div>
<?php

  }

  $opt_val = array();

  $args = array( 'post_type' => 'post' 
								,'category_name' => 'cover' 
								,'orderby' => 'meta_value_num'
                ,'meta_key' => 'bon_cover_order'
								,'order' => 'ASC'
                ,'nopaging' => true
								);

  $the_query = new WP_Query( $args );

	while ( $the_query->have_posts() ) : $the_query->the_post();
	  // Read in existing option value from database
	  $opt_val[get_the_ID()] = array( 'post' => $the_query->post, 
                                    'fields' => get_fields() 
                                    );
	endwhile;

  // Now display the settings editing screen

  echo '<div class="wrap">';

  // header

  echo "<h2>" . __( 'Bon Cover Order', 'menu-test' ) . "</h2>";

  // settings form
  
  ?>

<form name="form1" method="post" action="" id="cover-sort">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<ul class="sortable">
<?php foreach ($opt_val as $id => $item): ?>	
<?php $order = bon_cover_order( $id, 'get'); ?>	
<li class="front-page-template-<?= $item['fields']['front_page_template'] ?>">
  <?php echo get_the_post_thumbnail( $id, array(154,154) ); ?> 
	<label for="<?= $data_field_name ?>[<?= $id ?>]"><?= $item['post']->post_title ?></label>
	<input type="hidden" name="<?= $data_field_name ?>[<?= $id ?>]" id="<?= $data_field_name ?>[<?= $id ?>]" value="<?= $order ?>" size="20">
</li>
<?php endforeach; ?>	
</ul>
<hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>
<script>
(function($) {
	$('.sortable')
		.sortable({
			stop: function(event, ui) { 
				$('.sortable li input').each(function(e){
					$(this).attr('value', e+1);
				});
			}
		})
		.disableSelection();
})(jQuery);

</script>

<?php
}

/*
 * Bon Cover Order update, delete, get
 *
 * It can be called with an action of update, delete, and get (default)
 * When called with an action of update $cover_order must be provided.
 * i.e. bon_cover_order( $post->ID, 'update', 4 );
 */ 

function bon_cover_order( $post_id, $action = 'get', $cover_order = 0 ) {
  
  //Let's make a switch to handle the three cases of 'Action'
  switch ($action) {
    case 'update' :
      if( ! $cover_order )
        //If nothing is given to update, end here
        return false;
      
      //add_post_meta usage:
      //add_post_meta( $post_id, $meta_key, $meta_value, $unique = false )
      
      //update_post_meta usage:
      //update_post_meta( $post_id, $meta_key, $meta_value )
      
      //If the $cover_order variable is supplied,
      //add a new key named 'cover_order', containing that value.
      //If the 'cover_order' key already exists on this post,
      //this command will update it to the new value
      elseif( $cover_order ) {
        add_post_meta( $post_id, 'bon_cover_order', $cover_order, true ) or
          update_post_meta( $post_id, 'bon_cover_order', $cover_order );
        return true;
      }
    case 'delete' :
      //delete_post_meta usage:
      //delete_post_meta( $post_id, $meta_key, $prev_value = ' ' )
    
      //This will delete all instances of the following keys from the given post
      delete_post_meta( $post_id, 'bon_cover_order' );
      
    break;
    case 'get' :
      //get_post_custom usage:
      //get_post_meta( $post_id, $meta_key, $single value = false )
  
      //$stored_cover_order will be the first value of the key 'cover_order'
      $stored_cover_order = get_post_meta( $post_id, 'bon_cover_order', 'true' );

      //Now we need a nice ouput format, so that
      //the user can implement it how he/she wants:
      //ie. echo bon_cover_order( $post->ID, 'get' );

      if ( ! empty( $stored_cover_order ) ) {
        $return = $stored_cover_order;
      }
      else { 
      	$return = 'nop'; 
      }
      
      return $return;
    default :
      return false;
    break;
  } //end switch
} //end function


/*
 * Bon record post views
 *
 */ 

function bon_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function bon_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

?>
