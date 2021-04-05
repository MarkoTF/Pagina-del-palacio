<?php 
/*This file is part of News Box child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/



function news_box_lite_fonts_url() {
	$fonts_url = '';

		$font_families = array();

		$font_families[] = 'Roboto:300,400,400i,500,500i,700,700i';
		$font_families[] = 'PT+Serif:400,400i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return esc_url_raw( $fonts_url );
}


function news_box_lite_enqueue_child_styles() {
	wp_enqueue_style( 'nbox-lite-google-font', news_box_lite_fonts_url(), array(), null );
	wp_enqueue_style( 'nbox-lite-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','news-box-default', 'news-box-style'), '', 'all');
   wp_enqueue_style( 'nbox-lite-main',get_stylesheet_directory_uri() . '/assets/css/main.css',array(), '', 'all');
  
}
add_action( 'wp_enqueue_scripts', 'news_box_lite_enqueue_child_styles');


function news_box_lite_body_classes( $classes ) {
 $news_box_lite_view_set = get_theme_mod( 'view_set','grid' );
	
	if( $news_box_lite_view_set == 'grid' && !is_single()){
		$classes[] = 'news-grid';
	}
	return $classes;
}
add_filter( 'body_class', 'news_box_lite_body_classes' );


// customize include

require get_stylesheet_directory().'/inc/customizer.php';
require get_stylesheet_directory().'/inc/recomended-plugin.php';




