<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$gym_home_maintop = ot_get_option('gym_home_maintop');
		$gym_page_maintop = ot_get_option('gym_page_maintop');
		$gym_home_classes = ot_get_option('gym_home_classes');
		$gym_page_classes = ot_get_option('gym_page_classes');
		$gym_home_program = ot_get_option('gym_home_program');
		$gym_page_program = ot_get_option('gym_page_program');
		$gym_home_trainers = ot_get_option('gym_home_trainers');
		$gym_page_trainers = ot_get_option('gym_page_trainers');
		$gym_home_tips = ot_get_option('gym_home_tips');
		$gym_page_tips = ot_get_option('gym_page_tips');
		$gym_home_offers = ot_get_option('gym_home_offers');
		$gym_page_offers = ot_get_option('gym_page_offers');
		$gym_home_news = ot_get_option('gym_home_news');
		$gym_page_news = ot_get_option('gym_page_news');
		$gym_home_shop = ot_get_option('gym_home_shop');
		$gym_page_shop = ot_get_option('gym_page_shop');
	}
	else {		
		$gym_home_maintop = 'on';
		$gym_page_maintop = 'off';
		$gym_home_classes = 'on';
		$gym_page_classes = 'off';
		$gym_home_program = 'on';
		$gym_page_program = 'off';
		$gym_home_trainers = 'on';
		$gym_page_trainers = 'off';
		$gym_home_tips = 'on';
		$gym_page_tips = 'off';
		$gym_home_offers = 'on';
		$gym_page_offers = 'off';
		$gym_home_news = 'on';
		$gym_page_news = 'off';
		$gym_home_shop = 'on';
		$gym_page_shop = 'off';
	}

	if (( $gym_home_maintop == 'on' ) && ( $gym_page_maintop == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_maintop == 'on') && ( $gym_page_maintop == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_maintop == 'off') && ( $gym_page_maintop == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_maintop == 'off') && ( $gym_page_maintop == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('main-top')) {
?>
<div id="main-top" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('main-top');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $gym_home_classes == 'on' ) && ( $gym_page_classes == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_classes == 'on') && ( $gym_page_classes == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_classes == 'off') && ( $gym_page_classes == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_classes == 'off') && ( $gym_page_classes == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('classes')) {
?>
<div id="classes" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('classes');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $gym_home_program == 'on' ) && ( $gym_page_program == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_program == 'on') && ( $gym_page_program == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_program == 'off') && ( $gym_page_program == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_program == 'off') && ( $gym_page_program == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('program')) {
?>
<div id="program" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('program');
		?>
	</div>
</div>
<?php
	}
?>

<?php
		
	if (( $gym_home_trainers == 'on' ) && ( $gym_page_trainers == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_trainers == 'on') && ( $gym_page_trainers == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_trainers == 'off') && ( $gym_page_trainers == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_trainers == 'off') && ( $gym_page_trainers == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('trainers')) {
?>
<div id="trainers" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('trainers');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $gym_home_tips == 'on' ) && ( $gym_page_tips == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_tips == 'on') && ( $gym_page_tips == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_tips == 'off') && ( $gym_page_tips == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_tips == 'off') && ( $gym_page_tips == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('tips')) {
?>
<div id="tips" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('tips');
		?>
	</div>
</div>
<?php
	}
?>

<?php

	if (( $gym_home_offers == 'on' ) && ( $gym_page_offers == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_offers == 'on') && ( $gym_page_offers == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_offers == 'off') && ( $gym_page_offers == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_offers == 'off') && ( $gym_page_offers == 'off')) {
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
		
	if (( $gym_home_news == 'on' ) && ( $gym_page_news == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_news == 'on') && ( $gym_page_news == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_news == 'off') && ( $gym_page_news == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_news == 'off') && ( $gym_page_news == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('blog')) {
?>
<div id="news" class="<?php echo $box_class; ?>">
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
		
	if (( $gym_home_shop == 'on' ) && ( $gym_page_shop == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $gym_home_shop == 'on') && ( $gym_page_shop == 'on')) {
		$box_class = '';
	}
	else if (( $gym_home_shop == 'off') && ( $gym_page_shop == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $gym_home_shop == 'off') && ( $gym_page_shop == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('shop')) {
?>
<div id="shop" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('shop');
		?>
	</div>
</div>
<?php
	}
?>