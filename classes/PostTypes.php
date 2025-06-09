<?php
/**
 * Class PostTypes
 *
 * Registers the custom post types.
 *
 * @package magic-jet
 */
// dd('class Post Type loaded');
 class PostTypes {
 
     public function __construct() {
         add_action( 'init', array( $this, 'register_post_types' ) );
 
         // Optional: only once, during activation
         register_activation_hook( __FILE__, function () {
             $this->register_post_types();
             flush_rewrite_rules();
         });
     }
 
     public function register_post_types() {
         $post_types = array(
            //  'popup' => array(
            //      'slug'   => 'popup',
            //      'labels' => array(
            //          'name'               => __( 'Popups', 'docs' ),
            //          'singular_name'      => __( 'Popup', 'docs' ),
            //          'menu_name'          => __( 'Popups', 'docs' ),
            //          'add_new'            => __( 'Add New', 'docs' ),
            //          'add_new_item'       => __( 'Add New Popup', 'docs' ),
            //          'edit_item'          => __( 'Edit Popup', 'docs' ),
            //          'new_item'           => __( 'New Popup', 'docs' ),
            //          'view_item'          => __( 'View Popup', 'docs' ),
            //          'search_items'       => __( 'Search Popups', 'docs' ),
            //          'not_found'          => __( 'No Popups found.', 'docs' ),
            //          'not_found_in_trash' => __( 'No Popups found in Trash.', 'docs' ),
            //      ),
            //      'menu_icon' => 'dashicons-welcome-learn-more'
            //  ), 
             'doc' => array(
                 'slug'   => 'docs',
                 'labels' => array(
                     'name'               => __( 'Documents','docs' ),
                     'singular_name'      => __( 'Doc', 'docs' ),
                     'menu_name'          => __( 'Documents', 'docs' ),
                     'add_new'            => __( 'Add New', 'docs' ),
                     'add_new_item'       => __( 'Add New Doc', 'docs' ),
                     'edit_item'          => __( 'Edit Doc', 'docs' ),
                     'new_item'           => __( 'New Doc', 'docs' ),
                     'view_item'          => __( 'View Doc', 'docs' ),
                     'search_items'       => __( 'Search Docs', 'docs' ),
                     'not_found'          => __( 'No Docs found.', 'docs' ),
                     'not_found_in_trash' => __( 'No Docs found in Trash.', 'docs' ),
                 ),
                 'menu_icon' => 'dashicons-welcome-learn-more'
             ),
            //  'component' => array(
            //      'slug'   => 'components',
            //      'labels' => array(
            //          'name'               => __( 'Components', domain: 'docs' ),
            //          'singular_name'      => __( 'Component', 'docs' ),
            //          'menu_name'          => __( 'Components', 'docs' ),
            //          'add_new'            => __( 'Add New', 'docs' ),
            //          'add_new_item'       => __( 'Add New Component', 'docs' ),
            //          'edit_item'          => __( 'Edit Component', 'docs' ),
            //          'new_item'           => __( 'New Component', 'docs' ),
            //          'view_item'          => __( 'View Component', 'docs' ),
            //          'search_items'       => __( 'Search Components', 'docs' ),
            //          'not_found'          => __( 'No Components found.', 'docs' ),
            //          'not_found_in_trash' => __( 'No Components found in Trash.', 'docs' ),
            //      ),
            //      'menu_icon' => 'dashicons-admin-generic'
            //  ),
         );
 
         foreach ( $post_types as $key => $data ) {
             register_post_type( $key, array(
                 'labels'             => $data['labels'],
                 'public'             => true,
                 'publicly_queryable' => true,
                 'show_ui'            => true,
                 'show_in_menu'       => true, // ✅ ensure it's in admin menu
                 'menu_icon'          => $data['menu_icon'],
                 'supports'           => array( 
                     'title', 
                     'editor', 
                     'author', 
                     'thumbnail', 
                     'excerpt', 
                     'comments', 
                     'revisions' 
                 ),
                 'has_archive'        => true,
                 'rewrite'            => array(
                     'slug'       => $data['slug'],
                     'with_front' => true,
                 ),
                 'capability_type'    => 'post',
                 'show_in_rest'       => true,
                 'rest_base'          => $data['slug'],
             ));
         }
     }
 }
 
 ?>
 

