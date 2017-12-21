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

add_action( 'admin_enqueue_scripts', 'enqueue_dashboard_scripts_styles' );
function enqueue_dashboard_scripts_styles() {
	wp_register_style( 'pmp-dash', plugins_url( '/css/pmpro-customizations-dash.css', __FILE__ ) );
	wp_enqueue_style( 'pmp-dash' );
}

add_action( 'login_enqueue_scripts', 'enqueue_login_scripts_styles' );
function enqueue_login_scripts_styles() {
	wp_register_style( 'login-page', plugins_url( '/css/pmpro-customizations-login.css', __FILE__ ) );
	wp_enqueue_style( 'login-page' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_frontend_scripts_styles' );
function enqueue_frontend_scripts_styles() {
	wp_register_style( 'pmp-frontend', plugins_url( '/css/pmpro-customizations.css', __FILE__ ) );
	wp_enqueue_style( 'pmp-frontend' );
}

