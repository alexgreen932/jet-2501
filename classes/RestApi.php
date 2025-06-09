<?php
/**
 * Add hooks for RestAPI
 *
 * @package magic-jet
 */

 //wordpress rest api
 //i found my olf file re did it as class(just it's more convenient for me as class)
 //just could you emplane how to use it, i just do not remember, and maybe i'll need to redo it
class RestApi {

    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'get_menu' ) );
    }

    function get_menu() {
        register_rest_route('custom', '/menu/(?P<location>[a-zA-Z0-9_-]+)', array(
            'methods' => 'GET',
            'callback' => array( $this, 'wp_menu_route'),
        ));
    }
    
    function wp_menu_route($data)
    {
        $menu_name = $data['location'];
        $menu_locations = get_nav_menu_locations(); // Get nav locations set in theme
        
        // Check if the specified menu location exists
        if (!isset($menu_locations[$menu_name])) {
            return new WP_Error('invalid_menu_location', 'Invalid menu location.', array('status' => 404));
        }
    
        $menu_id = $menu_locations[$menu_name];
        $menu_items = wp_get_nav_menu_items($menu_id);
        $menu_items_with_slugs = array();
        
        foreach ($menu_items as $menu_item) {
            // Get the post object for the menu item
            $post_object = get_post($menu_item->object_id);
            if ($post_object) {
                // Use the post name (slug) as the menu item slug
                $slug = $post_object->post_name;
                // Add the slug to the menu item data
                $menu_item->slug = $slug;
                $menu_items_with_slugs[] = $menu_item;
            }
        }
    
        return $menu_items_with_slugs;
    }
    
}