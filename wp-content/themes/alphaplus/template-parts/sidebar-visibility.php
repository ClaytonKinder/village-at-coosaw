<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
		$blog_home_sidebar = ot_get_option('blog_home_sidebar');
		$blog_page_sidebar = ot_get_option('blog_page_sidebar');
		$corporation_home_sidebar = ot_get_option('corporation_home_sidebar');
		$corporation_page_sidebar = ot_get_option('corporation_page_sidebar');
		$radio_home_sidebar = ot_get_option('radio_home_sidebar');
		$radio_page_sidebar = ot_get_option('radio_page_sidebar');
		$mall_home_sidebar = ot_get_option('mall_home_sidebar');
		$mall_page_sidebar = ot_get_option('mall_page_sidebar');
		$gym_home_sidebar = ot_get_option('gym_home_sidebar');
		$gym_page_sidebar = ot_get_option('gym_page_sidebar');
		$spa_home_sidebar = ot_get_option('spa_home_sidebar');
		$spa_page_sidebar = ot_get_option('spa_page_sidebar');
		$travel_home_sidebar = ot_get_option('travel_home_sidebar');
		$travel_page_sidebar = ot_get_option('travel_page_sidebar');
		$photofolio_home_sidebar = ot_get_option('photofolio_home_sidebar');
		$photofolio_page_sidebar = ot_get_option('photofolio_page_sidebar');
		$photofolio_2_home_sidebar = ot_get_option('photofolio_2_home_sidebar');
		$photofolio_2_page_sidebar = ot_get_option('photofolio_2_page_sidebar');
		$product_home_sidebar = ot_get_option('product_home_sidebar');
		$product_page_sidebar = ot_get_option('product_page_sidebar');
	}
	else {
		$theme_style = 'mall';
		$corporation_home_sidebar = 'on';
		$corporation_page_sidebar = 'on';
		$radio_home_sidebar = 'on';
		$radio_page_sidebar = 'on';
		$mall_home_sidebar = 'on';
		$mall_page_sidebar = 'on';
		$gym_home_sidebar = 'on';
		$gym_page_sidebar = 'on';
		$spa_home_sidebar = 'on';
		$spa_page_sidebar = 'on';
		$travel_home_sidebar = 'on';
		$travel_page_sidebar = 'on';
		$photofolio_home_sidebar = 'on';
		$photofolio_page_sidebar = 'on';
		$photofolio_2_home_sidebar = 'on';
		$photofolio_2_page_sidebar = 'on';
		$product_home_sidebar = 'on';
		$product_page_sidebar = 'on';
	}


	if ($theme_style == 'blog') {

		if (( $blog_home_sidebar == 'on' ) && ( $blog_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $blog_home_sidebar == 'on') && ( $blog_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $blog_home_sidebar == 'off') && ( $blog_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $blog_home_sidebar == 'off') && ( $blog_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	if ($theme_style == 'corporation') {

		if (( $corporation_home_sidebar == 'on' ) && ( $corporation_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $corporation_home_sidebar == 'on') && ( $corporation_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $corporation_home_sidebar == 'off') && ( $corporation_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $corporation_home_sidebar == 'off') && ( $corporation_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}
	
	if ($theme_style == 'radio-station') {

		if (( $radio_home_sidebar == 'on' ) && ( $radio_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $radio_home_sidebar == 'on') && ( $radio_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $radio_home_sidebar == 'off') && ( $radio_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $radio_home_sidebar == 'off') && ( $radio_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'mall') {

		if (( $mall_home_sidebar == 'on' ) && ( $mall_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $mall_home_sidebar == 'on') && ( $mall_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $mall_home_sidebar == 'off') && ( $mall_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $mall_home_sidebar == 'off') && ( $mall_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'gym') {

		if (( $gym_home_sidebar == 'on' ) && ( $gym_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $gym_home_sidebar == 'on') && ( $gym_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $gym_home_sidebar == 'off') && ( $gym_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $gym_home_sidebar == 'off') && ( $gym_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'photofolio') {

		if (( $photofolio_home_sidebar == 'on' ) && ( $photofolio_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $photofolio_home_sidebar == 'on') && ( $photofolio_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $photofolio_home_sidebar == 'off') && ( $photofolio_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $photofolio_home_sidebar == 'off') && ( $photofolio_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'photofolio-2') {

		if (( $photofolio_2_home_sidebar == 'on' ) && ( $photofolio_2_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $photofolio_2_home_sidebar == 'on') && ( $photofolio_2_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $photofolio_2_home_sidebar == 'off') && ( $photofolio_2_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $photofolio_2_home_sidebar == 'off') && ( $photofolio_2_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}
	
	if ($theme_style == 'product') {

		if (( $product_home_sidebar == 'on' ) && ( $product_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $product_home_sidebar == 'on') && ( $product_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $product_home_sidebar == 'off') && ( $product_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $product_home_sidebar == 'off') && ( $product_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'spa') {

		if (( $spa_home_sidebar == 'on' ) && ( $spa_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $spa_home_sidebar == 'on') && ( $spa_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $spa_home_sidebar == 'off') && ( $spa_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $spa_home_sidebar == 'off') && ( $spa_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

	else if ($theme_style == 'travel') {

		if (( $travel_home_sidebar == 'on' ) && ( $travel_page_sidebar == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $travel_home_sidebar == 'on') && ( $travel_page_sidebar == 'on')) {
			$box_class = '';
		}
		else if (( $travel_home_sidebar == 'off') && ( $travel_page_sidebar == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $travel_home_sidebar == 'off') && ( $travel_page_sidebar == 'off')) {
			$box_class = 'hidden';
		}
	}

?>