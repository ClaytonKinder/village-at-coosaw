<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$corporation_home_showcase = ot_get_option('corporation_home_showcase');
		$corporation_page_showcase = ot_get_option('corporation_page_showcase');
	}
	else {	
		$corporation_home_showcase = 'on';
		$corporation_page_showcase = 'off';
	}

	if (( $corporation_home_showcase == 'on' ) && ( $corporation_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_showcase == 'on') && ( $corporation_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_showcase == 'off') && ( $corporation_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_showcase == 'off') && ( $corporation_page_showcase == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('showcase')) {
?>
	<div id="showcase" class="<?php echo $box_class; ?>">
		<?php
			dynamic_sidebar('showcase');
		?>
	</div>
<?php
	}
?>