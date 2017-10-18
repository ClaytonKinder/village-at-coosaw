<?php
/*
Plugin Name: JT Travel Booking
Plugin URI: http://www.jsquare-themes.com
Description: Booking system for travel agencies
Version: 2.1.0
Text Domain: jt-travel-booking
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

add_action( 'init', 'create_destinations_list' );
function create_destinations_list() {
    register_post_type( 'destinations_list',
        array(
            'labels' => array(
                'name' => __('Destinations', 'jt-travel-booking'),
                'singular_name' => __('Destination', 'jt-travel-booking'),
                'add_new' => __('Add New', 'jt-travel-booking'),
                'add_new_item' => __('Add New Destination', 'jt-travel-booking'),
                'edit' => __('Edit', 'jt-travel-booking'),
                'edit_item' => __('Edit Destination', 'jt-travel-booking'),
                'new_item' => __('New Destination', 'jt-travel-booking'),
                'view' => __('View', 'jt-travel-booking'),
                'view_item' => __('View Destination', 'jt-travel-booking'),
                'search_items' => __('Search Destinations', 'jt-travel-booking'),
                'not_found' => __('No Destinations found', 'jt-travel-booking'),
                'not_found_in_trash' => __('No Destinations found in Trash', 'jt-travel-booking'),
                'parent' => __('Parent Destination', 'jt-travel-booking')
            ),
 
            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-location',
            'has_archive' => true
        )
    );

}

add_action('init', 'register_destinations_category', 0);

function register_destinations_category() {
    register_taxonomy(
        'destinations_categories',
        'destinations_list',
        array(
            'labels' => array(
                'name' => __('Destination Category', 'jt-travel-booking'),
                'add_new_item' => __('Add New Destination Category', 'jt-travel-booking'),
                'new_item_name' => __('New Destination Category', 'jt-travel-booking')
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

add_action( 'admin_init', 'destinations_meta' );
function destinations_meta() {
    add_meta_box( 'destination_meta_box',
        'Destination Details',
        'display_destination_meta_box',
        'destinations_list', 'normal', 'high'
    );
}

function display_destination_meta_box( $destination ) {
	
	wp_register_style('uikit.css', plugins_url('/css/uikit.css',__FILE__ ));
	wp_enqueue_style('uikit.css');
	
	wp_register_script('uikit.js', plugins_url('/js/uikit.min.js',__FILE__ ), array('jquery'));
	wp_enqueue_script('uikit.js');
	
	wp_register_script('switcher.js', plugins_url('/js/switcher.min.js',__FILE__ ));
	wp_enqueue_script('switcher.js');
	
    $destination_days = esc_html( get_post_meta( $destination->ID, 'destination_days', true ) );
    $destination_price = esc_html( get_post_meta( $destination->ID, 'destination_price', true ) );
    $destination_periods = esc_html( get_post_meta( $destination->ID, 'destination_periods', true ) );
    $destination_departures = esc_html( get_post_meta( $destination->ID, 'destination_departures', true ) );
    $destination_transportation = esc_html( get_post_meta( $destination->ID, 'destination_transportation', true ) );
    $destination_transportation_icon = esc_html( get_post_meta( $destination->ID, 'destination_transportation_icon', true ) );
	$destination_map = esc_html( get_post_meta( $destination->ID, 'destination_map', true ) );
	
	$short_info = 'destination_short_info';
    $destination_short_info = get_post_meta( $destination->ID, 'destination_short_info', true );
	
	$info = 'destination_info';
    $destination_info = get_post_meta( $destination->ID, 'destination_info', true );
	
	$daily_program = 'destination_daily_program';
    $destination_daily_program = get_post_meta( $destination->ID, 'destination_daily_program', true );
	
	$hotels = 'destination_hotels';
    $destination_hotels = get_post_meta( $destination->ID, 'destination_hotels', true );
	
	$provisions = 'destination_provisions';
    $destination_provisions = get_post_meta( $destination->ID, 'destination_provisions', true );
	
	$things_to_do = 'destination_things_to_do';
    $destination_things_to_do = get_post_meta( $destination->ID, 'destination_things_to_do', true );
	
	$booking_info = 'destination_booking_info';
    $destination_booking_info = get_post_meta( $destination->ID, 'destination_booking_info', true );
	
    ?>
    <table>
        <tr>
            <td style="width: 100%"><?php echo __('Number of days', 'jt-travel-booking'); ?></td>
            <td><input type="number" name="destination_days" min="1" max="31" value="<?php echo $destination_days; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px"><?php echo __('Price', 'jt-travel-booking'); ?></td>
            <td><input type="text" size="80" name="destination_price" value="<?php echo $destination_price; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px"><?php echo __('Periods', 'jt-travel-booking'); ?></td>
            <td><input type="text" size="80" name="destination_periods" value="<?php echo $destination_periods; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px"><?php echo __('Departures', 'jt-travel-booking'); ?></td>
            <td><input type="text" size="80" name="destination_departures" value="<?php echo $destination_departures; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px"><?php echo __('Transportation', 'jt-travel-booking'); ?></td>
            <td><input type="text" size="80" name="destination_transportation" value="<?php echo $destination_transportation; ?>" /></td>
		</tr>
        <tr>
            <td style="width: 150px"><?php echo __('Transportation Icon (FontAwesome)', 'jt-travel-booking'); ?></td>
            <td><input type="text" size="80" name="destination_transportation_icon" value="<?php echo $destination_transportation_icon; ?>" /></td>
        </tr>
		<tr>
			<td style="width: 150px"><?php echo __('Google Map (Embed Code)', 'jt-travel-booking'); ?></td>
			<td><textarea rows="3" cols="70" name="destination_map"><?php echo $destination_map; ?></textarea></td>
		</tr>
	</table>
	<br /><br />
	<ul class="uk-tab" data-uk-switcher="{connect:'#destination-tabs'}">
		<li><a href=""><?php echo __('Short Info', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Info', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Daily Program', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Hotels', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Provisions', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Things to do', 'jt-travel-booking'); ?></a></li>
		<li><a href=""><?php echo __('Booking Info', 'jt-travel-booking'); ?></a></li>
	</ul>

	<ul id="destination-tabs" class="uk-switcher uk-margin">
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_short_info)), $short_info ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_info)), $info ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_daily_program)), $daily_program ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_hotels)), $hotels ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_provisions)), $provisions ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_things_to_do)), $things_to_do ); ?>
			</div>
		</li>
		<li>
			<div class="destination-info-box">
				<?php wp_editor( html_entity_decode(stripcslashes($destination_booking_info)), $booking_info ); ?>
			</div>
		</li>
	</ul>
    <?php
}

add_action( 'save_post', 'add_destination_fields', 10, 2 );
function add_destination_fields( $destination_id, $destination ) {
    // Check post type for destinations
    if ( $destination->post_type == 'destinations_list' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['destination_days'] )) {
            update_post_meta( $destination->ID, 'destination_days', $_POST['destination_days'] );
        }
        if ( isset( $_POST['destination_price'] )) {
            update_post_meta( $destination->ID, 'destination_price', $_POST['destination_price'] );
        }
        if ( isset( $_POST['destination_periods'] )) {
            update_post_meta( $destination->ID, 'destination_periods', $_POST['destination_periods'] );
        }
        if ( isset( $_POST['destination_departures'] )) {
            update_post_meta( $destination->ID, 'destination_departures', $_POST['destination_departures'] );
        }
        if ( isset( $_POST['destination_transportation'] )) {
            update_post_meta( $destination->ID, 'destination_transportation', $_POST['destination_transportation'] );
        }
        if ( isset( $_POST['destination_transportation_icon'] )) {
            update_post_meta( $destination->ID, 'destination_transportation_icon', $_POST['destination_transportation_icon'] );
        }
        if ( isset( $_POST['destination_map'] )) {
            update_post_meta( $destination->ID, 'destination_map', $_POST['destination_map'] );
        }
        if ( isset( $_POST['destination_short_info'] )) {
            update_post_meta( $destination->ID, 'destination_short_info', $_POST['destination_short_info'] );
        }
        if ( isset( $_POST['destination_info'] )) {
            update_post_meta( $destination->ID, 'destination_info', $_POST['destination_info'] );
        }
        if ( isset( $_POST['destination_daily_program'] )) {
            update_post_meta( $destination->ID, 'destination_daily_program', $_POST['destination_daily_program'] );
        }
        if ( isset( $_POST['destination_hotels'] )) {
            update_post_meta( $destination->ID, 'destination_hotels', $_POST['destination_hotels'] );
        }
        if ( isset( $_POST['destination_provisions'] )) {
            update_post_meta( $destination->ID, 'destination_provisions', $_POST['destination_provisions'] );
        }
        if ( isset( $_POST['destination_things_to_do'] )) {
            update_post_meta( $destination->ID, 'destination_things_to_do', $_POST['destination_things_to_do'] );
        }
        if ( isset( $_POST['destination_booking_info'] )) {
            update_post_meta( $destination->ID, 'destination_booking_info', $_POST['destination_booking_info'] );
        }
    }
}

function get_custom_post_type_template($single_template) {
     global $post;

     if ($post->post_type == 'destinations_list') {
          $single_template = dirname( __FILE__ ) . '/single-destinations_list.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );


function travel_booking_destinations($atts)
{
	$jt = shortcode_atts( array(
		'title' => '',
		'cat' => '',
        'num' => '-1',
		'style' => 'default',
		'orderby' => 'ID',
		'order' => 'DESC',
    ), $atts );
	
    ob_start();
	if ( $jt['style'] == 'default') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/default.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-2-cols') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-2-cols.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-3-cols') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-3-cols.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-3-cols-colored') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-3-cols-colored.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-4-cols') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-4-cols.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-5-cols') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-5-cols.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'default-slideset') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/default-slideset.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'slideset-2-cols') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/slideset-2-cols.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'one-column') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/one-column.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'one-column-2') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/one-column-2.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'one-column-3') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/one-column-3.php');
		$output = ob_get_clean();
		return $output;
	}
	
}
add_shortcode('destinations', 'travel_booking_destinations');


// Creating the widget 
class jt_destinations extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_destinations', 

		// Widget name will appear in UI
		__('JT Destinations', 'jt_destinations_domain'), 

		// Widget description
		array( 'description' => __( 'Display destinations of JT Travel Booking plugin in a modern and responsive way', 'jt_destinations_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		$num_destinations = $instance['num_destinations'];
		$cat = $instance['category'];
		
		
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
		else if ($style == 'grid-2-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-2-cols.php');
		}
		else if ($style == 'grid-3-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-3-cols.php');
		}
		else if ($style == 'grid-3-cols-colored') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-3-cols-colored.php');
		}
		else if ($style == 'grid-4-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-4-cols.php');
		}
		else if ($style == 'grid-5-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-5-cols.php');
		}
		else if ($style == 'one-column') {
			include( plugin_dir_path( __FILE__ ) . 'styles/one-column.php');
		}
		else if ($style == 'one-column-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/one-column-2.php');
		}
		else if ($style == 'one-column-3') {
			include( plugin_dir_path( __FILE__ ) . 'styles/one-column-3.php');
		}
		else if ($style == 'slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/default-slideset.php');
		}
		else if ($style == 'slideset-2-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slideset-2-cols.php');
		}
		
		echo $widget_args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$num_destinations =  isset( $instance['num_destinations'] ) ? $instance[ 'num_destinations' ] : ' ';
		$cat =  isset( $instance['category'] ) ? $instance[ 'category' ] : ' ';
		
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
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-travel-booking' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-travel-booking' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="default" <?php echo ($style == 'default')?'selected':''; ?>>Default</option>
						<option value="grid-2-cols" <?php echo ($style == 'grid-2-cols')?'selected':''; ?>>Grid - 2 Columns</option>
						<option value="grid-3-cols" <?php echo ($style == 'grid-3-cols')?'selected':''; ?>>Grid - 3 Columns</option>
						<option value="grid-3-cols-colored" <?php echo ($style == 'grid-3-cols-colored')?'selected':''; ?>>Grid - 3 Columns with Color</option>
						<option value="grid-4-cols" <?php echo ($style == 'grid-4-cols')?'selected':''; ?>>Grid - 4 Columns</option>
						<option value="grid-5-cols" <?php echo ($style == 'grid-5-cols')?'selected':''; ?>>Grid - 5 Columns</option>
						<option value="one-column" <?php echo ($style == 'one-column')?'selected':''; ?>>One Column</option>
						<option value="one-column-2" <?php echo ($style == 'one-column-2')?'selected':''; ?>>One Column 2</option>
						<option value="one-column-3" <?php echo ($style == 'one-column-3')?'selected':''; ?>>One Column 3</option>
						<option value="slideset" <?php echo ($style == 'slideset')?'selected':''; ?>>Slideset</option>
						<option value="slideset-2-cols" <?php echo ($style == 'slideset-2-cols')?'selected':''; ?>>Slideset - 2 Columns</option>
					</select>
				</p>
				<p>
				<?php
					$terms = get_terms( 'destinations_categories' );
					if ( ! empty( $terms ) ) {
				?>
					<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'jt-travel-booking' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
						<option value="all" <?php echo ($cat == 'all')?'selected':''; ?>><?php _e('All Categories'); ?></option>
						<?php
					 		foreach ( $terms as $term ) {
						 ?>
						<option value="<?php echo $term->slug; ?>" <?php echo ($cat == $term->slug)?'selected':''; ?>><?php echo $term->name; ?></option>
						<?php
							}
						?>
				</select>
				<?php
					}
				?>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'num_destinations' ); ?>"><?php _e( 'Number of Destinations:', 'jt-travel-booking' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'num_destinations' ); ?>" name="<?php echo $this->get_field_name( 'num_destinations' ); ?>" type="text" value="<?php echo esc_attr( $num_destinations ); ?>" />
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
		$instance['num_destinations'] = $new_instance['num_destinations'];
		$instance['category'] = $new_instance['category'];
		
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jt_destinations_widget() {
	register_widget( 'jt_destinations' );
}
add_action( 'widgets_init', 'jt_destinations_widget' );

function jt_destinations_styles() {
	
	   wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	   wp_enqueue_style('font-awesome');
		
       wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
       wp_enqueue_style( 'uikit.css' );
	
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
       wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js', array('jquery'));
       wp_enqueue_script( 'uikit.js' );
    }
	
}
add_action( 'widgets_init','jt_destinations_styles');


function jt_travel_booking_styles() {
	
	   wp_register_style('jt-travel-booking', plugin_dir_url(__FILE__).'css/jt-travel-booking.css');
	   wp_enqueue_style('jt-travel-booking');
		wp_style_add_data( 'jt-travel-booking', 'rtl', 'replace' );
	
		wp_register_script('uikit.js', plugins_url('/js/uikit.min.js',__FILE__ ), array('jquery'));
		wp_enqueue_script('uikit.js');
		wp_register_script('uikit_grid_js', plugins_url('/js/grid.min.js',__FILE__ ));
		wp_enqueue_script('uikit_grid_js');
		wp_register_script('uikit_toggle_js', plugins_url('/js/toggle.min.js',__FILE__ ));
		wp_enqueue_script('uikit_toggle_js');
		wp_register_style('jt-destinations.css', plugins_url('/css/style.css',__FILE__ ));
		wp_style_add_data( 'jt-destinations', 'rtl', 'replace' );
		wp_enqueue_style('jt-destinations.css');
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		
		wp_register_script('uikit_slideset_js', plugins_url('/js/slideset.min.js',__FILE__ ));
		wp_enqueue_script('uikit_slideset_js');
		wp_register_style( 'uikit_slidenav_css', plugin_dir_url(__FILE__).'css/slidenav.min.css' );
		wp_enqueue_style( 'uikit_slidenav_css' );
	
}
add_action( 'init','jt_travel_booking_styles');

?>
