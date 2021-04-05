<?php 
/**
*
* Header menu action
*
*
*/


function newsbox_header_menu_set(){
		$news_box_date_show = get_theme_mod( 'news_box_date_show', 1 );
	$newsbox__container = get_theme_mod( 'newsbox__container', 'container' );

?>
	<div class="header-top bg-dark">
			<div class="<?php echo esc_attr($newsbox__container); ?>">
				<div class="row">
					
					<div class="col-md-2 time-column">
						<div class="date-time time-show">
							<?php if($news_box_date_show): ?>
							<ul>
								<li><span class="time"><i class="fa fa-time"></i><?php echo esc_html( date_i18n( get_option( 'time_format' ) )); ?></li>
								<li><span class="time"><?php echo esc_html(date_i18n('l')); ?></span></li>
								<li><span class="date"><i class="fa fa-date"></i><?php echo esc_html(date_i18n( get_option( 'date_format' )) ); ?></span></li>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				
					<div class="col-md-9">
						<nav class="navbar navbar-expand-lg">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'news-box' ); ?>">
						        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
						    </button>
						    <div class="collapse navbar-collapse" id="navbar-content">
						        <?php
						        wp_nav_menu( array(
						            'theme_location' => 'menu-1', // Defined when registering the menu
						            'menu_id'        => 'primary-menu',
						            'container'      => false,
						            'depth'          => 2,
						            'menu_class'     => 'navbar-nav ml-auto',
						            'fallback_cb'     => '__return_false',
						            'walker'         => new Bootstrap_NavWalker()
						        ) );
						        ?>
						    </div>
						</nav>	
					</div>
					<div class="col-md-1">
						<div class="header-search">
							<div class="search-icon"><i class="fa fa-search"></i></div>
							<div class="header-search-form">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
}
add_action('newsbox_header_menu','newsbox_header_menu_set');

