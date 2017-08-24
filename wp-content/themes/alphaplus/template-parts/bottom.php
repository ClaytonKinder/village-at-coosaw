<?php

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}

	if ($theme_style == 'blog') {
		get_template_part('template-parts/styles/blog/bottom');
	}
	else if ($theme_style == 'gym') {
		get_template_part('template-parts/styles/gym/bottom');
	}
	else if ($theme_style == 'mall') {
		get_template_part('template-parts/styles/mall/bottom');
	}
	else if ($theme_style == 'product') {
		get_template_part('template-parts/styles/product/bottom');
	}
	else if ($theme_style == 'radio-station') {
		get_template_part('template-parts/styles/radio-station/bottom');
	}
	else if ($theme_style == 'spa') {
		get_template_part('template-parts/styles/spa/bottom');
	}
	else if ($theme_style == 'travel') {
		get_template_part('template-parts/styles/travel/bottom');
	}

?>