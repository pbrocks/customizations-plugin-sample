<?php
/**
 * Plugin Name: PMPro - Customization Sample
 * Plugin URL: https://github.com/pbrocks/pmpro-customizations-sample
 * Author: pbrocks
 * Version: 1.1.2
 * Author URI: https://github.com/spbrocks
 * Text Domain: pmpro-customizations-sample
 */

/**
 * Here we are checking that WordPress is loaded and denying browsers any direct access to the code. Functionality of this plugin's code and only be realized by running the plugin through WordPress.
 */
defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

/**
 * This line includes all php files located in the /inc folder. If there is a problem with the code in the file, you can comment this line out by placing two forward slashes '//' in front of the require statement which turns off all code in that directory.
 */
foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) {
	require $filename;
}
