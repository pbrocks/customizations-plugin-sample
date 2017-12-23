<?php
/**
 * Plugin Name: Paid Memberships Pro - Customization Sample
 * Plugin URL: https://github.com/stranger-studios
 * Author: Stranger Studios
 * Version: 1.1.1
 * Author URI: https://github.com/stranger-studios
 * Text Domain: pmpro-customizations-sample
 */

/**
 * Here we are checking that WordPress is loaded and denying browsers any direct access to the code. Functionality of this plugin's code and only be realized by running the plugin through WordPress.
 */
defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

/**
 * This line includes the file 'scripts-styles.php', which is located in the 'include' folder. If there is a problem with the code in the file, you can comment this line out by placing two forward slashes '//' in front of the line.
 */
require_once( 'include/scripts-styles.php' );

/**
 * This line includes the file 'checkout-modal-ideadude.php', which is located in the 'include' folder. If there is a problem with the code in the file, you can comment this line out by placing two forward slashes '//' in front of the line.
 */
require_once( 'include/checkout-modal-ideadude.php' );
