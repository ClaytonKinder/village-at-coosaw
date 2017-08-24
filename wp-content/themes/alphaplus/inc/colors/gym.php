<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$body_bg = esc_attr( ot_get_option('gym_bg_color') );
		$body_headlines = esc_attr( ot_get_option('gym_headlines_color') );
		$body_text = esc_attr( ot_get_option('gym_text_color') );
		$body_link = esc_attr( ot_get_option('gym_link_color') );
		$body_link_hover = esc_attr( ot_get_option('gym_link_hover_color') );
		$footer_bg = esc_attr( ot_get_option('gym_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('gym_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('gym_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('gym_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('gym_footer_link_hover_color') );
	}
	else {
		$body_bg = 'rgb(249, 249, 249)';
		$body_headlines = 'rgb(40, 40, 40)';
		$body_text = 'rgb(0, 0, 0)';
		$body_link = 'rgb(230, 38, 49)';
		$body_link_hover = 'rgb(0, 0, 0)';
		$footer_bg = 'rgb(0, 0, 0)';
		$footer_headlines = 'rgba(255, 255, 255, 0.9)';
		$footer_text = 'rgb(255, 255, 255)';
		$footer_link = 'rgb(226, 226, 226)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$gym_colors = "
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

	wp_add_inline_style( 'alphaplus-gym-css', $gym_colors );
		
?>
