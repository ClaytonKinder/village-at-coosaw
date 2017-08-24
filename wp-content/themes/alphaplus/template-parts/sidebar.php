<?php

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}

	if ($theme_style == 'blog') {
		dynamic_sidebar('sidebar-blog');
	}
	else if ($theme_style == 'corporation') {
		dynamic_sidebar('sidebar');
	}
	else if ($theme_style == 'gym') {
		dynamic_sidebar('sidebar-gym');
	}
	else if ($theme_style == 'mall') {
		dynamic_sidebar('sidebar-mall');
	}
	else if ($theme_style == 'photofolio') {
		dynamic_sidebar('sidebar-photofolio');
	}
	else if ($theme_style == 'photofolio-2') {
		dynamic_sidebar('sidebar-photofolio');
	}
	else if ($theme_style == 'product') {
		dynamic_sidebar('sidebar-product');
	}
	else if ($theme_style == 'radio-station') {
		dynamic_sidebar('sidebar-1');
	}
	else if ($theme_style == 'spa') {
		dynamic_sidebar('sidebar-spa');
	}
	else if ($theme_style == 'travel') {
		dynamic_sidebar('sidebar-travel');
	}

?>