<?php
/*
 * Template Name: Top Slider
 *
 * @package Miteri
 * @since Miteri 1.0
 */

get_header();
the_widget( 'Miteri_Slider' );
//get_template_part('template-parts/post/post', 'slider');
if (have_posts()) :
    if (get_theme_mod('page_style', 'fimg-classic') == 'fimg-fullwidth') :
        ?>
        <div class="featured-image">
            <div class="entry-header">
                <?php the_title('<h1 class="entry-title"><span>', '</span></h1>'); ?>
            </div>
            <?php if (has_post_thumbnail() && get_theme_mod('page_has_featured_image', 1)) : ?>
                <figure class="entry-thumbnail">
                    <?php the_post_thumbnail('miteri-cp-1200x580'); ?>
                </figure>
            <?php endif; // Featured Image  ?>
        </div>
    <?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while (have_posts()) : the_post();

                get_template_part('template-parts/page/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
