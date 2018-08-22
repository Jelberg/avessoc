<?php
/**
 * Carga de estilos del tema superior
 * 
 */
function child_theme_styles() {
 wp_dequeue_style( 'parent-theme-style' );
 wp_enqueue_style( 'child-theme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'child_theme_styles' );



/* Añade los estilos de grid CSS*/
add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_styles() {
	wp_enqueue_style( 'custom-style', 
					  get_stylesheet_directory_uri() . '/css/new-styles.css', 
					  array(), 
					  wp_get_theme()->get('Version')
					);
}

?>
