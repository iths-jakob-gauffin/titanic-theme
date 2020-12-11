<?php get_header(); ?>

    <h1>Det här är page-personal-galleri.php</h1>
    <div class="container">
    <?php

    $gallery = new WP_Query(array('post_type' => 'gallery'));

    while($gallery->have_posts()){    
        $gallery->the_post();
        // $date = new DateTime(get_field('event_date'));
        
        // $fixedDate = $date->format('d M, Y');
        
        // $time = new DateTime(get_field('event_time'));
        // $fixedTime = $time->format('H : i');
        $hamnen = get_field('hamn')[0]->post_title;            

        echo var_dump($gallery);

        if(strtolower($hamnen) === strtolower($_SESSION['hamn'])){
            ?>
        
            <ul class="Events__List">
                <li class="Events__ListItem">
                    <h1 class="Events__Title">
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); the_excerpt(); 
                    ?>
                    <h2><?php echo $fixedDate . ", kl: " . $fixedTime; ?></h2>
                </li>
            </ul>
        
        <?php

        }

        
    }
    ?>
    </div>

<?php get_footer(); ?>