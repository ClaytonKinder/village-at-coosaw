<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_home_about = ot_get_option('mall_home_about');
		$photofolio_page_about = ot_get_option('mall_page_about');
	}
	else {
		$photofolio_home_about = 'on';
		$photofolio_page_about = 'off';
	}

	if (is_active_sidebar('about')) {
?>
<div id="about" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('about');
			?>
		</div>
	</div>
</div>
<?php
	}
?>

<?php
	if (is_active_sidebar('recent-work')) {
?>
<div id="recent-work" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('recent-work');
			?>
		</div>
	</div>
</div>
<?php
	}
?>

<?php
	if (is_active_sidebar('services')) {
?>
<div id="services" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('services');
			?>
		</div>
	</div>
</div>
<?php
	}
?>

<?php
	if (is_active_sidebar('blog')) {
?>
<div id="blog" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('blog');
			?>
		</div>
	</div>
</div>
<?php
	}
?>

<?php
	if (is_active_sidebar('catalogue')) {
?>
<div id="catalogue" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('catalogue');
			?>
		</div>
	</div>
</div>
<?php
	}
?>

<?php
	if (is_active_sidebar('contact')) {
?>
<div id="contact" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
		<div class="container">
			<?php
				dynamic_sidebar('contact');
			?>
		</div>
	</div>
</div>
<?php
	}
?>