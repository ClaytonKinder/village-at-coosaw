<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_2_home_about = ot_get_option('photofolio_2_home_about');
		$photofolio_2_page_about = ot_get_option('photofolio_2_page_about');
		$photofolio_2_home_recent_work = ot_get_option('photofolio_2_home_recent_work');
		$photofolio_2_page_recent_work = ot_get_option('photofolio_2_page_recent_work');
		$photofolio_2_home_services = ot_get_option('photofolio_2_home_services');
		$photofolio_2_page_services = ot_get_option('photofolio_2_page_services');
		$photofolio_2_home_blog = ot_get_option('photofolio_2_home_blog');
		$photofolio_2_page_blog = ot_get_option('photofolio_2_page_blog');
		$photofolio_2_home_events = ot_get_option('photofolio_2_home_events');
		$photofolio_2_page_events = ot_get_option('photofolio_2_page_events');
		$photofolio_2_home_catalogue = ot_get_option('photofolio_2_home_catalogue');
		$photofolio_2_page_catalogue = ot_get_option('photofolio_2_page_catalogue');
		$photofolio_2_home_contact = ot_get_option('photofolio_2_home_contact');
		$photofolio_2_page_contact = ot_get_option('photofolio_2_page_contact');
	}
	else {
		$photofolio_2_home_about = 'on';
		$photofolio_2_page_about = 'off';
		$photofolio_2_home_recent_work = 'on';
		$photofolio_2_page_recent_work = 'off';
		$photofolio_2_home_services = 'on';
		$photofolio_2_page_services = 'off';
		$photofolio_2_home_blog = 'on';
		$photofolio_2_page_blog = 'off';
		$photofolio_2_home_events = 'on';
		$photofolio_2_page_events = 'off';
		$photofolio_2_home_catalogue = 'on';
		$photofolio_2_page_catalogue = 'off';
		$photofolio_2_home_contact = 'on';
		$photofolio_2_page_contact = 'off';
	}


	if (( $photofolio_2_home_about == 'on' ) && ( $photofolio_2_page_about == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_about == 'on') && ( $photofolio_2_page_about == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_about == 'off') && ( $photofolio_2_page_about == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_about == 'off') && ( $photofolio_2_page_about == 'off')) {
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
	if (( $photofolio_2_home_recent_work == 'on' ) && ( $photofolio_2_page_recent_work == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_recent_work == 'on') && ( $photofolio_2_page_recent_work == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_recent_work == 'off') && ( $photofolio_2_page_recent_work == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_recent_work == 'off') && ( $photofolio_2_page_recent_work == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('recent-work')) {
?>
<div id="recent-work" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('recent-work');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $photofolio_2_home_services == 'on' ) && ( $photofolio_2_page_services == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_services == 'on') && ( $photofolio_2_page_services == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_services == 'off') && ( $photofolio_2_page_services == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_services == 'off') && ( $photofolio_2_page_services == 'off')) {
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
	if (( $photofolio_2_home_blog == 'on' ) && ( $photofolio_2_page_blog == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_blog == 'on') && ( $photofolio_2_page_blog == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_blog == 'off') && ( $photofolio_2_page_blog == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_blog == 'off') && ( $photofolio_2_page_blog == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('blog')) {
?>
<div id="blog" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('blog');
		?>
	</div>
</div>
<?php
	}
?>


<?php
	if (( $photofolio_2_home_events == 'on' ) && ( $photofolio_2_page_events == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_events == 'on') && ( $photofolio_2_page_events == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_events == 'off') && ( $photofolio_2_page_events == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_events == 'off') && ( $photofolio_2_page_events == 'off')) {
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
	if (( $photofolio_2_home_catalogue == 'on' ) && ( $photofolio_2_page_catalogue == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_catalogue == 'on') && ( $photofolio_2_page_catalogue == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_catalogue == 'off') && ( $photofolio_2_page_catalogue == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_catalogue == 'off') && ( $photofolio_2_page_catalogue == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('catalogue')) {
?>
<div id="catalogue" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('catalogue');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $photofolio_2_home_contact == 'on' ) && ( $photofolio_2_page_contact == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $photofolio_2_home_contact == 'on') && ( $photofolio_2_page_contact == 'on')) {
		$box_class = '';
	}
	else if (( $photofolio_2_home_contact == 'off') && ( $photofolio_2_page_contact == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $photofolio_2_home_contact == 'off') && ( $photofolio_2_page_contact == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('contact')) {
?>
<div id="contact" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('contact');
		?>
	</div>
</div>
<?php
	}
?>