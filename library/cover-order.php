<?php

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
  if( !get_post_meta( $post_id, 'bon_cover_order', 'true' )
   && $post->post_type == 'post'){
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
<style type="text/css">
	li {
		text-align: center;
		max-width:500px;
		padding: 20px;
		border-bottom: 1px solid black;
	}
	label {
		display: block;
		font-family: serif;
		font-size:18px;
		text-align: center;
	}
</style>
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


