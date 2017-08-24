<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$radio_home_about = ot_get_option('radio_home_about');
		$radio_page_about = ot_get_option('radio_page_about');
		$radio_home_team = ot_get_option('radio_home_team');
		$radio_page_team = ot_get_option('radio_page_team');
		$radio_home_program = ot_get_option('radio_home_program');
		$radio_page_program = ot_get_option('radio_page_program');
		$radio_home_charts = ot_get_option('radio_home_charts');
		$radio_page_charts = ot_get_option('radio_page_charts');
		$radio_home_news = ot_get_option('radio_home_news');
		$radio_page_news = ot_get_option('radio_page_news');
		$radio_home_app = ot_get_option('radio_home_app');
		$radio_page_app = ot_get_option('radio_page_app');
		$radio_home_events = ot_get_option('radio_home_events');
		$radio_page_events = ot_get_option('radio_page_events');
	}
	else {
		$radio_home_about = 'on';
		$radio_page_about = 'off';
		$radio_home_team = 'on';
		$radio_page_team = 'off';
		$radio_home_program = 'on';
		$radio_page_program = 'off';
		$radio_home_charts = 'on';
		$radio_page_charts = 'off';
		$radio_home_news = 'on';
		$radio_page_news = 'off';
		$radio_home_app = 'on';
		$radio_page_app = 'off';
		$radio_home_events = 'on';
		$radio_page_events = 'off';
	}


	if (( $radio_home_about == 'on' ) && ( $radio_page_about == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_about == 'on') && ( $radio_page_about == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_about == 'off') && ( $radio_page_about == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_about == 'off') && ( $radio_page_about == 'off')) {
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

	if (( $radio_home_team == 'on' ) && ( $radio_page_team == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_team == 'on') && ( $radio_page_team == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_team == 'off') && ( $radio_page_team == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_team == 'off') && ( $radio_page_team == 'off')) {
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

<?php
	if ((is_active_sidebar('program')) || (is_active_sidebar('charts'))) {
?>
<div class="row">
	<?php

		if (( $radio_home_program == 'on' ) && ( $radio_page_program == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $radio_home_program == 'on') && ( $radio_page_program == 'on')) {
			$box_class = '';
		}
		else if (( $radio_home_program == 'off') && ( $radio_page_program == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $radio_home_program == 'off') && ( $radio_page_program == 'off')) {
			$box_class = 'hidden';
		}
	?>
	<div id="program" class="col-md-6 <?php echo $box_class; ?>">
		<div class="inner-container">
			<?php
				dynamic_sidebar('program');
			?>
		</div>
	</div>
	
	<?php

		if (( $radio_home_charts == 'on' ) && ( $radio_page_charts == 'off')) {
			$box_class = 'front-widget';
		}
		else if (( $radio_home_charts == 'on') && ( $radio_page_charts == 'on')) {
			$box_class = '';
		}
		else if (( $radio_home_charts == 'off') && ( $radio_page_charts == 'on')) {
			$box_class = 'hidden-front';
		}	
		else if (( $radio_home_charts == 'off') && ( $radio_page_charts == 'off')) {
			$box_class = 'hidden';
		}
	?>
	<div id="charts" class="col-md-6 <?php echo $box_class; ?>">
		<div class="inner-container">
			<?php
				dynamic_sidebar('charts');
			?>
		</div>
	</div>
</div>
<?php
	}
?>


<?php

	if (( $radio_home_news == 'on' ) && ( $radio_page_news == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_news == 'on') && ( $radio_page_news == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_news == 'off') && ( $radio_page_news == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_news == 'off') && ( $radio_page_news == 'off')) {
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

	if (( $radio_home_app == 'on' ) && ( $radio_page_app == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_app == 'on') && ( $radio_page_app == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_app == 'off') && ( $radio_page_app == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_app == 'off') && ( $radio_page_app == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('app-showcase')) {
?>
<div id="app-showcase" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('app-showcase');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $radio_home_events == 'on' ) && ( $radio_page_events == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $radio_home_events == 'on') && ( $radio_page_events == 'on')) {
		$box_class = '';
	}
	else if (( $radio_home_events == 'off') && ( $radio_page_events == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $radio_home_events == 'off') && ( $radio_page_events == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('events')) {
		$events_bg_video = esc_attr(ot_get_option('events_bg_video'));
?>
<div id="events" class="<?php echo $box_class; ?>">
	<?php 
		if (! empty ($events_bg_video)) {
	?>
		<video playsinline autoplay muted loop id="bgvid">
			<source src="<?php echo $events_bg_video; ?>" type="video/mp4">
		</video>
		<div id="box-container"></div>
	<?php
		}
	?>
	<div class="container">
		<?php
			dynamic_sidebar('events');
		?>
	</div>
</div>
<?php
	}
?>
