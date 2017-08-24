<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$blog_home_main_top = ot_get_option('blog_home_main_top');
		$blog_page_main_top = ot_get_option('blog_page_main_top');
		$blog_home_main_left = ot_get_option('blog_home_main_left');
		$blog_page_main_left = ot_get_option('blog_page_main_left');
		$blog_home_main_right = ot_get_option('blog_home_main_right');
		$blog_page_main_right = ot_get_option('blog_page_main_right');
		$blog_home_main_bottom = ot_get_option('blog_home_main_bottom');
		$blog_page_main_bottom = ot_get_option('blog_page_main_bottom');
		$blog_home_bottom = ot_get_option('blog_home_bottom');
		$blog_page_bottom = ot_get_option('blog_page_bottom');
		
		$blog_main_left_width = ot_get_option('blog-main-left-width');
		$blog_main_right_width = ot_get_option('blog-main-right-width');
	}
	else {
		$blog_home_main_top = 'on';
		$blog_page_main_top = 'off';
		$blog_home_main_left = 'on';
		$blog_page_main_left = 'off';
		$blog_home_main_right = 'on';
		$blog_page_main_right = 'off';
		$blog_home_main_bottom = 'on';
		$blog_page_main_bottom = 'off';
		$blog_home_bottom = 'on';
		$blog_page_bottom = 'on';
		
		$blog_main_left_width = 'col-md-6';
		$blog_main_right_width = 'col-md-6';
	}


	if (( $blog_home_main_top == 'on' ) && ( $blog_page_main_top == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $blog_home_main_top == 'on') && ( $blog_page_main_top == 'on')) {
		$box_class = '';
	}
	else if (( $blog_home_main_top == 'off') && ( $blog_page_main_top == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $blog_home_main_top == 'off') && ( $blog_page_main_top == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('main-top')) {
?>
<div id="main-top" class="<?php echo $box_class; ?>">
	<?php
		dynamic_sidebar('main-top');
	?>
</div>
<?php
	}
?>

<?php

	if (( $blog_home_main_left == 'on' ) && ( $blog_page_main_left == 'off')) {
		$box_class_left = 'front-widget';
	}
	else if (( $blog_home_main_left == 'on') && ( $blog_page_main_left == 'on')) {
		$box_class_left = '';
	}
	else if (( $blog_home_main_left == 'off') && ( $blog_page_main_left == 'on')) {
		$box_class_left = 'hidden-front';
	}	
	else if (( $blog_home_main_left == 'off') && ( $blog_page_main_left == 'off')) {
		$box_class_left = 'hidden';
	}

	if (( $blog_home_main_right == 'on' ) && ( $blog_page_main_right == 'off')) {
		$box_class_right = 'front-widget';
	}
	else if (( $blog_home_main_right == 'on') && ( $blog_page_main_right == 'on')) {
		$box_class_right = '';
	}
	else if (( $blog_home_main_right == 'off') && ( $blog_page_main_right == 'on')) {
		$box_class_right = 'hidden-front';
	}	
	else if (( $blog_home_main_right == 'off') && ( $blog_page_main_right == 'off')) {
		$box_class_right = 'hidden';
	}

	if (is_active_sidebar('main-left') || is_active_sidebar('main-right')) {
?>
<div id="main-left-right" class="row">
	<?php
		if (is_active_sidebar('main-left')) {
	?>
	<div id="main-left" class="<?php echo $blog_main_left_width . ' ' . $box_class_left; ?>">
		<?php
			dynamic_sidebar('main-left');
		?>
	</div>
	<?php
		}
	?>
	<?php
		if (is_active_sidebar('main-right')) {
	?>
	<div id="main-right" class="<?php echo $blog_main_left_width . ' ' . $box_class_right; ?>">
		<?php
			dynamic_sidebar('main-right');
		?>
	</div>
	<?php
		}
	?>
</div>
<?php
	}
?>


<?php

	if (( $blog_home_main_bottom == 'on' ) && ( $blog_page_main_bottom == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $blog_home_main_bottom == 'on') && ( $blog_page_main_bottom == 'on')) {
		$box_class = '';
	}
	else if (( $blog_home_main_bottom == 'off') && ( $blog_page_main_bottom == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $blog_home_main_bottom == 'off') && ( $blog_page_main_bottom == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('main-bottom')) {
?>
<div id="main-bottom" class="<?php echo $box_class; ?>">
	<?php
		dynamic_sidebar('main-bottom');
	?>
</div>
<?php
	}
?>