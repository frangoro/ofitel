<?php

spl_autoload_register( function($classname) {

    $class      = str_replace( '\\', DIRECTORY_SEPARATOR, strtolower($classname) ); 
    $classpath  = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php';
    
    if ( file_exists( $classpath) ) {
        include_once $classpath;
    }
   
} );

add_action( 'wp_enqueue_scripts', 'ofitel_enqueue_styles' );
function ofitel_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

add_shortcode('ofitel_horario', 'shortcode_ofitel_horario');
function shortcode_ofitel_horario() {
    return '<p>Lunes a Viernes: 10.00h - 14.00h y 17:00h - 20.00h</p>';
}

add_shortcode('ofitel_telefono', 'shortcode_ofitel_telefono');
function shortcode_ofitel_telefono() {
    return '<a href="tel:956461895"><nobr>956&nbsp;46&nbsp;18&nbsp;95</nobr></a>';
}

add_action( 'wp_enqueue_scripts', 'add_ofitel_scripts' );
function add_ofitel_scripts() {
    wp_register_style( 'ofitelFormCSS', get_stylesheet_directory_uri().'/style.css', array(), 1.0, 'all');
    wp_register_style( 'ofitelBootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_register_style( 'ofitelBootstraptheme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
    wp_enqueue_style( 'ofitelFormCSS' );
    wp_enqueue_style( 'ofitelBootstrap' );
    wp_enqueue_style( 'ofitelBootstraptheme' );
    wp_register_script( 'ofitelFormJS', get_stylesheet_directory_uri().'/form.js', array ( 'jquery'), 1.1, false);
    wp_enqueue_script( 'ofitelFormJS');
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'ofitelFormJS', 'ofitel_object', $translation_array );    
}   

add_action( 'wp_enqueue_scripts', 'console_log_ofitel' );
function console_log_ofitel($data) {
    printf('<script>console.log(%s);</script>', json_encode($data));
}