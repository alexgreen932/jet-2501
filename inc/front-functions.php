<?php

function get_classes( $args ) {
	$output = array();
	foreach ( $args as $key => $value ) {
		$output[] = get_theme_mod( $key, $value );
	}
	return implode( ' ', $output );
}
