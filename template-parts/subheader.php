<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jet_2500
 */

//classes 
$style = get_classes(array('subheader_bg' => 'bg-black', 'subheader_col' => 'tx-grey'));
$layouts = get_classes(array('subheader_width' => 'w-container', 'subheader_justify' => 'jc-b'));
$menu = get_classes(array('m3_size' => 'fs-10', 'm3_col' => 'tx-white', 'm3_gap' => 'g-05'));

?>
<div id=" jet-topbar" class="jet-topbar <?php echo esc_attr($style) ?>">
    <div class="topbar-inner <?php echo esc_attr($layouts) ?> ?>">
        <span>subheader test el</span>
        <nav id="subheader-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="menu-3"
                aria-expanded="false"><?php esc_html_e('Menu', 'jet'); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-3',
                    'menu_id' => 'menu-3',
                    'menu_class' => esc_attr($menu)
                )
            );
            ?>
        </nav>

    </div>
</div>
