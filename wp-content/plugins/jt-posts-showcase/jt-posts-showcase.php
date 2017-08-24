<?php
/*
Plugin Name: JT Posts Showcase
Plugin URI: http://www.jsquare-themes.com
Description: Show WordPress posts in a widget with JSquare Posts Showcase Widget
Text Domain: jt-posts-showcase
Version: 1.3.1
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jsquare_posts_showcase extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_posts_showcase', 

		// Widget name
		__('JT Posts Showcase Widget', 'jt-posts-showcase'), 

		// Widget description
		array( 'description' => __( 'Show WordPress posts in a widget with JT Posts Showcase Widget', 'jt-posts-showcase' ), ) 
		);
	}

	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$posts_number = $instance['posts_number'];
		$source = $instance['source'];
		$post_category = $instance['post_category'];
		$include_post_types = $instance['include_post_types'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		$style = $instance['style'];
		$show_more = $instance['show_more'];
		$show_more_text = $instance['show_more_text'];
		$post_text_chars = $instance['post_text_chars'];
		$show_date = $instance['show_date'];
		$show_comments = $instance['show_comments'];
		$show_category = $instance['show_category'];
		
		wp_register_style('jsquare_posts_showcase', plugin_dir_url(__FILE__).'css/style.css' );
		wp_enqueue_style('jsquare_posts_showcase');
		wp_style_add_data( 'jsquare_posts_showcase', 'rtl', 'replace' );
		
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		
		wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js', array('jquery') );
		wp_enqueue_script( 'uikit.js' );
	
		if (($style == 'slideset-default') || ($style == 'small-slideset') || ($style == 'large-slideset') || ($style == 'slideset-content-hover') || ($style == 'slideset-category') || ($style == 'slideset-category-hover') || ($style == 'slideset-four-columns') || ($style == 'slideset-four-columns-hover') || ($style == 'slideset-hover-color') || ($style == 'minimal-slideset')) {
			wp_register_script( 'slideset.js', plugin_dir_url(__FILE__).'js/slideset.min.js' );
			wp_enqueue_script( 'slideset.js' );
			wp_register_style( 'slidenav.css', plugin_dir_url(__FILE__).'css/slidenav.min.css' );
			wp_enqueue_style( 'slidenav.css' );
			wp_register_style( 'dotnav.css', plugin_dir_url(__FILE__).'css/dotnav.min.css' );
			wp_enqueue_style( 'dotnav.css' );
		}
		else if (($style == 'slideshow-default')) {
			wp_register_style('slideshow.css', plugins_url('/css/slideshow.min.css',__FILE__ ));
			wp_enqueue_style('slideshow.css');
			wp_register_style('slidenav.css', plugins_url('/css/slidenav.min.css',__FILE__ ));
			wp_enqueue_style('slidenav.css');
			wp_register_style('dotnav.css', plugins_url('/css/dotnav.min.css',__FILE__ ));
			wp_enqueue_style('dotnav.css');
			wp_register_script('slideshow.js', plugins_url('/js/slideshow.min.js',__FILE__ ));
			wp_enqueue_script('slideshow.js');
		}
		if (($style == 'slider-default')) {
			wp_register_style('slider.css', plugins_url('/css/slider.min.css',__FILE__ ));
			wp_enqueue_style('slider.css');
			wp_register_script('slider.js', plugins_url('/js/slider.min.js',__FILE__ ));
			wp_enqueue_script('slider.js');
		}
		
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $widget_args['before_title'];
		
			echo $title;
			
			if ($show_more == 'yes') {
				echo '<span class="more-link"><a href="' . get_category_link($post_category) . '">' . $show_more_text . '<i class="fa fa-angle-double-right"></i></a></span>';
			}
		
			echo $widget_args['after_title'];
		}
		
		// Include files based on the style selected on widget's options
		if ($style == 'default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/default.php');
		}
		else if ($style == 'default-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/default-2.php');
		}
		else if ($style == 'large-image') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/large-image.php');
		}
		else if ($style == 'headlines') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/headlines.php');
		}
		else if ($style == 'numbered-headlines') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/numbered-headlines.php');
		}
		else if ($style == 'overlay') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/overlay.php');
		}
		else if ($style == 'list') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/list.php');
		}
		else if ($style == 'list-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/list-2.php');
		}
		else if ($style == 'list-image-title') {
			include( plugin_dir_path( __FILE__ ) . 'styles/lists/list-image-title.php');
		}
		else if ($style == 'slideset-default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-default.php');
		}
		else if ($style == 'small-slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/small-slideset.php');
		}
		else if ($style == 'large-slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/large-slideset.php');
		}
		else if ($style == 'slideset-content-hover') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-content-hover.php');
		}
		else if ($style == 'slideset-category') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-category.php');
		}
		else if ($style == 'slideset-category-hover') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-category-hover.php');
		}
		else if ($style == 'slideset-four-columns') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-four-columns.php');
		}
		else if ($style == 'slideset-four-columns-hover') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-four-columns-hover.php');
		}
		else if ($style == 'slideset-hover-color') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/slideset-hover-color.php');
		}
		else if ($style == 'minimal-slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slidesets/minimal-slideset.php');
		}
		else if ($style == 'grid-small') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid.php');
		}
		else if ($style == 'grid-space') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-with-space.php');
		}
		else if ($style == 'grid-hover-color') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-hover-color.php');
		}
		else if ($style == 'grid-large') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-large.php');
		}
		else if ($style == 'grid-large-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-large-2.php');
		}
		else if ($style == 'grid-two-columns') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-two-columns.php');
		}
		else if ($style == 'grid-three-columns') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-three-columns.php');
		}
		else if ($style == 'grid-five-columns') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-five-columns.php');
		}
		else if ($style == 'unordered-grid') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/unordered-grid.php');
		}
		else if ($style == 'grid-overlay-title') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-overlay-title.php');
		}
		else if ($style == 'grid-overlay-content') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-overlay-content.php');
		}
		else if ($style == 'grid-headlines') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-headlines.php');
		}
		else if ($style == 'grid-top-bottom') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-top-bottom.php');
		}
		else if ($style == 'grid-left-right') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-left-right.php');
		}
		else if ($style == 'minimal-grid') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/minimal-grid.php');
		}
		else if ($style == 'grid-flip-content') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-flip-content.php');
		}
		else if ($style == 'grid-flip-content-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-flip-content-2.php');
		}
		else if ($style == 'grid-overlay') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grids/grid-overlay.php');
		}
		
		else if ($style == 'slideshow-default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slideshows/default.php');
		}
		
		else if ($style == 'slider-default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/sliders/default.php');
		}
		else if ($style == 'slider-opacity') {
			include( plugin_dir_path( __FILE__ ) . 'styles/sliders/slider-opacity.php');
		}
		else if ($style == 'slider-opacity-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/sliders/slider-opacity-2.php');
		}
		else if ($style == 'slider-overlay') {
			include( plugin_dir_path( __FILE__ ) . 'styles/sliders/slider-overlay.php');
		}
		
		echo $widget_args['after_widget'];
	}

	// Function that creates the widget's options on WordPress admin 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$posts_number = isset( $instance['posts_number'] ) ? esc_attr( $instance[ 'posts_number' ] ) : ' ';
		$source = isset( $instance['source'] ) ? $instance[ 'source' ] : ' ';
		$post_category = isset( $instance['post_category'] ) ? $instance[ 'post_category' ] : ' ';
		$include_post_types = isset( $instance['include_post_types'] ) ? $instance[ 'include_post_types' ] : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$show_more =  isset( $instance['show_more'] ) ? $instance[ 'show_more' ] : ' ';
		$show_more_text =  isset( $instance['show_more_text'] ) ? $instance[ 'show_more_text' ] : ' ';
		$post_text_chars =  isset( $instance['post_text_chars'] ) ? $instance[ 'post_text_chars' ] : ' ';
		$show_date =  isset( $instance['show_date'] ) ? $instance[ 'show_date' ] : ' ';
		$show_comments =  isset( $instance['show_comments'] ) ? $instance[ 'show_comments' ] : ' ';
		$show_category =  isset( $instance['show_category'] ) ? $instance[ 'show_category' ] : ' ';
		$orderby =  isset( $instance['orderby'] ) ? $instance[ 'orderby' ] : ' ';
		$order =  isset( $instance['order'] ) ? $instance[ 'order' ] : ' ';
		
	?>
	<div class="wrap-jsquare">
		
		<div class="uk-accordion" data-uk-accordion>

			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-file-text"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-sort"></i></h3>
			
		<div class="uk-accordion-content">
			<h4>Widget Settings</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-posts-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
					<option disabled>Lists</option>
					<option value="default" <?php echo ($style == 'default')?'selected':''; ?>> - Default</option>
					<option value="default-2" <?php echo ($style == 'default-2')?'selected':''; ?>> - Default 2</option>
					<option value="headlines" <?php echo ($style == 'headlines')?'selected':''; ?>> - Headlines</option>
					<option value="numbered-headlines" <?php echo ($style == 'numbered-headlines')?'selected':''; ?>> - Numbered Headlines</option>
					<option value="large-image" <?php echo ($style == 'large-image')?'selected':''; ?>> - Large Image</option>
					<option value="list" <?php echo ($style == 'list')?'selected':''; ?>> - List</option>
					<option value="list-2" <?php echo ($style == 'list-2')?'selected':''; ?>> - List 2</option>
					<option value="list-image-title" <?php echo ($style == 'list-image-title')?'selected':''; ?>> - Small List</option>
					<option value="overlay" <?php echo ($style == 'overlay')?'selected':''; ?>> - Overlay</option>
					
					<option disabled> </option>
					<option disabled>Slidesets</option>
					<option value="slideset-default" <?php echo ($style == 'slideset-default')?'selected':''; ?>> - Default</option>
					<option value="small-slideset" <?php echo ($style == 'small-slideset')?'selected':''; ?>> - Small Slideset</option>
					<option value="large-slideset" <?php echo ($style == 'large-slideset')?'selected':''; ?>> - Large Slideset</option>
					<option value="slideset-content-hover" <?php echo ($style == 'slideset-content-hover')?'selected':''; ?>> - Slideset with content on hover</option>
					<option value="slideset-category" <?php echo ($style == 'slideset-category')?'selected':''; ?>> - Slideset with category image</option>
					<option value="slideset-category-hover" <?php echo ($style == 'slideset-category-hover')?'selected':''; ?>> - Slideset with category image and hover</option>
					<option value="slideset-four-columns" <?php echo ($style == 'slideset-four-columns')?'selected':''; ?>> - Slideset (4 columns)</option>
					<option value="slideset-four-columns-hover" <?php echo ($style == 'slideset-four-columns-hover')?'selected':''; ?>> - Slideset (4 columns and hover)</option>
					<option value="slideset-hover-color" <?php echo ($style == 'slideset-hover-color')?'selected':''; ?>> - Slideset with hover color</option>
					<option value="minimal-slideset" <?php echo ($style == 'minimal-slideset')?'selected':''; ?>> - Minimal Slideset</option>
					
					<option disabled> </option>
					<option disabled>Grids</option>
					<option value="grid-small" <?php echo ($style == 'grid-small')?'selected':''; ?>> - Grid</option>
					<option value="grid-space" <?php echo ($style == 'grid-space')?'selected':''; ?>> - Grid with space</option>
					<option value="grid-large" <?php echo ($style == 'grid-large')?'selected':''; ?>> - Grid with large image</option>
					<option value="grid-large-2" <?php echo ($style == 'grid-large-2')?'selected':''; ?>> - Grid with large image 2</option>
					<option value="grid-hover-color" <?php echo ($style == 'grid-hover-color')?'selected':''; ?>> - Grid with hover color</option>
					<option value="grid-overlay" <?php echo ($style == 'grid-overlay')?'selected':''; ?>> - Grid with overlay</option>
					<option value="grid-overlay-title" <?php echo ($style == 'grid-overlay-title')?'selected':''; ?>> - Grid with overlay title</option>
					<option value="grid-overlay-content" <?php echo ($style == 'grid-overlay-content')?'selected':''; ?>> - Grid with overlay content</option>
					<option value="grid-flip-content" <?php echo ($style == 'grid-flip-content')?'selected':''; ?>> - Grid with flip content</option>
					<option value="grid-flip-content-2" <?php echo ($style == 'grid-flip-content-2')?'selected':''; ?>> - Grid with flip content 2</option>
					<option value="grid-two-columns" <?php echo ($style == 'grid-two-columns')?'selected':''; ?>> - Grid (2 Columns)</option>
					<option value="grid-three-columns" <?php echo ($style == 'grid-three-columns')?'selected':''; ?>> - Grid (3 Columns)</option>
					<option value="grid-five-columns" <?php echo ($style == 'grid-five-columns')?'selected':''; ?>> - Grid (5 Columns)</option>
					<option value="unordered-grid" <?php echo ($style == 'unordered-grid')?'selected':''; ?>> - Unordered Grid</option>
					<option value="grid-headlines" <?php echo ($style == 'grid-headlines')?'selected':''; ?>> - Grid Headlines</option>
					<option value="grid-top-bottom" <?php echo ($style == 'grid-top-bottom')?'selected':''; ?>> - Grid top-bottom</option>
					<option value="grid-left-right" <?php echo ($style == 'grid-left-right')?'selected':''; ?>> - Grid left-right</option>
					<option value="minimal-grid" <?php echo ($style == 'minimal-grid')?'selected':''; ?>> - Minimal Grid</option>
					
					<option disabled> </option>
					<option disabled>Slideshows</option>
					<option value="slideshow-default" <?php echo ($style == 'slideshow-default')?'selected':''; ?>> - Default</option>
					
					<option disabled> </option>
					<option disabled>Sliders</option>
					<option value="slider-default" <?php echo ($style == 'slider-default')?'selected':''; ?>> - Default</option>
					<option value="slider-opacity" <?php echo ($style == 'slider-opacity')?'selected':''; ?>> - Slider with opacity</option>
					<option value="slider-opacity-2" <?php echo ($style == 'slider-opacity-2')?'selected':''; ?>> - Slider with opacity 2</option>
					<option value="slider-overlay" <?php echo ($style == 'slider-overlay')?'selected':''; ?>> - Overlay</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_more' ); ?>"><?php _e( '"Show More" link:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_more' ); ?>" name="<?php echo $this->get_field_name( 'show_more' ); ?>">
					<option value="yes" <?php echo ($show_more == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_more == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_more_text' ); ?>"><?php _e( 'Text for "Show More" link:', 'jt-posts-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'show_more_text' ); ?>" name="<?php echo $this->get_field_name( 'show_more_text' ); ?>" type="text" value="<?php echo esc_attr( $show_more_text ); ?>" />
			</p>
		</div>
			
		 <div class="uk-accordion-content">
		 	<h4>Post Settings</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'source' ); ?>"><?php _e( 'Show posts from:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'source' ); ?>" name="<?php echo $this->get_field_name( 'source' ); ?>">
					<option value="wp-posts" <?php echo ($source == 'wp-posts')?'selected':''; ?>>WordPress Posts</option>
					<option value="custom" <?php echo ($source == 'custom')?'selected':''; ?>>Custom Post Type</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'posts_number' ); ?>"><?php _e( 'Number of posts:', 'jt-posts-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'posts_number' ); ?>" name="<?php echo $this->get_field_name( 'posts_number' ); ?>" type="text" value="<?php echo esc_attr( $posts_number ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'post_text_chars' ); ?>"><?php _e( 'Text\'s number of characters:', 'jt-posts-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'post_text_chars' ); ?>" name="<?php echo $this->get_field_name( 'post_text_chars' ); ?>" type="text" value="<?php echo esc_attr( $post_text_chars ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Show date:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>">
					<option value="yes" <?php echo ($show_date == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_date == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e( 'Show comments:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>">
					<option value="yes" <?php echo ($show_comments == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_comments == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_category' ); ?>"><?php _e( 'Show category:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_category' ); ?>" name="<?php echo $this->get_field_name( 'show_category' ); ?>">
					<option value="yes" <?php echo ($show_category == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_category == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			 <hr />
			 <h5>If source is "WordPress Posts"</h5>
			<p>
				<label for="<?php echo $this->get_field_id( 'post_category' ); ?>"><?php _e( 'Category:', 'jt-posts-showcase' ); ?></label>
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'post_category' ); ?>" name="<?php echo $this->get_field_name( 'post_category' ); ?>">								<option value="all" <?php echo ($post_category == 'all')?'selected':''; ?>><?php _e('All Categories'); ?></option>
					<?php 
							
						$categories = get_categories( array(
							'orderby'   =>   'id'
						) );

						foreach( $categories as $category ) {
						?>
							<option value="<?php echo $category->term_id; ?>" <?php echo ($post_category == $category->term_id)?'selected':''; ?>>
						    <?php 
								if ($category->parent == 0) {
									echo esc_html( $category->name );
								} else {
									echo '  --  ' . esc_html( $category->name );
								}
							?> </option>
					<?php
						}
					?>
				</select>
			</p>
			 <hr />
			 <h5>If source is "Custom Post Type"</h5>
			<p>
				<label for="<?php echo $this->get_field_id( 'include_post_types' ); ?>"><?php _e( 'Custom Post Type:', 'jt-posts-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'include_post_types' ); ?>" name="<?php echo $this->get_field_name( 'include_post_types' ); ?>" type="text" value="<?php echo esc_attr( $include_post_types ); ?>" />
			</p>
		</div>
		
			
		<div class="uk-accordion-content">
			<h4>Post order settings</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order posts by:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
					<option value="id" <?php echo ($orderby == 'id')?'selected':''; ?>>ID</option>
					<option value="title" <?php echo ($orderby == 'title')?'selected':''; ?>>Title</option>
					<option value="date" <?php echo ($orderby == 'date')?'selected':''; ?>>Date</option>
					<option value="author" <?php echo ($orderby == 'author')?'selected':''; ?>>Author</option>
					<option value="rand" <?php echo ($orderby == 'random')?'selected':''; ?>>Random</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Display order:', 'jt-posts-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
					<option value="ASC" <?php echo ($order == 'ASC')?'selected':''; ?>>Ascending</option>
					<option value="DESC" <?php echo ($order == 'DESC')?'selected':''; ?>>Descending</option>
				</select>
			</p>
		 </div>

		</div>
	</div>
	<?php 
	}
	
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
    
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['posts_number'] = strip_tags( $new_instance['posts_number'] );
		$instance['source'] = $new_instance['source'];
		$instance['post_category'] = $new_instance['post_category'];
		$instance['include_post_types'] = $new_instance['include_post_types'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['order'] = $new_instance['order'];
		$instance['style'] = $new_instance['style'];
		$instance['show_more'] = $new_instance['show_more'];
		$instance['show_more_text'] = $new_instance['show_more_text'];
		$instance['post_text_chars'] = $new_instance['post_text_chars'];
		$instance['show_date'] = $new_instance['show_date'];
		$instance['show_comments'] = $new_instance['show_comments'];
		$instance['show_category'] = $new_instance['show_category'];
		
		return $instance;
	}

}

// Register and load the widget
function jsquare_posts_showcase_widget() {
	register_widget( 'jsquare_posts_showcase' );
}
add_action( 'widgets_init', 'jsquare_posts_showcase_widget' );

// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_posts_showcase_styles() {
	
	wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');
	
	wp_register_style('uikit.css', plugin_dir_url(__FILE__).'css/uikit.css');
	wp_enqueue_style('uikit.css');

    if (wp_style_is( 'jsquare-widget.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_style( 'jsquare-widget.css', plugin_dir_url(__FILE__).'css/jsquare-widget.css' );
       wp_enqueue_style( 'jsquare-widget.css' );
    }
	
    if (wp_style_is( 'accordion.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_style( 'accordion.css', plugin_dir_url(__FILE__).'css/accordion.min.css' );
       wp_enqueue_style( 'accordion.css' );
    }
	
    if (wp_script_is( 'uikit.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js', array('jquery') );
       wp_enqueue_script( 'uikit.js' );
    }

    if (wp_script_is( 'accordion.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'accordion.js', plugin_dir_url(__FILE__).'js/accordion.min.js' );
       wp_enqueue_script( 'accordion.js' );
    }
	
}
add_action( 'widgets_init','jsquare_posts_showcase_styles');


?>
