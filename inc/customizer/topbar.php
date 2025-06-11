<?php
// dd('topbar loaded');

// Section: Topbar
$wp_customize->add_section(
	'topbar_customizing',
	array(
		'title'    => __( 'Topbar Customizing', 'jet' ),
		'priority' => 40,
	)
);

jet_field(
	$wp_customize,
	array(
		'section' => 'topbar_customizing',
		'option'  => 'use_topbar',
		'label'   => 'Use Topbar',
		'default' => 0,
	),
	'yes_no',
);

jet_field(
	$wp_customize,
	array(
		'section' => 'topbar_customizing',
		'option'  => 'topbar_bg',
		'label'   => 'Topbar Background',
		'default' => 'bg-black',
	),
	'bg',
);

jet_field(
	$wp_customize,
	array(
		'section' => 'topbar_customizing',
		'option'  => 'topbar_justify',
		'label'   => 'Justify Content',
		'default' => 'jc-b',
	),
	'justify',
);

// jet_field(
// $wp_customize,
// array(
// 'section' => 'topbar_customizing',
// 'option' => 'topbar_bg',
// 'label' => 'Background Color',
// 'default' => 'bg-black',
// ),
// 'bg',
// );

// jet_field(
// $wp_customize,
// array(
// 'section' => 'topbar_customizing',
// 'option' => 'topbar_test',
// 'label' => 'Test',
// 'default' => 'jc-b',
// ),
// 'justify',
// 'input'
// );

// Background color setting for Topbar
// $wp_customize->add_setting('topbar_bg', array(
// 'default' => '#f8f8f8',
// 'transport' => 'postMessage',
// ));

// $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_bg', array(
// 'label' => __('Topbar Background Color', 'jet'),
// 'section' => 'topbar_customizing',
// 'settings' => 'topbar_bg',
// )));

// Color style class (e.g. "c-red") for Topbar
$wp_customize->add_setting(
	'topbar_text_color_class',
	array(
		'default'   => 'c-black',
		'transport' => 'postMessage',
	)
);
$wp_customize->add_control(
	'topbar_text_color_class',
	array(
		'label'    => __( 'Topbar Text Color Class', 'jet' ),
		'type'     => 'select',
		'section'  => 'topbar_customizing',
		'settings' => 'topbar_text_color_class',
		'choices'  => array(
			'c-black' => 'Black',
			'c-white' => 'White',
			'c-red'   => 'Red',
			'c-blue'  => 'Blue',
		),
	)
);
