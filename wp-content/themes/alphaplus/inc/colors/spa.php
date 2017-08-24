<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('spa_bg_color') );
		$body_headlines = esc_attr( ot_get_option('spa_headlines_color') );
		$body_text = esc_attr( ot_get_option('spa_text_color') );
		$body_link = esc_attr( ot_get_option('spa_link_color') );
		$body_link_hover = esc_attr( ot_get_option('spa_link_hover_color') );
		$top_header_bg = esc_attr( ot_get_option('spa_top_header_bg_color') );
		$header_bg = esc_attr( ot_get_option('spa_header_bg_color') );
		$menu_bg = esc_attr( ot_get_option('spa_menu_bg_color') );
		$header_text = esc_attr( ot_get_option('spa_header_text_color') );
		$header_link = esc_attr( ot_get_option('spa_header_link_color') );
		$header_link_hover = esc_attr( ot_get_option('spa_header_link_hover_color') );
		$footer_1_bg = esc_attr( ot_get_option('spa_footer_1_bg_color') );
		$footer_2_bg = esc_attr( ot_get_option('spa_footer_2_bg_color') );
		$footer_3_bg = esc_attr( ot_get_option('spa_footer_3_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('spa_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('spa_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('spa_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('spa_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(255, 255, 255)';
		$body_headlines = 'rgb(0, 0, 0)';
		$body_text = 'rgb(51, 51, 51)';
		$body_link = 'rgb(169, 87, 143)';
		$body_link_hover = 'rgb(0, 0, 0)';
		$top_header_bg = 'rgb(115, 55, 96)';
		$header_bg = 'rgb(255, 255, 255)';
		$menu_bg = 'rgb(249, 249, 249)';
		$header_text = 'rgb(169, 88, 143)';
		$header_link = 'rgb(169, 88, 143)';
		$header_link_hover = 'rgb(255, 255, 255)';
		$footer_1_bg = 'rgb(119, 62, 101)';
		$footer_2_bg = 'rgb(154, 102, 138)';
		$footer_3_bg = 'rgb(183, 127, 166)';
		$footer_headlines = 'rgb(255, 255, 255)';
		$footer_text = 'rgb(232, 232, 232)';
		$footer_link = 'rgba(255, 255, 255, 0.8)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$spa_colors = "
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
		.site #top-header {
			background: {$top_header_bg};
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
		#footer .footer-about {
			background: {$footer_1_bg};
			color: {$footer_text};
		}
		#footer .footer-about i {
			background: {$footer_1_bg};
			border-color: {$footer_1_bg};
		}
		#footer .footer-contact {
			background: {$footer_2_bg};
			color: {$footer_text};
		}
		#footer .footer-contact i {
			background: {$footer_2_bg};
			border-color: {$footer_2_bg};
		}
		#footer .footer-newsletter,
		#footer #email-subscribers-2 {
			background: {$footer_3_bg};
			color: {$footer_text};
		}
		#footer .footer-newsletter i {
			background: {$footer_3_bg};
			border-color: {$footer_3_bg};
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

	wp_add_inline_style( 'alphaplus-spa-css', $spa_colors );
	
?>