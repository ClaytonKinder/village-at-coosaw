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
 * @package A+
 */

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
	$theme_style = ot_get_option('theme_style');
	$main_width = esc_attr(ot_get_option('main-width'));
}
else {
	$theme_style = 'mall';
	$main_width = 'col-md-8';
}

get_header(); ?>
	<?php
		if ($theme_style != 'blog') {
			get_template_part('template-parts/showcase');
			get_template_part('template-parts/main-top');
		}
	?>

	<div class="container">
		<?php
			if ($theme_style == 'blog') {
				get_template_part('template-parts/showcase');
			}
		?>
		<div class="row">
			<div id="primary" class="content-area <?php echo $main_width; ?>">
				<?php
					if ($theme_style == 'blog') {
						get_template_part('template-parts/main-top');
					}
				?>
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
				if ($theme_style != 'corporation') {
					get_sidebar();
				}
			?>
		</div>
		<?php
			if ($theme_style == 'blog') {
				get_template_part('template-parts/bottom');
			}
		?>
	</div>

	<?php
		if ($theme_style != 'blog') {
			get_template_part('template-parts/bottom');
		}
	?>

<?php
get_footer();
