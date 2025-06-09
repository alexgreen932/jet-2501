<?php
/**
 * Jet 2500 Theme Customizer
 *
 * @package Jet_2500
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function jet_customize_register($wp_customize)
{

	// Keep existing settings (site title, description, etc.)
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	// -----------------------------

	// Panels
	$wp_customize->add_panel('header_panel', [
		'title' => 'Customize Header',
		'priority' => 10,
	]);

	require_once 'customizer/JetToggleControl.php';//for note control
	require_once 'customizer/controls.php';
	include 'customizer/header.php';
	// include 'customizer/topbar.php';
	// include 'customizer/subheader.php';
	// include 'customizer/menus.php';



	// -----------------------------
	// ✨ Custom Section: Header
	// $wp_customize->add_section('header_customizing', array(
	// 	'title'    => __('Header Customizing', 'jet'),
	// 	'priority' => 50,
	// ));

	// Background color setting for Header
	// $wp_customize->add_setting('header_bg_color', array(
	// 	'default'   => '#ffffff',
	// 	'transport' => 'postMessage',
	// ));
	// $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
	// 	'label'    => __('Header Background Color', 'jet'),
	// 	'section'  => 'header_customizing',
	// 	'settings' => 'header_bg_color',
	// )));

	// Header color class (e.g. "c-blue")
	// $wp_customize->add_setting('header_text_color_class', array(
	// 	'default'   => 'c-black',
	// 	'transport' => 'postMessage',
	// ));
	// $wp_customize->add_control('header_text_color_class', array(
	// 	'label'   => __('Header Text Color Class', 'jet'),
	// 	'type'    => 'select',
	// 	'section' => 'header_customizing',
	// 	'settings' => 'header_text_color_class',
	// 	'choices' => array(
	// 		'c-black' => 'Black',
	// 		'c-white' => 'White',
	// 		'c-red'   => 'Red',
	// 		'c-blue'  => 'Blue',
	// 	),
	// ));

	// -----------------------------
	// ✨ Media Logo Upload
	// $wp_customize->add_setting('site_logo', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh', // Usually needs page reload
	// ));
	// $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
	// 	'label'    => __('Upload Logo', 'jet'),
	// 	'section'  => 'header_customizing',
	// 	'settings' => 'site_logo',
	// )));
}
add_action('customize_register', 'jet_customize_register');


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function jet_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function jet_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jet_customize_preview_js()
{
	wp_enqueue_script('jet-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'jet_customize_preview_js');
