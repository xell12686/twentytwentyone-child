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

if(get_field('page_sections')) {
 
    foreach ( get_field('page_sections') as $section) {
    
        partial('sections/' . $section['acf_fc_layout'], compact('section'));
    
    }
}


get_footer();
