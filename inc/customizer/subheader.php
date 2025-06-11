<?php
// dd('topbar loaded');

// Section: Subheader
$wp_customize->add_section(
	'subheader_customizing',
	array(
		'title'    => __( 'Subheader Customizing', 'jet' ),
		'priority' => 42,
	)
);

jet_field(
	$wp_customize,
	array(
		'section' => 'subheader_customizing',
		'option'  => 'use_topbar',
		'label'   => 'Use Subheader',
		'default' => false,
	),
	'yes_no',
);

jet_field(
	$wp_customize,
	array(
		'section' => 'subheader_customizing',
		'option'  => 'topbar_bg',
		'label'   => 'Subheader Background',
		'default' => 'bg-black',
	),
	'bg',
);

jet_field(
	$wp_customize,
	array(
		'section' => 'subheader_customizing',
		'option'  => 'topbar_justify',
		'label'   => 'Justify Content',
		'default' => 'jc-b',
	),
	'justify',
);

jet_field(
	$wp_customize,
	array(
		'section' => 'subheader_customizing',
		'option'  => 'topbar_bg',
		'label'   => 'Background Color',
		'default' => 'bg-black',
	),
	'bg',
);

// jet_field(
// $wp_customize,
// array(
// 'section' => 'subheader_customizing',
// 'option' => 'topbar_test',
// 'label' => 'Test',
// 'default' => 'jc-b',
// ),
// 'justify',
// 'input'
// );

// Background color setting for Subheader
// $wp_customize->add_setting('topbar_bg', array(
// 'default' => '#f8f8f8',
// 'transport' => 'postMessage',
// ));

// $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_bg', array(
// 'label' => __('Subheader Background Color', 'jet'),
// 'section' => 'subheader_customizing',
// 'settings' => 'topbar_bg',
// )));

// Color style class (e.g. "c-red") for Subheader
// $wp_customize->add_setting('topbar_text_color_class', array(
// 'default' => 'c-black',
// 'transport' => 'postMessage',
// ));
// $wp_customize->add_control('topbar_text_color_class', array(
// 'label' => __('Subheader Text Color Class', 'jet'),
// 'type' => 'select',
// 'section' => 'subheader_customizing',
// 'settings' => 'topbar_text_color_class',
// 'choices' => array(
// 'c-black' => 'Black',
// 'c-white' => 'White',
// 'c-red' => 'Red',
// 'c-blue' => 'Blue',
// ),
// ));
