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
        // echo var_dump($name);
    }

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
            }; 
            ?>
            
        </main>
    </div>



<?php get_footer(); ?>