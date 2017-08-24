<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$travel_home_newsletter = ot_get_option('travel_home_newsletter');
		$travel_page_newsletter = ot_get_option('travel_page_newsletter');
	}
	else {
		$travel_home_newsletter = 'on';
		$travel_page_newsletter = 'on';
	}

	if (( $travel_home_newsletter == 'on' ) && ( $travel_page_newsletter == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_newsletter == 'on') && ( $travel_page_newsletter == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_newsletter == 'off') && ( $travel_page_newsletter == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_newsletter == 'off') && ( $travel_page_newsletter == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('newsletter')) {
?>
<div id="newsletter" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('newsletter');
		?>
	</div>
</div>
<?php
	}
?>