<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$footer_bg = esc_attr( ot_get_option('coming_soon_footer_bg_color') );
		$footer_headlines = esc_attr( ot_get_option('coming_soon_footer_headlines_color') );
		$footer_text = esc_attr( ot_get_option('coming_soon_footer_text_color') );
		$footer_link = esc_attr( ot_get_option('coming_soon_footer_link_color') );
		$footer_link_hover = esc_attr( ot_get_option('coming_soon_footer_link_hover_color') );
	}
	else {
		$footer_bg = 'rgba(24, 24, 24, 0.9)';
		$footer_headlines = 'rgba(255, 255, 255, 0.9)';
		$footer_text = 'rgb(255, 255, 255)';
		$footer_link = 'rgb(226, 226, 226)';
		$footer_link_hover = 'rgb(255, 255, 255)';
	}

	$coming_soon_colors = "
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
		wp_add_inline_style( 'alphaplus-coming-soon-css', $coming_soon_colors );
?>
