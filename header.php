<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jet_2500
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- //TODO DEV PHP LIVE RELOAD WATCHER - REMOVE ON PROD -->
	<script>
		setInterval(() => {
			fetch('/reload.txt')
				.then(r => r.text())
				.then(time => {
					if (!window.lastReloadTime) window.lastReloadTime = time;
					if (window.lastReloadTime != time) location.reload();
				});
		}, 1000);
	</script>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'jet'); ?></a>

		<header id="jet-header" class="jet-header">
		<div class="container">
			<?php
			get_template_part('elements/logo');
			// get_template_part('elements/modal_search');
			?>
	</div>
	</header>