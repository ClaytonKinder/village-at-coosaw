<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$radio_home_showcase = ot_get_option('radio_home_showcase');
		$radio_page_showcase = ot_get_option('radio_page_showcase');
	}
	else {
		$radio_home_showcase = 'on';
		$radio_page_showcase = 'off';
	}

	if (( $radio_home_showcase == 'on' ) && ( $radio_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_showcase == 'on') && ( $radio_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_showcase == 'off') && ( $radio_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_showcase == 'off') && ( $radio_page_showcase == 'off')) {
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