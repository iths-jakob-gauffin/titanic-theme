<?php get_header(); ?>

    <div class="container">
        <main class="Single">
            <h1 class="Single__Title">
                Single-mphb_room_type.php
            </h1>

            <?php
            $currentUrl = home_url( add_query_arg( null, null ));
    
            $test = checkIfUrlContainsString($currentUrl, 'visby');
            
            // $harbors = get_posts( array(
            //     'post_type' => 'harbor'
            // ));
            
            // $fieldet = get_field('hamn');
            // echo var_dump($field);
    
            // if($test){
            //     $_SESSION['hamn'] = "Visby";
            // };
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