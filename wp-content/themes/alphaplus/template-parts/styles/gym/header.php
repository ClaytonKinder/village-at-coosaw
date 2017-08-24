<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/gym.php' );
?>
<header id="masthead" class="site-header">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
					<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
					<nav id="site-navigation" class="main-navigation">
						<div class="site-branding">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/gym-logo.png" alt="">';
									}
								?>
							</a>
						</div><!-- .site-branding -->
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					
					<div id="mobile-menu" class="uk-offcanvas">
						<div class="uk-offcanvas-bar">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile' ) ); ?>
						</div>
					</div>
				</div>
			</div>

	</header><!-- #masthead -->