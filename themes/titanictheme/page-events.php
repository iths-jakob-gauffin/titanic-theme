<?php get_header(); ?>

    <h1>Det här är page-events.php</h1>
    <div class="container">
    <?php

    $today = date('Ymd');

    $events = new WP_Query(array(
        'post_type' => 'event',
        'meta_key' => 'event_date', 
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));

    while($events->have_posts()){    
        $events->the_post();
        $date = new DateTime(get_field('event_date'));
        
        $fixedDate = $date->format('d M, Y');
        
        $time = new DateTime(get_field('event_time'));
        $fixedTime = $time->format('H : i');
        $hamnen = get_field('hamn')[0]->post_title;            


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
    wp_reset_postdata();
    ?>
    </div>

<?php get_footer(); ?>