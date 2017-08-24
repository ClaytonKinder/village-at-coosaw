<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$blog_home_bottom = ot_get_option('blog_home_contact');
		$blog_page_bottom = ot_get_option('blog_page_contact');
	}
	else {
		$blog_home_bottom = 'on';
		$blog_page_bottom = 'on';
	}

	if (( $blog_home_bottom == 'on' ) && ( $blog_page_bottom == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $blog_home_bottom == 'on') && ( $blog_page_bottom == 'on')) {
		$box_class = '';
	}
	else if (( $blog_home_bottom == 'off') && ( $blog_page_bottom == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $blog_home_bottom == 'off') && ( $blog_page_bottom == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('bottom')) {
?>
<div id="bottom" class="<?php echo $box_class; ?>">
	<?php
		dynamic_sidebar('bottom');
	?>
</div>
<?php
	}
?>