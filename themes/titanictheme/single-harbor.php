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

    // echo var_dump($specificHarbor[0]->post_title);

    $today = date("Ymd");

    $events = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'hamn',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            ),
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));
    // wp_reset_postdata();
    // echo var_dump($events->posts);
    
    $blogPosts = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'meta_query' => array(
            array(
                'key' => 'hamn',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
                )
                )
    ));
    // echo var_dump($blogPosts->posts);
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
                            <div class="SingleHarbor__RichTextWrapper">      
                                <?php the_content(); ?>
                            </div><div class="SingleHarbor__ButtonWrapper">
                                <a href="<?php echo esc_url(site_url("accommodation/" . strtolower($_SESSION['hamn']))); ?>" class="SingleHarbor__BookingButton SingleHarbor__BookingButton--Entry" >Till bokningen</a>
                            </div>
                        </section>
                        <div class="SingleHarbor__MapWrapper">
                            <?php echo get_field("map_url"); ?>
                        </div>
                    </div>
                    <hr class="FrontPage__Hr FrontPage__Hr--SingleHarbor">
                    
                    <?php
                    
            }; 
            ?>
            <h2 class="SingleHarbor__SectionHeader">Mer information om <?php echo ucfirst($_SESSION['hamn']); ?></h2>
            <section class="SingleHarbor__ExtraInfoSection">
                
                <div class="SingleHarbor__Amenities SingleHarbor__Amenities--Amenities">
                    <span class="SingleHarbor__AmenitieTitle">
                        Bekvämligheter
                    </span>
                    <ul class="SingleHarbor__AmenitieList">
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
                            <li class="SingleHarbor__AmenitieListItem">
                            <i class="<?php echo $icons[mb_strtolower($name)]; ?>" aria-hidden=true></i>
                            <?php echo $name; ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="SingleHarbor__Amenities SingleHarbor__Amenities--Events">
                    <span class="SingleHarbor__AmenitieTitle">
                        Kommande events
                    </span>
                    <ul class="SingleHarbor__EventList">
                        <?php 
                        while($events->have_posts()){
                            $events->the_post();

                            $date = new DateTime(get_field('event_date'));

                            $thumbnail = get_field("event_image");
                            ?> 
                            <li class="SingleHarbor__EventListItem">
                                <a href="<?php the_permalink(); ?>" class="SingleHarbor__AmenitieLink"></a>
                                <div class="SingleHarbor__DateAndEventTitleWrapper">
                                    <div class="__DateWrapper">
                                        <span class="SingleHarbor__EventDay">
                                                <?php echo $date->format('d'); ?>
                                        </span>
                                        <span class="SingleHarbor__EventMonth">
                                            <?php echo $date->format('M'); ?>
                                        </span>
                                    </div>
                                    <h5 class="SingleHarbor__EventTitle">
                                        <?php the_title(); ?>
                                    </h5>
                                </div>
                                <div class="SingleHarbor__EventThumbnailWrapper">
                                    <img src="<?php echo $thumbnail['sizes']['thumbnail']; ?>" alt="" class="SingleHarbor__EventThumbnail">
                                </div>
                                
                            
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="SingleHarbor__Amenities SingleHarbor__Amenities--Posts">
                    <span class="SingleHarbor__AmenitieTitle">
                        Blogginlägg
                    </span>
                    <ul class="SingleHarbor__PostList">
                        <?php 
                        while($blogPosts->have_posts()){
                            $blogPosts->the_post();

                            $thumbnail = get_the_post_thumbnail_url();
                            ?> 
                            <li class="SingleHarbor__PostListItem">
                                <a href="<?php the_permalink(); ?>" class="SingleHarbor__AmenitieLink"></a>
                                <div class="SingleHarbor__PostTextWrapper">
                                    <div class="SingleHarbor__TitleAndDateWrapper">
                                        <h5 class="SingleHarbor__PostTitle">
                                            <?php echo mb_strimwidth(get_the_title(), 0 , 40, "..."); ?>
                                        </h5>
                                        <p class="SingleHarbor__PublishedDate">
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                    <p class="SingleHarbor__PostContent">
                                        <?php echo wp_trim_words(get_the_content(), 25); ?>
                                    </p>
                                </div>
                                <div class="SingleHarbor__PostThumbnailWrapper">
                                    <img src="<?php echo $thumbnail; ?>" alt="" class="SingleHarbor__PostThumbnail">
                                </div>
                                
                            
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <hr class="FrontPage__Hr FrontPage__Hr--SingleHarbor">
            
                
            <?php 
                while(have_posts()){
                    the_post();
                    $carouselId = get_field("carousel_id");
                    // echo var_dump($carouselId);
                    if($carouselId){?>
                    <h2 class="SingleHarbor__SectionHeader">Bilder från <?php echo ucfirst($_SESSION['hamn']); ?>s hamn</h2>
                    <div class="SingleHarbor__Carousel">
                        <?php $shortCode = '[metaslider id="' . $carouselId . '"]';
                        echo do_shortcode($shortCode); ?>
                    </div>

                <?php
                }
                };?>
            <a href="<?php echo esc_url(site_url("accommodation/" . strtolower($_SESSION['hamn']))); ?>" class="SingleHarbor__BookingButton SingleHarbor__BookingButton--Large" >Till bokningen</a>
        </main>
    </div>



<?php get_footer(); ?>