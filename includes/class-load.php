<?php

namespace rtCamp\WP\rtEcom;

if( !class_exists( 'Load' )) {
	
/**
 * Load class, creates a settings page in the admin 
 * @author Archana Solanki <archana.solanki@rtcamp.com>
 */
	class Load {
		
		/*
		 * Initializes admin, plugin classes and actiovation hooks
		 */
		
		public function init() {
			
			//instantiates class array
			$this->instantiate();
			
			//register activation hook
			register_deactivation_hook( PATH. 'rtecom.php', array( $this, 'rtecom_flush_rewrites' ) );
			
		}
		
		//Instantiates classes
		public function instantiate() {
			$class_names = array( 'settings' );

			foreach ( $class_names as $class ) {

				//Capitalizes first letter of the class name
				$class_uc = ucfirst( $class );

				$class_name = '\\rtCamp\WP\rtEcom\\' . $class_uc;
				//similar to $class = new $Class();
				${$class} = new $class_name();

				//calls init() method of class $class
				${$class}->init();
			}
		}
		
		/**
		 * To flush the rewrite rules.
		 */
		function rtecom_flush_rewrites() {
			
			flush_rewrite_rules();
			$settings = new \rtCamp\WP\rtEcom\Settings();
			$settings->init();
		}
		
	}
}
