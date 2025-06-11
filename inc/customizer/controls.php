<?php
// dd('jet_field.php loaded');

function jet_field( $args, $ops = null, $type = 'select', $transport = 'postMessage' ) {
	global $wp_customize;

	if ( ! $wp_customize || ! is_object( $wp_customize ) ) {
		error_log( 'Customizer object not available' );
		return;
	}

	// Load preset lists
	$lists = include 'select-options.php';

	// Extract basic args
	$option  = $args['option'];
	$label   = $args['label'];
	$section = $args['section'];
	$default = $args['default'] ?? '';

	// Choices for select/radio/image
	$options = array();
	if ( in_array( $type, array( 'select', 'radio', 'image' ) ) && $ops ) {
		if ( is_string( $ops ) && isset( $lists[ $ops ] ) ) {
			$options = $lists[ $ops ];
		} elseif ( is_array( $ops ) ) {
			$options = $ops;
		}
	}

	// Add setting
	$wp_customize->add_setting(
		$option,
		array(
			'default'   => $default,
			'transport' => $transport,
		)
	);

	// Add control (special case for color)
	if ( $type === 'color' ) {
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$option,
				array(
					'label'    => __( $label, 'jet' ),
					'section'  => $section,
					'settings' => $option,
				)
			)
		);
	} else {
		$wp_customize->add_control(
			$option,
			array(
				'label'    => __( $label, 'jet' ),
				'type'     => $type,
				'section'  => $section,
				'settings' => $option,
				'choices'  => $options,
			)
		);
	}
}

/**
 * Summary of selectElement
 *
 * @param mixed $area - eg, header, footer
 * @param mixed $section - customizer section
 * @param mixed $row - row af area eg top, this add unique items like top menu, rest elements same for whole area
 * @return void
 */
function selectElement( $area, $section, $row ) {

	jet_field(
		array(
			'section' => 'header_section',
			'option'  => 'header_col',
			'label'   => 'Select Element',
			'default' => null,
		),
		null,
		'color'
	);
}


function noteControl( $section, $label, $description, $id = null ) {
	global $wp_customize;

	if ( ! $id ) {
		$id = 'note_' . md5( $label . $section ); // or uniqid('note_');
	}

	$wp_customize->add_setting( $id, array( 'sanitize_callback' => '__return_null' ) );
	$wp_customize->add_control(
		new JetToggleControl(
			$wp_customize,
			$id,
			array(
				'section'     => $section,
				'label'       => $label,
				'description' => $description,
			)
		)
	);
}
