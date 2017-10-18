<?php
/*
Plugin Name: JT Event Calendar
Plugin URI: http://www.jsquare-themes.com
Description: Create a modern and responsive list of events with JT Event Calendar Widget
Text Domain: jt-event-calendar
Version: 3.2.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;


add_action( 'init', 'create_events_list' );
function create_events_list() {
    register_post_type( 'events_list',
        array(
            'labels' => array(
                'name' => __('Events', 'jt-event-calendar'),
                'singular_name' => __('Event', 'jt-event-calendar'),
                'add_new' => __('Add New', 'jt-event-calendar'),
                'add_new_item' => __('Add New Event', 'jt-event-calendar'),
                'edit' => __('Edit', 'jt-event-calendar'),
                'edit_item' => __('Edit Event', 'jt-event-calendar'),
                'new_item' => __('New Event', 'jt-event-calendar'),
                'view' => __('View', 'jt-event-calendar'),
                'view_item' => __('View Event', 'jt-event-calendar'),
                'search_items' => __('Search Events', 'jt-event-calendar'),
                'not_found' => __('No Events found', 'jt-event-calendar'),
                'not_found_in_trash' => __('No Events found in Trash', 'jt-event-calendar'),
                'parent' => __('Parent Event', 'jt-event-calendar')
            ),
 
            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-calendar-alt',
            'has_archive' => true
        )
    );

}

add_action('init', 'register_events_category', 0);

function register_events_category() {
    register_taxonomy(
        'events_categories',
        'events_list',
        array(
            'labels' => array(
                'name' => __('Event Category', 'jt-event-calendar'),
                'add_new_item' => __('Add New Event Category', 'jt-event-calendar'),
                'new_item_name' => __("New Event Category", 'jt-event-calendar')
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

add_action( 'admin_init', 'events_meta' );
function events_meta() {
    add_meta_box( 'event_meta_box',
        'Event Details',
        'display_event_meta_box',
        'events_list', 'normal', 'high'
    );
}

include ( dirname( __FILE__ ) . '/options.php');

function get_event_template($single_template) {
     global $post;

     if ($post->post_type == 'events_list') {
          $single_template = dirname( __FILE__ ) . '/single-events_list.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_event_template' );


function display_event_meta_box( $event ) {
    $event_short_info = esc_html( get_post_meta( $event->ID, 'event_short_info', true ) );
	$info = 'event_info';
    $event_info = get_post_meta( $event->ID, 'event_info', true );
    $event_location = esc_html( get_post_meta( $event->ID, 'event_location', true ) );
    $event_start_date = esc_html( get_post_meta( $event->ID, 'event_start_date', true ) );
    $event_end_date = esc_html( get_post_meta( $event->ID, 'event_end_date', true ) );
    $event_time = esc_html( get_post_meta( $event->ID, 'event_time', true ) );
	$ticket_price = 'event_ticket_price';
    $event_ticket_price = get_post_meta( $event->ID, 'event_ticket_price', true );
    $event_map = esc_html( get_post_meta( $event->ID, 'event_map', true ) );
    $event_video_url = esc_html( get_post_meta( $event->ID, 'event_video_url', true ) );
    $event_video = esc_html( get_post_meta( $event->ID, 'event_video', true ) );
    $event_link_text = esc_html( get_post_meta( $event->ID, 'event_link_text', true ) );
    $event_link_url = esc_html( get_post_meta( $event->ID, 'event_link_url', true ) );
	
    $event_gallery_img1 = esc_html( get_post_meta( $event->ID, 'event_gallery_img1', true ) );
    $event_gallery_img2 = esc_html( get_post_meta( $event->ID, 'event_gallery_img2', true ) );
    $event_gallery_img3 = esc_html( get_post_meta( $event->ID, 'event_gallery_img3', true ) );
    $event_gallery_img4 = esc_html( get_post_meta( $event->ID, 'event_gallery_img4', true ) );
    $event_gallery_img5 = esc_html( get_post_meta( $event->ID, 'event_gallery_img5', true ) );
    $event_gallery_img6 = esc_html( get_post_meta( $event->ID, 'event_gallery_img6', true ) );
    $event_gallery_img7 = esc_html( get_post_meta( $event->ID, 'event_gallery_img7', true ) );
    $event_gallery_img8 = esc_html( get_post_meta( $event->ID, 'event_gallery_img8', true ) );
    ?>
	<ul id="event-tabs-nav" data-uk-switcher="{connect:'#event-tabs'}">
		<li><a href="">Basic Info</a></li>
		<li><a href="">Info</a></li>
		<li><a href="">Ticket Prices</a></li>
		<li><a href="">Media</a></li>
	</ul>

	<ul id="event-tabs" class="uk-switcher">
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Short Info', 'jt-event-calendar'); ?></td>
					<td><textarea name="event_short_info" cols="70" rows="3"><?php echo $event_short_info; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Location', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_location" value="<?php echo $event_location; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 100%"><?php echo __('Map (Embed Code)', 'jt-event-calendar'); ?></td>
					<td><textarea name="event_map" cols="70" rows="3"><?php echo $event_map; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Starts', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_start_date" value="<?php echo $event_start_date; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Ends', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_end_date" value="<?php echo $event_end_date; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Time', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_time" value="<?php echo $event_time; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Link Text', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_link_text" value="<?php echo $event_link_text; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Link URL', 'jt-event-calendar'); ?></td>
					<td><input type="text" size="80" name="event_link_url" value="<?php echo $event_link_url; ?>" /></td>
				</tr>
			</table>
		</li>
		
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($event_info)), $info ); ?>
		</li>
		
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($event_ticket_price)), $ticket_price ); ?>
		</li>
		
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Video URL', 'jt-event-calendar'); ?></td>
					<td><input type="url" size="80" name="event_video_url" value="<?php echo $event_video_url; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 100%"><?php echo __('Video (Embed Code)', 'jt-event-calendar'); ?></td>
					<td><textarea name="event_video" cols="70" rows="3"><?php echo $event_video; ?></textarea></td>
				</tr>
			</table>
			<hr />
			<h3><?php echo __('Photo Gallery', 'jt-event-calendar'); ?></h3>
			<p>
				<label for="event_gallery_img1">
					<input id="event_gallery_img1" type="text" size="100" name="event_gallery_img1" value="<?php echo $event_gallery_img1; ?>" placeholder="Image 1" /><input id="event_gallery_img1_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img2">
					<input id="event_gallery_img2" type="text" size="100" name="event_gallery_img2" value="<?php echo $event_gallery_img2; ?>" placeholder="Image 2" /><input id="event_gallery_img2_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img3">
					<input id="event_gallery_img3" type="text" size="100" name="event_gallery_img3" value="<?php echo $event_gallery_img3; ?>" placeholder="Image 3" /><input id="event_gallery_img3_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img4">
					<input id="event_gallery_img4" type="text" size="100" name="event_gallery_img4" value="<?php echo $event_gallery_img4; ?>" placeholder="Image 4" /><input id="event_gallery_img4_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img5">
					<input id="event_gallery_img5" type="text" size="100" name="event_gallery_img5" value="<?php echo $event_gallery_img5; ?>" placeholder="Image 5" /><input id="event_gallery_img5_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img6">
					<input id="event_gallery_img6" type="text" size="100" name="event_gallery_img6" value="<?php echo $event_gallery_img6; ?>" placeholder="Image 6" /><input id="event_gallery_img6_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img7">
					<input id="event_gallery_img7" type="text" size="100" name="event_gallery_img7" value="<?php echo $event_gallery_img7; ?>" placeholder="Image 7" /><input id="event_gallery_img7_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="event_gallery_img8">
					<input id="event_gallery_img8" type="text" size="100" name="event_gallery_img8" value="<?php echo $event_gallery_img8; ?>" placeholder="Image 8" /><input id="event_gallery_img8_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
		</li>
	</ul>
    <?php
}

add_action( 'save_post', 'add_event_fields', 10, 2 );
function add_event_fields( $event_id, $event ) {
    // Check post type for movie reviews
    if ( $event->post_type == 'events_list' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['event_short_info'] )) {
            update_post_meta( $event->ID, 'event_short_info', $_POST['event_short_info'] );
        }
        if ( isset( $_POST['event_info'] )) {
            update_post_meta( $event->ID, 'event_info', $_POST['event_info'] );
        }
        if ( isset( $_POST['event_location'] )) {
            update_post_meta( $event->ID, 'event_location', $_POST['event_location'] );
        }
        if ( isset( $_POST['event_map'] )) {
            update_post_meta( $event->ID, 'event_map', $_POST['event_map'] );
        }
        if ( isset( $_POST['event_start_date'] )) {
            update_post_meta( $event->ID, 'event_start_date', $_POST['event_start_date'] );
        }
        if ( isset( $_POST['event_end_date'] )) {
            update_post_meta( $event->ID, 'event_end_date', $_POST['event_end_date'] );
        }
        if ( isset( $_POST['event_time'] )) {
            update_post_meta( $event->ID, 'event_time', $_POST['event_time'] );
        }
        if ( isset( $_POST['event_ticket_price'] )) {
            update_post_meta( $event->ID, 'event_ticket_price', $_POST['event_ticket_price'] );
        }
        if ( isset( $_POST['event_video_url'] )) {
            update_post_meta( $event->ID, 'event_video_url', $_POST['event_video_url'] );
        }
        if ( isset( $_POST['event_video'] )) {
            update_post_meta( $event->ID, 'event_video', $_POST['event_video'] );
        }
        if ( isset( $_POST['event_link_text'] )) {
            update_post_meta( $event->ID, 'event_link_text', $_POST['event_link_text'] );
        }
        if ( isset( $_POST['event_link_url'] )) {
            update_post_meta( $event->ID, 'event_link_url', $_POST['event_link_url'] );
        }
        if ( isset( $_POST['event_gallery_img1'] )) {
            update_post_meta( $event->ID, 'event_gallery_img1', $_POST['event_gallery_img1'] );
        }
        if ( isset( $_POST['event_gallery_img2'] )) {
            update_post_meta( $event->ID, 'event_gallery_img2', $_POST['event_gallery_img2'] );
        }
        if ( isset( $_POST['event_gallery_img3'] )) {
            update_post_meta( $event->ID, 'event_gallery_img3', $_POST['event_gallery_img3'] );
        }
        if ( isset( $_POST['event_gallery_img4'] )) {
            update_post_meta( $event->ID, 'event_gallery_img4', $_POST['event_gallery_img4'] );
        }
        if ( isset( $_POST['event_gallery_img5'] )) {
            update_post_meta( $event->ID, 'event_gallery_img5', $_POST['event_gallery_img5'] );
        }
        if ( isset( $_POST['event_gallery_img6'] )) {
            update_post_meta( $event->ID, 'event_gallery_img6', $_POST['event_gallery_img6'] );
        }
        if ( isset( $_POST['event_gallery_img7'] )) {
            update_post_meta( $event->ID, 'event_gallery_img7', $_POST['event_gallery_img7'] );
        }
        if ( isset( $_POST['event_gallery_img8'] )) {
            update_post_meta( $event->ID, 'event_gallery_img8', $_POST['event_gallery_img8'] );
        }
    }
}


function event_calendar_shortcode($atts)
{
	$jt = shortcode_atts( array(
		'title' => '',
		'cat' => '',
        'num' => '-1',
		'style' => 'default',
		'month' => '',
    ), $atts );
	
    ob_start();
	if ( $jt['style'] == 'default') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/default.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'default-2') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/default-2.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'grid-3-col') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/grid-3-col.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'overlay-text') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/overlay-text.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'overlay-text-hover') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/overlay-text-hover.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'slideset-overlay') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/slideset-overlay.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'slideset-2') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/slideset-2.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list-2') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list-2.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list-3') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list-3.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list-4') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list-4.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list-5') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list-5.php');
		$output = ob_get_clean();
		return $output;
	}
	else if ( $jt['style'] == 'small-list-6') {
		include (plugin_dir_path(__FILE__) . 'shortcodes/small-list-6.php');
		$output = ob_get_clean();
		return $output;
	}
	
}
add_shortcode('events_list', 'event_calendar_shortcode');


// Creating the widget 
class jt_events extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_events', 

		// Widget name will appear in UI
		__('JT Events Widget', 'jt-event-calendar'), 

		// Widget description
		array( 'description' => __( 'Display your events in a modern and responsive way', 'jt-event-calendar' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		$number_of_events = $instance['number_of_events'];
		$cat = $instance['category'];
		$date_format = $instance['date_format'];
		
		wp_register_script('jt_uikit_js', plugins_url('/js/uikit.min.js',__FILE__ ));
		wp_enqueue_script('jt_uikit_js');
		wp_register_style('jt_event_calendar', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jt_event_calendar');
		wp_style_add_data( 'jt_event_calendar', 'rtl', 'replace' );
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		wp_register_style( 'slidenav.css', plugin_dir_url(__FILE__).'css/slidenav.min.css' );
		wp_enqueue_style( 'slidenav.css' );
		wp_register_script('slideset.js', plugins_url('/js/slideset.min.js',__FILE__ ));
		wp_enqueue_script('slideset.js');
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $widget_args['before_title'];
		
			echo $title;
		
			echo $widget_args['after_title'];
		}
		
		// Include style based on the widget's settings
		if ($style == 'event-default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/default.php');
		}
		if ($style == 'event-default-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/default-2.php');
		}
		else if ($style == 'event-transparent-bg') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/transparent-bg.php');
		}
		else if ($style == 'event-grid') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/grid.php');
		}
		else if ($style == 'event-grid-3-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/grid-3-cols.php');
		}
		else if ($style == 'event-overlay-text') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/overlay-text.php');
		}
		else if ($style == 'event-overlay-text-hover') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/overlay-text-hover.php');
		}
		else if ($style == 'event-slideset-overlay') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/overlay-slideset.php');
		}
		else if ($style == 'event-slideset-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/slideset-2.php');
		}
		else if ($style == 'event-small-list') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list.php');
		}
		else if ($style == 'event-small-list-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list-2.php');
		}
		else if ($style == 'event-small-list-3') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list-3.php');
		}
		else if ($style == 'event-small-list-4') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list-4.php');
		}
		else if ($style == 'event-small-list-5') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list-5.php');
		}
		else if ($style == 'event-small-list-6') {
			include( plugin_dir_path( __FILE__ ) . 'styles/events/small-list-6.php');
		}
		
		echo $widget_args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$number_of_events =  isset( $instance['number_of_events'] ) ? $instance[ 'number_of_events' ] : ' ';
		$cat =  isset( $instance['category'] ) ? $instance[ 'category' ] : ' ';
		$date_format =  isset( $instance['date_format'] ) ? $instance[ 'date_format' ] : ' ';
		
		// Widget admin form
	?>
	<div class="wrap-jsquare">
	
		<div class="uk-accordion" data-uk-accordion>
			
			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-event-calendar' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-event-calendar' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="event-default" <?php echo ($style == 'event-default')?'selected':''; ?>>Default</option>
						<option value="event-default-2" <?php echo ($style == 'event-default-2')?'selected':''; ?>>Default 2</option>
						<option value="event-transparent-bg" <?php echo ($style == 'event-transparent-bg')?'selected':''; ?>>Transparent Background</option>
						<option value="event-grid" <?php echo ($style == 'event-grid')?'selected':''; ?>>Grid</option>
						<option value="event-grid-3-cols" <?php echo ($style == 'event-grid-3-cols')?'selected':''; ?>>Grid - 3 columns</option>
						<option value="event-overlay-text" <?php echo ($style == 'event-overlay-text')?'selected':''; ?>>Grid - Overlay Text</option>
						<option value="event-overlay-text-hover" <?php echo ($style == 'event-overlay-text-hover')?'selected':''; ?>>Grid - Overlay Text Hover</option>
						<option value="event-slideset-overlay" <?php echo ($style == 'event-slideset-overlay')?'selected':''; ?>>Slideset - Overlay Text</option>
						<option value="event-slideset-2" <?php echo ($style == 'event-slideset-2')?'selected':''; ?>>Slideset 2</option>
						<option value="event-small-list" <?php echo ($style == 'event-small-list')?'selected':''; ?>>Small List</option>
						<option value="event-small-list-2" <?php echo ($style == 'event-small-list-2')?'selected':''; ?>>Small List 2</option>
						<option value="event-small-list-3" <?php echo ($style == 'event-small-list-3')?'selected':''; ?>>Small List 3</option>
						<option value="event-small-list-4" <?php echo ($style == 'event-small-list-4')?'selected':''; ?>>Small List 4</option>
						<option value="event-small-list-5" <?php echo ($style == 'event-small-list-5')?'selected':''; ?>>Small List 5</option>
						<option value="event-small-list-6" <?php echo ($style == 'event-small-list-6')?'selected':''; ?>>Small List 6</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_events' ); ?>"><?php _e( 'Number of events:', 'jt-event-calendar' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_events' ); ?>" name="<?php echo $this->get_field_name( 'number_of_events' ); ?>" type="text" value="<?php echo esc_attr( $number_of_events ); ?>" />
				</p>
				<p>
				<?php
					$terms = get_terms( 'events_categories' );
					if ( ! empty( $terms ) ) {
				?>
					<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'jt-event-calendar' ); ?></label> 
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
					<label for="<?php echo $this->get_field_id( 'date_format' ); ?>"><?php _e( 'Date Format:', 'jt-event-calendar' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'date_format' ); ?>" name="<?php echo $this->get_field_name( 'date_format' ); ?>">
						<option value="dFY" <?php echo ($date_format == 'dFY')?'selected':''; ?>>01 January 2017</option>
						<option value="dF" <?php echo ($date_format == 'dF')?'selected':''; ?>>01 January</option>
						<option value="Fd" <?php echo ($date_format == 'Fd')?'selected':''; ?>>January 01</option>
						<option value="dMY" <?php echo ($date_format == 'dMY')?'selected':''; ?>>01 Jan 2017</option>
						<option value="dM" <?php echo ($date_format == 'dM')?'selected':''; ?>>01 Jan</option>
						<option value="Md" <?php echo ($date_format == 'Md')?'selected':''; ?>>Jan 01</option>
						<option value="dmY" <?php echo ($date_format == 'dmY')?'selected':''; ?>>01/02/2017 (DD/MM/YYYY)</option>
						<option value="mdY" <?php echo ($date_format == 'mdY')?'selected':''; ?>>02/01/2017 (MM/DD/YYYY)</option>
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
		$instance['number_of_events'] = $new_instance['number_of_events'];
		$instance['category'] = $new_instance['category'];
		$instance['date_format'] = $new_instance['date_format'];
		
		return $instance;
	}

} // Class wpb_widget ends here

// Creating the widget 
class jt_event_calendar extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_event_calendar', 

		// Widget name will appear in UI
		__('JT Event Calendar Widget', 'jt-event-calendar'), 

		// Widget description
		array( 'description' => __( 'Create a modern and responsive list of events with JT Event Calendar Widget', 'jt-event-calendar' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		
		for ($i = 1; $i <= 31; $i++) {
			${'img'.$i} = $instance[ 'img' . $i ];
			${'title'.$i} = $instance[ 'title' . $i ];
			${'short_info'.$i} = $instance[ 'short_info' . $i ];
			${'location'.$i} = $instance[ 'location' . $i ];
			${'start'.$i} = $instance[ 'start' . $i ];
			${'end'.$i} = $instance[ 'end' . $i ];
			${'btn_text'.$i} = $instance[ 'btn_text' . $i ];
			${'btn_url'.$i} = $instance[ 'btn_url' . $i ];
		}
		
		wp_register_script('jt_uikit_js', plugins_url('/js/uikit.min.js',__FILE__ ));
		wp_enqueue_script('jt_uikit_js');
		wp_register_style('jt_event_calendar', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jt_event_calendar');
		wp_style_add_data( 'jt_event_calendar', 'rtl', 'replace' );
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		wp_register_style( 'slidenav.css', plugin_dir_url(__FILE__).'css/slidenav.min.css' );
		wp_enqueue_style( 'slidenav.css' );
		wp_register_script('slideset.js', plugins_url('/js/slideset.min.js',__FILE__ ));
		wp_enqueue_script('slideset.js');
		
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
		if ($style == 'default-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/default-2.php');
		}
		else if ($style == 'transparent-bg') {
			include( plugin_dir_path( __FILE__ ) . 'styles/transparent-bg.php');
		}
		else if ($style == 'grid') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid.php');
		}
		else if ($style == 'grid-3-cols') {
			include( plugin_dir_path( __FILE__ ) . 'styles/grid-3-cols.php');
		}
		else if ($style == 'overlay-text') {
			include( plugin_dir_path( __FILE__ ) . 'styles/overlay-text.php');
		}
		else if ($style == 'overlay-text-hover') {
			include( plugin_dir_path( __FILE__ ) . 'styles/overlay-text-hover.php');
		}
		else if ($style == 'overlay-slideset') {
			include( plugin_dir_path( __FILE__ ) . 'styles/overlay-slideset.php');
		}
		else if ($style == 'slideset-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/slideset-2.php');
		}
		else if ($style == 'small-list') {
			include( plugin_dir_path( __FILE__ ) . 'styles/small-list.php');
		}
		else if ($style == 'small-list-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/small-list-2.php');
		}
		else if ($style == 'small-list-3') {
			include( plugin_dir_path( __FILE__ ) . 'styles/small-list-3.php');
		}
		else if ($style == 'small-list-4') {
			include( plugin_dir_path( __FILE__ ) . 'styles/small-list-4.php');
		}
		else if ($style == 'small-list-5') {
			include( plugin_dir_path( __FILE__ ) . 'styles/small-list-5.php');
		}
		
		echo $widget_args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		
		for ($i = 1; $i <= 31; $i++) {
			${'img'.$i} = isset( $instance['img' . $i] ) ? esc_attr( $instance[ 'img' . $i ] ) : ' ';
			${'title'.$i} = isset( $instance['title' . $i] ) ? esc_attr( $instance[ 'title' . $i ] ) : ' ';
			${'short_info'.$i} = isset( $instance['short_info' . $i] ) ? esc_attr( $instance[ 'short_info' . $i ] ) : ' ';
			${'location'.$i} = isset( $instance['location' . $i] ) ? esc_attr( $instance[ 'location' . $i ] ) : ' ';
			${'start'.$i} = isset( $instance['start' . $i] ) ? esc_attr( $instance[ 'start' . $i ] ) : ' ';
			${'end'.$i} = isset( $instance['end' . $i] ) ? esc_attr( $instance[ 'end' . $i ] ) : ' ';
			${'btn_text'.$i} = isset( $instance['btn_text' . $i] ) ? esc_attr( $instance[ 'btn_text' . $i ] ) : ' ';
			${'btn_url'.$i} = isset( $instance['btn_url' . $i] ) ? esc_attr( $instance[ 'btn_url' . $i ] ) : ' ';
		}
		
		
		// Widget admin form
	?>
	<div class="wrap-jsquare">
	
		<div class="uk-accordion" data-uk-accordion>
			
			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-picture-o"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-font"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-info"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-map-marker"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-clock-o"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-link"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-event-calendar' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-event-calendar' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="default" <?php echo ($style == 'default')?'selected':''; ?>>Default</option>
						<option value="default-2" <?php echo ($style == 'default-2')?'selected':''; ?>>Default 2</option>
						<option value="transparent-bg" <?php echo ($style == 'transparent-bg')?'selected':''; ?>>Transparent Background</option>
						<option value="grid" <?php echo ($style == 'grid')?'selected':''; ?>>Grid</option>
						<option value="grid-3-cols" <?php echo ($style == 'grid-3-cols')?'selected':''; ?>>Grid - 3 columns</option>
						<option value="overlay-text" <?php echo ($style == 'overlay-text')?'selected':''; ?>>Grid - Overlay Text</option>
						<option value="overlay-text-hover" <?php echo ($style == 'overlay-text-hover')?'selected':''; ?>>Grid - Overlay Text Hover</option>
						<option value="overlay-slideset" <?php echo ($style == 'overlay-slideset')?'selected':''; ?>>Slideset - Overlay Text</option>
						<option value="slideset-2" <?php echo ($style == 'slideset-2')?'selected':''; ?>>Slideset 2</option>
						<option value="small-list" <?php echo ($style == 'small-list')?'selected':''; ?>>Small List</option>
						<option value="small-list-2" <?php echo ($style == 'small-list-2')?'selected':''; ?>>Small List 2</option>
						<option value="small-list-3" <?php echo ($style == 'small-list-3')?'selected':''; ?>>Small List 3</option>
						<option value="small-list-4" <?php echo ($style == 'small-list-4')?'selected':''; ?>>Small List 4</option>
						<option value="small-list-5" <?php echo ($style == 'small-list-5')?'selected':''; ?>>Small List 5</option>
					</select>
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event's Image</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'img' . $i ); ?>"><?php _e( 'Event #' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'img' . $i ); ?>" name="<?php echo $this->get_field_name(  'img' . $i ); ?>" type="url" value="<?php echo esc_attr( ${'img'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
				</div>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event's Title</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'title' . $i ); ?>"><?php _e( 'Event #' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'title' . $i ); ?>" name="<?php echo $this->get_field_name( 'title' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'title'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
				</div>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event's Short Info</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'short_info' . $i ); ?>"><?php _e( 'Event #' . $i ); ?></label> 
						<textarea class="widefat" id="<?php echo $this->get_field_id( 'short_info' . $i ); ?>" name="<?php echo $this->get_field_name( 'short_info' . $i ); ?>"><?php echo esc_attr( ${'short_info'.$i} ); ?></textarea>
					</p>
				<?php
					}
				?>
				</div>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event's Location</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'location' . $i ); ?>"><?php _e( 'Event #' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'location' . $i ); ?>" name="<?php echo $this->get_field_name( 'location' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'location'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
				</div>
			</div>
			
			
			<div class="uk-accordion-content">
				<h4>Event's Dates</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<div>
						<h5>Event #<?php echo $i; ?></h5>
						<p>
							<label for="<?php echo $this->get_field_id( 'start' . $i ); ?>"><?php _e( 'Starts:', 'jt-event-calendar'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( 'start' . $i ); ?>" name="<?php echo $this->get_field_name( 'start' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'start'.$i} ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id( 'end' . $i ); ?>"><?php _e( 'Ends:', 'jt-event-calendar'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( 'end' . $i ); ?>" name="<?php echo $this->get_field_name( 'end' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'end'.$i} ); ?>" />
						</p>
					</div>
				<?php
					}
				?>
				</div>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event's Links</h4>
				<div class="uk-sortable" data-uk-sortable>
				<?php 
					for ($i = 1; $i <= 31; $i++) { 
				?>
					<div>
						<h5>Event #<?php echo $i; ?></h5>
						<p>
							<label for="<?php echo $this->get_field_id( 'btn_text' . $i ); ?>"><?php _e( 'Link Text:', 'jt-event-calendar' ); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' . $i ); ?>" name="<?php echo $this->get_field_name( 'btn_text' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'btn_text'.$i} ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id( 'btn_url' . $i ); ?>"><?php _e( 'Link URL:', 'jt-event-calendar' ); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' . $i ); ?>" name="<?php echo $this->get_field_name( 'btn_url' . $i ); ?>" type="url" value="<?php echo esc_attr( ${'btn_url'.$i} ); ?>" />
						</p>
					</div>
				<?php
					}
				?>
				</div>
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
		
		for ($i = 1; $i <= 31; $i++) {
			$instance['img' . $i] = strip_tags( $new_instance['img' . $i] );
			$instance['title' . $i] = strip_tags( $new_instance['title' . $i] );
			$instance['short_info' . $i] = strip_tags( $new_instance['short_info' . $i] );
			$instance['location' . $i] = strip_tags( $new_instance['location' . $i] );
			$instance['start' . $i] = strip_tags( $new_instance['start' . $i] );
			$instance['end' . $i] = strip_tags( $new_instance['end' . $i] );
			$instance['btn_text' . $i] = strip_tags( $new_instance['btn_text' . $i] );
			$instance['btn_url' . $i] = strip_tags( $new_instance['btn_url' . $i] );
		}
		
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jt_event_calendar_widget() {
	register_widget( 'jt_events' );
	register_widget( 'jt_event_calendar' );
}
add_action( 'widgets_init', 'jt_event_calendar_widget' );

function jt_event_calendar_styles() {
	
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
add_action( 'widgets_init','jt_event_calendar_styles');


function jt_events_styles() {
	
		wp_register_style('jt_events', plugins_url('/css/jt-events.css',__FILE__ ));
		wp_enqueue_style('jt_events');
		wp_style_add_data( 'jt_events', 'rtl', 'replace' );
	
	   wp_register_style('jt-event-calendar', plugin_dir_url(__FILE__).'css/jt-event-calendar.css');
	   wp_enqueue_style('jt-event-calendar');
		wp_style_add_data( 'jt-event-calendar', 'rtl', 'replace' );
	
		wp_register_script('uikit_toggle_js', plugins_url('/js/toggle.min.js',__FILE__ ));
		wp_enqueue_script('uikit_toggle_js');
		wp_register_script('uikit_switcher_js', plugins_url('/js/switcher.min.js',__FILE__ ));
		wp_enqueue_script('uikit_switcher_js');
		wp_register_script('uikit_lightbox_js', plugins_url('/js/lightbox.min.js',__FILE__ ));
		wp_enqueue_script('uikit_lightbox_js');
}
add_action( 'init','jt_events_styles');

add_action('admin_enqueue_scripts', 'jt_events_scripts');
 
function jt_events_scripts() {
        wp_enqueue_media();
        wp_register_script('admin-scripts-js', plugin_dir_url(__FILE__) . '/js/admin-scripts.js', array('jquery'));
        wp_enqueue_script('admin-scripts-js');
}

?>
