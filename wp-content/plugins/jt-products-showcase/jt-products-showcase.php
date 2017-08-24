<?php
/*
Plugin Name: JT Products Showcase
Plugin URI: http://www.jsquare-themes.com
Description: Show WooCommerce products in a widget with JT Products Showcase Widget
Text Domain: jt-products-showcase
Version: 1.1.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;


// Creating the widget 
class jsquare_products_showcase extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_products_showcase', 

		// Widget name
		__('JT Products Showcase Widget', 'jt-products-showcase'), 

		// Widget description
		array( 'description' => __( 'Show WooCommerce products in a widget with JT Products Showcase Widget', 'jt-products-showcase' ), ) 
		);
	}
	
	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$products_number = $instance['products_number'];
		$product_category = $instance['product_category'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		$style = $instance['style'];
		$show_read_more = $instance['show_read_more'];
		$show_sku = $instance['show_sku'];
		$add_to_cart_btn = $instance['add_to_cart_btn'];
		
		wp_register_style('jsquare_products_showcase_css', plugin_dir_url(__FILE__).'css/style.css' );
		wp_enqueue_style('jsquare_products_showcase_css');
		wp_style_add_data( 'jsquare_products_showcase_css', 'rtl', 'replace' );
		
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
		
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $widget_args['before_title'];
		
			echo $title;
		
			echo $widget_args['after_title'];
		}
		
		// Include files based on the style selected on widget's options
		if ($style == 'grid') {
			include 'styles/grids/grid.php';
		}
		else if ($style == 'grid-two-columns') {
			include 'styles/grids/grid-two-columns.php';
		}
		else if ($style == 'grid-five-columns') {
			include 'styles/grids/grid-five-columns.php';
		}
		else if ($style == 'grid-overlay') {
			include 'styles/grids/grid-overlay.php';
		}
		else if ($style == 'grid-overlay-small') {
			include 'styles/grids/grid-overlay-small.php';
		}
		else if ($style == 'grid-overlay-hover') {
			include 'styles/grids/grid-overlay-hover.php';
		}
		else if ($style == 'grid-large-image') {
			include 'styles/grids/grid-large-image.php';
		}
		else if ($style == 'grid-large-image-2') {
			include 'styles/grids/grid-large-image-2.php';
		}
		
		else if ($style == 'default-list') {
			include 'styles/lists/default.php';
		}
		else if ($style == 'list-overlay') {
			include 'styles/lists/list-overlay.php';
		}
		else if ($style == 'small-list') {
			include 'styles/lists/small-list.php';
		}
		
		echo $widget_args['after_widget'];
	}

	// Function that creates the widget's options on WordPress admin 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$products_number = isset( $instance['products_number'] ) ? esc_attr( $instance[ 'products_number' ] ) : ' ';
		$product_category = isset( $instance['product_category'] ) ? $instance[ 'product_category' ] : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$show_read_more =  isset( $instance['show_read_more'] ) ? $instance[ 'show_read_more' ] : ' ';
		$show_sku =  isset( $instance['show_sku'] ) ? $instance[ 'show_sku' ] : ' ';
		$add_to_cart_btn =  isset( $instance['add_to_cart_btn'] ) ? $instance[ 'add_to_cart_btn' ] : ' ';
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
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-products-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-products-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
					<option disabled>Grids</option>
					<option value="grid" <?php echo ($style == 'grid')?'selected':''; ?>> - Grid</option>
					<option value="grid-two-columns" <?php echo ($style == 'grid-two-columns')?'selected':''; ?>> - Grid (2 Columns)</option>
					<option value="grid-five-columns" <?php echo ($style == 'grid-five-columns')?'selected':''; ?>> - Grid (5 Columns)</option>
					<option value="grid-overlay" <?php echo ($style == 'grid-overlay')?'selected':''; ?>> - Grid Overlay</option>
					<option value="grid-overlay-small" <?php echo ($style == 'grid-overlay-small')?'selected':''; ?>> - Grid Overlay Small</option>
					<option value="grid-overlay-hover" <?php echo ($style == 'grid-overlay-hover')?'selected':''; ?>> - Grid Overlay Hover</option>
					<option value="grid-large-image" <?php echo ($style == 'grid-large-image')?'selected':''; ?>> - Grid Large Image</option>
					<option value="grid-large-image-2" <?php echo ($style == 'grid-large-image-2')?'selected':''; ?>> - Grid Large Image 2</option>
					<option disabled> </option>
					<option disabled>Lists</option>
					<option value="default-list" <?php echo ($style == 'default-list')?'selected':''; ?>> - Default</option>
					<option value="list-overlay" <?php echo ($style == 'list-overlay')?'selected':''; ?>> - Overlay</option>
					<option value="list-overlay-2" <?php echo ($style == 'list-overlay-2')?'selected':''; ?>> - Overlay 2</option>
					<option value="small-list" <?php echo ($style == 'small-list')?'selected':''; ?>> - Small List</option>
				</select>
			</p>
		</div>
			
		 <div class="uk-accordion-content">
		 	<h4>Product Settings</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'product_category' ); ?>"><?php _e( 'Category:', 'jt-products-showcase' ); ?></label>
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'product_category' ); ?>" name="<?php echo $this->get_field_name( 'product_category' ); ?>">								<option value="all" <?php echo ($product_category == 'all')?'selected':''; ?>><?php _e('All Categories'); ?></option>
					<?php 
							
						$categories = get_terms('product_cat');

						foreach( $categories as $category ) {
						?>
							<option value="<?php echo $category->term_id; ?>" <?php echo ($product_category == $category->term_id)?'selected':''; ?>>
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
			<p>
				<label for="<?php echo $this->get_field_id( 'products_number' ); ?>"><?php _e( 'Number of products:', 'jt-products-showcase' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'products_number' ); ?>" name="<?php echo $this->get_field_name( 'products_number' ); ?>" type="text" value="<?php echo esc_attr( $products_number ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_read_more' ); ?>"><?php _e( 'Show "Read More" button:', 'jt-products-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_read_more' ); ?>" name="<?php echo $this->get_field_name( 'show_read_more' ); ?>">
					<option value="yes" <?php echo ($show_read_more == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_read_more == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'add_to_cart_btn' ); ?>"><?php _e( 'Show "Add to cart" button:', 'jt-products-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'add_to_cart_btn' ); ?>" name="<?php echo $this->get_field_name( 'add_to_cart_btn' ); ?>">
					<option value="yes" <?php echo ($add_to_cart_btn == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($add_to_cart_btn == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_sku' ); ?>"><?php _e( 'Show SKU:', 'jt-products-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'show_sku' ); ?>" name="<?php echo $this->get_field_name( 'show_sku' ); ?>">
					<option value="yes" <?php echo ($show_sku == 'yes')?'selected':''; ?>>Yes</option>
					<option value="no" <?php echo ($show_sku == 'no')?'selected':''; ?>>No</option>
				</select>
			</p>
		</div>
		
			
		<div class="uk-accordion-content">
			<h4>Order settings</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order products by:', 'jt-products-showcase' ); ?></label> 
				<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
					<option value="id" <?php echo ($orderby == 'id')?'selected':''; ?>>ID</option>
					<option value="title" <?php echo ($orderby == 'title')?'selected':''; ?>>Title</option>
					<option value="date" <?php echo ($orderby == 'date')?'selected':''; ?>>Date</option>
					<option value="author" <?php echo ($orderby == 'author')?'selected':''; ?>>Author</option>
					<option value="rand" <?php echo ($orderby == 'random')?'selected':''; ?>>Random</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Display order:', 'jt-products-showcase' ); ?></label> 
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
		$instance['products_number'] = strip_tags( $new_instance['products_number'] );
		$instance['product_category'] = $new_instance['product_category'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['order'] = $new_instance['order'];
		$instance['style'] = $new_instance['style'];
		$instance['show_read_more'] = $new_instance['show_read_more'];
		$instance['show_sku'] = $new_instance['show_sku'];
		$instance['add_to_cart_btn'] = $new_instance['add_to_cart_btn'];
		
		return $instance;
	}

}

// Register and load the widget
function jsquare_products_showcase_widget() {
	register_widget( 'jsquare_products_showcase' );
}
add_action( 'widgets_init', 'jsquare_products_showcase_widget' );

// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_products_showcase_styles() {
	
	wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');

    if (wp_style_is( 'jsquare-widget.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_style( 'jsquare-widget.css', plugin_dir_url(__FILE__).'css/jsquare-widget.css' );
       wp_enqueue_style( 'jsquare-widget.css' );
    }
	
    if (wp_style_is( 'accordion.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'accordion.css', plugin_dir_url(__FILE__).'css/accordion.min.css' );
       wp_enqueue_script( 'accordion.css' );
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
add_action( 'widgets_init','jsquare_products_showcase_styles');


?>
