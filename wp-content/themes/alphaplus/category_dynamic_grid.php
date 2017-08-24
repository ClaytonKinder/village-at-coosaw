<?php
/**
 * Template Name: Dynamic Grid
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alphaplus
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

$categories = get_the_category();
$category_link = get_category_link( $categories[0]->cat_ID );

get_header();
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

				<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
			?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<figure class="uk-overlay">
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>
				<figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background">
					<header class="entry-header">
						<?php
							if ( is_single() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
						?>
					</header><!-- .entry-header -->
					
					<?php if ( ( $post_date == 'on' ) || ( $post_author == 'on' ) || ( $post_comments == 'on' ) || ( $post_category == 'on') ) : ?>
						<div class="entry-meta">
							<?php if ( $post_date == 'on' ) : ?>
								<span class="meta-date">
									<?php echo '<i class="fa fa-calendar"></i> ' . get_the_date('d M'); ?>
								</span>
							<?php endif; ?>
							<?php if ( $post_author == 'on') : ?>
								<span class="meta-author"><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( $post_comments == 'on') : ?>
								<span class="meta-comments-count"><i class="fa fa-comments-o"></i> <?php echo get_comments_number(); ?></span>
							<?php endif; ?>
							<?php if ( $post_category == 'on') : ?>
								<span class="meta-category"><i class="fa fa-folder-o"></i> <a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $categories[0]->name; ?>"><?php 
		echo $categories[0]->name; ?></a></span>
							<?php endif; ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</figcaption>
			</figure>
		</article><!-- #post-## -->
					
			<?php
				endwhile;

				the_posts_navigation();
endif;
			 ?>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		
		<?php
			get_sidebar();
		?>
		
	</div>
<?php
	get_footer();
?>