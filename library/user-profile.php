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
  update_usermeta( $user_id, 'about_page_id', $_POST['page_id'] );

}

/*
 *
 * Advanced Custom field for Blog header
 * Requires: Advanced Custom Fields plugin
 *
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_user',
    'title' => 'user',
    'fields' => array (
      array (
        'key' => 'field_545caaf7ff703',
        'label' => 'Bon Blog Header',
        'name' => 'bon_blog_header',
        'type' => 'image',
        'instructions' => 'upload header for blog',
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'ef_user',
          'operator' => '==',
          'value' => 'bon_blogger',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}


