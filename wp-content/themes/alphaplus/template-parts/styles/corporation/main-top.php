<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$corporation_home_why_us = ot_get_option('corporation_home_why_us');
		$corporation_page_why_us = ot_get_option('corporation_page_why_us');
		$corporation_home_services = ot_get_option('corporation_home_services');
		$corporation_page_services = ot_get_option('corporation_page_services');
		$corporation_home_blog = ot_get_option('corporation_home_blog');
		$corporation_page_blog = ot_get_option('corporation_page_blog');
		$corporation_home_testimonials = ot_get_option('corporation_home_testimonials');
		$corporation_page_testimonials = ot_get_option('corporation_page_testimonials');
	}
	else {
		
		$corporation_home_why_us = 'on';
		$corporation_page_why_us = 'off';
		$corporation_home_services = 'on';
		$corporation_page_services = 'off';
		$corporation_home_blog = 'on';
		$corporation_page_blog = 'off';
		$corporation_home_testimonials = 'on';
		$corporation_page_testimonials = 'off';
	}


	if (( $corporation_home_why_us == 'on' ) && ( $corporation_page_why_us == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_why_us == 'on') && ( $corporation_page_why_us == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_why_us == 'off') && ( $corporation_page_why_us == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_why_us == 'off') && ( $corporation_page_why_us == 'off')) {
		$box_class = 'hidden';
	}
	
	if (is_active_sidebar('why-us')) {
?>
<div id="why-us" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('why-us');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $corporation_home_services == 'on' ) && ( $corporation_page_services == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_services == 'on') && ( $corporation_page_services == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_services == 'off') && ( $corporation_page_services == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_services == 'off') && ( $corporation_page_services == 'off')) {
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
	if (( $corporation_home_blog == 'on' ) && ( $corporation_page_blog == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_blog == 'on') && ( $corporation_page_blog == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_blog == 'off') && ( $corporation_page_blog == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_blog == 'off') && ( $corporation_page_blog == 'off')) {
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
	if (( $corporation_home_testimonials == 'on' ) && ( $corporation_page_testimonials == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_testimonials == 'on') && ( $corporation_page_testimonials == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_testimonials == 'off') && ( $corporation_page_testimonials == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_testimonials == 'off') && ( $corporation_page_testimonials == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('testimonials')) {
?>
<div id="testimonials" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('testimonials');
		?>
	</div>
</div>
<?php
	}
?>