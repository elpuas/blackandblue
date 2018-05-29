<?php
function blackandbluefishing_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'blackandbluefishing-google-fonts', 'https://fonts.googleapis.com/css?family=Fira+Mono:400|Open+Sans+Condensed:700|Roboto+Condensed', false );
    	wp_enqueue_script( 'blackandbluefishing-scripts', get_template_directory_uri() . '/blackandbluefishing-scripts.js', array(), get_the_time(), true );
}
add_action( 'wp_enqueue_scripts', 'blackandbluefishing_enqueue_styles' );
