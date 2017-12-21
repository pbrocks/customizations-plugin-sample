<?php
/**
 * Plugin Name: Paid Memberships Pro - Customization Add On
 * Plugin URL: https://github.com/stranger-studios
 * Author: Stranger Studios
 * Version: 1.1.1
 * Author URI: https://github.com/stranger-studios
 * Text Domain: pmpro-customizations
 */

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

add_action( 'admin_enqueue_scripts', 'enqueue_dashboard_scrpts_styles' );
function enqueue_dashboard_scrpts_styles() {
	wp_register_style( 'pmp-dash', plugins_url( '/css/pmpro-customizations.css', __FILE__ ) );
	wp_enqueue_style( 'pmp-dash' );
}
