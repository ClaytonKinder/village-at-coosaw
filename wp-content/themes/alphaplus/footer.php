<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A+
 */

?>

	</div><!-- #content -->

	<?php
		
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
			$theme_style = ot_get_option('theme_style');
		}
		else {
			$theme_style = 'mall';
		}

		if ($theme_style == 'blog') {
			get_template_part('template-parts/styles/blog/footer');
		}
		else if ($theme_style == 'coming-soon') {
			get_template_part('template-parts/styles/coming-soon/footer');
		}
		else if ($theme_style == 'corporation') {
			get_template_part('template-parts/styles/corporation/footer');
		}
		else if ($theme_style == 'gym') {
			get_template_part('template-parts/styles/gym/footer');
		}
		else if ($theme_style == 'mall') {
			get_template_part('template-parts/styles/mall/footer');
		}
		else if ($theme_style == 'photofolio') {
			get_template_part('template-parts/styles/photofolio/footer');
		}
		else if ($theme_style == 'photofolio-2') {
			get_template_part('template-parts/styles/photofolio-2/footer');
		}
		else if ($theme_style == 'product') {
			get_template_part('template-parts/styles/product/footer');
		}
		else if ($theme_style == 'radio-station') {
			get_template_part('template-parts/styles/radio-station/footer');
		}
		else if ($theme_style == 'spa') {
			get_template_part('template-parts/styles/spa/footer');
		}
		else if ($theme_style == 'travel') {
			get_template_part('template-parts/styles/travel/footer');
		}

	?>

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
