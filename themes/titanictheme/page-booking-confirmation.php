<?php get_header(); 

    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));
    $harborsArray = $harbors->posts;


    $specificHarbor = [];
    foreach($harborsArray as $harbor){
        if(strtolower($harbor->post_title) === strtolower($_SESSION['hamn'])){
            array_push($specificHarbor, $harbor);
        }
    }

    $imgUrl = "";

    foreach ($harborsArray as $value) {
        if(strtolower($_SESSION['hamn']) === strtolower($value->post_title)){
            $stuff = get_post_thumbnail_id( $value->ID );
            $imgUrl = get_the_post_thumbnail_url($value->ID, "backgroundImage");
        }
    }
    wp_reset_postdata();

    // $currentUrl = home_url( add_query_arg( null, null ));
    // echo var_dump($currentUrl);

    $rooms = new WP_Query(array(
        'post_type' => 'mphb_room_type',
    ));
    // echo var_dump($rooms->posts);
    $currentUrl = home_url( add_query_arg( null, null ));
    while(have_posts()){
        the_post();

        if(!checkIfUrlContainsString($currentUrl, "?step=booking")){
        ?>
        <div class="Search__BackgroundImageWrapper">
            <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
                <div class="Search__TitleWrapper">
                    <h1 class="Search__Title">
                    <?php echo ucfirst($_SESSION['hamn']); ?> - bokning
                    </h1>
                    <p style="font-size: 3rem; color: white;">Det här är page-booking-confirmation.php</p>
                </div>
            </div>  
        </div> 
        <div class="container">
            <div class="Booking">
                <!-- <?php 
                $keys = array_keys($_REQUEST['mphb_rooms_details']);
                // echo var_dump($_REQUEST['mphb_rooms_details']); 
                // echo var_dump($keys[0]); 

                $rooms = new WP_Query(array(
                    'post_type' => 'mphb_room_type',
                ));
                // echo var_dump($rooms->posts);
                // echo var_dump($rooms);
                foreach ($rooms->posts as $room) {
                    // echo var_dump($room->ID);
                    if($room->ID === $keys[0]){
                        // echo $room->post_title;
                        $_SESSION['hamn'] = strtolower($room->post_title);
                    }
                }
                ?> -->
                <section class="Booking__FormWrapper">
                    <?php the_content(); ?>                
                </section>

                <aside class="Booking__Amenities">
                    <span class="Booking__AmenitieTitle">
                        Bekvämligheter
                    </span>
                    <ul class="Booking__AmenitieList">
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
                            <li class="Booking__AmenitieListItem">
                                <i class="<?php echo $icons[mb_strtolower($name)]; ?>" aria-hidden=true></i>
                            <?php echo $name; ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </aside>
            </div>
        </div>            
        <?php
        } else{?>
        <div class="BackgroundImageWrapper">
            <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
                <div class="Search__TitleWrapper">
                    <h1 class="Search__Title">
                    <?php echo ucfirst($_SESSION['hamn']); ?> - bokningsbekräftelse
                    </h1>
                    <p style="font-size: 3rem; color: white;">page-booking-confirmation.php else-statementet</p>
                </div>
            </div>  
        </div>  
        <div class="container">
            <main class="SingleMRT">
                <div class="SingleMRT__EntryInfoWrapper">
                    <section class="SingleMRT__RichText">
                        <h1 class="Booking__ConfirmationTitle">Tack!</h1>
                        <p class="Booking__ConfirmationText">Vi har tagit emot din beställning.</p>
                        <a href="<?php echo esc_url(site_url("harbor/" . $_SESSION['hamn']))?>" class="Booking__BackToHarborButton">Till <?php echo ucfirst($_SESSION['hamn']); ?>s hemsida</a>
                    </section>
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
                </div>
            </main>
        </div>
        <?php
        }
        ?>
        
    <?php
    }
    ?>

<?php get_footer(); ?>