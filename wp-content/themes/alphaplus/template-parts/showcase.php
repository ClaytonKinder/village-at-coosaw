<?php

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}

	if ($theme_style == 'blog') {
		get_template_part('template-parts/styles/blog/showcase');
	}
	else if ($theme_style == 'coming-soon') {
		get_template_part('template-parts/styles/coming-soon/showcase');
	}
	else if ($theme_style == 'corporation') {
		get_template_part('template-parts/styles/corporation/showcase');
	}
	else if ($theme_style == 'gym') {
		get_template_part('template-parts/styles/gym/showcase');
	}
	else if ($theme_style == 'mall') {
		get_template_part('template-parts/styles/mall/showcase');
	}
	else if ($theme_style == 'photofolio') {
		get_template_part('template-parts/styles/photofolio/showcase');
	}
	else if ($theme_style == 'photofolio-2') {
		get_template_part('template-parts/styles/photofolio-2/showcase');
	}
	else if ($theme_style == 'product') {
		get_template_part('template-parts/styles/product/showcase');
	}
	else if ($theme_style == 'radio-station') {
		get_template_part('template-parts/styles/radio-station/showcase');
	}
	else if ($theme_style == 'spa') {
		get_template_part('template-parts/styles/spa/showcase');
	}
	else if ($theme_style == 'travel') {
		get_template_part('template-parts/styles/travel/showcase');
	}

?>