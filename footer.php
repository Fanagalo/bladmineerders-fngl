<?php
/**
 * The template for displaying the footer
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

?>
	<div class="footer-area-full"></div>
	<footer id="colophon" class="footer-area">

		<div class="colophon-credits">
			<p><strong>2001-<?php echo date("Y"); ?> W.N.&nbsp;Ellis, Amsterdam, <?php printf( __( '[:nl]Nederland[:en]The&nbsp;Netherlands[:]' ) ); ?></strong><br>
				<br>
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/by-nc-sa.svg" alt="Creative Commons-Licentie" style="border-width:0" >
				</a> <br>
				<?php printf( __( '
					[:nl]
					Dit werk valt onder een 
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative&nbsp;Commons 
					-&nbsp;Naamsvermelding -&nbsp;NietCommercieel -&nbsp;GelijkDelen 4.0&nbsp;Internationaal-licentie</a>.
					[:en]
					This work is licensed under a 
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative&nbsp;Commons 
					-&nbsp;Attribution - NonCommercial&nbsp;-&nbsp;ShareAlike 4.0&nbsp;International&nbsp;License</a>.
					[:]'
				) ); ?>
			</p>
		</div>

		<div class="bm-logos">
			<?php printf( __( '[:nl]Ondersteund door[:en]Supported by[:]<br>' ) ); ?>
			<a href="//naturalis.nl" target="_blank">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/naturalis.png" alt="Naturalis logo">
			</a>
			<a href="//eis-nederland.nl" target="_blank">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eis.png" alt="EIS Kenniscentrum insecten en andere ongewervelden logo">
			</a>
		</div>

		<div class="fanagalo-me-fecit">
			<?php printf( __( '[:nl]Ontwerp en code door[:en]Designed and developed by[:]<br>' ) ); ?>
			<a href="http://fanagalo.nl" target="_blank">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Fanagalo-logo-RGB.png" alt="Fanagalo logo">
			</a>
		</div>

	</footer>
	<div class="footer-area-full"></div>

<?php wp_footer(); ?>

</body>
</html>