<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$spa_home_showcase = ot_get_option('spa_home_showcase');
		$spa_page_showcase = ot_get_option('spa_page_showcase');
	}
	else {		
		$spa_home_showcase = 'on';
		$spa_page_showcase = 'off';
	}

	if (( $spa_home_showcase == 'on' ) && ( $spa_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_showcase == 'on') && ( $spa_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_showcase == 'off') && ( $spa_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_showcase == 'off') && ( $spa_page_showcase == 'off')) {
		$box_class = 'hidden';
	}

	$spa_bg_video = esc_attr(ot_get_option('spa_bg_video'));

	if ( is_active_sidebar('showcase') ) {
?>
	<div id="showcase" class="<?php echo $box_class; ?>">
		<?php
			if (! empty ($spa_bg_video) ) {
		?>
			<video playsinline autoplay muted loop id="bgvid">
				<source src="<?php echo $spa_bg_video; ?>" type="video/mp4">
			</video>
			<div id="box-container"></div>
		<?php
			}
			dynamic_sidebar('showcase');
		?>
	</div>
<?php
	}
?>