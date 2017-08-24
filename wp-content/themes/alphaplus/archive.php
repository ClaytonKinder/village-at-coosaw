<?php
/**
 * The template for displaying archive pages.
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
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
				get_sidebar();
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
