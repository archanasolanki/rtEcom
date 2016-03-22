<?php
//

namespace rtCamp\WP\rtEcom;

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
			//secho "Hello world";
			// Add admin menu page
			add_action( 'admin_menu', array( $this, 'rtecom_admin_menu' ) );
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
				<form method="post" action="admin.php?page=rtecom" novalidate="novalidate">
					<br><font size="1"></font><table class="form-table">
						<tbody>
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
								<th scope="row"><label>Parent Item Colon</label></th>
								<td><input type="text" name="parent_item_colon" id="parent_item_colon" placeholder="Parent Item Colon" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Not Found</label></th>
								<td><input type="text" name="not_found" id="not_found" placeholder="Not Found" class="regular-text" /></td>
							</tr>
							<tr>
								<th scope="row"><label>Not Found in Trash</label></th>
								<td><input type="text" name="not_found_trash" id="not_found_trash" placeholder="Not Found in Trash" class="regular-text" /></td>
							</tr>
						</tbody>
					</table>
					<h2>Enter the Arguments</h2>
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Description</label></th>
								<td><textarea placeholder="Description" id="desc"></textarea></td>
							</tr>
							<tr>
								<th scope="row"><label>Public</label></th>
								<td><input type="checkbox" value="true"  id="public" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Publicly Query-able</label></th>
								<td><input type="checkbox" value="true"  id="public_queryable" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show UI</label></th>
								<td><input type="checkbox" value="true"  id="show_ui" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Menu</label></th>
								<td><input type="checkbox" value="true"  id="show_in_menu" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Query Variable</label></th>
								<td><input type="checkbox" value="true"  id="query_var" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Exclude from search</label></th>
								<td><input type="checkbox" value="true"  id="exclude_search" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Nav Menu</label></th>
								<td><input type="checkbox" value="true"  id="show_menu" placeholder="Yes" /> Yes</td>
							</tr>
							<tr>
								<th scope="row"><label>Show in Admin bar</label></th>
								<td><input type="checkbox" value="true"  id="show_adminbar" placeholder="Yes" /> Yes </td>
							</tr>
							<tr>
								<th scope="row"><label>Can Export</label></th>
								<td><input type="checkbox" value="true"  id="exoprt" placeholder="Yes" /> Yes</td>
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
			$this->save_post_type();
		}
		
		/**
		 * save the labels
		 * take the arguments
		 * register post type
		 */
		
		function save_post_type() {
			
			// get the values of the labels
			$labels = array(
			    'name'		=> $_POST['name'],
			    'singular_name'	=> $_POST['singular_name'],
			    'menu_name'		=> $_POST['menu_name'],
			    'name_admin_bar'	=> $_POST['name_admin_bar'],
			    'add_new'		=> $_POST['add_new'],
			    'add_new_item'	=> $_POST['add_new_item'],
			    'new_item'		=> $_POST['new_item'],
			    'edit_item'		=> $_POST['edit_item'],
			    'view_item'		=> $_POST['view_item'],
			    'all_items'		=> $_POST['all_items'],
			    'search_items'	=> $_POST['search_items'],
			    'parent_item_colon'	=> $_POST['parent_item_colon'],
			    'not_found'		=> $_POST['not_found'],
			    'not_found_in_trash'=> $_POST['not_found_trash']
			);
			
			// get the values of the arguments
			$args = array(
			    'description'		=> $_POST['desc'],
			    'public'			=> $_POST['public'],
			    'publicly_queryable'	=> $_POST['public_queryable'],
			    'show_ui'			=> $_POST['show_ui'],
			    'show_in_menu'		=> $_POST['show_in_menu'],
			    'show_in_admin_bar'		=> $_POST['show_adminbar'],
			    'query_var'			=> $_POST['query_var'],
			    'exclude_from_search'	=> $_POST['exclude_search'],
			    'show_in_nav_menus'		=> $_POST['show_menu'],
			    'can_export'		=> $_POST['export'],
			    'supports'			=> $_POST['supports']
			);
			
			foreach ( $args as $key => $value ) {
				register_post_type( $key, $value );
			}
		}
	}

}
