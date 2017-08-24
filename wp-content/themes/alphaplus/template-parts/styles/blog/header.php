<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/blog.php' );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$blog_logo_width = esc_attr(ot_get_option('blog-logo-width'));
		$blog_nav_width = esc_attr(ot_get_option('blog-navigation-width'));
		$blog_social_width = esc_attr(ot_get_option('blog-social-width'));
	}
	else {
		$blog_logo_width = 'col-md-2';
		$blog_nav_width = 'col-md-8';
		$blog_social_width = 'col-md-2';
	}
?>
	<header id="masthead" class="container site-header">
			<div class="row">
				<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
				<div class="site-branding <?php echo $blog_logo_width; ?>">
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

				<div class="<?php echo $blog_nav_width; ?>">
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
					if (is_active_sidebar('social')) {
				?>
					<div id="social" class="<?php echo $blog_social_width; ?>">
						<?php
							dynamic_sidebar('social');
						?>
					</div>
				<?php
					}
				?>
			</div>
	</header><!-- #masthead -->