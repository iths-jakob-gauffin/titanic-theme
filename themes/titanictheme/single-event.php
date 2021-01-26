<?php get_header(); 
    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));
    $harborsArray = $harbors->posts;

    $imgUrl = "";
    
    foreach ($harborsArray as $value) {
        // echo var_dump($_SESSION['hamn']);
        // echo var_dump($value->post_title);
        if(strtolower($_SESSION['hamn']) === strtolower($value->post_title)){
            // echo var_dump($value);
            $stuff = get_post_thumbnail_id( $value->ID );
            // echo var_dump(get_the_post_thumbnail(  ));
            $imgUrl = get_the_post_thumbnail_url($value->ID, "backgroundImage");
        }
    }
    // echo var_dump($imgUrl);
?>
    <!-- --------Header-------- -->
    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo ucfirst($_SESSION['hamn']); ?>s Event
                </h1>
            </div>
        </div>  
    </div>  
<!-- --------Header slut---------- -->
    <div class="Event">
        <main class="SingleEvent">
    <?php

    while(have_posts()){
        the_post(); 
        $eventImage = get_field('event_image')['sizes']['pizza'];
    ?>
    <div class="SingleEvent__MainContainer">
        <div class="SingleEvent__CustomFieldImageContainer">
            <img src="<?php echo $eventImage;?>" class="SingleEvent__CustomFieldImage">
        </div>
        <h2 class="SingleEvent__Title">
            <?php the_title(); ?>
        </h2>
        <h5 class="SingleEvent__Date">
            <?php the_date(); ?>
        </h5>
        <div class="SingleEvent__Text">
            <?php the_content(); the_excerpt();?>
        </div> 
            <a href="/event/"><button class="SingleEvent__Button">Boka plats</button></a>            
        </div> 
               
        <?php 
    }
    wp_reset_postdata();
    ?>
        </main>
        </div>

<?php get_footer(); ?>