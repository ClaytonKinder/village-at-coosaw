<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('photofolio_2_bg_color') );
		$body_headlines = esc_attr( ot_get_option('photofolio_2_headlines_color') );
		$body_text = esc_attr( ot_get_option('photofolio_2_text_color') );
		$body_link = esc_attr( ot_get_option('photofolio_2_link_color') );
		$body_link_hover = esc_attr( ot_get_option('photofolio_2_link_hover_color') );
		$header_bg = esc_attr( ot_get_option('photofolio_2_header_bg_color') );
		$header_text = esc_attr( ot_get_option('photofolio_2_header_text_color') );
		$header_link = esc_attr( ot_get_option('photofolio_2_header_link_color') );
		$header_link_hover = esc_attr( ot_get_option('photofolio_2_header_link_hover_color') );
		$footer_bg = esc_attr( ot_get_option('photofolio_2_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('photofolio_2_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('photofolio_2_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('photofolio_2_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('photofolio_2_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(255, 255, 255)';
		$body_headlines = 'rgb(40, 40, 40)';
		$body_text = 'rgb(51, 51, 51)';
		$body_link = 'rgb(252, 52, 104)';
		$body_link_hover = 'rgb(218, 40, 86)';
		$header_bg = 'rgba(24, 24, 24, 0.9)';
		$header_text = 'rgb(182, 182, 182)';
		$header_link = 'rgb(182, 182, 182)';
		$header_link_hover = 'rgb(255, 255, 255)';
		$footer_bg = 'rgba(0, 0, 0, 0.9)';
		$footer_headlines = 'rgba(255, 255, 255, 0.9)';
		$footer_text = 'rgba(255, 255, 255, 0.9)';
		$footer_link = 'rgba(255, 255, 255, 0.9)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$photofolio_2_colors = "
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
		.archive .site-header, .single .site-header {
			background: {$header_bg};
			color: {$header_text};
		}
		.home .site-header {
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

	wp_add_inline_style( 'alphaplus-photofolio-2-css', $photofolio_2_colors );

?>