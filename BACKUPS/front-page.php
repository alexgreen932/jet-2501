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

get_header();
// echo '// --- --dev check front page';//todo rm
?>
<div class="jet-main <?php echo esc_attr($style) ?>">

	<main id="primary" class="site-main <?php echo esc_attr($style_main) ?>">

		<?php
		the_content();			
		?>

	</main>
</div>
<!-- #main -->

<?php
get_footer();
