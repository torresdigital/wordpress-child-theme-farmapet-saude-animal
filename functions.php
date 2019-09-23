<?php
/*This file is part of farmapet-by-torres-digital, excellent child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function farmapet_by_torres_digital_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'farmapet_by_torres_digital_enqueue_child_styles' );



    /* Font Awesome, by Torres Digital */
    function theme_enqueue_styles() {
            $parent_style = 'parent-style';
            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
            wp_enqueue_style( 'my-child-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
            wp_enqueue_style( 'child-style',
                get_stylesheet_directory_uri() . '/style.css',
                array( $parent_style )
            );
        }

    function torresdigital_child_setup() {
        $path = get_stylesheet_directory().'/languages';
        load_child_theme_textdomain( 'excellent', $path );
    }
    add_action( 'after_setup_theme', 'torresdigital_child_setup' );


/**
 * Returns a "Continue Reading" link for excerpts
 */
function catchbox_continue_reading_link() {
	return ' <a class="more-link" href="'. esc_url( get_permalink() ) . '">' . __( 'More<span class="meta-nav">&hellip;</span>', 'catchbox' ) . '</a>';
}
/*

<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
?>

If your child theme style.css contains actual CSS code (as it normally does), you will need to enqueue it as well. Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it. Including the child theme version number ensures that you can bust cache also for the child theme. (See a more detailed discussion on Stack Exchange.) The complete (recommended) example becomes:

<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>
