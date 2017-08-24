<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A+
 */

$main_width = esc_attr(ot_get_option('main-width'));

get_header(); ?>
	<?php
		get_template_part('template-parts/showcase');
		get_template_part('template-parts/main-top');
	?>

	<div class="container">
		<div id="primary" class="content-area <?php echo $main_width; ?>">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 destinations-4-cols uk-grid-match" data-uk-grid>
				<?php
						$args = array("posts_per_page" => -1, "post_type" => array('destinations_list'), "post_status" => 'publish' );

						$posts_array = get_posts($args);

						// Show these posts in a grid
						foreach($posts_array as $post) {
							$post_type = get_post_type_object( get_post_type($post) );
							$post_cats = get_the_terms( $post->ID, 'destinations_categories');
							foreach ( $post_cats as $cat ) {
								$cat_link = get_term_link( $cat, 'destinations_categories' );
							}

					?>
					<div>
						<figure class="uk-overlay uk-overlay-hover">
							<img class="uk-overlay-scale" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt="">
							<figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-ignore">
								<a class="destination-link" href="<?php echo get_permalink( $post->ID ); ?>"></a>
								<div>			
									<div class="destination-short-info">
										<h3 class="destination-title"><?php echo $post->post_title; ?></h3>
									</div>
									<div class="destination-bottom-info">
										<?php if (! empty (get_post_meta( $post->ID, 'destination_price', true ))) { ?>
										<div class="destination-price">
											<span><?php echo _e('Starts from:', 'alphaplus'); ?></span>
											<?php echo esc_html( get_post_meta( $post->ID, 'destination_price', true ) ); ?>
										</div>
										<?php } ?>
										<?php if (! empty (get_post_meta( $post->ID, 'destination_days', true ))) { ?>
										<div class="destination-days">
											<span><?php echo _e('Days:', 'alphaplus'); ?></span>
											<?php echo esc_html( get_post_meta( $post->ID, 'destination_days', true ) ); ?>
										</div>
										<?php } ?>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<?php
						} 
					?>
				</div>
			<?php

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
