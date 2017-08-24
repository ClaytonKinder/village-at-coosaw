<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$corporation_home_counter = ot_get_option('corporation_home_counter');
		$corporation_page_counter = ot_get_option('corporation_page_counter');
		
		$corporation_footer_1_width = esc_attr(ot_get_option('corporation-footer-1-width'));
		$corporation_footer_2_width = esc_attr(ot_get_option('corporation-footer-2-width'));
		$corporation_footer_3_width = esc_attr(ot_get_option('corporation-footer-3-width'));
		$corporation_footer_4_width = esc_attr(ot_get_option('corporation-footer-4-width'));
		$corporation_footer_5_width = esc_attr(ot_get_option('corporation-footer-5-width'));
		
		$copyright = esc_attr(ot_get_option('copyright'));
		$totop_button = ot_get_option('totop_button');
	}
	else {
		$corporation_home_counter = 'on';
		$corporation_page_counter = 'on';
		
		$corporation_footer_1_width = 'col-md-3';
		$corporation_footer_2_width = 'col-md-2';
		$corporation_footer_3_width = 'col-md-2';
		$corporation_footer_4_width = 'col-md-2';
		$corporation_footer_5_width = 'col-md-3';
		
		$copyright = 'Copyright 2017';
		$totop_button = 'on';
	}
?>


<?php
	if (( $corporation_home_counter == 'on' ) && ( $corporation_page_counter == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $corporation_home_counter == 'on') && ( $corporation_page_counter == 'on')) {
		$box_class = '';
	}
	else if (( $corporation_home_counter == 'off') && ( $corporation_page_counter == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $corporation_home_counter == 'off') && ( $corporation_page_counter == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('counter')) {
?>
<div id="counter" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('counter');
		?>
	</div>
</div>
<?php
	}
?>

<div id="footer">
	<div class="container">
		<div class="row">
			<?php
				if (is_active_sidebar('footer-1')) {
			?>
			<div class="<?php echo $corporation_footer_1_width; ?>">
				<?php dynamic_sidebar('footer-1'); ?>
			</div>
			<?php
				}
				if (is_active_sidebar('footer-2')) {
			?>
			<div class="<?php echo $corporation_footer_2_width; ?>">
				<?php dynamic_sidebar('footer-2'); ?>
			</div>
			<?php
				}
				if (is_active_sidebar('footer-3')) {
			?>
			<div class="<?php echo $corporation_footer_3_width; ?>">
				<?php dynamic_sidebar('footer-3'); ?>
			</div>
			<?php
				}
				if (is_active_sidebar('footer-4')) {
			?>
			<div class="<?php echo $corporation_footer_4_width; ?>">
				<?php dynamic_sidebar('footer-4'); ?>
			</div>
			<?php
				}
				if (is_active_sidebar('footer-5')) {
			?>
			<div class="<?php echo $corporation_footer_5_width; ?>">
				<?php dynamic_sidebar('footer-5'); ?>
			</div>
			<?php
				}
			?>
		</div>
		<div id="copyright">
			<?php
				echo '<p>' . $copyright . '</p>';
			?>
			<?php
				if ($totop_button == 'on') {
			?>
			<div id="totop-btn">
				<a href="#page" data-uk-smooth-scroll><i class="fa fa-chevron-up"></i></a>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>