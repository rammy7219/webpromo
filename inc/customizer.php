<?php
/**
 * WebPromo Theme Customizer
 *
 * @package WebPromo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function webpromo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'webpromo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'webpromo_customize_partial_blogdescription',
		) );
	}

	// Showcase Section
	$wp_customize->add_section('showcase', array(
		'title'	=> __('Showcase', 'webpromo'),
		'description'	=> sprintf(__('Options for showcase','webpromo')),
		'priority'		=> 130
	));

	$wp_customize->add_setting('showcase_image', array(
		'default'	=>	get_bloginfo('template_directory').'/img/showcase.jpg',
		'type'		=> 'theme_mod'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_image', array(
		'label'		=> __('Showcase Image', 'webpromo'),
		'section'	=> 'showcase',
		'settings'	=> 'showcase_image',
		'priority'	=> 1
	)));

	$wp_customize->add_setting('showcase_heading', array(
		'default'	=> _x('web2dezine', 'webpromo'),
		'type'		=> 'theme_mod'
	));

	$wp_customize->add_control('showcase_heading', array(
		'label'		=> __('Heading', 'webpromo'),
		'section'	=> 'showcase',
		'priority'	=> 2
	));

	$wp_customize->add_setting('showcase_text', array(
		'default'	=> _x('Making The Internet Work For You!', 'webpromo'),
		'type'		=> 'theme_mod'
	));

	$wp_customize->add_control('showcase_text', array(
		'label'		=> __('Text', 'webpromo'),
		'section'	=> 'showcase',
		'priority'	=> 3
	));

	$wp_customize->add_setting('btn_url', array(
		'default'	=> _x('http://web2dezine.com', 'webpromo'),
		'type'		=> 'theme_mod'
	));

	$wp_customize->add_control('btn_url', array(
		'label'		=> __('Button URL', 'webpromo'),
		'section'	=> 'showcase',
		'priority'	=> 4
	));

	$wp_customize->add_setting('btn_text', array(
		'default'	=> _x('Read More', 'webpromo'),
		'type'		=> 'theme_mod'
	));

	$wp_customize->add_control('btn_text', array(
		'label'		=> __('Button Text', 'webpromo'),
		'section'	=> 'showcase',
		'priority'	=> 5
	));
}
add_action( 'customize_register', 'webpromo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function webpromo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function webpromo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function webpromo_customize_preview_js() {
	wp_enqueue_script( 'webpromo-customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'webpromo_customize_preview_js' );
