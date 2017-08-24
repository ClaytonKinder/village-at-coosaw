<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$spa_home_about = ot_get_option('spa_home_about');
		$spa_page_about = ot_get_option('spa_page_about');
		$spa_home_services = ot_get_option('spa_home_services');
		$spa_page_services = ot_get_option('spa_page_services');
		$spa_home_events = ot_get_option('spa_home_events');
		$spa_page_events = ot_get_option('spa_page_events');
		$spa_home_pricing = ot_get_option('spa_home_pricing');
		$spa_page_pricing = ot_get_option('spa_page_pricing');
		$spa_home_offers = ot_get_option('spa_home_offers');
		$spa_page_offers = ot_get_option('spa_page_offers');
		$spa_home_team = ot_get_option('spa_home_team');
		$spa_page_team = ot_get_option('spa_page_team');
	}
	else {	
		$spa_home_about = 'on';
		$spa_page_about = 'off';
		$spa_home_services = 'on';
		$spa_page_services = 'off';
		$spa_home_events = 'on';
		$spa_page_events = 'off';
		$spa_home_pricing = 'on';
		$spa_page_pricing = 'off';
		$spa_home_offers = 'on';
		$spa_page_offers = 'off';
		$spa_home_team = 'on';
		$spa_page_team = 'off';
	}

	if (( $spa_home_about == 'on' ) && ( $spa_page_about == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_about == 'on') && ( $spa_page_about == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_about == 'off') && ( $spa_page_about == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_about == 'off') && ( $spa_page_about == 'off')) {
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
	if (( $spa_home_services == 'on' ) && ( $spa_page_services == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_services == 'on') && ( $spa_page_services == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_services == 'off') && ( $spa_page_services == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_services == 'off') && ( $spa_page_services == 'off')) {
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
	if (( $spa_home_events == 'on' ) && ( $spa_page_events == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_events == 'on') && ( $spa_page_events == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_events == 'off') && ( $spa_page_events == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_events == 'off') && ( $spa_page_events == 'off')) {
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
	if (( $spa_home_pricing == 'on' ) && ( $spa_page_pricing == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_pricing == 'on') && ( $spa_page_pricing == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_pricing == 'off') && ( $spa_page_pricing == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_pricing == 'off') && ( $spa_page_pricing == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('pricing')) {
?>
<div id="pricing" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('pricing');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $spa_home_offers == 'on' ) && ( $spa_page_offers == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_offers == 'on') && ( $spa_page_offers == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_offers == 'off') && ( $spa_page_offers == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_offers == 'off') && ( $spa_page_offers == 'off')) {
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
	if (( $spa_home_team == 'on' ) && ( $spa_page_team == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $spa_home_team == 'on') && ( $spa_page_team == 'on')) {
		$box_class = '';
	}
	else if (( $spa_home_team == 'off') && ( $spa_page_team == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $spa_home_team == 'off') && ( $spa_page_team == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('team')) {
?>
<div id="team" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('team');
		?>
	</div>
</div>
<?php
	}
?>