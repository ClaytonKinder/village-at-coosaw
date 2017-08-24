<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$spa_home_contact = ot_get_option('mall_home_contact');
		$spa_page_contact = ot_get_option('mall_page_contact');
	}
	else {	
		$spa_home_contact = 'on';
		$spa_page_contact = 'off';
	}

	if (( $spa_home_contact == 'on' ) && ( $spa_page_contact == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_contact == 'on') && ( $spa_page_contact == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_contact == 'off') && ( $spa_page_contact == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_contact == 'off') && ( $spa_page_contact == 'off')) {
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