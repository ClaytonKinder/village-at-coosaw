<?php
	require( trailingslashit( get_template_directory() ) . 'inc/colors/coming-soon.php' );
?>
<header id="masthead" class="site-header">
	<div class="container">
		<div class="site-branding">
			<a href="<?php echo site_url(); ?>">
				<?php
					$site_logo = ot_get_option('site_logo');

					if (!empty ($site_logo)) {
						echo '<img src="' . esc_attr($site_logo) . '" alt="">';
					}
					else {
						echo '<img src="'. get_template_directory_uri() . '/images/logos/coming-soon-logo.png" alt="">';
					}
				?>
			</a>
		</div><!-- .site-branding -->
		<div class="header-icon">
			<a href="#newsletter" data-uk-modal><i class="fa fa-envelope"></i></a>
		</div>
	</div>
</header><!-- #masthead -->

<div id="newsletter" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
		<?php 
			if (is_active_sidebar('newsletter')) {
				dynamic_sidebar('newsletter');
			}
		?>
	</div>
</div>