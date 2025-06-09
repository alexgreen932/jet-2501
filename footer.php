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

?>

<footer id="jet-footer" class="site-footer  <?php echo esc_attr($style) ?>">
	<div class="container">
		<?php
		echo '<a href="' . get_site_url() . '" class="abc-logo"> <img src="' . get_parent_theme_file_uri() . '/img/ABC_logo_4ecdc85e71.svg' . '" alt="A Big Candy Casino" />  </a>';
		?>

	</div>
</footer><!-- #colophon -->
</div>
<div class="Footer_footer__images__zqW7F">
	<div class="container">
		<ul>
			<li class="Footer_footer__images-item__c9pc2"><img
					src="<?php echo get_parent_theme_file_uri() . '/img/gamblinghelponline_41f25d1b2d.svg' ?>" alt="3"
					loading="lazy"></li>
			<li class="Footer_footer__images-item__c9pc2"><img
					src="<?php echo get_parent_theme_file_uri() . '/img/gamstop_c99b2eda73.svg' ?>" alt="4"
					loading="lazy">
			</li>
		</ul>
		<div class="Footer_footer__text__xZ69H">
			<p>This is not an official website of A Big Candy brand. You must be at least <strong>18 years old</strong>
				to
				play.<br><br>Sister Site:&nbsp;<a href="https://skycrowncasino.vip/" title="SkyCrown Casino"
					target="_self">SkyCrown Casino</a>. Fantastic bonuses and pokies with friendly terms.<a
					href="https://skycrowncasino.vip/" title="SkyCrown Casino" target="_self">&nbsp;</a></p>
		</div>
	</div>

</div>

<div class="jet-preloader"></div>


<?php wp_footer(); ?>

</body>

</html>