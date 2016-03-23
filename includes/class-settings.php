<?php
//

namespace rtCamp\WP\rtEcom;

error_reporting( E_ALL );
if ( !class_exists( 'Settings' ) ) {

	/**
	 * Class Settings, adds a setting page
	 * where user can insert details about 
	 * the post type and taxonomies to be created
	 * @author Archana Solanki <archana.solanki@rtcamp.com>
	 */
	class Settings {

		// Initializes settings page
		public function init() {

			// Add admin menu page
			add_action( 'admin_menu', array( $this, 'rtecom_admin_menu' ) );
			
			// add hook to register post type
			add_action( 'init', array( $this, 'register_post_type' ) );
		}

		// Adds admin menu page to dashboard area
		function rtecom_admin_menu() {

			add_menu_page( 'Create Custom Post type', 'rtEcom', 'manage_options', 'rtecom', array( $this, 'create_settings_page' ), NULL, 26 );
		}

		/**
		 * Generate HTML
		 * post type labels
		 * arguments form
		 * @global type $title
		 */
		function create_settings_page() {
			global $title;
			echo "<h1>" . $title . "</h1>";
			?>
			<div class="wrap">
				<h2>Enter the labels</h2>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=rtecom" novalidate="novalidate">
					<br><font size="1"></font><table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label for="name">Post Type</label></th>
								<td><input name="post_type" type="text" id="post_type" class="regular-text" placeholder="Post Type" /><p class="description">insert the name of the post type.</p></td>
							</tr>
							<tr>
								<th scope="row"><label for="name">Name</label></th>
								<td><input name="name" type="text" id="name" class="regular-text" placeholder="Name" /><p class="description">insert the name of the post type.</p></td>
							</tr>
							<tr>
								<th scope="row"><label for="singular name">Singular Name</label></th>
								<td><input type="text" name="singular_name" id="singular_name" placeholder="Singular Name" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Menu Name</label></th>
								<td><input type="text" name="menu_name" id="menu_name" placeholder="Menu Name" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Name Admin Bar</label></th>
								<td><input type="text" name="name_admin_bar" id="name_admin_bar" placeholder="Name Admin Bar" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Add New</label></th>
								<td><input type="text" name="add_new" id="add_new" placeholder="Add New" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Add New Item</label></th>
								<td><input type="text" name="add_new_item" id="add_new_item" placeholder="Add New Item" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>New Item</label></th>
								<td><input type="text" name="new_item" id="new_item" placeholder="New Item" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Edit Item</label></th>
								<td><input type="text" name="edit_item" id="edit_item" placeholder="Edit Item" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>View Item</label></th>
								<td><input type="text" name="view_item" id="view_item" placeholder="View Item" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>All Items</label></th>
								<td><input type="text" name="all_items" id="all_items" placeholder="All Items" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Search Items</label></th>
								<td><input type="text" name="search_items" id="search_items" placeholder="Search Items" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Not Found</label></th>
								<td><input type="text" name="not_found" id="not_found" placeholder="Not Found" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Not Found in Trash</label></th>
								<td><input type="text" name="not_found_trash" id="not_found_trash" placeholder="Not Found in Trash" class="regular-text" /></td>
							</tr>
							<!--<tr>
							<div class="wp-media-buttons"><button type="button" class="button insert-media add_media" data-editor="content"><span class="wp-media-buttons-icon">Insert Image</span></button></div>
							</tr>-->
						</tbody>
					</table>
					<h2>Enter the Arguments</h2>
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Description</label></th>
								<td><textarea placeholder="Description" name="desc"></textarea></td>
							</tr>
							<tr>
								<th scope="row"><label>Public</label></th>
								<td><input type="checkbox" value="true"  name="public" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Publicly Query-able</label></th>
								<td><input type="checkbox" value="true"  name="public_queryable" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show UI</label></th>
								<td><input type="checkbox" value="true"  name="show_ui" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Menu</label></th>
								<td><input type="checkbox" value="true"  name="show_in_menu" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Query Variable</label></th>
								<td><input type="checkbox" value="true"  name="query_var" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Exclude from search</label></th>
								<td><input type="checkbox" value="true"  name="exclude_search" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Nav Menu</label></th>
								<td><input type="checkbox" value="true"  name="show_menu" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Admin bar</label></th>
								<td><input type="checkbox" value="true"  name="show_adminbar" placeholder="Yes" /> Yes </td>
							</tr>
							<tr>
								<th scope="row"><label>Can Export</label></th>
								<td><input type="checkbox" value="true"  name="export" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Supports</label></th>
								<td><select multiple="multiple" name="supports[]">
										<option>Title</option>
										<option>Editor</option>
										<option>Author</option>
										<option>Thumbnail</option>
										<option>Excerpt</option>
										<option>Trackbacks</option>
										<option>Custom Fields</option>
										<option>comments</option>
										<option>Revisions</option>
										<option>Page Attributes</option>
										<option>Post Formats</option>>
									</select></td>
							</tr>
						</tbody>
					</table>
					<p class="submit">
						<input type="submit" name="submit" id="submit" class="button button-primary" value="Save">
					</p>
				</form>
			</div>
			<?php
			//add_action( 'media_buttons', 'add_my_media_button', 15 );
			//$this->register_post_type();
		}

		/**
		 * save the labels
		 * take the arguments
		 * register post type
		 * @global type $wpdb
		 * @global type $user_ID
		 */
		public function register_post_type() {
			global $wpdb, $user_ID;
			// get the values of the labels
			$post_type = sanitize_key( isset( $_POST['post_type'] ) ? $_POST['post_type'] : ''  );
			$name = isset( $_POST['name'] ) ? $_POST['name'] : '';
			$singular_name = isset( $_POST['singular_name'] ) ? $_POST['singular_name'] : '';
			$menu_name = isset( $_POST['menu_name'] ) ? $_POST['menu_name'] : '';
			$name_admin_bar = isset( $_POST['name_admin_bar'] ) ? $_POST['name_admin_bar'] : '';
			$add_new = isset( $_POST['add_new'] ) ? $_POST['add_new'] : '';
			$add_new_item = isset( $_POST['add_new_item'] ) ? $_POST['add_new_item'] : '';
			$new_item = isset( $_POST['new_item'] ) ? $_POST['new_item'] : '';
			$edit_item = isset( $_POST['edit_item'] ) ? $_POST['edit_item'] : '';
			$view_item = isset( $_POST['view_item'] ) ? $_POST['view_item'] : '';
			$all_items = isset( $_POST['all_items'] ) ? $_POST['all_items'] : '';
			$search_items = isset( $_POST['search_items'] ) ? $_POST['search_items'] : '';
			$not_found = isset( $_POST['not_found'] ) ? $_POST['not_found'] : '';
			$not_found_trash = isset( $_POST['not_found_in_trash'] ) ? $_POST['not_found_in_trash'] : '';

			$labels = array(
			    'name' => $name,
			    'singular_name' => $singular_name,
			    'menu_name' => $menu_name,
			    'name_admin_bar' => $name_admin_bar,
			    'add_new' => $add_new,
			    'add_new_item' => $add_new_item,
			    'new_item' => $new_item,
			    'edit_item' => $edit_item,
			    'view_item' => $view_item,
			    'all_items' => $all_items,
			    'search_items' => $search_items,
			    'not_found' => $not_found,
			    'not_found_in_trash' => $not_found_trash
			);

			// get the values of the arguments
			$desc = isset( $_POST['desc'] ) ? $_POST['desc'] : '';
			$public = isset( $_POST['public'] ) ? $_POST['public'] : '';
			$public_queryable = isset( $_POST['public_queryable'] ) ? $_POST['public_queryable'] : '';
			$show_ui = isset( $_POST['show_ui'] ) ? $_POST['show_ui'] : '';
			$show_in_menu = isset( $_POST['show_in_menu'] ) ? $_POST['show_in_menu'] : '';
			$show_adminbar = isset( $_POST['show_adminbar'] ) ? $_POST['show_adminbar'] : '';
			$query_var = isset( $_POST['query_var'] ) ? $_POST['query_var'] : '';
			$exclude_search = isset( $_POST['exclude_search'] ) ? $_POST['exclude_search'] : '';
			$show_menu = isset( $_POST['show_menu'] ) ? $_POST['show_menu'] : '';
			$export = isset( $_POST['export'] ) ? $_POST['export'] : '';
			$supports = isset( $_POST['supports'] ) ? $_POST['supports'] : '';

			$args = array(
			    'labels' => $labels,
			    'description' => $desc,
			    'public' => $public,
			    'publicly_queryable' => $public_queryable,
			    'show_ui' => $show_ui,
			    'show_in_menu' => $show_in_menu,
			    'show_in_admin_bar' => $show_adminbar,
			    'query_var' => $query_var,
			    'exclude_from_search' => $exclude_search,
			    'show_in_nav_menus' => $show_menu,
			    'can_export' => $export,
			    'supports' => $supports
			);

			if ( !empty( $post_type ) && strlen( $post_type ) < 20 ) {
				if ( register_post_type( $post_type, $args ) ) :
					?>
					<div class="updated settings-error notice is-dismissible">
						<p><strong>Post type added as a product in Woocommerce.</strong></p>
						<button type="button" class="notice-dismiss">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
				<?php
				endif;

				// add the post type to woocommerce products
				$new_post = array(
				    'post_title' => $name,
				    'post_content' => $desc,
				    'post_status' => 'publish',
				    'post_date' => date( 'Y-m-d H:i:s' ),
				    'post_author' => $user_ID,
				    'post_type' => 'product'
				);
				$post_id = wp_insert_post( $new_post );
				add_post_meta($post_id, '_price', 10);
			}
		}

	}

}
