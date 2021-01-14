<?php get_header(); 

    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));

    $harborsArray = $harbors->posts;


    // jag vill ta fram posten med samma post_title som sessionsvariabeln, för att komma åt den postens thumbnail

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
    wp_reset_postdata();

?>

    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo ucfirst($_SESSION['hamn']); ?> - bokning
                </h1>
            </div>
        </div>  
    </div>  
    <div class="container">
        <main class="Single">
            <h1 class="Single__Title">
                Single-mphb_room_type.php
            </h1>
            
        

            <?php
            $currentUrl = home_url( add_query_arg( null, null ));
    
            $test = checkIfUrlContainsString($currentUrl, 'visby');
            
            echo var_dump($_SESSION['hamn']);

            while(have_posts()){
                the_post(); 
            ?>

            <div class="Single__FormWrapper"><?php the_content(); ?></div>
            <div class=""><?php the_title(); ?></div>

            <?php
        }


    ?>
        </main>
    </div>



<?php get_footer(); ?>