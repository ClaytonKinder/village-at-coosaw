<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/spa.php' );
?>

<a href="#mobile-menu" class="menu-mobile" data-uk-offcanvas><i class="fa fa-bars"></i></a>
<?php
	if ( is_active_sidebar('top-header-left') || is_active_sidebar('top-header-right') ) {
?>
<div id="top-header">
	<div class="container">
		<div class="row">
			<?php if (is_active_sidebar('top-header-left')) { ?>
			<div class="col-md-6">
				<?php
					dynamic_sidebar('top-header-left');
				?>
			</div>
			<?php } ?>
			<?php if (is_active_sidebar('top-header-right')) { ?>
			<div class="col-md-6">
				<?php
					dynamic_sidebar('top-header-right');
				?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php
	}
?>
		
<div id="mobile-menu" class="uk-offcanvas">
	<div class="uk-offcanvas-bar">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</div>
</div>

<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div id="header-widget" class="col-md-4">
					<?php
						if (is_active_sidebar('header')) {
							dynamic_sidebar('header');
						}
					?>
				</div>
				<div class="col-md-4">
					<div class="site-branding <?php echo $spa_logo_width; ?>">
							<a href="<?php echo site_url(); ?>">
								<?php
									$site_logo = ot_get_option('site_logo');

									if (!empty ($site_logo)) {
										echo '<img src="' . esc_attr($site_logo) . '" alt="">';
									}
									else {
										echo '<img src="'. get_template_directory_uri() . '/images/logos/spa-logo.png" alt="">';
									}
								?>
							</a>
					</div><!-- .site-branding -->
				</div>
				<div id="social" class="col-md-4">
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

	</header><!-- #masthead -->