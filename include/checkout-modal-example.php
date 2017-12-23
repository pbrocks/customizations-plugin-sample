<?php
/*
  Update the default level constant below.
  Add this code to a custom plugin.
  Tweak the style and JS as needed below.
  Add a link to your site with the class pmpromc_modal_btn,
  and that link will be setup by the JS below to
  load the modal popup.

  We might create an add on from this.
  Contact us with your ideas.
*/

/**
 * Define the default level to use for the modal
 */
define( 'PMPRO_MODAL_CHECKOUT_DEFAULT_LEVEL', 1 );

/**
 * Load the checkout preheader on every page
 * We won't be processing on every page, but we
 * want the code that sets up the level and
 * preloads fields from user meta.
 */
function pmprocm_preheader() {
	// bail if PMPro is not loaded
	if ( ! defined( 'PMPRO_DIR' ) ) {
		return;
	}

	if ( ! is_admin() ) {
		if ( empty( $_REQUEST['level'] ) ) {
			$_REQUEST['level'] = PMPRO_MODAL_CHECKOUT_DEFAULT_LEVEL;
		}

		require_once( PMPRO_DIR . '/preheaders/checkout.php' );
	}
}
add_action( 'init', 'pmprocm_preheader' );

/**
 * Add the checkout page modal to every page
 */
function pmprocm_content() {
	// if the 'shortcode' is already present, skip modal
	$queried_object = get_queried_object();
	if ( strpos( $queried_object->post_content, '[pmpro_checkout' ) !== false ) {
		return;
	}
	?>
	<style>
		div.pmprocm_modal_bg {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		.pmprocm_modal_content {
			background-color: #fefefe;
			margin: 15% auto; /* 15% from the top and centered */
			padding: 20px;
			border: 1px solid #888;
			width: 80%; /* Could be more or less, depending on screen size */
		}

		.pmprocm_modal_close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.pmprocm_modal_close:hover,
		.pmprocm_modal_close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
	</style>
	
	<div class="pmprocm_modal_bg">
		<div class="pmprocm_modal_content">
			<span class="pmprocm_modal_close">&times;</span>
			<?php
				$template = pmpro_loadTemplate( 'checkout', 'local', 'pages' );
				echo $template;
			?>
		</div>
	</div>
	
	<script>
		jQuery(document).ready(function() {
			// Get the modal
			var modal = jQuery('.pmprocm_modal_bg');

			// Get the button that opens the modal
			var btn = jQuery('.pmprocm_modal_btn');

			// Get the <span> element that closes the modal
			var span = jQuery('.pmprocm_modal_close');

			// When the user clicks on the button, open the modal 
			btn.click(function() {
				modal.show();
			});

			// When the user clicks on <span> (x), close the modal
			span.click(function() {
				modal.hide();
			});

			// When the user clicks anywhere outside of the modal, close it
			modal.on('click', function(e) {			  
				if (e.target !== this)
					return;

				modal.hide();
			});
		});
	</script>
<?php
}
add_action( 'wp_footer', 'pmprocm_content' );
