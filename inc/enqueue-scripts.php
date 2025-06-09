<?php

//TODO DEV ONLY START ---------------------------------------

function add_attr_module($tag, $handle, $src)
{
	switch ( $handle ) {
		case 'app':
			$tag = str_replace('<script ', '<script type="module" ', $tag);
			return $tag;
			break;

		default:
			return $tag;
			break;
	}
}
add_filter('script_loader_tag', 'add_attr_module', 10, 3);
/**
 * Enqueue scripts and styles.
 */
function jet_scripts() {
	wp_enqueue_style( 'jet-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'jet-style', 'rtl', 'replace' );

	// wp_enqueue_style( 'jet', CSS . 'jet.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'theme', CSS . 'style.css' , array(), _S_VERSION );
	// wp_enqueue_style( 'jet-anim', CSS . 'jet-animation.min.css' , array(), _S_VERSION );

	wp_enqueue_script( 'script', JS . 'script.js', array(), _S_VERSION, true );
	// wp_enqueue_script( 'app', JS . 'app-dev.js', array(), _S_VERSION, true );//todo dev mode
	// wp_enqueue_script( 'jet-anim', JS . 'jet-animate.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jet_scripts' );