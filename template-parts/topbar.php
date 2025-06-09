<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jet_2500
 */

//classes 
$style = get_classes(array('topbar_bg' => 'bg-black', 'topbar_col' => 'tx-grey'));
$layouts = get_classes(array('topbar_width' => 'w-container', 'topbar_justify' => 'jc-b'));
$menu = get_classes(array('m2_size' => 'fs-10', 'm2_col' => 'tx-white', 'm2_gap' => 'g-05'));

?>
<div id=" jet-topbar" class="jet-topbar <?php echo esc_attr($style) ?>">
    <div class="topbar-inner <?php echo esc_attr($layouts) ?> ?>">
        <span>topbar el 1</span>
        <nav id="top-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="menu-2"
                aria-expanded="false"><?php esc_html_e('Top Menu', 'jet'); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-2',
                    'menu_id' => 'menu-2',
                    'menu_class' => esc_attr($menu)
                )
            );
            ?>
        </nav>

    </div>
</div>