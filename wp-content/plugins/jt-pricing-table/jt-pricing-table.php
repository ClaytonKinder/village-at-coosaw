<?php
/*
Plugin Name: JT Pricing Table
Plugin URI: http://www.jsquare-themes.com
Description: Create easily a responsive pricing table
Text Domain: jt-pricing-table
Version: 1.2.1
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jsquare_pricing_table extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_pricing_table', 

		// Widget name
		__('JT Pricing Table Widget', 'jt-pricing-table'), 

		// Widget description
		array( 'description' => __( 'Create easily a responsive pricing table', 'jt-pricing-table' ), ) 
		);
	}

	
	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$plan = $instance[ 'plan' ];
		$features = $instance[ 'features' ];
		$price = $instance[ 'price' ];
		$buy_button = $instance[ 'buy_button' ];
		$buy_button_text = $instance[ 'buy_button_text' ];
		$buy_button_url = $instance[ 'buy_button_url' ];
		$plan_2 = $instance[ 'plan_2' ];
		$features_2 = $instance[ 'features_2' ];
		$price_2 = $instance[ 'price_2' ];
		$buy_button_2 = $instance[ 'buy_button_2' ];
		$buy_button_text_2 = $instance[ 'buy_button_text_2' ];
		$buy_button_url_2 = $instance[ 'buy_button_url_2' ];
		$plan_3 = $instance[ 'plan_3' ];
		$features_3 = $instance[ 'features_3' ];
		$price_3 = $instance[ 'price_3' ];
		$buy_button_3 = $instance[ 'buy_button_3' ];
		$buy_button_text_3 = $instance[ 'buy_button_text_3' ];
		$buy_button_url_3 = $instance[ 'buy_button_url_3' ];
		$plan_4 = $instance[ 'plan_4' ];
		$features_4 = $instance[ 'features_4' ];
		$price_4 = $instance[ 'price_4' ];
		$buy_button_4 = $instance[ 'buy_button_4' ];
		$buy_button_text_4 = $instance[ 'buy_button_text_4' ];
		$buy_button_url_4 = $instance[ 'buy_button_url_4' ];
		$currency = $instance[ 'currency' ];
		$style = $instance[ 'style' ];
		$animation = $instance[ 'animation' ];
		$num_columns = $instance[ 'num_columns' ];
		$plan_color_1 = $instance[ 'plan_color_1' ];
		$price_color_1 = $instance[ 'price_color_1' ];
		$button_color_1 = $instance[ 'button_color_1' ];
		$plan_color_2 = $instance[ 'plan_color_2' ];
		$price_color_2 = $instance[ 'price_color_2' ];
		$button_color_2 = $instance[ 'button_color_2' ];
		$plan_color_3 = $instance[ 'plan_color_3' ];
		$price_color_3 = $instance[ 'price_color_3' ];
		$button_color_3 = $instance[ 'button_color_3' ];
		$plan_color_4 = $instance[ 'plan_color_4' ];
		$price_color_4 = $instance[ 'price_color_4' ];
		$button_color_4 = $instance[ 'button_color_4' ];
		
		if ( $currency == 'euro') {
			$currency_symbol = '&euro; ';
		} else if ( $currency == 'usd') {
			$currency_symbol = '$ ';
		} else if ( $currency == 'pound') {
			$currency_symbol = '&pound; ';
		} else if ( $currency == 'yen') {
			$currency_symbol = '&yen; ';
		} else if ( $currency == 'won') {
			$currency_symbol = '&#8361; ';
		} else if ( $currency == 'rupee') {
			$currency_symbol = '&#x20B9; ';
		} 
		
		wp_register_style('uikit_css', plugins_url('/css/uikit.css',__FILE__ ));
		wp_enqueue_style('uikit_css');
		
		wp_register_style('jsquare_pricing_table', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jsquare_pricing_table');
		wp_style_add_data( 'jsquare_pricing_table', 'rtl', 'replace' );
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) )
			echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title'];

		if ($style == 'style-1') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-1.php');
		}
		else if ($style == 'style-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-2.php');
		}
		else if ($style == 'style-3') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-3.php');
		}
		else if ($style == 'style-4') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-4.php');
		}
		else if ($style == 'style-5') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-5.php');
		}
		else if ($style == 'style-6') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-6.php');
		}
		else if ($style == 'style-7') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-7.php');
		}
		else if ($style == 'style-8') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-8.php');
		}
		else if ($style == 'style-9') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-9.php');
		}
		else if ($style == 'style-10') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-10.php');
		}
		else if ($style == 'style-11') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-11.php');
		}
		
		echo $widget_args['after_widget'];
	}


	// Function that creates the widget's options on WordPress admin
	public function form( $instance ) {
		$title =  isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';	
		$plan =  isset( $instance['plan'] ) ? $instance[ 'plan' ] : ' ';
		$features =  isset( $instance['features'] ) ? $instance[ 'features' ] : ' ';
		$price =  isset( $instance['price'] ) ? $instance[ 'price' ] : ' ';
		$buy_button =  isset( $instance['buy_button'] ) ? $instance[ 'buy_button' ] : ' ';
		$buy_button_text =  isset( $instance['buy_button_text'] ) ? $instance[ 'buy_button_text' ] : ' ';
		$buy_button_url =  isset( $instance['buy_button_url'] ) ? $instance[ 'buy_button_url' ] : ' ';
		$plan_2 =  isset( $instance['plan_2'] ) ? $instance[ 'plan_2' ] : ' ';
		$features_2 =  isset( $instance['features_2'] ) ? $instance[ 'features_2' ] : ' ';
		$price_2 =  isset( $instance['price_2'] ) ? $instance[ 'price_2' ] : ' ';
		$buy_button_2 =  isset( $instance['buy_button_2'] ) ? $instance[ 'buy_button_2' ] : ' ';
		$buy_button_text_2 =  isset( $instance['buy_button_text_2'] ) ? $instance[ 'buy_button_text_2' ] : ' ';
		$buy_button_url_2 =  isset( $instance['buy_button_url_2'] ) ? $instance[ 'buy_button_url_2' ] : ' ';
		$plan_3 =  isset( $instance['plan_3'] ) ? $instance[ 'plan_3' ] : ' ';
		$features_3 =  isset( $instance['features_3'] ) ? $instance[ 'features_3' ] : ' ';
		$price_3 =  isset( $instance['price_3'] ) ? $instance[ 'price_3' ] : ' ';
		$buy_button_3 =  isset( $instance['buy_button_3'] ) ? $instance[ 'buy_button_3' ] : ' ';
		$buy_button_text_3 =  isset( $instance['buy_button_text_3'] ) ? $instance[ 'buy_button_text_3' ] : ' ';
		$buy_button_url_3 =  isset( $instance['buy_button_url_3'] ) ? $instance[ 'buy_button_url_3' ] : ' ';
		$plan_4 =  isset( $instance['plan_4'] ) ? $instance[ 'plan_4' ] : ' ';
		$features_4 =  isset( $instance['features_4'] ) ? $instance[ 'features_4' ] : ' ';
		$price_4 =  isset( $instance['price_4'] ) ? $instance[ 'price_4' ] : ' ';
		$buy_button_4 =  isset( $instance['buy_button_4'] ) ? $instance[ 'buy_button_4' ] : ' ';
		$buy_button_text_4 =  isset( $instance['buy_button_text_4'] ) ? $instance[ 'buy_button_text_4' ] : ' ';
		$buy_button_url_4 =  isset( $instance['buy_button_url_4'] ) ? $instance[ 'buy_button_url_4' ] : ' ';
		$currency =  isset( $instance['currency'] ) ? $instance[ 'currency' ] : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$animation =  isset( $instance['animation'] ) ? $instance[ 'animation' ] : ' ';
		$num_columns =  isset( $instance['num_columns'] ) ? $instance[ 'num_columns' ] : ' ';
		$plan_color_1 =  isset( $instance['plan_color_1'] ) ? $instance[ 'plan_color_1' ] : ' ';
		$price_color_1 =  isset( $instance['price_color_1'] ) ? $instance[ 'price_color_1' ] : ' ';
		$button_color_1 =  isset( $instance['button_color_1'] ) ? $instance[ 'button_color_1' ] : ' ';
		$plan_color_2 =  isset( $instance['plan_color_2'] ) ? $instance[ 'plan_color_2' ] : ' ';
		$price_color_2 =  isset( $instance['price_color_2'] ) ? $instance[ 'price_color_2' ] : ' ';
		$button_color_2 =  isset( $instance['button_color_2'] ) ? $instance[ 'button_color_2' ] : ' ';
		$plan_color_3 =  isset( $instance['plan_color_3'] ) ? $instance[ 'plan_color_3' ] : ' ';
		$price_color_3 =  isset( $instance['price_color_3'] ) ? $instance[ 'price_color_3' ] : ' ';
		$button_color_3 =  isset( $instance['button_color_3'] ) ? $instance[ 'button_color_3' ] : ' ';
		$plan_color_4 =  isset( $instance['plan_color_4'] ) ? $instance[ 'plan_color_4' ] : ' ';
		$price_color_4 =  isset( $instance['price_color_4'] ) ? $instance[ 'price_color_4' ] : ' ';
		$button_color_4 =  isset( $instance['button_color_4'] ) ? $instance[ 'button_color_4' ] : ' ';
		
	?>
	<div class="wrap-jsquare">
		
		<div class="uk-accordion" data-uk-accordion>
			
			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-columns"></i> 1</h3>
			<h3 class="uk-accordion-title"><i class="fa fa-columns"></i> 2</h3>
			<h3 class="uk-accordion-title"><i class="fa fa-columns"></i> 3</h3>
			<h3 class="uk-accordion-title"><i class="fa fa-columns"></i> 4</h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'currency' ); ?>"><?php _e( 'Currency:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'currency' ); ?>" name="<?php echo $this->get_field_name( 'currency' ); ?>">
						<option value="euro" <?php echo ($currency == 'euro')?'selected':''; ?>>&euro; | Euro</option>
						<option value="usd" <?php echo ($currency == 'usd')?'selected':''; ?>>$ | Dollar</option>
						<option value="pound" <?php echo ($currency == 'pound')?'selected':''; ?>>&pound; | Pound</option>
						<option value="yen" <?php echo ($currency == 'yen')?'selected':''; ?>>&yen; | Yen</option>
						<option value="won" <?php echo ($currency == 'won')?'selected':''; ?>>&#8361; | Won</option>
						<option value="rupee" <?php echo ($currency == 'rupee')?'selected':''; ?>>&#x20B9; | Rupee</option>
						<option value="bitcoin" <?php echo ($currency == 'bitcoin')?'selected':''; ?>>&#579; | Bitcoin</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="style-1" <?php echo ($style == 'style-1')?'selected':''; ?>>Style 1</option>
						<option value="style-2" <?php echo ($style == 'style-2')?'selected':''; ?>>Style 2</option>
						<option value="style-3" <?php echo ($style == 'style-3')?'selected':''; ?>>Style 3</option>
						<option value="style-4" <?php echo ($style == 'style-4')?'selected':''; ?>>Style 4</option>
						<option value="style-5" <?php echo ($style == 'style-5')?'selected':''; ?>>Style 5</option>
						<option value="style-6" <?php echo ($style == 'style-6')?'selected':''; ?>>Style 6</option>
						<option value="style-7" <?php echo ($style == 'style-7')?'selected':''; ?>>Style 7</option>
						<option value="style-8" <?php echo ($style == 'style-8')?'selected':''; ?>>Style 8</option>
						<option value="style-9" <?php echo ($style == 'style-9')?'selected':''; ?>>Style 9</option>
						<option value="style-10" <?php echo ($style == 'style-10')?'selected':''; ?>>Style 10</option>
						<option value="style-11" <?php echo ($style == 'style-11')?'selected':''; ?>>Style 11</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'animation' ); ?>"><?php _e( 'Box animation:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'animation' ); ?>" name="<?php echo $this->get_field_name( 'animation' ); ?>">
						<option value="none" <?php echo ($animation == 'none')?'selected':''; ?>>None</option>
						<option value="fade" <?php echo ($animation == 'fade')?'selected':''; ?>>Fade</option>
						<option value="scale" <?php echo ($animation == 'scale')?'selected':''; ?>>Scale</option>
						<option value="scale-up" <?php echo ($animation == 'scale-up')?'selected':''; ?>>Scale Up</option>
						<option value="scale-down" <?php echo ($animation == 'scale-down')?'selected':''; ?>>Scale Down</option>
						<option value="slide-top" <?php echo ($animation == 'slide-top')?'selected':''; ?>>Slide Top</option>
						<option value="slide-bottom" <?php echo ($animation == 'slide-bottom')?'selected':''; ?>>Slide Bottom</option>
						<option value="slide-left" <?php echo ($animation == 'slide-left')?'selected':''; ?>>Slide Left</option>
						<option value="slide-right" <?php echo ($animation == 'slide-right')?'selected':''; ?>>Slide Right</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'num_columns' ); ?>"><?php _e( 'Number of Columns:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'num_columns' ); ?>" name="<?php echo $this->get_field_name( 'num_columns' ); ?>">
						<option value="3" <?php echo ($num_columns == '3')?'selected':''; ?>>3</option>
						<option value="4" <?php echo ($num_columns == '4')?'selected':''; ?>>4</option>
					</select>
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Column 1</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan' ); ?>"><?php _e( 'Plan:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan' ); ?>" name="<?php echo $this->get_field_name( 'plan' ); ?>" type="text" value="<?php echo esc_attr( $plan ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price' ); ?>"><?php _e( 'Price:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price' ); ?>" name="<?php echo $this->get_field_name( 'price' ); ?>" type="text" value="<?php echo esc_attr( $price ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'features' ); ?>"><?php _e( 'Features:', 'jt-pricing-table' ); ?></label> 
					<textarea class="widefat" id="<?php echo $this->get_field_id( 'features' ); ?>" name="<?php echo $this->get_field_name( 'features' ); ?>" rows="10"><?php echo esc_attr( $features ); ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button' ); ?>"><?php _e( 'Buy Button:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'buy_button' ); ?>" name="<?php echo $this->get_field_name( 'buy_button' ); ?>">
						<option value="show" <?php echo ($buy_button == 'show')?'selected':''; ?>>Show</option>
						<option value="hide" <?php echo ($buy_button == 'hide')?'selected':''; ?>>Hide</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_text' ); ?>"><?php _e( 'Buy Button Text:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_text' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_text' ); ?>" type="text" value="<?php echo esc_attr( $buy_button_text ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_url' ); ?>"><?php _e( 'Buy Button URL:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_url' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_url' ); ?>" type="url" value="<?php echo esc_attr( $buy_button_url ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_color_1' ); ?>"><?php _e( 'Plan Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_color_1' ); ?>" name="<?php echo $this->get_field_name( 'plan_color_1' ); ?>" type="color" value="<?php echo esc_attr( $plan_color_1 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_color_1' ); ?>"><?php _e( 'Price Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_color_1' ); ?>" name="<?php echo $this->get_field_name( 'price_color_1' ); ?>" type="color" value="<?php echo esc_attr( $price_color_1 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'button_color_1' ); ?>"><?php _e( 'Button Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'button_color_1' ); ?>" name="<?php echo $this->get_field_name( 'button_color_1' ); ?>" type="color" value="<?php echo esc_attr( $button_color_1 ); ?>" />
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Column 2</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_2' ); ?>"><?php _e( 'Plan:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_2' ); ?>" name="<?php echo $this->get_field_name( 'plan_2' ); ?>" type="text" value="<?php echo esc_attr( $plan_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_2' ); ?>"><?php _e( 'Price:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_2' ); ?>" name="<?php echo $this->get_field_name( 'price_2' ); ?>" type="text" value="<?php echo esc_attr( $price_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'features_2' ); ?>"><?php _e( 'Features:', 'jt-pricing-table' ); ?></label> 
					<textarea class="widefat" id="<?php echo $this->get_field_id( 'features_2' ); ?>" name="<?php echo $this->get_field_name( 'features_2' ); ?>" rows="10"><?php echo esc_attr( $features_2 ); ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_2' ); ?>"><?php _e( 'Buy Button:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'buy_button_2' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_2' ); ?>">
						<option value="show" <?php echo ($buy_button_2 == 'show')?'selected':''; ?>>Show</option>
						<option value="hide" <?php echo ($buy_button_2 == 'hide')?'selected':''; ?>>Hide</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_text_2' ); ?>"><?php _e( 'Buy Button Text:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_text_2' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_text_2' ); ?>" type="text" value="<?php echo esc_attr( $buy_button_text_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_url_2' ); ?>"><?php _e( 'Buy Button URL:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_url_2' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_url_2' ); ?>" type="url" value="<?php echo esc_attr( $buy_button_url_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_color_2' ); ?>"><?php _e( 'Plan Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_color_2' ); ?>" name="<?php echo $this->get_field_name( 'plan_color_2' ); ?>" type="color" value="<?php echo esc_attr( $plan_color_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_color_2' ); ?>"><?php _e( 'Price Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_color_2' ); ?>" name="<?php echo $this->get_field_name( 'price_color_2' ); ?>" type="color" value="<?php echo esc_attr( $price_color_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'button_color_2' ); ?>"><?php _e( 'Button Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'button_color_2' ); ?>" name="<?php echo $this->get_field_name( 'button_color_2' ); ?>" type="color" value="<?php echo esc_attr( $button_color_2 ); ?>" />
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Column 3</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_3' ); ?>"><?php _e( 'Plan:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_3' ); ?>" name="<?php echo $this->get_field_name( 'plan_3' ); ?>" type="text" value="<?php echo esc_attr( $plan_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_3' ); ?>"><?php _e( 'Price:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_3' ); ?>" name="<?php echo $this->get_field_name( 'price_3' ); ?>" type="text" value="<?php echo esc_attr( $price_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'features_3' ); ?>"><?php _e( 'Features:', 'jt-pricing-table' ); ?></label> 
					<textarea class="widefat" id="<?php echo $this->get_field_id( 'features_3' ); ?>" name="<?php echo $this->get_field_name( 'features_3' ); ?>" rows="10"><?php echo esc_attr( $features_3 ); ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_3' ); ?>"><?php _e( 'Buy Button:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'buy_button_3' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_3' ); ?>">
						<option value="show" <?php echo ($buy_button_3 == 'show')?'selected':''; ?>>Show</option>
						<option value="hide" <?php echo ($buy_button_3 == 'hide')?'selected':''; ?>>Hide</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_text_3' ); ?>"><?php _e( 'Buy Button Text:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_text_3' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_text_3' ); ?>" type="text" value="<?php echo esc_attr( $buy_button_text_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_url_3' ); ?>"><?php _e( 'Buy Button URL:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_url_3' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_url_3' ); ?>" type="url" value="<?php echo esc_attr( $buy_button_url_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_color_3' ); ?>"><?php _e( 'Plan Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_color_3' ); ?>" name="<?php echo $this->get_field_name( 'plan_color_3' ); ?>" type="color" value="<?php echo esc_attr( $plan_color_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_color_3' ); ?>"><?php _e( 'Price Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_color_3' ); ?>" name="<?php echo $this->get_field_name( 'price_color_3' ); ?>" type="color" value="<?php echo esc_attr( $price_color_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'button_color_3' ); ?>"><?php _e( 'Button Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'button_color_3' ); ?>" name="<?php echo $this->get_field_name( 'button_color_3' ); ?>" type="color" value="<?php echo esc_attr( $button_color_3 ); ?>" />
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Column 4</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_4' ); ?>"><?php _e( 'Plan:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_4' ); ?>" name="<?php echo $this->get_field_name( 'plan_4' ); ?>" type="text" value="<?php echo esc_attr( $plan_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_4' ); ?>"><?php _e( 'Price:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_4' ); ?>" name="<?php echo $this->get_field_name( 'price_4' ); ?>" type="text" value="<?php echo esc_attr( $price_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'features_4' ); ?>"><?php _e( 'Features:', 'jt-pricing-table' ); ?></label> 
					<textarea class="widefat" id="<?php echo $this->get_field_id( 'features_4' ); ?>" name="<?php echo $this->get_field_name( 'features_4' ); ?>" rows="10"><?php echo esc_attr( $features_4 ); ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_4' ); ?>"><?php _e( 'Buy Button:', 'jt-pricing-table' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'buy_button_4' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_4' ); ?>">
						<option value="show" <?php echo ($buy_button_4 == 'show')?'selected':''; ?>>Show</option>
						<option value="hide" <?php echo ($buy_button_4 == 'hide')?'selected':''; ?>>Hide</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_text_4' ); ?>"><?php _e( 'Buy Button Text:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_text_4' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_text_4' ); ?>" type="text" value="<?php echo esc_attr( $buy_button_text_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'buy_button_url_4' ); ?>"><?php _e( 'Buy Button URL:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'buy_button_url_4' ); ?>" name="<?php echo $this->get_field_name( 'buy_button_url_4' ); ?>" type="url" value="<?php echo esc_attr( $buy_button_url_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'plan_color_4' ); ?>"><?php _e( 'Plan Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'plan_color_4' ); ?>" name="<?php echo $this->get_field_name( 'plan_color_4' ); ?>" type="color" value="<?php echo esc_attr( $plan_color_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'price_color_4' ); ?>"><?php _e( 'Price Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'price_color_4' ); ?>" name="<?php echo $this->get_field_name( 'price_color_4' ); ?>" type="color" value="<?php echo esc_attr( $price_color_4 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'button_color_4' ); ?>"><?php _e( 'Button Color:', 'jt-pricing-table' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'button_color_4' ); ?>" name="<?php echo $this->get_field_name( 'button_color_4' ); ?>" type="color" value="<?php echo esc_attr( $button_color_4 ); ?>" />
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
		$instance['currency'] = strip_tags( $new_instance['currency'] );
		$instance['plan'] = strip_tags( $new_instance[ 'plan' ] );
		$instance['features'] = strip_tags( $new_instance[ 'features' ] );
		$instance['price'] = strip_tags( $new_instance[ 'price' ] );
		$instance['buy_button'] = strip_tags( $new_instance[ 'buy_button' ] );
		$instance['buy_button_text'] = strip_tags( $new_instance[ 'buy_button_text' ] );
		$instance['buy_button_url'] = strip_tags( $new_instance[ 'buy_button_url' ] );
		$instance['plan_2'] = strip_tags( $new_instance[ 'plan_2' ] );
		$instance['features_2'] = strip_tags( $new_instance[ 'features_2' ] );
		$instance['price_2'] = strip_tags( $new_instance[ 'price_2' ] );
		$instance['buy_button_2'] = strip_tags( $new_instance[ 'buy_button_2' ] );
		$instance['buy_button_text_2'] = strip_tags( $new_instance[ 'buy_button_text_2' ] );
		$instance['buy_button_url_2'] = strip_tags( $new_instance[ 'buy_button_url_2' ] );
		$instance['plan_3'] = strip_tags( $new_instance[ 'plan_3' ] );
		$instance['features_3'] = strip_tags( $new_instance[ 'features_3' ] );
		$instance['price_3'] = strip_tags( $new_instance[ 'price_3' ] );
		$instance['buy_button_3'] = strip_tags( $new_instance[ 'buy_button_3' ] );
		$instance['buy_button_text_3'] = strip_tags( $new_instance[ 'buy_button_text_3' ] );
		$instance['buy_button_url_3'] = strip_tags( $new_instance[ 'buy_button_url_3' ] );
		$instance['plan_4'] = strip_tags( $new_instance[ 'plan_4' ] );
		$instance['features_4'] = strip_tags( $new_instance[ 'features_4' ] );
		$instance['price_4'] = strip_tags( $new_instance[ 'price_4' ] );
		$instance['buy_button_4'] = strip_tags( $new_instance[ 'buy_button_4' ] );
		$instance['buy_button_text_4'] = strip_tags( $new_instance[ 'buy_button_text_4' ] );
		$instance['buy_button_url_4'] = strip_tags( $new_instance[ 'buy_button_url_4' ] );
		$instance['style'] = strip_tags( $new_instance[ 'style' ] );
		$instance['animation'] = strip_tags( $new_instance[ 'animation' ] );
		$instance['num_columns'] = strip_tags( $new_instance[ 'num_columns' ] );
		$instance['plan_color_1'] = strip_tags( $new_instance[ 'plan_color_1' ] );
		$instance['price_color_1'] = strip_tags( $new_instance[ 'price_color_1' ] );
		$instance['button_color_1'] = strip_tags( $new_instance[ 'button_color_1' ] );
		$instance['plan_color_2'] = strip_tags( $new_instance[ 'plan_color_2' ] );
		$instance['price_color_2'] = strip_tags( $new_instance[ 'price_color_2' ] );
		$instance['button_color_2'] = strip_tags( $new_instance[ 'button_color_2' ] );
		$instance['plan_color_3'] = strip_tags( $new_instance[ 'plan_color_3' ] );
		$instance['price_color_3'] = strip_tags( $new_instance[ 'price_color_3' ] );
		$instance['button_color_3'] = strip_tags( $new_instance[ 'button_color_3' ] );
		$instance['plan_color_4'] = strip_tags( $new_instance[ 'plan_color_4' ] );
		$instance['price_color_4'] = strip_tags( $new_instance[ 'price_color_4' ] );
		$instance['button_color_4'] = strip_tags( $new_instance[ 'button_color_4' ] );
		
		return $instance;
	}

}

// Register and load the widget
function jsquare_pricing_table_widget() {
	register_widget( 'jsquare_pricing_table' );
}
add_action( 'widgets_init', 'jsquare_pricing_table_widget' );


// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_pricing_table_styles() {
	
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
add_action( 'widgets_init','jsquare_pricing_table_styles');


?>
