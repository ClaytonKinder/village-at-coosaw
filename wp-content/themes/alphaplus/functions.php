<?php
/**
 * A+ functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package A+
 */


require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'alphaplus_register_required_plugins' );

/* OptionTree Functions */
if ( ! function_exists( 'ot_options_id' ) ) {
  function ot_options_id() {
    return apply_filters( 'ot_options_id', 'option_tree' );
  }
}

if ( ! function_exists( 'ot_get_option' ) ) {
  function ot_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( ot_options_id() );
    
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
        
      return ot_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}

/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options    
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_wpml_filter' ) ) {

  function ot_wpml_filter( $options, $option_id ) {
      
    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {
      
      $settings = get_option( ot_settings_id() );
      
      if ( isset( $settings['settings'] ) ) {
      
        foreach( $settings['settings'] as $setting ) {
          
          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // List Item & Slider
          } else if ( $option_id == $setting['id'] && $setting['type'] == 'social-links' ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
          
            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
            
            if ( ! empty( $_string ) ) {
            
              $options[$option_id] = $_string;
              
            }
            
          }
          
        }
      
      }
    
    }
    
    return $options[$option_id];
  
  }

}

function alphaplus_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => esc_html__('JT Posts Showcase', 'alphaplus'),
			'slug'               => 'jt-posts-showcase',
			'source'             => get_template_directory() . '/inc/plugins/jt-posts-showcase.zip',
			'required'           => false,
			'version'            => '1.3.1',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Travel Booking', 'alphaplus'),
			'slug'               => 'jt-travel-booking', 
			'source'             => get_template_directory() . '/inc/plugins/jt-travel-booking.zip', 
			'required'           => false,
			'version'            => '2.1.0', 
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Social Links', 'alphaplus'),
			'slug'               => 'jt-social-links',
			'source'             => get_template_directory() . '/inc/plugins/jt-social-links.zip',
			'required'           => false, 
			'version'            => '1.1.0', 
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Users List', 'alphaplus'),
			'slug'               => 'jt-users-list',
			'source'             => get_template_directory() . '/inc/plugins/jt-users-list.zip', 
			'required'           => false,
			'version'            => '1.1.0',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Animated Counter', 'alphaplus'), 
			'slug'               => 'jt-animated-counter',
			'source'             => get_template_directory() . '/inc/plugins/jt-animated-counter.zip',
			'required'           => false,
			'version'            => '1.0.0',
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Testimonials', 'alphaplus'), 
			'slug'               => 'jt-testimonials',
			'source'             => get_template_directory() . '/inc/plugins/jt-testimonials.zip', 
			'required'           => false,
			'version'            => '1.0.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Event Calendar', 'alphaplus'), 
			'slug'               => 'jt-event-calendar',
			'source'             => get_template_directory() . '/inc/plugins/jt-event-calendar.zip', 
			'required'           => false,
			'version'            => '3.2.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Schedule', 'alphaplus'), 
			'slug'               => 'jt-schedule',
			'source'             => get_template_directory() . '/inc/plugins/jt-schedule.zip', 
			'required'           => false,
			'version'            => '2.0.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Brands', 'alphaplus'), 
			'slug'               => 'jt-brands',
			'source'             => get_template_directory() . '/inc/plugins/jt-brands.zip', 
			'required'           => false,
			'version'            => '2.0.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Portfolio', 'alphaplus'), 
			'slug'               => 'jt-portfolio',
			'source'             => get_template_directory() . '/inc/plugins/jt-portfolio.zip', 
			'required'           => false,
			'version'            => '2.1.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Pricing Table', 'alphaplus'), 
			'slug'               => 'jt-pricing-table',
			'source'             => get_template_directory() . '/inc/plugins/jt-pricing-table.zip', 
			'required'           => false,
			'version'            => '1.2.1',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Products Showcase', 'alphaplus'), 
			'slug'               => 'jt-products-showcase',
			'source'             => get_template_directory() . '/inc/plugins/jt-products-showcase.zip', 
			'required'           => false,
			'version'            => '1.1.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Music Charts', 'alphaplus'), 
			'slug'               => 'jt-music-charts',
			'source'             => get_template_directory() . '/inc/plugins/jt-music-charts.zip', 
			'required'           => false,
			'version'            => '1.0.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html__('JT Program', 'alphaplus'), 
			'slug'               => 'jt-program',
			'source'             => get_template_directory() . '/inc/plugins/jt-program.zip', 
			'required'           => false,
			'version'            => '1.0.0',
			'force_activation'   => false,
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '',
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'OptionTree',
			'slug'      => 'option-tree',
			'required'  => true,
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'      => 'Smart Slider 3',
			'slug'      => 'smart-slider-3',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Email Subscribers & Newsletters',
			'slug'      => 'email-subscribers',
			'required'  => false,
		),
	);
	
	tgmpa( $plugins );
}

if ( ! function_exists( 'alphaplus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alphaplus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on A+, use a find and replace
	 * to change 'alphaplus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alphaplus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'alphaplus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alphaplus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'alphaplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alphaplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alphaplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'alphaplus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alphaplus_widgets_init() {
	
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}
	
	if ($theme_style == 'blog') {
		include ( get_template_directory() . '/template-parts/styles/blog/widgets.php' );
	}
	else if ($theme_style == 'coming-soon') {
		include ( get_template_directory() . '/template-parts/styles/coming-soon/widgets.php' );
	}
	else if ($theme_style == 'corporation') {
		include ( get_template_directory() . '/template-parts/styles/corporation/widgets.php' );
	}
	else if ($theme_style == 'gym') {
		include ( get_template_directory() . '/template-parts/styles/gym/widgets.php' );
	}
	else if ($theme_style == 'mall') {
		include ( get_template_directory() . '/template-parts/styles/mall/widgets.php' );
	}
	else if ($theme_style == 'photofolio') {
		include ( get_template_directory() . '/template-parts/styles/photofolio/widgets.php' );
	}
	else if ($theme_style == 'photofolio-2') {
		include ( get_template_directory() . '/template-parts/styles/photofolio-2/widgets.php' );
	}
	else if ($theme_style == 'product') {
		include ( get_template_directory() . '/template-parts/styles/product/widgets.php' );
	}
	else if ($theme_style == 'radio-station') {
		include ( get_template_directory() . '/template-parts/styles/radio-station/widgets.php' );
	}
	else if ($theme_style == 'spa') {
		include ( get_template_directory() . '/template-parts/styles/spa/widgets.php' );
	}
	else if ($theme_style == 'travel') {
		include ( get_template_directory() . '/template-parts/styles/travel/widgets.php' );
	}
}
add_action( 'widgets_init', 'alphaplus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alphaplus_scripts() {
	wp_enqueue_style( 'alphaplus-style', get_stylesheet_uri() );
	wp_enqueue_style( 'uikit', get_template_directory_uri() . '/css/uikit.css');
	wp_enqueue_script( 'uikit', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'));
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_style( 'sticky.css', get_template_directory_uri() . '/css/sticky.min.css');
	wp_enqueue_script( 'sticky.js', get_template_directory_uri() . '/js/sticky.min.js');
	wp_enqueue_script( 'scripts.js', get_template_directory_uri() . '/js/scripts.js');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_script( 'alphaplus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'alphaplus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}
	
	if ($theme_style == 'blog') {
		wp_enqueue_style( 'alphaplus-blog-css', get_template_directory_uri() . '/css/styles/blog/blog.css');
		wp_style_add_data( 'alphaplus-blog-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/blog.php' );
	}
	else if ($theme_style == 'coming-soon') {
		wp_enqueue_style( 'alphaplus-coming-soon-css', get_template_directory_uri() . '/css/styles/coming-soon/coming-soon.css');
		wp_style_add_data( 'alphaplus-coming-soon-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/coming-soon.php' );
	}
	else if ($theme_style == 'corporation') {
		wp_enqueue_style( 'alphaplus-corporation-css', get_template_directory_uri() . '/css/styles/corporation/corporation.css');
		wp_style_add_data( 'alphaplus-corporation-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/corporation.php' );
	}
	else if ($theme_style == 'gym') {
		wp_enqueue_style( 'alphaplus-gym-css', get_template_directory_uri() . '/css/styles/gym/gym.css');
		wp_style_add_data( 'alphaplus-gym-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/gym.php' );
	}
	else if ($theme_style == 'mall') {
		wp_enqueue_style( 'alphaplus-mall-css', get_template_directory_uri() . '/css/styles/mall/mall.css');
		wp_style_add_data( 'alphaplus-mall-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/mall.php' );
	}
	else if ($theme_style == 'photofolio') {
		wp_enqueue_style( 'alphaplus-photofolio-css', get_template_directory_uri() . '/css/styles/photofolio/photofolio.css');
		wp_style_add_data( 'alphaplus-photofolio-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/photofolio.php' );
	}
	else if ($theme_style == 'photofolio-2') {
		wp_enqueue_style( 'alphaplus-photofolio-2-css', get_template_directory_uri() . '/css/styles/photofolio-2/photofolio-2.css');
		wp_style_add_data( 'alphaplus-photofolio-2-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/photofolio-2.php' );
	}
	else if ($theme_style == 'product') {
		wp_enqueue_style( 'alphaplus-product-css', get_template_directory_uri() . '/css/styles/product/product.css');
		wp_style_add_data( 'alphaplus-product-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/product.php' );
	}
	else if ($theme_style == 'radio-station') {
		wp_enqueue_style( 'alphaplus-radio-css', get_template_directory_uri() . '/css/styles/radio-station/radio-station.css');
		wp_style_add_data( 'alphaplus-radio-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/radio.php' );
	}
	else if ($theme_style == 'spa') {
		wp_enqueue_style( 'alphaplus-spa-css', get_template_directory_uri() . '/css/styles/spa/spa.css');
		wp_style_add_data( 'alphaplus-spa-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/spa.php' );
	}
	else if ($theme_style == 'travel') {
		wp_enqueue_style( 'alphaplus-travel-css', get_template_directory_uri() . '/css/styles/travel/travel.css');
		wp_style_add_data( 'alphaplus-travel-css', 'rtl', 'replace' );
		include ( get_template_directory() . '/inc/colors/travel.php' );
	}
}
add_action( 'wp_enqueue_scripts', 'alphaplus_scripts' );

function google_fonts() {
	$query_args = array(
		'family' => 'Roboto+Slab%7CDroid+Sans%7CNoto+Sans%7CCherry+Swash%7CLato%7CDamion%7CCardo%7CRoboto+Condensed',
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'google_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_filter( 'nav_menu_link_attributes', 'menu_item_attrs', 10, 3 );
function menu_item_attrs( $atts, $item, $args )
{
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$theme_style = ot_get_option('theme_style');
	}
	else {
		$theme_style = 'mall';
	}
	
	if ($theme_style == 'corporation') {
		return $atts;
	}
	else if ($theme_style == 'blog') {
		return $atts;
	}
	else if ($theme_style != 'photofolio') {
		if ( is_home() ) {
			// Add custom attribute to menu items
			$atts['data-uk-smooth-scroll'] = ' ';
			return $atts;
		}
		else {
			$atts['href'] = site_url() . '/' . $atts['href'];
			return $atts;
		}
	}
	else if ($theme_style == 'photofolio') {
		if ( is_home() ) {
			// Add custom attribute to menu items
			$atts['data-uk-modal'] = ' ';
			return $atts;
		}
		else {
			$atts['href'] = site_url() . '/' . $atts['href'];
			return $atts;
		}
	}
}


/**
 * Remove "Category:", "Tag:", "Author:" from their titles
 */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;
});

/**
 * WooCommerce
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/* Theme Options CSS */
function theme_options_css() {
	wp_enqueue_style( 'alphaplus-theme-options.css', get_template_directory_uri() . '/inc/admin-css/theme-options.css');
}
add_action( 'admin_enqueue_scripts', 'theme_options_css' );