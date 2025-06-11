<?php
// dd('test');

// Custom Section: Logo
$wp_customize->add_section(
	'menu_customizing',
	array(
		'title'    => __( 'Menus styles', 'jet' ),
		'priority' => 60,
	)
);

jet_field(
	$wp_customize,
	array(
		'section' => 'menu_customizing',
		'option'  => 'm2_col',
		'label'   => 'Use Logo',
		'default' => 'tx-white',
	),
	'col',
);
