<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A+
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alphaplus' ); ?></a>

	<?php
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
			$theme_style = ot_get_option('theme_style');
		}
		else {
			$theme_style = 'mall';
		}

		if ($theme_style == 'blog') {
			get_template_part('template-parts/styles/blog/header');
		}
		else if ($theme_style == 'coming-soon') {
			get_template_part('template-parts/styles/coming-soon/header');
		}
		else if ($theme_style == 'corporation') {
			get_template_part('template-parts/styles/corporation/header');
		}
		else if ($theme_style == 'gym') {
			get_template_part('template-parts/styles/gym/header');
		}
		else if ($theme_style == 'mall') {
			get_template_part('template-parts/styles/mall/header');
		}
		else if ($theme_style == 'product') {
			get_template_part('template-parts/styles/product/header');
		}
		else if ($theme_style == 'photofolio') {
			get_template_part('template-parts/styles/photofolio/header');
		}
		else if ($theme_style == 'photofolio-2') {
			get_template_part('template-parts/styles/photofolio-2/header');
		}
		else if ($theme_style == 'radio-station') {
			get_template_part('template-parts/styles/radio-station/header');
		}
		else if ($theme_style == 'spa') {
			get_template_part('template-parts/styles/spa/header');
		}
		else if ($theme_style == 'travel') {
			get_template_part('template-parts/styles/travel/header');
		}

	?>

	<div id="content" class="site-content">
