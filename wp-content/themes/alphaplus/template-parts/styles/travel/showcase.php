<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$travel_home_showcase = ot_get_option('travel_home_showcase');
		$travel_page_showcase = ot_get_option('travel_page_showcase');
	}
	else {
		$travel_home_showcase = 'on';
		$travel_page_showcase = 'off';
	}

	if (( $travel_home_showcase == 'on' ) && ( $travel_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_showcase == 'on') && ( $travel_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_showcase == 'off') && ( $travel_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_showcase == 'off') && ( $travel_page_showcase == 'off')) {
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