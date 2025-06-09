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
echo '//dev check single.php';
?>



<div class="jet-main <?php echo esc_attr($style) ?>">

	<main id=" primary" class="site-main <?php echo esc_attr($style_main) ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'jet' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'jet' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
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
