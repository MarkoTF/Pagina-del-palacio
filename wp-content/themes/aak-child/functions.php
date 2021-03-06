<?php
  function mychildtheme_enqueue_styles() {
      $parent_style = 'parent-style';
   
      wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/aak-main.css' );
      wp_enqueue_style( 'child-style',
	  get_stylesheet_directory_uri() . '/style.css',
	  array( $parent_style )
      );
  }
  add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );

  require get_stylesheet_directory(). '/inc/header-action/header-top-custom.php';
  require get_stylesheet_directory() . '/inc/template-tags.php';
?>
