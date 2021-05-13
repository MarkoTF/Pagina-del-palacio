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


?>



<?php 
 function aak_header_top_display_item_custom(){
 	$aak_topbar_mtext = get_theme_mod( 'aak_topbar_mtext', esc_html__('Bienvenid@ a nuestra página de información','aak') );
	$aak_topbar_menushow = get_theme_mod( 'aak_topbar_menushow',1 );
	$aak_topbar_search = get_theme_mod( 'aak_topbar_search',1 );
 ?>
 	<div class="aaktop-tophead bg-dark text-light pt-1 pb-1">
	<div class="container">
			<div class="row">
			<?php if($aak_topbar_mtext): ?>
				<div class="col-md-auto">
					<span class="bhtop-text pt-2"><?php echo esc_html($aak_topbar_mtext); ?></span>
				</div>
			<?php endif; ?>
			<?php if($aak_topbar_menushow && has_nav_menu( 'menu-top' ) || $aak_topbar_search ): ?>
				<div class="col-md-auto ml-auto">
					<div class="topmenu-serch">
			<?php if($aak_topbar_menushow && has_nav_menu( 'menu-top' )): ?>
						<div class="top-menu list-hide text-white">
							<?php 
								wp_nav_menu(
									array(
										'theme_location' => 'menu-top',
										'menu_id'        => 'aaktop-menu',
										'menu_class'     => 'aaktop-menu',
										'depth'          => 1,
										'fallback_cb'    => false,							
									)
								);
							 ?>
						</div>
						<?php endif; ?>
						<?php if($aak_topbar_search): ?>
						<div class="header-top-search">
							<?php get_search_form(); ?>
						</div>	
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
<?php 	
 }
add_action('aak_header_top_display_custom','aak_header_top_display_item_custom');

?>
