<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('travel_bg_color') );
		$body_headlines = esc_attr( ot_get_option('travel_headlines_color') );
		$body_headlines_decor = esc_attr( ot_get_option('travel_headlines_decor_color') );
		$body_text = esc_attr( ot_get_option('travel_text_color') );
		$body_link = esc_attr( ot_get_option('travel_link_color') );
		$body_link_hover = esc_attr( ot_get_option('travel_link_hover_color') );
		$newsletter_bg = esc_attr( ot_get_option('travel_newsletter_bg_color') );
		$newsletter_headlines = esc_attr( ot_get_option('travel_newsletter_headlines_color') );
		$newsletter_text = esc_attr( ot_get_option('travel_newsletter_text_color') );
		$footer_bg = esc_attr( ot_get_option('travel_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('travel_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('travel_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('travel_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('travel_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(255, 255, 255)';
		$body_headlines = 'rgb(0, 0, 0)';
		$body_headlines_decor = 'rgb(21, 139, 188)';
		$body_text = 'rgb(34, 34, 34)';
		$body_link = 'rgb(21, 139, 188)';
		$body_link_hover = 'rgb(0, 0, 0)';
		$newsletter_bg = 'rgb(21, 139, 188)';
		$newsletter_headlines = 'rgb(255, 255, 255)';
		$newsletter_text = 'rgba(255, 255, 255, 0.9)';
		$footer_bg = 'rgb(44, 44, 44)';
		$footer_headlines = 'rgb(255, 255, 255)';
		$footer_text = 'rgb(199, 199, 199)';
		$footer_link = 'rgb(199, 199, 199)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$travel_colors = "
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
		.site-content .widget-title span:before,
		.site-content .widget-title span:after {
			background: {$body_headlines_decor};
		}
		#newsletter {
			background: {$newsletter_bg};
			color: {$newsletter_text};
		}
		#newsletter h1,
		#newsletter h2,
		#newsletter h3,
		#newsletter h4,
		#newsletter h5,
		#newsletter h6 {
			color: {$newsletter_headlines};
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

	wp_add_inline_style( 'alphaplus-travel-css', $travel_colors );
?>