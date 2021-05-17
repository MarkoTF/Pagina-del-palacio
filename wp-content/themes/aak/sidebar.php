<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aak
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<!--
	  <ul><?php bloginfo('name'); ?> |<?php wp_title(); ?>
	    Test de un menu simple personalizado
	  <li>item1</li>
	  <li>item2</li>
	  <li>item3</li>
	  <li>item4</li>
	</ul>-->
</aside><!-- #secondary -->
