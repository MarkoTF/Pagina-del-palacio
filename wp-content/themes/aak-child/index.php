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
 * @package Aak
 */

get_header();


$aak_blog_container = get_theme_mod( 'aak_blog_container', 'container');
$aak_blog_layout = get_theme_mod( 'aak_blog_layout', 'rightside');
$aak_blog_style = get_theme_mod( 'aak_blog_style', 'grid');

if ( is_active_sidebar( 'sidebar-1' ) && $aak_blog_layout != 'fullwidth' ) {
	$aak_column_set = '9';
}else{
	$aak_column_set = '12';
}

?>
<div class="<?php echo esc_attr($aak_blog_container); ?> mt-3 mb-5 pt-5 pb-3">
	<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-1' ) && $aak_blog_layout == 'leftside' ): ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<div class="col-lg-<?php echo esc_attr($aak_column_set); ?>">
			<main id="primary" class="site-main">

			      <!--Carrusel de turismo-->

			      <div id="carouselExampleCaptions" class="carousel slide mb-5 position-relative" data-ride="carousel">
				<div class="carousel-inner">
				  <div class="carousel-item active">
				    <img src="http://localhost/palacio/wp-content/uploads/2021/06/travel_edit.jpeg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
				    <img src="http://localhost/palacio/wp-content/uploads/2021/06/travel_edit.jpeg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
				    <img src="http://localhost/palacio/wp-content/uploads/2021/06/travel_edit.jpeg" class="d-block w-100" alt="...">
				  </div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>


				<div class='position-absolute semisombra w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white'>
				  <div>
				    <h1>¡Visita Motul!</h1>	  
				    <a type="button" class="btn btn-primary btn-lg btn-block mt-3">
				      Conocer
				      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
				      </svg>
				  </a>
				  </div>
				</div>				

			      </div>


				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					if(!is_single() && $aak_blog_style == 'grid'){
					//	echo '<div class="card-columns">';
						echo '<div class="row grid">';
					}


					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					if(!is_single() && $aak_blog_style == 'grid'){
					echo '</div>';
					}

					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );
				

				endif;
				?>

			</main><!-- #main -->
		</div>
	<?php if ( is_active_sidebar( 'sidebar-1' ) && $aak_blog_layout == 'rightside' ): ?>
		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div> <!-- end row -->
</div> <!-- end container -->

<?php
get_footer();
