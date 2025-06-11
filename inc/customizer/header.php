<?php


$wp_customize->add_section(
	'header_section',
	array(
		'title' => 'Header',
		'panel' => 'header_panel',
	)
);

// controls header
jet_field(
	array(
		'section' => 'header_section',
		'option'  => 'header_bg',
		'label'   => 'Header Background',
		'default' => null,
	),
	null,
	'color'
);

jet_field(
	array(
		'section' => 'header_section',
		'option'  => 'header_col',
		'label'   => 'Header Color',
		'default' => null,
	),
	null,
	'color'
);


noteControl( 'header_section', '🗒 Elements Note', 'Here You can select elements only. Element setting are in the section Elements Options' );





// native - ok
// $wp_customize->add_setting('note_toggle', ['sanitize_callback' => '__return_null']);
// $wp_customize->add_control(new JetToggleControl($wp_customize, 'note_toggle', [
// 'section' => 'header_section',
// 'label' => 'Note',
// 'description' => 'This section controls header layout options.',
// ]));
