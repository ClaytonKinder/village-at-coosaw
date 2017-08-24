<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$radio_home_contact = ot_get_option('radio_home_contact');
		$radio_page_contact = ot_get_option('radio_page_contact');
	}
	else {
		$radio_home_contact = 'on';
		$radio_page_contact = 'off';
	}

	if (( $radio_home_contact == 'on' ) && ( $radio_page_contact == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_contact == 'on') && ( $radio_page_contact == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_contact == 'off') && ( $radio_page_contact == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_contact == 'off') && ( $radio_page_contact == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('contact')) {
?>
<div id="contact" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('contact');
		?>
	</div>
</div>
<?php
	}
?>