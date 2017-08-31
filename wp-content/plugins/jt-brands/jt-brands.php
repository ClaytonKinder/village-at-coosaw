<?php
/*
Plugin Name: JT Brands
Plugin URI: http://www.jsquare-themes.com
Description: Showcase your store's brands in a modern and responsive way
Text Domain: jt-brands
Version: 2.0.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

add_action( 'init', 'create_brands_list' );
function create_brands_list() {
    register_post_type( 'brands_list',
        array(
            'labels' => array(
                'name' => __('Brands', 'jt-brands'),
                'singular_name' => __('Brand', 'jt-brands'),
                'add_new' => __('Add New', 'jt-brands'),
                'add_new_item' => __('Add New Brand', 'jt-brands'),
                'edit' => __('Edit', 'jt-brands'),
                'edit_item' => __('Edit Brand', 'jt-brands'),
                'new_item' => __('New Brand', 'jt-brands'),
                'view' => __('View', 'jt-brands'),
                'view_item' => __('View Brand', 'jt-brands'),
                'search_items' => __('Search Brands', 'jt-brands'),
                'not_found' => __('No Brands found', 'jt-brands'),
                'not_found_in_trash' => __('No Brands found in Trash', 'jt-brands'),
                'parent' => __('Parent Brand', 'jt-brands')
            ),

            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-cart',
            'has_archive' => true
        )
    );

}

add_action('init', 'register_brands_category', 0);

function register_brands_category() {
    register_taxonomy(
        'brands_categories',
        'brands_list',
        array(
            'labels' => array(
                'name' => __('Brand Category', 'jt-brands'),
                'add_new_item' => __('Add New Brand Category', 'jt-brands'),
                'new_item_name' => __("New Brand Category", 'jt-brands')
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

add_action( 'admin_init', 'brands_meta' );
function brands_meta() {
    add_meta_box( 'brand_meta_box',
        'Brand Details',
        'display_brand_meta_box',
        'brands_list', 'normal', 'high'
    );
}


function get_jt_brands_template($single_template) {
     global $post;

     if ($post->post_type == 'brands_list') {
          $single_template = dirname( __FILE__ ) . '/single-brands_list.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_jt_brands_template' );


function display_brand_meta_box( $brand ) {
    $store_location = esc_html( get_post_meta( $brand->ID, 'store_location', true ) );
    $store_map = esc_html( get_post_meta( $brand->ID, 'store_map', true ) );
    $store_phone = esc_html( get_post_meta( $brand->ID, 'store_phone', true ) );
    $store_fax = esc_html( get_post_meta( $brand->ID, 'store_fax', true ) );
    $store_email = esc_html( get_post_meta( $brand->ID, 'store_email', true ) );
    $store_website = esc_html( get_post_meta( $brand->ID, 'store_website', true ) );
    $short_info = esc_html( get_post_meta( $brand->ID, 'short_info', true ) );
	$info = 'store_info';
    $store_info = esc_html( get_post_meta( $brand->ID, 'store_info', true ) );
	$offers = 'store_offers';
    $store_offers = esc_html( get_post_meta( $brand->ID, 'store_offers', true ) );
	$events = 'store_events';
    $store_events = esc_html( get_post_meta( $brand->ID, 'store_events', true ) );
    $store_video = esc_html( get_post_meta( $brand->ID, 'store_video', true ) );
    $store_video_embed = esc_html( get_post_meta( $brand->ID, 'store_video_embed', true ) );
    $store_img1 = esc_html( get_post_meta( $brand->ID, 'store_img1', true ) );
    $store_img2 = esc_html( get_post_meta( $brand->ID, 'store_img2', true ) );
    $store_img3 = esc_html( get_post_meta( $brand->ID, 'store_img3', true ) );
    $store_img4 = esc_html( get_post_meta( $brand->ID, 'store_img4', true ) );
    $store_img5 = esc_html( get_post_meta( $brand->ID, 'store_img5', true ) );
    $store_img6 = esc_html( get_post_meta( $brand->ID, 'store_img6', true ) );
    $store_img7 = esc_html( get_post_meta( $brand->ID, 'store_img7', true ) );
    $store_img8 = esc_html( get_post_meta( $brand->ID, 'store_img8', true ) );
    $store_img9 = esc_html( get_post_meta( $brand->ID, 'store_img9', true ) );
    $store_img10 = esc_html( get_post_meta( $brand->ID, 'store_img10', true ) );
    $store_img11 = esc_html( get_post_meta( $brand->ID, 'store_img11', true ) );
    $store_img12 = esc_html( get_post_meta( $brand->ID, 'store_img12', true ) );
    ?>
	<ul id="event-tabs-nav" data-uk-switcher="{connect:'#event-tabs'}">
		<li><a href="">Basic Info</a></li>
		<li><a href="">Info</a></li>
		<li><a href="">Offers</a></li>
		<li><a href="">Events</a></li>
		<li><a href="">Media</a></li>
	</ul>

	<ul id="event-tabs" class="uk-switcher">
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Location', 'jt-brands'); ?></td>
					<td><input type="text" size="80" name="store_location" value="<?php echo $store_location; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 100%"><?php echo __('Map (Embed Code)', 'jt-brands'); ?></td>
					<td><textarea name="store_map" cols="70" rows="3"><?php echo $store_map; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Phone Number', 'jt-brands'); ?></td>
					<td><input type="text" size="80" name="store_phone" value="<?php echo $store_phone; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Fax', 'jt-brands'); ?></td>
					<td><input type="text" size="80" name="store_fax" value="<?php echo $store_fax; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Email', 'jt-brands'); ?></td>
					<td><input type="email" size="80" name="store_email" value="<?php echo $store_email; ?>" /></td>
				</tr>
        <tr>
					<td style="width: 150px"><?php echo __('Website', 'jt-brands'); ?></td>
					<td><input type="text" size="80" name="store_website" value="<?php echo $store_website; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Short Info', 'jt-brands'); ?></td>
					<td><textarea name="short_info" cols="70" rows="3"><?php echo $short_info; ?></textarea></td>
				</tr>
			</table>
		</li>
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($store_info)), $info ); ?>
		</li>
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($store_offers)), $offers ); ?>
		</li>
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($store_events)), $events ); ?>
		</li>
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Video URL', 'jt-brands'); ?></td>
					<td><input type="url" size="80" name="store_video" value="<?php echo $store_video; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 100%"><?php echo __('Video (Embed Code)', 'jt-brands'); ?></td>
					<td><textarea name="store_video_embed" cols="70" rows="3"><?php echo $store_video_embed; ?></textarea></td>
				</tr>
			</table>
			<hr />
			<h3><?php echo __('Photo Gallery', 'jt-brands'); ?></h3>
			<p>
				<label for="store_img1">
					<input id="store_img1" type="text" size="100" name="store_img1" value="<?php echo $store_img1; ?>" placeholder="Image 1" /><input id="store_img1_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img2">
					<input id="store_img2" type="text" size="100" name="store_img2" value="<?php echo $store_img2; ?>" placeholder="Image 2" /><input id="store_img2_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img3">
					<input id="store_img3" type="text" size="100" name="store_img3" value="<?php echo $store_img3; ?>" placeholder="Image 3" /><input id="store_img3_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img4">
					<input id="store_img4" type="text" size="100" name="store_img4" value="<?php echo $store_img4; ?>" placeholder="Image 4" /><input id="store_img4_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img5">
					<input id="store_img5" type="text" size="100" name="store_img5" value="<?php echo $store_img5; ?>" placeholder="Image 5" /><input id="store_img5_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img6">
					<input id="store_img6" type="text" size="100" name="store_img6" value="<?php echo $store_img6; ?>" placeholder="Image 6" /><input id="store_img6_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img7">
					<input id="store_img7" type="text" size="100" name="store_img7" value="<?php echo $store_img7; ?>" placeholder="Image 7" /><input id="store_img7_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img8">
					<input id="store_img8" type="text" size="100" name="store_img8" value="<?php echo $store_img8; ?>" placeholder="Image 8" /><input id="store_img8_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img9">
					<input id="store_img9" type="text" size="100" name="store_img9" value="<?php echo $store_img9; ?>" placeholder="Image 9" /><input id="store_img9_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img10">
					<input id="store_img10" type="text" size="100" name="store_img10" value="<?php echo $store_img10; ?>" placeholder="Image 10" /><input id="store_img10_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img11">
					<input id="store_img11" type="text" size="100" name="store_img11" value="<?php echo $store_img11; ?>" placeholder="Image 11" /><input id="store_img11_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
			<p>
				<label for="store_img12">
					<input id="store_img12" type="text" size="100" name="store_img12" value="<?php echo $store_img12; ?>" placeholder="Image 12" /><input id="store_img12_button" class="button" type="button" value="<?php echo __('Upload', 'jt-brands'); ?>" />
				</label>
			</p>
		</li>
	</ul>
    <?php
}

add_action( 'save_post', 'add_brand_fields', 10, 2 );
function add_brand_fields( $brand_id, $brand ) {
    // Check post type for movie reviews
    if ( $brand->post_type == 'brands_list' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['store_location'] ) && $_POST['store_location'] != '' ) {
            update_post_meta( $brand_id, 'store_location', $_POST['store_location'] );
        }
        if ( isset( $_POST['store_map'] ) && $_POST['store_map'] != '' ) {
            update_post_meta( $brand_id, 'store_map', $_POST['store_map'] );
        }
        if ( isset( $_POST['store_phone'] ) && $_POST['store_phone'] != '' ) {
            update_post_meta( $brand_id, 'store_phone', $_POST['store_phone'] );
        }
        if ( isset( $_POST['store_fax'] ) && $_POST['store_fax'] != '' ) {
            update_post_meta( $brand_id, 'store_fax', $_POST['store_fax'] );
        }
        if ( isset( $_POST['store_email'] ) && $_POST['store_email'] != '' ) {
            update_post_meta( $brand_id, 'store_email', $_POST['store_email'] );
        }
        if ( isset( $_POST['store_website'] ) && $_POST['store_website'] != '' ) {
            update_post_meta( $brand_id, 'store_website', $_POST['store_website'] );
        }
        if ( isset( $_POST['short_info'] ) && $_POST['short_info'] != '' ) {
            update_post_meta( $brand_id, 'short_info', $_POST['short_info'] );
        }
        if ( isset( $_POST['store_info'] ) && $_POST['store_info'] != '' ) {
            update_post_meta( $brand_id, 'store_info', $_POST['store_info'] );
        }
        if ( isset( $_POST['store_offers'] ) && $_POST['store_offers'] != '' ) {
            update_post_meta( $brand_id, 'store_offers', $_POST['store_offers'] );
        }
        if ( isset( $_POST['store_events'] ) && $_POST['store_events'] != '' ) {
            update_post_meta( $brand_id, 'store_events', $_POST['store_events'] );
        }
        if ( isset( $_POST['store_video'] ) && $_POST['store_video'] != '' ) {
            update_post_meta( $brand_id, 'store_video', $_POST['store_video'] );
        }
        if ( isset( $_POST['store_video_embed'] ) && $_POST['store_video_embed'] != '' ) {
            update_post_meta( $brand_id, 'store_video_embed', $_POST['store_video_embed'] );
        }
        if ( isset( $_POST['store_img1'] ) && $_POST['store_img1'] != '' ) {
            update_post_meta( $brand_id, 'store_img1', $_POST['store_img1'] );
        }
        if ( isset( $_POST['store_img2'] ) && $_POST['store_img2'] != '' ) {
            update_post_meta( $brand_id, 'store_img2', $_POST['store_img2'] );
        }
        if ( isset( $_POST['store_img3'] ) && $_POST['store_img3'] != '' ) {
            update_post_meta( $brand_id, 'store_img3', $_POST['store_img3'] );
        }
        if ( isset( $_POST['store_img4'] ) && $_POST['store_img4'] != '' ) {
            update_post_meta( $brand_id, 'store_img4', $_POST['store_img4'] );
        }
        if ( isset( $_POST['store_img5'] ) && $_POST['store_img5'] != '' ) {
            update_post_meta( $brand_id, 'store_img5', $_POST['store_img5'] );
        }
        if ( isset( $_POST['store_img6'] ) && $_POST['store_img6'] != '' ) {
            update_post_meta( $brand_id, 'store_img6', $_POST['store_img6'] );
        }
        if ( isset( $_POST['store_img7'] ) && $_POST['store_img7'] != '' ) {
            update_post_meta( $brand_id, 'store_img7', $_POST['store_img7'] );
        }
        if ( isset( $_POST['store_img8'] ) && $_POST['store_img8'] != '' ) {
            update_post_meta( $brand_id, 'store_img8', $_POST['store_img8'] );
        }
        if ( isset( $_POST['store_img9'] ) && $_POST['store_img9'] != '' ) {
            update_post_meta( $brand_id, 'store_img9', $_POST['store_img9'] );
        }
        if ( isset( $_POST['store_img10'] ) && $_POST['store_img10'] != '' ) {
            update_post_meta( $brand_id, 'store_img10', $_POST['store_img10'] );
        }
        if ( isset( $_POST['store_img11'] ) && $_POST['store_img11'] != '' ) {
            update_post_meta( $brand_id, 'store_img11', $_POST['store_img11'] );
        }
        if ( isset( $_POST['store_img12'] ) && $_POST['store_img12'] != '' ) {
            update_post_meta( $brand_id, 'store_img12', $_POST['store_img12'] );
        }
    }
}


// Creating the widget
class jt_brands extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_brands',

		// Widget name will appear in UI
		__('JT Brands', 'jt-brands'),

		// Widget description
		array( 'description' => __( 'Showcase your store\'s brands in a modern and responsive way', 'jt-brands' ), )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $widget_args, $instance ) {

        extract( $widget_args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		$display_filters = $instance['display_filters'];

		wp_register_script('uikit_js', plugins_url('/js/uikit.min.js',__FILE__ ));
		wp_enqueue_script('uikit_js');
		wp_register_script('uikit_grid_js', plugins_url('/js/grid.min.js',__FILE__ ));
		wp_enqueue_script('uikit_grid_js');
		wp_register_style('jt-brands', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jt-brands');
		wp_style_add_data( 'jt-brands', 'rtl', 'replace' );
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		wp_register_style( 'tooltip.css', plugin_dir_url(__FILE__).'css/tooltip.min.css' );
		wp_enqueue_style( 'tooltip.css' );
		wp_register_script( 'tooltip.js', plugin_dir_url(__FILE__).'js/tooltip.min.js' );
		wp_enqueue_script( 'tooltip.js' );

		wp_register_script('uikit_slideset_js', plugins_url('/js/slideset.min.js',__FILE__ ));
		wp_enqueue_script('uikit_slideset_js');
		wp_register_style( 'uikit_slidenav_css', plugin_dir_url(__FILE__).'css/slidenav.min.css' );
		wp_enqueue_style( 'uikit_slidenav_css' );



		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $widget_args['before_title'];

			echo $title;

			echo $widget_args['after_title'];
		}

		// Include style based on the widget's settings
		if ($style == 'default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/default.php');
		}
		else if ($style == 'list') {
			include( plugin_dir_path( __FILE__ ) . 'styles/list.php');
		}
		else if ($style == 'list-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/list-2.php');
		}
		else if ($style == 'slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slideset.php');
		}

		echo $widget_args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$display_filters =  isset( $instance['display_filters'] ) ? $instance[ 'display_filters' ] : ' ';

		// Widget admin form
	?>
	<div class="wrap-jsquare">

		<div class="uk-accordion" data-uk-accordion>
			<div class="jt-menu-widget">
				<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			</div>
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-brands' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-brands' ); ?></label>
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="default" <?php echo ($style == 'default')?'selected':''; ?>>Default</option>
						<option value="list" <?php echo ($style == 'list')?'selected':''; ?>>List</option>
						<option value="list-2" <?php echo ($style == 'list-2')?'selected':''; ?>>List 2</option>
						<option value="slideset" <?php echo ($style == 'slideset')?'selected':''; ?>>Slideset</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'display_filters' ); ?>"><?php _e( 'Display Filters:', 'jt-brands' ); ?></label>
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'display_filters' ); ?>" name="<?php echo $this->get_field_name( 'display_filters' ); ?>">
						<option value="yes" <?php echo ($display_filters == 'yes')?'selected':''; ?>>Yes</option>
						<option value="no" <?php echo ($display_filters == 'no')?'selected':''; ?>>No</option>
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
		$instance['style'] = $new_instance['style'];
		$instance['display_filters'] = $new_instance['display_filters'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['order'] = $new_instance['order'];

		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jt_brands_widget() {
	register_widget( 'jt_brands' );
}
add_action( 'widgets_init', 'jt_brands_widget' );

function jt_brands_styles() {

	   wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	   wp_enqueue_style('font-awesome');

	   wp_register_style('jt-brands-css', plugin_dir_url(__FILE__).'css/jt-brands.css');
	   wp_enqueue_style('jt-brands-css');

       wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
       wp_enqueue_style( 'uikit.css' );

       wp_register_script( 'switcher.js', plugin_dir_url(__FILE__).'js/switcher.min.js' );
       wp_enqueue_script( 'switcher.js' );

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
       wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js');
       wp_enqueue_script( 'uikit.js' );
    }

    if (wp_script_is( 'accordion.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'accordion.js', plugin_dir_url(__FILE__).'js/accordion.min.js' );
       wp_enqueue_script( 'accordion.js' );
    }

}
add_action( 'widgets_init','jt_brands_styles');


add_action('admin_enqueue_scripts', 'jt_brands_scripts');

function jt_brands_scripts() {
        wp_enqueue_media();
        wp_register_script('brands-scripts-js', plugin_dir_url(__FILE__) . '/js/brands-scripts.js', array('jquery'));
        wp_enqueue_script('brands-scripts-js');
}

?>
