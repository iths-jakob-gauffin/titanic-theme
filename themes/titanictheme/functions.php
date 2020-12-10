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

function headerPizza($harbor = NULL){
    // echo var_dump($harbor);
    ?>
        <nav class="Header__Nav">
            <ul class="Header__NavList">
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'events')); ?>" class="Header__Link">
                        Events
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'butiken')); ?>" class="Header__Link">
                        Butiken
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'boka')); ?>" class="Header__Link">
                        Boka
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'hamnar')); ?>" class="Header__Link">
                        Hamnar
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'service')); ?>" class="Header__Link">
                        Service
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'blog')); ?>" class="Header__Link">
                        Blogg
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url($harbor . "-" . 'persongalleri')); ?>" class="Header__Link">
                        Persongalleri
                    </a>
                </li>
            </ul>
        </nav>
    <?php
};
