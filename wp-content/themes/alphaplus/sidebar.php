<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A+
 */

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
	$sidebar_width = esc_attr(ot_get_option('right-sidebar-width'));
}
else {
	$sidebar_width = 'col-md-4';
}

require(get_template_directory() . '/template-parts/sidebar-visibility.php');
?>

<aside id="secondary" class="widget-area <?php echo $box_class . ' ' . $sidebar_width; ?>">
	<?php
		get_template_part('template-parts/sidebar');
	?>
</aside><!-- #secondary -->
