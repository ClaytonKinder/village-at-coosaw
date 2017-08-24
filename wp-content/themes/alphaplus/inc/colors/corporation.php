<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('corporation_bg_color') );
		$body_headlines = esc_attr( ot_get_option('corporation_headlines_color') );
		$body_text = esc_attr( ot_get_option('corporation_text_color') );
		$body_link = esc_attr( ot_get_option('corporation_link_color') );
		$body_link_hover = esc_attr( ot_get_option('corporation_link_hover_color') );
		$header_bg = esc_attr( ot_get_option('corporation_header_bg_color') );
		$header_text = esc_attr( ot_get_option('corporation_header_text_color') );
		$header_link = esc_attr( ot_get_option('corporation_header_link_color') );
		$header_link_hover = esc_attr( ot_get_option('corporation_header_link_hover_color') );
		$footer_bg = esc_attr( ot_get_option('corporation_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('corporation_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('corporation_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('corporation_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('corporation_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(255, 255, 255)';
		$body_headlines = 'rgb(40, 40, 40)';
		$body_text = 'rgb(0, 0, 0)';
		$body_link = 'rgb(44, 99, 146)';
		$body_link_hover = 'rgb(88, 88, 88)';
		$header_bg = 'rgb(253, 253, 253)';
		$header_text = 'rgb(40, 40, 40)';
		$header_link = 'rgb(125, 125, 125)';
		$header_link_hover = 'rgb(0, 0, 0)';
		$footer_bg = 'rgb(255, 255, 255)';
		$footer_headlines = 'rgb(51, 51, 51)';
		$footer_text = 'rgb(40, 40, 40)';
		$footer_link = 'rgb(125, 125, 125)';
		$footer_link_hover = 'rgb(0, 0, 0)';
	}

	$corporation_colors = "
	body {
		background: {$body_bg};
		color: {$body_text};
	}
	h1, h2, h3, h4, h5, h6 {
		color: {$body_headlines};
	}
	.site a {
		color: {$body_link};
	}
	.site a:hover {
		color: {$body_link_hover};
	}
	.site .site-header {
		background: {$header_bg};
		color: {$header_text};
	}
	.site .site-header a {
		color: {$header_link};
	}
	.site .site-header a:hover {
		color: {$header_link_hover};
	}
	.site #footer {
		background: {$footer_bg};
		color: {$footer_text};
	}
	.site #footer h1,
	.site #footer h2,
	.site #footer h3,
	.site #footer h4,
	.site #footer h5,
	.site #footer h6 {
		color: {$footer_headlines};
	}
	.site #footer a {
		color: {$footer_link};
	}
	.site #footer a:hover {
		color: {$footer_link_hover};
	}";
	
	wp_add_inline_style( 'alphaplus-corporation-css', $corporation_colors );
?>
