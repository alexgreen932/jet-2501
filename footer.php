<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jet_2500
 */
include get_template_directory() . '/inc/menus.php';
?>

<footer id="jet-footer" class="site-footer  <?php echo esc_attr($style) ?>">
	<div class="container">
		<?php
		echo '<a href="' . get_site_url() . '" class="abc-logo"> <img src="' . get_parent_theme_file_uri() . '/img/ABC_logo_4ecdc85e71.svg' . '" alt="A Big Candy Casino" />  </a>';
		?>

	</div>
</footer>

<div class="subfooter">
	<div class="container">
		<ul>
			<li><img src="<?php echo get_parent_theme_file_uri() . '/img/gamblinghelponline_41f25d1b2d.svg' ?>" alt="3"
					loading="lazy"></li>
			<li><img src="<?php echo get_parent_theme_file_uri() . '/img/gamstop_c99b2eda73.svg' ?>" alt="4"
					loading="lazy">
			</li>
		</ul>
	</div>
	<div class="copyright">
		<p>This is not an official website of A Big Candy brand. You must be at least <strong>18 years old</strong>
			to
			play.<br><br>Sister Site:&nbsp;<a href="https://skycrowncasino.vip/" title="SkyCrown Casino"
				target="_self">SkyCrown Casino</a>. Fantastic bonuses and pokies with friendly terms.<a
				href="https://skycrowncasino.vip/" title="SkyCrown Casino" target="_self">&nbsp;</a></p>
	</div>

</div>
</div>



<?php wp_footer(); ?>

</body>

</html>