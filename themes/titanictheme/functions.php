<?php

function titanicFiles(){
    // wp_enqueue_style('titanicCss', get_stylesheet_uri());
    wp_register_style('titanicCss', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('titanicCss');

    wp_enqueue_script('jquery');

    wp_register_script('titanicJs', get_template_directory_uri() . 'dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('titanicJs');

}

add_action('wp_enqueue_scripts', 'titanicFiles');
