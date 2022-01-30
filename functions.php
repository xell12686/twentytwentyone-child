<?php


/* remove parent scripts  */
function disable_parent_scripts() {
    wp_dequeue_style( 'twenty-twenty-one-style');
    wp_dequeue_script('twenty-twenty-one-primary-navigation-script');

}
add_action( 'wp_enqueue_scripts','disable_parent_scripts', 20 );

/* enqueue scripts  */
function child_theme_styles() {
    wp_register_style( 'styles-child', get_stylesheet_uri() );
    wp_enqueue_style( 'styles-child');
}
add_action( 'wp_enqueue_scripts','child_theme_styles', 20 );

function child_theme_scripts() {
    wp_enqueue_script(
        'child-script',
        get_stylesheet_directory_uri() . '/js/app.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );

/**
 * Partial
 *
 * @return void
 */
if (!function_exists('partial')) {
    function partial($path, $data = [])
    {
        if (!empty($data)) {
            extract($data);
        }

        include dirname( __FILE__ ) . '/template-parts/' . $path . '.php';
    }
}
