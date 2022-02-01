<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

    if( function_exists('get_field') && get_field('page_sections') ) {
        
        foreach ( get_field('page_sections') as $section) {
        
            partial('sections/' . $section['acf_fc_layout'], compact('section'));
        
        }
    } else {
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content-page' );

            // If comments are open or there is at least one comment, load up the comment template.
            // if ( comments_open() || get_comments_number() ) {
            // 	comments_template();
            // }
        endwhile; // End of the loop.
    }

get_footer();
