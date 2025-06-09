<?php
// dd('test', 55);



// Sections
$wp_customize->add_section('topbar_section', [
    'title' => 'Topbar',
    'panel' => 'header_panel',
]);

$wp_customize->add_section('header_section', [
    'title' => 'Header',
    'panel' => 'header_panel',
]);

$wp_customize->add_section('subheader_section', [
    'title' => 'Subheader',
    'panel' => 'header_panel',
]);

//controls topbar
jet_field([
	'section' => 'topbar_section',
	'option'  => 'topbar_bg',
	'label'   => 'Header Background',
	'default' => '#ff0000',
], null, 'color');

jet_field([
	'section' => 'topbar_section',
	'option'  => 'topbar_col',
	'label'   => 'Topbar Background',
	'default' => '#eeeeee',
], null, 'color');

//controls header
jet_field([
	'section' => 'header_section',
	'option'  => 'header_bg',
	'label'   => 'Header Background',
	'default' => '#ff0000',
], null, 'color');

jet_field([
	'section' => 'header_section',
	'option'  => 'header_col',
	'label'   => 'Header Background',
	'default' => '#eeeeee',
], null, 'color');

//controls subheader
jet_field([
	'section' => 'header_section',
	'option'  => 'header_bg',
	'label'   => 'Header Background',
	'default' => '#ff0000',
], null, 'color');

jet_field([
	'section' => 'header_section',
	'option'  => 'header_col',
	'label'   => 'Header Background',
	'default' => '#eeeeee',
], null, 'color');


// Example control inside section
// $wp_customize->add_setting('subheader_title', []);
// $wp_customize->add_control('subheader_title', [
//     'label' => 'Subheader Title',
//     'section' => 'subheader_section',
//     'type' => 'text',
// ]);


// $wp_customize->add_section('header_customizing', array(
//     'title' => __('Header Customizing', 'jet'),
//     'priority' => 50,
// ));

