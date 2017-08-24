<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/travel.php' );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$travel_logo_width = esc_attr(ot_get_option('travel-logo-width'));
		$travel_right_header_width = esc_attr(ot_get_option('travel-right-header-width'));
	}
	else {
		$travel_logo_width = 'col-md-3';
		$travel_right_header_width = 'col-md-9';
	}
?>
<header id="masthead" class="site-header">
		<div class="container">
			<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
			<div class="row">
				<div class="<?php echo $travel_logo_width; ?>">
					<div class="site-branding <?php echo $mall_logo_width; ?>">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="Logo">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/travel-logo.png" alt="Logo">';
									}
								?>
							</a>
					</div><!-- .site-branding -->
				</div>
				<div class="<?php echo $travel_right_header_width; ?>">
					<div class="header-top">
						<?php
							if (is_active_sidebar('header')) {
						?>
						<div id="header-widget">
							<?php
								dynamic_sidebar('header');
							?>
						</div>
						<?php
							}
							if (is_active_sidebar('social')) {
						?>
						<div id="social">
							<?php 
								dynamic_sidebar('social');
							?>
						</div>
						<?php
							}
						?>
					</div>
					<nav id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					
					<div id="mobile-menu" class="uk-offcanvas">
						<div class="uk-offcanvas-bar">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</header><!-- #masthead -->