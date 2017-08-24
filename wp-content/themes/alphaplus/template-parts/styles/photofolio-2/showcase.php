<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_2_home_showcase = ot_get_option('photofolio_2_home_showcase');
		$photofolio_2_page_showcase = ot_get_option('photofolio_2_page_showcase');
		
		$photofolio_2_bg_video = esc_attr(ot_get_option('photofolio_2_bg_video'));
	}
	else {	
		$photofolio_2_home_showcase = 'on';
		$photofolio_2_page_showcase = 'off';
	}

	if (( $photofolio_2_home_showcase == 'on' ) && ( $photofolio_2_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_showcase == 'on') && ( $photofolio_2_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_showcase == 'off') && ( $photofolio_2_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_showcase == 'off') && ( $photofolio_2_page_showcase == 'off')) {
		$box_class = 'hidden';
	}

?>
	<div id="showcase" class="<?php echo $box_class; ?>">
		<?php
			if (! empty ($photofolio_2_bg_video) ) {
		?>
			<video playsinline autoplay muted loop id="bgvid">
				<source src="<?php echo $photofolio_2_bg_video; ?>" type="video/mp4">
			</video>
			<div id="box-container"></div>
		<?php
			}
		?>
	</div>