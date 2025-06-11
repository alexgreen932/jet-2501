<?php
// dd('test');

// Custom Section: Logo
$wp_customize->add_section(
	'logo_customizing',
	array(
		'title'    => __( 'Logo Customizing', 'jet' ),
		'priority' => 40,
	)
);

// jet_field(
// $wp_customize,
// array(
// 'section' => 'logo_customizing',
// 'option' => 'use_topbar',
// 'label' => 'Use Logo',
// 'default' => false,
// ),
// 'yes_no',
// );

// jet_field(
// $wp_customize,
// array(
// 'section' => 'logo_customizing',
// 'option' => 'topbar_justify',
// 'label' => 'Justify Content',
// 'default' => 'jc-b',
// ),
// 'justify',
// );

// jet_field(
// $wp_customize,
// array(
// 'section' => 'logo_customizing',
// 'option' => 'logo_img',
// 'label' => 'Select Image',
// ),
// null,
// 'image',
// );

// Background color setting for Logo
$wp_customize->add_setting(
	'topbar_bg_color',
	array(
		'default'   => '#f8f8f8',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'topbar_bg_color',
		array(
			'label'    => __( 'Logo Background Color', 'jet' ),
			'section'  => 'logo_customizing',
			'settings' => 'topbar_bg_color',
		)
	)
);

// Color style class (e.g. "c-red") for Logo
// $wp_customize->add_setting('topbar_text_color_class', array(
// 'default' => 'c-black',
// 'transport' => 'postMessage',
// ));
// $wp_customize->add_control('topbar_text_color_class', array(
// 'label' => __('Logo Text Color Class', 'jet'),
// 'type' => 'select',
// 'section' => 'logo_customizing',
// 'settings' => 'topbar_text_color_class',
// 'choices' => array(
// 'c-black' => 'Black',
// 'c-white' => 'White',
// 'c-red' => 'Red',
// 'c-blue' => 'Blue',
// ),
// ));
