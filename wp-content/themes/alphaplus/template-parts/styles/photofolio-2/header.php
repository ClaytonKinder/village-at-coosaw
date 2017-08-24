<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/photofolio-2.php' );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_2_header_width = esc_attr(ot_get_option('photofolio-2-header-width'));
		$photofolio_2_social_width = esc_attr(ot_get_option('photofolio-2-social-width'));
	}
	else {
		$photofolio_2_header_width = 'col-md-9';
		$photofolio_2_social_width = 'col-md-3';
	}
?>
<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="<?php echo $photofolio_2_header_width; ?>">
					<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
					<p class="menu-icon" data-uk-toggle="{target:'#site-navigation', animation:'uk-animation-slide-top, uk-animation-slide-top'}">
						<i class="fa fa-bars"></i>
					</p>
					<div class="site-branding">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/photofolio-logo.png" alt="">';
									}
								?>
							</a>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="main-navigation uk-hidden">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				<div id="social" class="<?php echo $photofolio_2_social_width; ?>">
					<?php 
						if (is_active_sidebar('social')) {
							dynamic_sidebar('social');
						}
					?>
				</div>
			</div>
		</div>
		
		<div id="mobile-menu" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
			</div>
		</div>

	</header><!-- #masthead -->