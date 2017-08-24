<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_home_showcase = ot_get_option('photofolio_home_showcase');
		$photofolio_page_showcase = ot_get_option('photofolio_page_showcase');
	}
	else {	
		$photofolio_home_showcase = 'on';
		$photofolio_page_showcase = 'off';
	}

	if (( $photofolio_home_showcase == 'on' ) && ( $photofolio_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_home_showcase == 'on') && ( $photofolio_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_home_showcase == 'off') && ( $photofolio_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_home_showcase == 'off') && ( $photofolio_page_showcase == 'off')) {
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