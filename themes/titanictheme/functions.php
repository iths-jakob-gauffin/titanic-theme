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

function titanic_post_types(){
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'public' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar-alt'

    ));

    register_post_type('harbor', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies' => array('topics','category'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Harbors',
            'add_new_item' => 'Add New Harbor',
            'edit_item' => 'Edit Harbor',
            'all_items' => 'All Harbors',
            'singular_name' => 'Harbor'
        ),
        'menu_icon' => 'dashicons-sos'
    ));

    register_post_type('gallery', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies' => array('topics','category'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Gallery',
            'add_new_item' => 'Add New Gallery',
            'edit_item' => 'Edit Gallery',
            'all_items' => 'All Galleries',
            'singular_name' => 'Gallery'
        ),
        'menu_icon' => 'dashicons-admin-users'
    ));

    register_taxonomy_for_object_type('post_tag', 'harbor');
};

add_action('init', 'titanic_post_types');

function headerPizza($harbor){
    // echo var_dump($harbor);
    ?>
        <nav class="Header__Nav">
            <ul class="Header__NavList">
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('events')); ?>" class="Header__Link">
                        Events
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('butiken')); ?>" class="Header__Link">
                        Butiken
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('/accommodation/' . $harbor)); ?>" class="Header__Link">
                        Boka
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('hamnar')); ?>" class="Header__Link">
                        Hamnar
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('service')); ?>" class="Header__Link">
                        Service
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('blog')); ?>" class="Header__Link">
                        Blogg
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('personal-galleri')); ?>" class="Header__Link">
                        Personal galleri
                    </a>
                </li>
            </ul>
        </nav>
    <?php
};
