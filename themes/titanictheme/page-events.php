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
        }}
        // echo var_dump($imgUrl); ?>
    
    <h1>Det här är page-events.php</h1>
<!-- --------Header-------- -->
    <div class="Events">
        <div class="Events__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
         <div class="Events__TitleWrapper">
            <h1 class="Events__Title">
               Event
            </h1>
        </div>
    </div>
<!-- --------Header slut---------- -->
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
                    <h1 class="Events__ListTitle">
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