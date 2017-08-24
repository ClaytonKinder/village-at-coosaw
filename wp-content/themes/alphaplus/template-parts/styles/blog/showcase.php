<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$blog_home_showcase = ot_get_option('blog_home_showcase');
		$blog_page_showcase = ot_get_option('blog_page_showcase');
	}
	else {
		$blog_home_showcase = 'on';
		$blog_page_showcase = 'off';
	}

	if (( $blog_home_showcase == 'on' ) && ( $blog_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $blog_home_showcase == 'on') && ( $blog_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $blog_home_showcase == 'off') && ( $blog_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $blog_home_showcase == 'off') && ( $blog_page_showcase == 'off')) {
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