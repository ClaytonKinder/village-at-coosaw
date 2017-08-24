<?php

	register_sidebar( array(
		'name'          => esc_html__( 'Social', 'alphaplus' ),
		'id'            => 'social',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Showcase', 'alphaplus' ),
		'id'            => 'showcase',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Showcase Form', 'alphaplus' ),
		'id'            => 'showcase-form',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Features', 'alphaplus' ),
		'id'            => 'features',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pricing', 'alphaplus' ),
		'id'            => 'pricing',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Testimonials', 'alphaplus' ),
		'id'            => 'testimonials',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Bottom', 'alphaplus' ),
		'id'            => 'bottom',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sponsors', 'alphaplus' ),
		'id'            => 'sponsors',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alphaplus' ),
		'id'            => 'sidebar-product',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
?>