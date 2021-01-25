<?php get_header(); 

$harbors = new WP_Query(array(
    'post_type' => 'harbor'
));

$harborsArray = $harbors->posts;

$specificHarbor = [];
    foreach($harbors->posts as $harbor){
        if(strtolower($harbor->post_title) === strtolower($_SESSION['hamn'])){
            array_push($specificHarbor, $harbor);
        }
    }

    $cats = wp_get_post_categories($specificHarbor[0]->ID);
    foreach($cats as $cat){
        $name = get_cat_name( $cat );   
    }

    $imgUrl = "";

    foreach ($harborsArray as $value) {
        if(strtolower($_SESSION['hamn']) === strtolower($value->post_title)){
            $stuff = get_post_thumbnail_id( $value->ID );
            $imgUrl = get_the_post_thumbnail_url($value->ID, "backgroundImage");
        }
    }
    wp_reset_postdata();

    echo var_dump($specificHarbor[0]->post_title);

    $events = new WP_Query(array(
        'numberposts' => 5,
        'post_type' => 'event',
        'meta_query' => array(
            array(
                'key' => 'hamn',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        )
    ));
    wp_reset_postdata();
    // echo var_dump($events->posts);

    $posts = new WP_Query(array(
        'numberposts' => 5,
        'post_type' => 'post',
        'meta_query' => array(
            array(
                'key' => 'hamn',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        )
    ));
    wp_reset_postdata();
    ?>


    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo ucfirst($_SESSION['hamn']); ?>s gästhamn
                </h1>
                <p style="font-size: 3rem; color: white;">Single-harbor.php</p>
            </div>
        </div>  
    </div>  
    <div class="container">
        <main class="SingleHarbor">
            <?php while(have_posts()){
                the_post();
                ?> 
                    <div class="SingleHarbor__RichTextAndMapWrapper">
                        <section class="SingleHarbor__RichText">
                            <?php the_content(); ?>
                            <a href="<?php echo esc_url(site_url("accommodation/" . strtolower($_SESSION['hamn']))); ?>" class="SingleHarbor__BookingButton" >Till bokningen</a>
                        </section>
                        <div class="SingleHarbor__MapWrapper">
                            <?php echo get_field("map_url"); ?>
                        </div>
                    </div>
                    <?php 
                    $carouselId = get_field("carousel_id");
                    if($carouselId){?>
                        <div class="SingleHarbor__Carousel">
                            <?php $shortCode = '[metaslider id="' . $carouselId . '"]';
                            echo do_shortcode($shortCode); ?>
                        </div>
                    <?php
                    };
                    
            }; 
            ?>
            <aside class="SingleMRT__Amenities">
                <span class="SingleMRT__AmenitieTitle">
                    Bekvämligheter
                </span>
                <ul class="SingleMRT__AmenitieList">
                    <?php 
                    $icons = array('butik' => "fas fa-store-alt",
                        'restaurang' => "fas fa-utensils",
                        'toalett' => "fas fa-restroom",
                        'kreditkort' => "far fa-credit-card",
                        'wifi' => "fas fa-wifi",
                        'handikappsanpassat' => "fab fa-accessible-icon",
                        'övernattning' => "fas fa-bed",
                        'bensinstation' => "fas fa-gas-pump",
                        'laddstation' => "fas fa-charging-station",
                        'dusch' => "fas fa-shower",
                        'motionsspår' => "fas fa-running",
                        'rastplats' => 'fas fa-paw',
                        'matsal' => 'fas fa-apple-alt',
                        'dusch' => "fas fa-shower",
                        'handikappsanpassat' => 'fas fa-wheelchair',
                        'tennis' => 'fas fa-baseball-ball',
                    );
                    
                    $cats = wp_get_post_categories($specificHarbor[0]->ID);
                    foreach($cats as $cat){
                        $name = get_cat_name( $cat ); 
                        ?> 
                        <li class="SingleMRT__AmenitieListItem">
                        <i class="<?php echo $icons[mb_strtolower($name)]; ?>" aria-hidden=true></i>
                        <?php echo $name; ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </aside>
                
            
        </main>
    </div>



<?php get_footer(); ?>