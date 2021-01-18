<?php

function titanicFiles(){
    //fonts
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Palanquin&display=swap', false);
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false);

    //font awesome
    // wp_enqueue_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', array(), null );
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.9.0/css/all.css' );
    
    wp_register_style('titanicCss', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('titanicCss');

    wp_enqueue_script('jquery');

    wp_register_script('titanicJs', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('titanicJs');

    // $test = get_current_blog_id();
    // echo var_dump($test);
    

    global $post;
    if($post->post_type === "mphb_room_type"){
        wp_register_script('jakobsRoomTypeJavascript', get_template_directory_uri() . '/dist/booking.js', ['jquery'], 1, true);
        wp_enqueue_script('jakobsRoomTypeJavascript');
    } 

    if(is_search() || is_front_page()){
        echo "JAAA";
        wp_register_script('jakobsSearchResultJavascript', get_template_directory_uri() . '/dist/search.js', ['jquery'], 1, true);
        wp_enqueue_script('jakobsSearchResultJavascript');
    } else{
        echo "nejsan";
    }


}

add_action('wp_enqueue_scripts', 'titanicFiles');


function titanicFeatures(){

    add_theme_support('post-thumbnails');

    add_image_size( 'pizza', 479, 400, true );
    add_image_size( 'backgroundImage', 1440, 500, true );

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

function navList($harbor){
    if($harbor === "NOLLSTÄLLD"){
        ?>
        <nav class="Header__Nav">
            <ul class="Header__NavList">
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('harbor')); ?>" class="Header__Link">
                        Hamnar
                    </a>
                </li>
            </ul>
        </nav>
        <?php
    } else {
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
                    <a href="<?php echo esc_url(site_url('harbor')); ?>" class="Header__Link">
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
                    <a href="<?php echo esc_url(site_url('gallery')); ?>" class="Header__Link">
                        Personalgalleri
                    </a>
                </li>
            </ul>
        </nav>

        <?php
    }

    ?>
        
    <?php
};


// inkludera custom post types i söket
function include_cpt_search( $query ) {

	
    if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'event', 'harbor' ) );
    }
    
    return $query;
    
}
add_filter( 'pre_get_posts', 'include_cpt_search' ); 


function searchResult($result, $withHarbor = false){
    ?>
    <div class="Search__ResultCardWrapper">
        <a class="Search__ResultLink" href="<?php the_permalink($result); ?>">
            <h4 class="Search__ResultText"><?php echo $result->post_title; ?></h4>
            <div class="Search__LabelWrapper">
                <?php
                if($withHarbor){?>
                    <h5 class="Search__ResultHarbor">
                    <?php 
                    $resultHarbor = get_field("hamn", $result->ID);
                    echo $resultHarbor[0]->post_title; ?>
                    </h5>        
                    <span class="Search__Slash"> / </span>
                <?php
                }
                ?>
                <h5 class="Search__ResultPostType"><?php echo $result->post_type; ?></h5>
            </div>
        </a>
    </div>
<?php            
}
