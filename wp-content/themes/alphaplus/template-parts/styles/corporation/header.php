<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/corporation.php' );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$corporation_logo_width = esc_attr(ot_get_option('corporation-logo-width'));
		$corporation_navigation_width = esc_attr(ot_get_option('corporation-navigation-width'));
	}
	else {
		$corporation_logo_width = 'col-md-4';
		$corporation_navigation_width = 'col-md-8';
	}
?>
<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="<?php echo $corporation_logo_width; ?>">
					<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
					<div class="site-branding">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/corporation-logo.png" alt="">';
									}
								?>
							</a>
					</div><!-- .site-branding -->
				</div>
				<div class="<?php echo $corporation_navigation_width; ?>">
					<nav id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
		
		<div id="mobile-menu" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
			</div>
		</div>

	</header><!-- #masthead -->