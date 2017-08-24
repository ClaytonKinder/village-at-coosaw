<?php
	
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$mall_header_widget_width = esc_attr(ot_get_option('mall-header-widget-width'));
		$mall_logo_width = esc_attr(ot_get_option('mall-logo-width'));
		$mall_social_width = esc_attr(ot_get_option('mall-social-width'));
	}
	else {
		$mall_header_widget_width = 'col-md-4';
		$mall_logo_width = 'col-md-4';
		$mall_social_width = 'col-md-4';
	}
?>
<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div id="header-widget" class="<?php echo $mall_header_widget_width; ?>">
					<?php
						if (is_active_sidebar('header')) {
							dynamic_sidebar('header');
						}
					?>
				</div>
				<div class="<?php echo $mall_logo_width; ?>">
					<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
					<div class="site-branding">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/mall-logo.png" alt="">';
									}
								?>
							</a>
					</div><!-- .site-branding -->
				</div>
				<div id="social" class="<?php echo $mall_social_width; ?>">
					<?php 
						if (is_active_sidebar('social')) {
							dynamic_sidebar('social');
						}
					?>
				</div>
			</div>
		</div>
		
		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		
		<div id="mobile-menu" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
			</div>
		</div>

	</header><!-- #masthead -->