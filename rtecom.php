<?php

/* 
 * Plugin Name: rtEcom
 * Author: Archana Solanki
 * Description: Sell anything using Woocommerce. 
 * Version: 1.0
 */

//define the namespace
namespace rtCamp\WP\rtEcom;

//define the plugin PATH and plugin URL constants
define( 'rtCamp\WP\rtEcom\PATH', plugin_dir_path( __FILE__ ) );
define( 'rtCamp\WP\rtEcom\URL', plugin_dir_url( __FILE__ ) );

//includes class files
require_once PATH . 'includes/class-load.php';
require_once PATH . 'includes/class-settings.php';
//require_once rtCamp\WP\rtEcom\PATH . 'includes/class-theme.php';

//loads the class-load.php
$init = new \rtCamp\WP\rtEcom\Load();
$init->init();
