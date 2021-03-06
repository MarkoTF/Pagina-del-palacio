<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aak
 */
$aak_topfooter_show = get_theme_mod( 'aak_topfooter_show', '1' );
?>
<?php if(is_active_sidebar( 'footer-widget' )  && $aak_topfooter_show ): ?>
	<div class="footer-top mt-5 pb-5 pt-5 bg-dark">
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer-widget' ) ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

	<footer id="colophon" class="site-footer text-center">
		<div class="site-info">
		    <p>H. Ayuntamiento de Motul 2018-2021</p>		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php
	if ( function_exists( 'aak_woocommerce_header_cart' ) ) {
		aak_woocommerce_header_cart();
	}
?>
<?php wp_footer(); ?>

</body>
</html>
