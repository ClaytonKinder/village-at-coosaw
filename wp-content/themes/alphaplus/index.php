<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
	
	<div class="container <?php if ($theme_style == 'product') echo 'main-product'; ?>">
		<?php
			if ($theme_style == 'blog') {
				get_template_part('template-parts/showcase');
			}
		?>
		<div class="row">
			<div id="primary" class="content-area <?php echo $main_width; ?>">
				<main id="main" class="site-main">

					<?php
						if ($theme_style == 'blog') {
							get_template_part('template-parts/main-top');
						}
					?>
				<?php
					include_once ABSPATH . 'wp-admin/includes/plugin.php';
					if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
						$homepage_posts = ot_get_option('homepage_posts');
					}
					else {
						$homepage_posts = 'on';
					}

					if ($homepage_posts == 'on') {
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

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

						endif; 
					}
				?>

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
