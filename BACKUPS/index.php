<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jet_2500
 */

$style = get_classes(array('index_bg' => null, 'index_col' => null, 'index_width' => 'w-container', 'index_mv' => 'mv-1', 'index_bs' => 'bs-2', 'index_p' => 'p-1', 'index_dir' => null ));
$style_main = get_classes(array('index_main_p' => 'pr-1', 'index_main_fs' => null,  ));
get_header();
echo '//dev check index.php';
?>



<div class="jet-main <?php echo esc_attr($style) ?>">

	<main id=" primary" class="site-main <?php echo esc_attr($style_main) ?>">

	<?php
	if (have_posts()):

		if (is_home() && !is_front_page()):
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

		/* Start the Loop */
		while (have_posts()):
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

	else:

		get_template_part('template-parts/content', 'none');

	endif;
	?>

	</main>
	<?php
		if (get_theme_mod('index_sidebar', 1) !== 0) {
			get_sidebar();
		}
	?>
</div>
<!-- #main -->

<?php

get_footer();
