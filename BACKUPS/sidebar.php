<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jet_2500
 */
$style = get_classes(array('sidebar_width' => 'w-1-4', 'sidebar_bg' => null, 'sidebar_col' => null, 'sidebar_mv' => 'mv-1', 'sidebar_bs' => 'bs-2', 'sidebar_p' => 'p-1', 'sidebar_dir' => null ));

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area <?php echo esc_attr($style) ?>">
	<?php 
	dynamic_sidebar( 'sidebar-1' ); 
	?>
</aside><!-- #secondary -->
