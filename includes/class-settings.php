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
		}

		// Adds admin menu page to dashboard area
		function rtecom_admin_menu() {

			add_menu_page( '', 'rtEcom', 'manage_options', 'rtecom', array( $this, 'create_settings_page' ), NULL, 26 );
		}

		/**
		 * Generate HTML
		 * post type labels
		 * arguments form
		 * @global type $title
		 */
		function create_settings_page() {
			global $wpdb;
			?>
			<div class="wrap">
				<h2><?php _e( 'Post type Settings' ); ?></h2>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=rtecom" novalidate="novalidate">
					<br><font size="1"></font><table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Post Types</label></th>
								<td>
									<?php
									$args = array(
									    'public' => true,
									    '_builtin' => false
									);
									$output = 'objects'; // names or objects
									$post_types = get_post_types( $args, $output );

									if ( count( $post_types ) > 1 && !empty( $post_types ) ) {
										?>
										<select multiple="multiple" name="post_type[]">
											<?php
											foreach ( $post_types as $post_type ) {
												if ( $post_type->name != strtolower( 'product' ) ) {
													echo '<option value="' . $post_type->name . '"><p>' . ucfirst( $post_type->label ) . '</option></p>';
												}
											}
											?>
										</select>
										<p class="description">Select the post types which you want to sell as a product.</p></td>
									<?php
								} else {
									echo "Please create a post type first.";
								}
								?>
							</tr>
							<tr>
								<th scope="row"><label for="name">Price</label></th>
								<td><input name="price" type="text" id="price" class="regular-text" placeholder="Price" /><p class="description">Please mention the comma separated prices of the post types.</p></td>
							</tr>

						</tbody>
					</table>
					<p class="submit">
						<input type="submit" name="submit" id="submit" class="button button-primary" value="Save">
					</p>
				</form>
			</div>
			<?php
			$this->save_product();
		}

		/**
		 * save the labels
		 * take the arguments
		 * register post type
		 * @global type $wpdb
		 * @global type $user_ID
		 */
		function save_product() {
			global $user_ID;

			/*
			 * add_option as product
			 */
			$post_types = isset( $_POST['post_type'] ) ? $_POST['post_type'] : '';
			$asproduct = get_option( 'as_product' );
			if ( $asproduct == NULL || $asproduct == '' ) {
				$res = add_option( 'as_product', $post_types );
			} elseif ( $asproduct != NULL || $asproduct != '' ) {
				$res = update_option( 'as_product', $post_types );
			}

			if ( $res != '' || $res != NULL ) {
				?>
				<div class="updated settings-error notice is-dismissible">
					<p><strong>Post type added as a product in Woocommerce.</strong></p>
					<button type="button" class="notice-dismiss">
						<span class="screen-reader-text">Dismiss this notice.</span>
					</button>
				</div>

				<?php
			}
			// add the post type to woocommerce products
			$price = isset( $_POST['price'] ) ? $_POST['price'] : '';
			$price = ltrim( rtrim( $price ) );
			echo $price;
			exit;
			if ( is_array( $post_types ) ) {
				foreach ( $post_types as $key => $value ) {
					$new_product = array(
					    'post_title' => $value,
					    'post_status' => 'publish',
					    'post_date' => date( 'Y-m-d H:i:s' ),
					    'post_author' => $user_ID,
					    'post_type' => 'product'
					);
					$post_id = wp_insert_post( $new_product );
					add_post_meta( $post_id, '_price', $price );
				}
			}
		}

	}

}

