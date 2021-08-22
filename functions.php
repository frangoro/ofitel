<?php
/**
 * Ofitel functions and definitions
 */

//Tamaño de imagen 
add_image_size( 'destacada', 750, 300,true );

// Etiqueta de titulo 
add_theme_support( 'title-tag' );

//Registrar estilos
function raiola_enqueue_styles() {
	//Style.css
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	// Registrar bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . 'https://serv4.raiolanetworks.es/css/bootstrap.min.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'raiola_enqueue_styles');

// Registrar Scripts
function raiola_enqueue_scripts() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . 'https://serv5.raiolanetworks.es/js/bootstrap.bundle.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'raiola_enqueue_scripts');

add_theme_support( 'custom-logo', array(
    //ALTO
    'height'      => 50,
    //ANCHO
    'width'       => 250,
    //PERMITIR FLEXIBILIDAD EN EL TAMAÑO
	'flex-height' => true,
    'flex-width'  => true,
    //
	'header-text' => array( 'site-title', 'site-description' ),
) );

function registrar_menu() {
	register_nav_menu( 'menu-principal', 'Menu Principal' );
}
add_action( 'after_setup_theme', 'registrar_menu');

function ofitel_nav_class($classes, $item){
    $classes[] = 'nav-link';
    return $classes;
}
add_filter('nav_menu_css_class' , 'ofitel_nav_class' , 10 , 2);

function show_post($path) {
    $post = get_page_by_path($path);
    $content = apply_filters('the_content', $post->post_content);
    echo $content;
}