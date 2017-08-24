<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {	
		$travel_home_destinations = ot_get_option('travel_home_destinations');
		$travel_page_destinations = ot_get_option('travel_page_destinations');
		$travel_home_top_destinations = ot_get_option('travel_home_top_destinations');
		$travel_page_top_destinations = ot_get_option('travel_page_top_destinations');
		$travel_home_activities = ot_get_option('travel_home_activities');
		$travel_page_activities = ot_get_option('travel_page_activities');
		$travel_home_offers = ot_get_option('travel_home_offers');
		$travel_page_offers = ot_get_option('travel_page_offers');
		$travel_home_news = ot_get_option('travel_home_news');
		$travel_page_news = ot_get_option('travel_page_news');
	}
	else {
		$travel_home_destinations = 'on';
		$travel_page_destinations = 'off';
		$travel_home_top_destinations = 'on';
		$travel_page_top_destinations = 'off';
		$travel_home_activities = 'on';
		$travel_page_activities = 'off';
		$travel_home_offers = 'on';
		$travel_page_offers = 'off';
		$travel_home_news = 'on';
		$travel_page_news = 'off';
	}

	if (( $travel_home_top_destinations == 'on' ) && ( $travel_page_top_destinations == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_top_destinations == 'on') && ( $travel_page_top_destinations == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_top_destinations == 'off') && ( $travel_page_top_destinations == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_top_destinations == 'off') && ( $travel_page_top_destinations == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('top-destinations')) {
?>
<div id="top-destinations" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('top-destinations');
		?>
	</div>
</div>
<?php
	}

	if (( $travel_home_destinations == 'on' ) && ( $travel_page_destinations == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_destinations == 'on') && ( $travel_page_destinations == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_destinations == 'off') && ( $travel_page_destinations == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_destinations == 'off') && ( $travel_page_destinations == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('destinations')) {
?>
<div id="destinations" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('destinations');
		?>
	</div>
</div>
<?php
	}


	if (( $travel_home_activities == 'on' ) && ( $travel_page_activities == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_activities == 'on') && ( $travel_page_activities == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_activities == 'off') && ( $travel_page_activities == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_activities == 'off') && ( $travel_page_activities == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('activities')) {
?>

<div id="activities" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('activities');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $travel_home_offers == 'on' ) && ( $travel_page_offers == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_offers == 'on') && ( $travel_page_offers == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_offers == 'off') && ( $travel_page_offers == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_offers == 'off') && ( $travel_page_offers == 'off')) {
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

	if (( $travel_home_news == 'on' ) && ( $travel_page_news == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $travel_home_news == 'on') && ( $travel_page_news == 'on')) {
		$box_class = '';
	}
	else if (( $travel_home_news == 'off') && ( $travel_page_news == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $travel_home_news == 'off') && ( $travel_page_news == 'off')) {
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