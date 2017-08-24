<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		get_template_part('template-parts/showcase');
		get_template_part('template-parts/main-top');
	?>

	<div class="container">

		<div id="primary" class="content-area <?php echo $main_width; ?>">
			<main id="main" class="site-main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'alphaplus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

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
		get_template_part('template-parts/bottom');
	?>

<?php
get_footer();
