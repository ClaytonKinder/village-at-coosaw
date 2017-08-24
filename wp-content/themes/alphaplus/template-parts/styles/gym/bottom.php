<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$gym_home_testimonials = ot_get_option('gym_home_testimonials');
		$gym_page_testimonials = ot_get_option('gym_page_testimonials');
		$gym_home_contact = ot_get_option('gym_home_contact');
		$gym_page_contact = ot_get_option('gym_page_contact');
	}
	else {		
		$gym_home_testimonials = 'on';
		$gym_page_testimonials = 'off';
		$gym_home_contact = 'on';
		$gym_page_contact = 'off';
	}

	if (( $gym_home_testimonials == 'on' ) && ( $gym_page_testimonials == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_testimonials == 'on') && ( $gym_page_testimonials == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_testimonials == 'off') && ( $gym_page_testimonials == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_testimonials == 'off') && ( $gym_page_testimonials == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('testimonials')) {
?>
<div id="testimonials" class="<?php echo $box_class; ?>" data-uk-parallax="{bg: '-200'}">
	<div class="container">
		<?php
			dynamic_sidebar('testimonials');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	$box_class = NULL;

	if (( $gym_home_contact == 'on' ) && ( $gym_page_contact == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_contact == 'on') && ( $gym_page_contact == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_contact == 'off') && ( $gym_page_contact == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_contact == 'off') && ( $gym_page_contact == 'off')) {
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