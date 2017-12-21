<?php
/*
Plugin Name: PMPro Customizations
Plugin URI: https://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Customizations for my Paid Memberships Pro Setup
Version: .1
Author: Paid Memberships Pro
Author URI: https://www.paidmembershipspro.com
*/

// Now start placing your customization code below this line
add_filter( 'pmpro_confirmation_url', 'my_pmpro_confirmation_url', 10, 3 );

function my_pmpro_confirmation_url( $rurl, $user_id, $pmpro_level ) {
	if ( pmpro_hasMembershipLevel( 1 ) ) {
		$rurl = get_site_url( null,'vip-confirmation' );
	}
	return $rurl;
}

function change_pmpro_content_filter_pagebuilder_priority() {
	remove_filter( 'the_content', 'pmpro_membership_content_filter', 5 );
	add_filter( 'the_content', 'pmpro_membership_content_filter', 15 );
}
add_action( 'init', 'change_pmpro_content_filter_pagebuilder_priority' );


