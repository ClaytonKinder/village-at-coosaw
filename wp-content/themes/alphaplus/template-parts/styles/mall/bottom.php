<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$mall_home_contact = ot_get_option('mall_home_contact');
		$mall_page_contact = ot_get_option('mall_page_contact');
	}
	else {
		$mall_home_contact = 'on';
		$mall_page_contact = 'on';
	}

	if (( $mall_home_contact == 'on' ) && ( $mall_page_contact == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_contact == 'on') && ( $mall_page_contact == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_contact == 'off') && ( $mall_page_contact == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_contact == 'off') && ( $mall_page_contact == 'off')) {
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