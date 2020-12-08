<?php

function titanicFiles(){
    //fonts
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Palanquin&display=swap', false);
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false);
    
    wp_register_style('titanicCss', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('titanicCss');

    wp_enqueue_script('jquery');

    wp_register_script('titanicJs', get_template_directory_uri() . 'dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('titanicJs');

}

add_action('wp_enqueue_scripts', 'titanicFiles');


function titanicFeatures(){

    add_theme_support('post-thumbnails');

    add_image_size( 'pizza', 479, 400, true );
}

add_action('after_setup_theme', 'titanicFeatures');

add_filter('use_block_editor_for_post', '__return_false', 10);
