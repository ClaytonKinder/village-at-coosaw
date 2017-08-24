<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$mall_home_showcase = ot_get_option('mall_home_showcase');
		$mall_page_showcase = ot_get_option('mall_page_showcase');
	}
	else {	
		$mall_home_showcase = 'on';
		$mall_page_showcase = 'off';
	}

	if (( $mall_home_showcase == 'on' ) && ( $mall_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_showcase == 'on') && ( $mall_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_showcase == 'off') && ( $mall_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_showcase == 'off') && ( $mall_page_showcase == 'off')) {
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