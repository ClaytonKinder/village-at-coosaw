<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('mall_bg_color') );
		$body_headlines = esc_attr( ot_get_option('mall_headlines_color') );
		$body_headlines_decor = esc_attr( ot_get_option('mall_headlines_decor_color') );
		$body_text = esc_attr( ot_get_option('mall_text_color') );
		$body_link = esc_attr( ot_get_option('mall_link_color') );
		$body_link_hover = esc_attr( ot_get_option('mall_link_hover_color') );
		$header_bg = esc_attr( ot_get_option('mall_header_bg_color') );
		$header_text = esc_attr( ot_get_option('mall_header_text_color') );
		$header_link = esc_attr( ot_get_option('mall_header_link_color') );
		$header_link_hover = esc_attr( ot_get_option('mall_header_link_hover_color') );
		$footer_bg = esc_attr( ot_get_option('mall_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('mall_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('mall_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('mall_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('mall_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(247, 247, 247)';
		$body_headlines = 'rgb(40, 40, 40)';
		$body_headlines_decor = 'rgb(1, 170, 205)';
		$body_text = 'rgb(0, 0, 0)';
		$body_link = 'rgb(31, 184, 224)';
		$body_link_hover = 'rgb(0, 0, 0)';
		$header_bg = 'rgb(255, 255, 255)';
		$header_text = 'rgb(98, 98, 98)';
		$header_link = 'rgb(0, 0, 0)';
		$header_link_hover = 'rgb(31, 184, 224)';
		$footer_bg = 'rgb(29, 29, 29)';
		$footer_headlines = 'rgba(255, 255, 255, 0.8)';
		$footer_text = 'rgb(247, 247, 247)';
		$footer_link = 'rgba(255, 255, 255, 0.8)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$mall_colors = "
		body {
			background: {$body_bg};
			color: {$body_text};
		}
		h1, h2, h3, h4, h5, h6 {
			color: {$body_headlines};
		}
		#about .section-title span:before,
		#about .section-title span:after,
		.widget-title span:before,
		.widget-title span:after {
			background: {$body_headlines_decor};
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
		wp_add_inline_style( 'alphaplus-mall-css', $mall_colors );
?>