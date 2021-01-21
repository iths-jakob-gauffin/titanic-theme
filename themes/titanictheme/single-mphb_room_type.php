<?php get_header(); 

    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));

    $harborsArray = $harbors->posts;

    
    $harborInfo = new WP_Query(array(
        'post_type' => 'harbor'
    ));

    // echo var_dump($harborInfo->posts);
    // $correct = array_filter($harborInfo->posts, function(){
    //     foreach
    // })w
    $specificHarbor = [];
    foreach($harborInfo->posts as $harbor){
        if(strtolower($harbor->post_title) === strtolower($_SESSION['hamn'])){
            array_push($specificHarbor, $harbor);
        }
    }

    // echo var_dump($specificHarbor);
    // echo var_dump(wp_get_post_categories($specificHarbor[0]->ID));
    $cats = wp_get_post_categories($specificHarbor[0]->ID);
    foreach($cats as $cat){
        $name = get_cat_name( $cat );
        // echo var_dump($name);
    }

    // echo var_dump(wp_list_categories($specificHarbor[0]->ID));
    // echo var_dump(get_categories(1));



    // jag vill ta fram posten med samma post_title som sessionsvariabeln, för att komma åt den postens thumbnail

    $imgUrl = "";

    foreach ($harborsArray as $value) {
        if(strtolower($_SESSION['hamn']) === strtolower($value->post_title)){
            $stuff = get_post_thumbnail_id( $value->ID );
            $imgUrl = get_the_post_thumbnail_url($value->ID, "backgroundImage");
        }
    }
    wp_reset_postdata();

?>

    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo ucfirst($_SESSION['hamn']); ?> - bokning
                </h1>
                <p style="font-size: 3rem; color: white;">Single-mphb_room_type.php</p>
            </div>
        </div>  
    </div>  
    <div class="container">
        <main class="SingleMRT">
            <div class="SingleMRT__EntryInfoWrapper">
                <section class="SingleMRT__RichText">
                    <?php 
                    
                        echo apply_filters( 'the_content', $specificHarbor[0]->post_content );;
                    ?>
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
            <?php
            $currentUrl = home_url( add_query_arg( null, null ));
    
            $test = checkIfUrlContainsString($currentUrl, 'visby');

            // global $post;
            // echo var_dump($post);

            $rooms = new WP_Query(array(
                'post_type' => 'mphb_room_type'
            ));
            // echo var_dump($rooms->posts);

            while(have_posts()){
                the_post(); 

            ?>
            
            <div class="SingleMRT__FormWrapper"><?php the_content(); ?></div>

            <?php
        }


    ?>
        </main>
    </div>



<?php get_footer(); ?>