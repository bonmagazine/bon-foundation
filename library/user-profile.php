<?php

/* 
 *
 *  Extra fields for user profiles 
 *  (including image header for bon bloggers)
 *
 */

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
