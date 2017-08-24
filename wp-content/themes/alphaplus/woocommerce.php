<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphaplus
 */

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
	$post_date = ot_get_option('cat_date_visibility');
	$post_author = ot_get_option('cat_author_visibility');
	$post_category = ot_get_option('cat_category_visibility');
	$post_comments = ot_get_option('cat_comments_visibility');
	$main_width = esc_attr(ot_get_option('main-width'));
}
else {
	$post_date = 'on';
	$post_author = 'on';
	$post_category = 'on';
	$post_comments = 'on';
	$main_width = 'col-md-8';
}


get_header(); ?>

	<?php
		get_template_part('template-parts/showcase');
		get_template_part('template-parts/main-top');
	?>

	<div id="primary" class="content-area row">
		<div class="container">

			<main id="main" class="site-main heading-lines <?php echo esc_attr($main_width); ?>">

				<?php 
					woocommerce_content();

					get_template_part( 'inc/layouts/main');
				?>

			</main><!-- #main -->

			<?php
				get_sidebar();
			?>
		</div>
		
	</div>

	<?php
		get_template_part('template-parts/bottom');
	?>


<?php
get_footer();
