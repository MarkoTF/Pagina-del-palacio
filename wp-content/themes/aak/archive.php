<?php
/**
 * The template for displaying archive pages
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

				<?php if ( have_posts() ) : ?>

					<header class="page-header archive-header text-center mb-5">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
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