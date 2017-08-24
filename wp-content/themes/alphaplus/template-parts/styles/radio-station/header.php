<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/radio.php' );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$radio_logo_width = esc_attr(ot_get_option('radio-logo-width'));
		$radio_nav_width = esc_attr(ot_get_option('radio-nav-width'));
		$radio_player_width = esc_attr(ot_get_option('radio-player-width'));
	}
	else {
		$radio_logo_width = 'col-md-2';
		$radio_nav_width = 'col-md-8';
		$radio_player_width = 'col-md-2';
	}
?>
	<header id="masthead" class="site-header" data-uk-sticky="{top:-100, animation: 'uk-animation-slide-top'}">
		<div class="container">
			<div class="row">
				<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
				<div class="site-branding <?php echo $radio_logo_width; ?>">
					<?php
						$site_logo = ot_get_option('site_logo');

						if (!empty ($site_logo)) {
							echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_attr($site_logo) . '" alt=""></a>';
						}
						else {
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
						}
					?>
					
				</div><!-- .site-branding -->

				<div class="<?php echo $radio_nav_width; ?>">
					<nav id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					
					<div id="mobile-menu" class="uk-offcanvas">
						<div class="uk-offcanvas-bar">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
						</div>
					</div>
				</div>

				<?php
					if (is_active_sidebar('header')) {
				?>
					<div class="header-widget <?php echo $radio_player_width; ?>">
						<?php
							dynamic_sidebar('header');
						?>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</header><!-- #masthead -->