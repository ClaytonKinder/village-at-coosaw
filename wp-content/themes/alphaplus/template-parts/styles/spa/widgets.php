<?php

	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Left', 'alphaplus' ),
		'id'            => 'top-header-left',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Right', 'alphaplus' ),
		'id'            => 'top-header-right',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'alphaplus' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

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
		'name'          => esc_html__( 'About', 'alphaplus' ),
		'id'            => 'about',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Services', 'alphaplus' ),
		'id'            => 'services',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Events', 'alphaplus' ),
		'id'            => 'events',
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
		'name'          => esc_html__( 'Offers', 'alphaplus' ),
		'id'            => 'offers',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Team', 'alphaplus' ),
		'id'            => 'team',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact', 'alphaplus' ),
		'id'            => 'contact',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alphaplus' ),
		'id'            => 'sidebar-spa',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'alphaplus' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'alphaplus' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'alphaplus' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
?>