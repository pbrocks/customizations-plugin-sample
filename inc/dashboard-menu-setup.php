<?php
/**
 * Plugin Name: Sidetrack Dashboard Menu
 */
/**
 * Add a page to the dashboard menu.
 *
 * @since 1.0.0
 *
 * @return array
 */
add_action( 'admin_menu', 'customizations_dashboard' );
function customizations_dashboard() {
	$slug  = preg_replace( '/_+/', '-', __FUNCTION__ );
	$label = ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) );
	add_dashboard_page( __( $label, 'customizations-dashboard-menu' ), __( $label, 'customizations-dashboard-menu' ), 'manage_options', $slug . '.php', 'customizations_dashboard_page' );
}


/**
 * Debug Information
 *
 * @since 1.0.0
 *
 * @param bool $html Optional. Return as HTML or not
 *
 * @return string
 */
function customizations_dashboard_page() {
	global $wpdb;
	echo '<div class="wrap">';
	echo '<h2>' . ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) ) . '</h2>';
	$screen         = get_current_screen();
	$site_theme     = wp_get_theme();
	$site_prefix    = $wpdb->prefix;
	$prefix_message = '$site_prefix = ' . $site_prefix;
	if ( is_multisite() ) {
		$network_prefix  = $wpdb->base_prefix;
		$prefix_message .= '<br>$network_prefix = ' . $network_prefix;
	}

	echo '<div class="add-to-customizations-dash" style="background:aliceblue;padding:1rem 2rem;">';
	do_action( 'add_to_customizations_dash' );
	echo '</div>';

	echo '<h4 style="color:rgba(250,128,114,.7);">Current Screen is <span style="color:rgba(250,128,114,1);">' . $screen->id . '</span></h4>';
	echo 'Your WordPress version is ' . get_bloginfo( 'version' );
	echo '<h4>' . $site_prefix . '</h4>';
	echo '<h4>' . __FILE__ . '</h4>';

	$site_theme = wp_get_theme();
	echo '<h4>Theme is ' . sprintf(
		__( '%1$s and is version %2$s', 'text-domain' ),
		$site_theme->get( 'Name' ),
		$site_theme->get( 'Version' )
	) . '</h4>';
	echo '<h4>Templates found in ' . get_template_directory() . '</h4>';
	echo '<h4>Stylesheet found in ' . get_stylesheet_directory() . '</h4>';
	echo '</div>';
}

add_action( 'add_to_customizations_dash', 'adding_to_customizations_dashboard_page' );

/**
 * Debug Information
 *
 * @since 1.0.0
 *
 * @param bool $html Optional. Return as HTML or not
 *
 * @return string
 */
function adding_to_customizations_dashboard_page() {
	echo '<h2>' . ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) ) . '</h2>';
	echo '<h3>Add more info here</h3>';
	echo do_shortcode( '[trigger-ajax]' );
}
