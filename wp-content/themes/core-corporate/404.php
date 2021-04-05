<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Core_Corporate
 */

get_header(); ?>

  <?php
    /**
    * Hook - core_corporate_action_404_section.
    *
    * @hooked core_corporate_404_section -  10
    */
    do_action( 'core_corporate_action_404_section' );
  ?>


<?php
get_footer();
