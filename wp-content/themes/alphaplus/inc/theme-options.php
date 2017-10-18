<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.3.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
	
	// Set Option Tree measurement units
	if ( ! function_exists( 'ot_filter_measurement_unit_types' ) ) {
	  function ot_filter_measurement_unit_types( $array, $field_id ) {
		return array(
		  'px' => 'px',
		  '%'  => '%'
		);
	  }
	}
	add_filter( 'ot_measurement_unit_types', 'ot_filter_measurement_unit_types', 10, 2 );
	
	function filter_typography_fields( $array, $field_id ) {

	   if ( $field_id == "headings_font") {
		  $array = array( 'font-family', 'font-size', 'font-weight', 'text-transform');
	   }
	   else if ( $field_id == "content_font") {
		  $array = array( 'font-family', 'font-size', 'font-weight', 'text-transform');
	   }

	   return $array;

	}

	add_filter( 'ot_recognized_typography_fields', 'filter_typography_fields', 10, 2 );
	
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
	
  $theme_url = get_template_directory();
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', 'alphaplus' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'alphaplus' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'alphaplus' ) . '</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => __( 'General Options', 'alphaplus' )
      ),
	  array(
		'id'          => 'layout_options',
		'title'       => __( 'Layout Options', 'alphaplus' )
	  ),
	  array(
		'id'          => 'widget_options',
		'title'       => __( 'Widget Positions', 'alphaplus' )
	  ),
	  array(
		'id'          => 'color_options',
		'title'       => __( 'Color Options', 'alphaplus' )
	  ),
		/*
      array(
        'id'          => 'category_options',
        'title'       => __( 'Category Options', 'alphaplus' )
      ),
      array(
        'id'          => 'post_options',
        'title'       => __( 'Post Options', 'alphaplus' )
      ), */
	  array(
		'id'          => 'video_options',
		'title'       => __( 'Video Options', 'alphaplus' )
	  ),
      array(
        'id'          => 'theme_info',
        'title'       => __( 'Theme Information', 'alphaplus' )
      )
    ),
	  
    'settings'        => array( 
		
		
	  array(
		  'id'          => 'theme_settings_tab',
		  'label'       => __( 'Site Settings', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'general_options',
	  ),
		  array(
			'id'          => 'basic_settings_title',
			'label'       => __( 'Site Settings', 'alphaplus' ),
			'desc'        => __( 'Choose the style you want to use on your site and select if you want to display posts on the homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'theme_style',
			'label'       => __( 'Theme Style', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'mall',
			'type'        => 'radio-image',
			'section'     => 'general_options',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value' 	=> 'blog',
					'src'       => get_template_directory_uri() . '/inc/images/blog.png',
					'label'     => __( 'Blog', 'alphaplus' ),
				),
				array(
					'value' 	=> 'coming-soon',
					'src'       => get_template_directory_uri() . '/inc/images/coming-soon.png',
					'label'     => __( 'Coming Soon', 'alphaplus' ),
				),
				array(
					'value' 	=> 'corporation',
					'src'       => get_template_directory_uri() . '/inc/images/corporation.png',
					'label'     => __( 'Corporation', 'alphaplus' ),
				),
				array(
					'value' 	=> 'gym',
					'src'       => get_template_directory_uri() . '/inc/images/gym.png',
					'label'     => __( 'Gym', 'alphaplus' ),
				),
				array(
					'value' 	=> 'mall',
					'src'       => get_template_directory_uri() . '/inc/images/mall.png',
					'label'     => __( 'Mall', 'alphaplus' ),
				),
				array(
					'value' 	=> 'photofolio',
					'src'       => get_template_directory_uri() . '/inc/images/photofolio.png',
					'label'     => __( 'Photofolio', 'alphaplus' ),
				),
				array(
					'value' 	=> 'photofolio-2',
					'src'       => get_template_directory_uri() . '/inc/images/photofolio-2.png',
					'label'     => __( 'Photofolio 2', 'alphaplus' ),
				),
				array(
					'value' 	=> 'product',
					'src'       => get_template_directory_uri() . '/inc/images/product.png',
					'label'     => __( 'Product', 'alphaplus' ),
				),
				array(
					'value' 	=> 'radio-station',
					'src'       => get_template_directory_uri() . '/inc/images/radio.png',
					'label'     => __( 'Radio Station', 'alphaplus' ),
				),
				array(
					'value' 	=> 'spa',
					'src'       => get_template_directory_uri() . '/inc/images/spa.png',
					'label'     => __( 'Spa', 'alphaplus' ),
				),
				array(
					'value' 	=> 'travel',
					'src'       => get_template_directory_uri() . '/inc/images/travel.png',
					'label'     => __( 'Travel', 'alphaplus' ),
				),
			),
		  ),
	  	  array(
			'id'          => 'homepage_posts',
			'label'       => __( 'Posts on homepage', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
	  array(
		  'id'          => 'logo_settings_tab',
		  'label'       => __( 'Logo', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'general_options',
	  ),
		  array(
			'id'          => 'logo_settings_title',
			'label'       => __( 'Logo & Favicon', 'alphaplus' ),
			'desc'        => __( 'Upload your site\'s logo and favicon.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'site_logo',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => __( 'Upload the logo of your site', 'alphaplus' ),
			'std'         => '',
			'type'        => 'upload',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'site_favicon',
			'label'       => __( 'Favicon', 'alphaplus' ),
			'desc'        => __( 'Upload the favicon of your site', 'alphaplus' ),
			'std'         => '',
			'type'        => 'upload',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
	  array(
		  'id'          => 'footer_tab',
		  'label'       => __( 'Footer', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'general_options',
	  ),
		  array(
			'id'          => 'footer_settings_title',
			'label'       => __( 'Footer Settings', 'alphaplus' ),
			'desc'        => __( 'Add the Copyright and choose if you want to display a "To Top" button.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'copyright',
			'label'       => __( 'Copyright', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'Copyright 2017 A+',
			'type'        => 'text',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'totop_button',
			'label'       => __( 'Totop Button', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
	  array(
		  'id'          => 'scripts_tab',
		  'label'       => __( 'Scripts', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'general_options',
	  ),
		  array(
			'id'          => 'scripts_settings_title',
			'label'       => __( 'Scripts', 'alphaplus' ),
			'desc'        => __( 'Add Google Analytics code and your custom JavaScript to the header or footer of the site.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'general_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'google_analytics',
			'label'       => __( 'Google Analytics', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea-simple',
			'section'     => 'general_options',
			'rows'        => '5',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'head_js',
			'label'       => __( 'JavaScript Code', 'alphaplus' ),
			'desc'        => htmlspecialchars(__( 'It will be added before &lt;/head&gt;', 'alphaplus' )),
			'std'         => '',
			'type'        => 'textarea-simple',
			'section'     => 'general_options',
			'rows'        => '10',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'body_js',
			'label'       => __( 'JavaScript Code', 'alphaplus' ),
			'desc'        => htmlspecialchars(__( 'It will be added before &lt;/body&gt;', 'alphaplus' )),
			'std'         => '',
			'type'        => 'textarea-simple',
			'section'     => 'general_options',
			'rows'        => '10',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'general_layout_tab',
		  'label'       => __( 'General', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'general_section_width',
			'label'       => __( 'General Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width for main content and sidebar.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'main-width',
			'label'       => __( 'Main Content Width', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'right-sidebar-width',
			'label'       => __( 'Right Sidebar Width', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'blog_tab',
		  'label'       => __( 'Blog', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'blog_layout_width',
			'label'       => __( 'Blog - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Blog" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'blog-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-navigation-width',
			'label'       => __( 'Navigation', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-social-width',
			'label'       => __( 'Social', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-main-left-width',
			'label'       => __( 'Main Left', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-6',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-main-right-width',
			'label'       => __( 'Main Right', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-6',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'blog-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
	  array(
		  'id'          => 'corporation_tab',
		  'label'       => __( 'Corporation', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'corporation_layout_width',
			'label'       => __( 'Corporation - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Corporation" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'corporation-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-navigation-width',
			'label'       => __( 'Navigation', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-footer-4-width',
			'label'       => __( 'Footer 4', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'corporation-footer-5-width',
			'label'       => __( 'Footer 5', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
	  array(
		  'id'          => 'gym_tab',
		  'label'       => __( 'Gym', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'gym_layout_width',
			'label'       => __( 'Gym - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Gym" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'gym-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'gym-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'gym-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
	  array(
		  'id'          => 'mall_tab',
		  'label'       => __( 'Mall', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'mall_layout_width',
			'label'       => __( 'Mall - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Mall" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'mall-header-widget-width',
			'label'       => __( 'Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'mall-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'mall-social-width',
			'label'       => __( 'Social', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'mall-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'mall-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
	  array(
		  'id'          => 'photofolio_tab',
		  'label'       => __( 'Photofolio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'photofolio_layout_width',
			'label'       => __( 'Photofolio - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Photofolio" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'photofolio-header-width',
			'label'       => __( 'Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-social-width',
			'label'       => __( 'Social', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-footer-1-width',
			'label'       => __( 'Footer-1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'photofolio_2_tab',
		  'label'       => __( 'Photofolio 2', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'photofolio_2_layout_width',
			'label'       => __( 'Photofolio 2 - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Photofolio 2" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'photofolio-2-header-width',
			'label'       => __( 'Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-9',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-2-social-width',
			'label'       => __( 'Social', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-2-footer-1-width',
			'label'       => __( 'Footer-1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'photofolio-2-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'product_tab',
		  'label'       => __( 'Product', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'product_layout_width',
			'label'       => __( 'Product - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Product" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'product-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'product-header-width',
			'label'       => __( 'Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'radio_tab',
		  'label'       => __( 'Radio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'radio_layout_width',
			'label'       => __( 'Radio Station - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Radio Station" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'radio-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-nav-width',
			'label'       => __( 'Navigation', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-8',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-player-width',
			'label'       => __( 'Header Widget', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-2',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-program-width',
			'label'       => __( 'Program', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-6',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-charts-width',
			'label'       => __( 'Charts', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-6',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		array(
			'id'          => 'radio-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		array(
			'id'          => 'radio-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'radio-footer-4-width',
			'label'       => __( 'Footer 4', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'spa_tab',
		  'label'       => __( 'Spa', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'spa_layout_width',
			'label'       => __( 'Spa - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Spa" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'spa-header-widget-width',
			'label'       => __( 'Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'spa-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'spa-social-width',
			'label'       => __( 'Social', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'spa-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'spa-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'spa-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-4',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		
		
	  array(
		  'id'          => 'travel_tab',
		  'label'       => __( 'Travel', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'layout_options',
	  ),
		  array(
			'id'          => 'travel_layout_width',
			'label'       => __( 'Travel - Layout Options', 'alphaplus' ),
			'desc'        => __( 'Define the width of the following widget areas for "Travel" style.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'layout_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'travel-logo-width',
			'label'       => __( 'Logo', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'travel-right-header-width',
			'label'       => __( 'Right Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-9',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'travel-footer-1-width',
			'label'       => __( 'Footer 1', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'travel-footer-2-width',
			'label'       => __( 'Footer 2', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'travel-footer-3-width',
			'label'       => __( 'Footer 3', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		array(
			'id'          => 'travel-footer-4-width',
			'label'       => __( 'Footer 4', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'col-md-3',
			'type'        => 'select',
			'section'     => 'layout_options',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( 'Choose Bootstrap class', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-1',
				'label'       => __( 'col-md-1', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-2',
				'label'       => __( 'col-md-2', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-3',
				'label'       => __( 'col-md-3', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-4',
				'label'       => __( 'col-md-4', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-5',
				'label'       => __( 'col-md-5', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-6',
				'label'       => __( 'col-md-6', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-7',
				'label'       => __( 'col-md-7', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-8',
				'label'       => __( 'col-md-8', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-9',
				'label'       => __( 'col-md-9', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-10',
				'label'       => __( 'col-md-10', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-11',
				'label'       => __( 'col-md-11', 'alphaplus' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'col-md-12',
				'label'       => __( 'col-md-12', 'alphaplus' ),
				'src'         => ''
			  )
			)
		  ),
		/*
		  array(
			'id'          => 'category_options_sep',
			'label'       => '',
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'category_options',
			'operator'    => 'and'
		  ),
		array(
			'id'          => 'category_options_title',
			'label'       => __( 'Category Options', 'alphaplus' ),
			'desc'        => __( 'Choose the post\'s info you want to display on the "Category / Archive" page.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'category_options',
			'operator'    => 'and'
		  ),
      array(
        'id'          => 'cat_date_visibility',
        'label'       => __( 'Display Date', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'category_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'cat_author_visibility',
        'label'       => __( 'Display Author', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'category_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'cat_comments_visibility',
        'label'       => __( 'Display Comments Counter', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'category_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'cat_category_visibility',
        'label'       => __( 'Display Category', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'category_options',
        'operator'    => 'and'
      ),
		
		
		
		  array(
			'id'          => 'post_options_sep',
			'label'       => '',
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'post_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'post_options_title',
			'label'       => __( 'Post Options', 'alphaplus' ),
			'desc'        => __( 'Choose the post\'s info you want to display on the "Single Post" page.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'post_options',
			'operator'    => 'and'
		  ),
      array(
        'id'          => 'post_date_visibility',
        'label'       => __( 'Display Date', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'post_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_author_visibility',
        'label'       => __( 'Display Author', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'post_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_comments_visibility',
        'label'       => __( 'Display Comments Counter', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'post_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_category_visibility',
        'label'       => __( 'Display Category', 'alphaplus' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'post_options',
        'operator'    => 'and'
      ),
		*/
		
	  array(
		  'id'          => 'blog_widgets_tab',
		  'label'       => __( 'Blog', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'blog_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_main_top',
			'label'       => __( 'Main Top', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_main_left',
			'label'       => __( 'Main Left', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_main_right',
			'label'       => __( 'Main Right', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_main_bottom',
			'label'       => __( 'Main Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_bottom',
			'label'       => __( 'Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_main_top',
			'label'       => __( 'Main Top', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_main_left',
			'label'       => __( 'Main Left', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_main_right',
			'label'       => __( 'Main Right', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_main_bottom',
			'label'       => __( 'Main Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_bottom',
			'label'       => __( 'Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'blog_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'corporation_widgets_tab',
		  'label'       => __( 'Corporation', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'corporation_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_why_us',
			'label'       => __( 'Why us', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_blog',
			'label'       => __( 'Blog', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_counter',
			'label'       => __( 'Counter', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_why_us',
			'label'       => __( 'Why us', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_blog',
			'label'       => __( 'Blog', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_counter',
			'label'       => __( 'Counter', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'gym_widgets_tab',
		  'label'       => __( 'Gym', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'gym_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_maintop',
			'label'       => __( 'Main Top', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_classes',
			'label'       => __( 'Classes', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_program',
			'label'       => __( 'Program', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_trainers',
			'label'       => __( 'Trainers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_tips',
			'label'       => __( 'Tips', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_shop',
			'label'       => __( 'Shop', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_maintop',
			'label'       => __( 'Main Top', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_classes',
			'label'       => __( 'Classes', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_program',
			'label'       => __( 'Program', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_trainers',
			'label'       => __( 'Trainers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_tips',
			'label'       => __( 'Tips', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_offers',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_shop',
			'label'       => __( 'Shop', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'mall_widgets_tab',
		  'label'       => __( 'Mall', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'mall_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_stores',
			'label'       => __( 'Stores', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_info',
			'label'       => __( 'Info', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_stores',
			'label'       => __( 'Stores', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_info',
			'label'       => __( 'Info', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'photofolio_widgets_tab',
		  'label'       => __( 'Photofolio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'photofolio_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'photofolio_2_widgets_tab',
		  'label'       => __( 'Photofolio 2', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'photofolio_2_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_recent_work',
			'label'       => __( 'Recent Work', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_blog',
			'label'       => __( 'Blog', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_catalogue',
			'label'       => __( 'Catalogue', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_recent_work',
			'label'       => __( 'Recent Work', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_blog',
			'label'       => __( 'Blog', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_catalogue',
			'label'       => __( 'Catalogue', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'product_widgets_tab',
		  'label'       => __( 'Product', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'product_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_features',
			'label'       => __( 'Features', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_pricing',
			'label'       => __( 'Pricing', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_bottom',
			'label'       => __( 'Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_sponsors',
			'label'       => __( 'Sponsors', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_features',
			'label'       => __( 'Features', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_pricing',
			'label'       => __( 'Pricing', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_testimonials',
			'label'       => __( 'Testimonials', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_bottom',
			'label'       => __( 'Bottom', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_sponsors',
			'label'       => __( 'Sponsors', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'radio_widgets_tab',
		  'label'       => __( 'Radio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_team',
			'label'       => __( 'Team', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_program',
			'label'       => __( 'Program', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_charts',
			'label'       => __( 'Charts', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_app',
			'label'       => __( 'App Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_team',
			'label'       => __( 'Team', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_program',
			'label'       => __( 'Program', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_charts',
			'label'       => __( 'Charts', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_app',
			'label'       => __( 'App Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'spa_widgets_tab',
		  'label'       => __( 'Spa', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'spa_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_pricing',
			'label'       => __( 'Pricing', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_team',
			'label'       => __( 'Team', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_about',
			'label'       => __( 'About', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_services',
			'label'       => __( 'Services', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_events',
			'label'       => __( 'Events', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_pricing',
			'label'       => __( 'Pricing', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_team',
			'label'       => __( 'Team', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_contact',
			'label'       => __( 'Contact', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'travel_widgets_tab',
		  'label'       => __( 'Travel', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'widget_options',
	  ),	
		  array(
			'id'          => 'travel_homepage_widgets',
			'label'       => __( 'Homepage', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s homepage.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_top_destinations',
			'label'       => __( 'Top Destinations', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_destinations',
			'label'       => __( 'Destinations', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_activities',
			'label'       => __( 'Activities', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_newsletter',
			'label'       => __( 'Newsletter', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_home_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_widgets',
			'label'       => __( 'Page', 'alphaplus' ),
			'desc'        => __( 'Select the widgets you want to display on your site\'s pages.', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_showcase',
			'label'       => __( 'Showcase', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_top_destinations',
			'label'       => __( 'Top Destinations', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_destinations',
			'label'       => __( 'Destinations', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_activities',
			'label'       => __( 'Activities', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_offers',
			'label'       => __( 'Offers', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_news',
			'label'       => __( 'News', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_newsletter',
			'label'       => __( 'Newsletter', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_page_sidebar',
			'label'       => __( 'Sidebar', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'widget_options',
			'operator'    => 'and'
		  ),
		
		
		  array(
			'id'          => 'video_options_sep',
			'label'       => '',
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'video_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'video_options_title',
			'label'       => __( 'Video Options', 'alphaplus' ),
			'desc'        => __( 'Add the background video URL for the following sections', 'alphaplus' ),
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'video_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'events_bg_video',
			'label'       => __( 'Radio Station: "Events" Section', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'video_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_bg_video',
			'label'       => __( 'Spa: "Showcase" Section', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'video_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_bg_video',
			'label'       => __( 'Photofolio 2: "Showcase" Section', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'video_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'coming_soon_color_tab',
		  'label'       => __( 'Coming Soon', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'coming_soon_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'coming_soon_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(24, 24, 24, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'coming_soon_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'coming_soon_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'coming_soon_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#e2e2e2',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'coming_soon_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'corporation_color_tab',
		  'label'       => __( 'Corporation', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'corporation_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#2c6392',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#585858',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#fdfdfd',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#7d7d7d',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#7d7d7d',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'corporation_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
	  array(
		  'id'          => 'gym_color_tab',
		  'label'       => __( 'Gym', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'gym_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#f9f9f9',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#e62631',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#e2e2e2',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'gym_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
	  array(
		  'id'          => 'mall_color_tab',
		  'label'       => __( 'Mall', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'mall_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#f7f7f7',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_headlines_decor_color',
			'label'       => __( 'Headlines Decoration', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#01aacd',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#1fb8e0',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#626262',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#1fb8e0',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#1d1d1d',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#f7f7f7',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'mall_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'photofolio_color_tab',
		  'label'       => __( 'Photofolio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'photofolio_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#008aa7',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(24, 24, 24, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#b6b6b6',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#b6b6b6',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(0, 0, 0, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
		
		
	  array(
		  'id'          => 'photofolio_2_color_tab',
		  'label'       => __( 'Photofolio 2', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'photofolio_2_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#282828',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#fc3468',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#da2856',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(24, 24, 24, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#b6b6b6',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#b6b6b6',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(0, 0, 0, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.95)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photofolio_2_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
		
		
	  array(
		  'id'          => 'product_color_tab',
		  'label'       => __( 'Product', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'product_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#727272',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#7fc2dc',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#3583a0',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#727272',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#484848',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#7fc2dc',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#1f1f1f',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'product_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'radio_color_tab',
		  'label'       => __( 'Radio', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'radio_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#444648',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#171313',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#e8e8e8',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#f0f0f0',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'radio_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
		
	  array(
		  'id'          => 'spa_color_tab',
		  'label'       => __( 'Spa', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'spa_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#333333',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#a9578f',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_header_colors',
			'label'       => __( 'Header Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_top_header_bg_color',
			'label'       => __( 'Top Header', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#733760',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_header_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_menu_bg_color',
			'label'       => __( 'Navigation', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#f9f9f9',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_header_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#a9588f',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_header_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#a9588f',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_header_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_1_bg_color',
			'label'       => __( 'Footer 1 Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#773e65',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_2_bg_color',
			'label'       => __( 'Footer 2 Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#9a668a',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_3_bg_color',
			'label'       => __( 'Footer 3 Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#b77fa6',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#e8e8e8',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.8)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'spa_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
	  array(
		  'id'          => 'travel_color_tab',
		  'label'       => __( 'Travel', 'alphaplus' ),
		  'type'        => 'tab',
		  'section'     => 'color_options',
	  ),
		  array(
			'id'          => 'travel_general_colors',
			'label'       => __( 'General Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_headlines_decor_color',
			'label'       => __( 'Headlines Decoration', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#158bbc',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#222222',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#158bbc',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#000000',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_newsletter_colors',
			'label'       => __( 'Newsletter Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_newsletter_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#158bbc',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_newsletter_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_newsletter_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => 'rgba(255, 255, 255, 0.9)',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_colors',
			'label'       => __( 'Footer Colors', 'alphaplus' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textblock-titled',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_bg_color',
			'label'       => __( 'Background', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#2c2c2c',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_headlines_color',
			'label'       => __( 'Headlines', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_text_color',
			'label'       => __( 'Text', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#c7c7c7',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_link_color',
			'label'       => __( 'Link', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#c7c7c7',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'travel_footer_link_hover_color',
			'label'       => __( 'Link Hover', 'alphaplus' ),
			'desc'        => '',
			'std'         => '#ffffff',
			'type'        => 'colorpicker-opacity',
			'section'     => 'color_options',
			'operator'    => 'and'
		  ),
		
      array(
        'id'          => 'theme_info',
        'label'       => __( 'Theme Information', 'alphaplus' ),
        'desc'        => __( '<p>A+ | Multipurpose WordPress Theme.</p><table style="width: 90%"><tr><td><strong>Version:</strong></td><td>1.0.0</td></tr><tr><td><strong>Created by:</strong></td><td><a href="http://www.jsquare-themes.com" title="JSquare Themes">JSquare Themes</a></td></tr><tr><td><strong>Documentation:</strong> </td><td><a href="http://www.jsquare-themes.com/docs/themes/alphaplus/">Official Website</a></td></tr><tr><td><strong>Support:</strong></td><td>Please, visit this <a href="#">page</a>. Note, that only verified customers can get access to technical support for this theme.</td></tr></table>', 'alphaplus' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'theme_info',
        'operator'    => 'and'
      ),
	)
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}