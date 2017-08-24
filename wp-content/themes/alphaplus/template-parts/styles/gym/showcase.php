<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$gym_home_showcase = ot_get_option('gym_home_showcase');
		$gym_page_showcase = ot_get_option('gym_page_showcase');
	}
	else {		
		$gym_home_showcase = 'on';
		$gym_page_showcase = 'off';
	}

	if (( $gym_home_showcase == 'on' ) && ( $gym_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_showcase == 'on') && ( $gym_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_showcase == 'off') && ( $gym_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_showcase == 'off') && ( $gym_page_showcase == 'off')) {
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