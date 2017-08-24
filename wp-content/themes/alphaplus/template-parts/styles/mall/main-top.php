<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$mall_home_about = ot_get_option('mall_home_about');
		$mall_page_about = ot_get_option('mall_page_about');
		$mall_home_stores = ot_get_option('mall_home_stores');
		$mall_page_stores = ot_get_option('mall_page_stores');
		$mall_home_offers = ot_get_option('mall_home_offers');
		$mall_page_offers = ot_get_option('mall_page_offers');
		$mall_home_services = ot_get_option('mall_home_services');
		$mall_page_services = ot_get_option('mall_page_services');
		$mall_home_events = ot_get_option('mall_home_events');
		$mall_page_events = ot_get_option('mall_page_events');
		$mall_home_news = ot_get_option('mall_home_news');
		$mall_page_news = ot_get_option('mall_page_news');
		$mall_home_info = ot_get_option('mall_home_info');
		$mall_page_info = ot_get_option('mall_page_info');
	}
	else {
		$mall_home_about = 'on';
		$mall_page_about = 'off';
		$mall_home_stores = 'on';
		$mall_page_stores = 'off';
		$mall_home_offers = 'on';
		$mall_page_offers = 'off';
		$mall_home_services = 'on';
		$mall_page_services = 'off';
		$mall_home_events = 'on';
		$mall_page_events = 'off';
		$mall_home_news = 'on';
		$mall_page_news = 'off';
		$mall_home_info = 'on';
		$mall_page_info = 'off';
	}


	if (( $mall_home_about == 'on' ) && ( $mall_page_about == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_about == 'on') && ( $mall_page_about == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_about == 'off') && ( $mall_page_about == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_about == 'off') && ( $mall_page_about == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('about')) {
?>
<div id="about" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('about');
		?>
	</div>
</div>
<?php
	}
?>
<?php
	if (( $mall_home_stores == 'on' ) && ( $mall_page_stores == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_stores == 'on') && ( $mall_page_stores == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_stores == 'off') && ( $mall_page_stores == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_stores == 'off') && ( $mall_page_stores == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('stores')) {
?>
<div id="stores" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('stores');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $mall_home_offers == 'on' ) && ( $mall_page_offers == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_offers == 'on') && ( $mall_page_offers == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_offers == 'off') && ( $mall_page_offers == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_offers == 'off') && ( $mall_page_offers == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('offers')) {
?>
<div id="offers" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('offers');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $mall_home_services == 'on' ) && ( $mall_page_services == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_services == 'on') && ( $mall_page_services == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_services == 'off') && ( $mall_page_services == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_services == 'off') && ( $mall_page_services == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('services')) {
?>
<div id="services" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('services');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $mall_home_events == 'on' ) && ( $mall_page_events == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_events == 'on') && ( $mall_page_events == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_events == 'off') && ( $mall_page_events == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_events == 'off') && ( $mall_page_events == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('events')) {
?>
<div id="events" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('events');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $mall_home_news == 'on' ) && ( $mall_page_news == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_news == 'on') && ( $mall_page_news == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_news == 'off') && ( $mall_page_news == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_news == 'off') && ( $mall_page_news == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('news')) {
?>
<div id="news" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('news');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $mall_home_info == 'on' ) && ( $mall_page_info == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $mall_home_info == 'on') && ( $mall_page_info == 'on')) {
		$box_class = '';
	}
	else if (( $mall_home_info == 'off') && ( $mall_page_info == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $mall_home_info == 'off') && ( $mall_page_info == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('info')) {
?>
<div id="info" class="<?php echo $box_class; ?>">
	<div class="container slide-bottom-animation">
		<?php
			dynamic_sidebar('info');
		?>
	</div>
</div>
<?php
	}
?>