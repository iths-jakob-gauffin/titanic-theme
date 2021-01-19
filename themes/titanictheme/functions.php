<?php

function titanicFiles(){
    //fonts
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Palanquin&display=swap', false);
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false);

    //font awesome
    // wp_enqueue_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', array(), null );
    wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' );
    
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
        // echo "JAAA";
        wp_register_script('jakobsSearchResultJavascript', get_template_directory_uri() . '/dist/search.js', ['jquery'], 1, true);
        wp_enqueue_script('jakobsSearchResultJavascript');
    } else{
        // echo "nejsan";
    }


    if(is_page( "booking-confirmation" )){
        wp_register_script('jakobsConfirmBookingJavascript', get_template_directory_uri() . '/dist/confirm.js', ['jquery'], 1, true);
        wp_enqueue_script('jakobsConfirmBookingJavascript');
        // echo "det är bokning";
    } else {
        // echo "DET ÄR INTE BOKNING";
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
        'capability_type' => 'event',
        'map_meta_cap' => true,
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
        'capability_type' => 'harbor',
        'map_meta_cap' => true,
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
        'capability_type' => 'gallery',
        'map_meta_cap' => true,
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
    $currentUrl = home_url( add_query_arg( null, null ));
    if($harbor === "NOLLSTÄLLD"){
        ?>
        <nav class="<?php 
        
        if(is_user_logged_in() ){
            echo "Header__Nav Header__Nav--LoggedIn";
        }else{
            echo "Header__Nav";
        }
        ?>">
            <ul class="Header__NavList">
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('harbor')); ?>" class="<?php 
                    $activePage = is_post_type_archive("harbor");
                    $cssClass = ($activePage? "Header__Link Header__Link--Active" : "Header__Link");
                    echo $cssClass;
                    ?>">
                        <p class="Header__LinkText">
                            Hamnar
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                            
                        </div>
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
                    <a href="<?php 
                    $urlString = "harbor/" . $_SESSION['hamn']; 
                    echo esc_url(site_url($urlString)); ?>" class="<?php 
                    $activePage = is_singular("harbor");
                    $cssClass = ($activePage? "Header__Link Header__Link--Active" : "Header__Link");
                    echo $cssClass;
                    ?>">
                        <p class="Header__LinkText">    
                            <?php echo ucfirst($_SESSION['hamn']); ?>
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                            
                        </div>
                    </a>
                </li>
                <li class="Header__ListItem">
                    
                    <a href="<?php echo esc_url(site_url('events')); ?>"
                    class="<?php 
                    $activePage = is_page("events");
                    $cssClass = ($activePage? "Header__Link Header__Link--Active" : "Header__Link");
                    echo $cssClass;
                    ?>">
                        <p class="Header__LinkText">
                            Events
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                            
                        </div>
                    </a>
                </li>
                <li class="Header__ListItem">
                <a href="<?php 
                $bookingHarborUrl = "accommodation/" . strtolower($harbor) . "/";
                echo esc_url(site_url($bookingHarborUrl)); ?>"
                    class="<?php 
                    ;
                    $activePage = checkIfUrlContainsString($currentUrl, $bookingHarborUrl);
                    $cssClass = ($activePage? "Header__Link Header__Link--Active":"Header__Link");
                    echo $cssClass;
                    ?>"
                    >
                        <p class="Header__LinkText">
                            Boka
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                        </div>
                    </a>
                </li>
                <!-- <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('harbor')); ?>" class="Header__Link">
                        Hamnar
                    </a>
                </li> -->
                <!-- <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('service')); ?>" class="Header__Link">
                        Service
                    </a>
                </li> -->
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('blog')); ?>" 
                    class="<?php 
                    $activePage = is_home() || is_singular('post');
                    $cssClass = ($activePage? "Header__Link Header__Link--Active" : "Header__Link");
                    echo $cssClass;
                    ?>"
                    >
                        <p class="Header__LinkText">
                            Blogg
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                        </div>
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('gallery')); ?>" 
                    class="<?php 
                    $activePage = is_post_type_archive( "gallery" );
                    $cssClass = ($activePage? "Header__Link Header__Link--Active" : "Header__Link");
                    echo $cssClass;
                    ?>"
                    >
                        <p class="Header__LinkText">
                            Personal
                        </p>
                        <div class="<?php 
                        $cssClass = ($activePage? "Header__LinkIconWrapper Header__LinkIconWrapper--Active": "Header__LinkIconWrapper");
                        echo $cssClass;
                        ?>">

                            <img src="<?php 
                            $iconUrl = ($activePage? "anchorwhite.svg": "anchor.svg");
                            
                            echo get_template_directory_uri() . '/dist/icons/' . $iconUrl; ?>" alt="">
                        </div>
                    </a>
                </li>
            </ul>
        </nav>

        <?php
    }

    ?>
        
    <?php
};


function wp_search_form( $form ) { $form = "<section class='search search-form'><form role='search' method='get' action='" . home_url( "/" ) . "' > <label class='screen-reader-text' for='s'>" . __("", "domain") . "</label> <input type='search' class='search-field  Header__SearchField' value='" . get_search_query() . "' name='s' id='s' placeholder='T.ex. \"bensin\", \"tennis\", \"butik\" etc.' /> <button type='submit' id='searchsubmit' class='search-submit Search__Button' value='". esc_attr__("Sök", "domain") ."' ><i class='fa fa-search'></i></button> </form></section>"; return $form; } add_filter( 'get_search_form', 'wp_search_form' );

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

//Ändrar loggan på login-sidan
function my_login_logo() { 
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false);

    wp_register_style('titanicCss', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('titanicCss');

    

    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/Ankra_Logo2.svg);
            height:35px;
            width:300px;
            background-size: 200px 35px;
            background-repeat: no-repeat;
            background-position: center;
            margin-bottom: 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function loginTitle(){
    return get_bloginfo("name");
}
add_filter('login_headertitle', "loginTitle");


function logoLoginUrl(){
    return esc_url(site_url("/"));
}


add_filter("login_headerurl", "logoLoginUrl");

function redirect_after_logout(){
    wp_redirect( '/' );
    exit();
}

add_action('wp_logout','redirect_after_logout');

function redirectToFrontend(){
    $ourMember = wp_get_current_user();

    if(count($ourMember->roles) == 1 AND $ourMember->roles[0] == 'subscriber'){
        wp_redirect(site_url('/'));
        exit;
    }
}
add_action('admin_init', 'redirectToFrontend');

function noAdminBarForSubs(){
    $ourMember = wp_get_current_user();

    if(count($ourMember->roles) == 1 && $ourMember->roles[0] == "subscriber"){
        show_admin_bar( false );
    }
}

add_action("wp_loaded", "noAdminBarForSubs");

