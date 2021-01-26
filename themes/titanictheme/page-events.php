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

<!-- --------Header-------- -->
<div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                Kommande Events för <?php echo ucfirst($_SESSION['hamn']); ?>s gästhamn
                </h1>
            </div>
        </div>  
    </div>  
<!-- --------Header slut---------- -->
    <main class="Events">
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

    ?> <ul class="Events__OuterList">
    
    <?php

    while($events->have_posts()){    
        $events->the_post();
        $date = new DateTime(get_field('event_date'));
        
        $fixedDate = $date->format('d M, Y');
        
        $time = new DateTime(get_field('event_time'));
        $fixedTime = $time->format('H : i');
        $hamnen = get_field('hamn')[0]->post_title;            
        $eventImage = get_field('event_image')['sizes']['pizza'];

    if(strtolower($hamnen) === strtolower($_SESSION['hamn'])){
    ?>
            <li class="Events__OuterListItem">
                <a class="Events__Link" href="<?php the_permalink(); ?>">
                    <ul class="Events__List">
                        <li class="Events__ListItem">

                            <div class="Events__CustomFieldImageContainer">
                                <img src="<?php echo $eventImage;?>" class="Events__CustomFieldImage">
                            </div>
                            
                            <h1 class="Events__ListTitle">
                                <?php the_title(); ?>
                            </h1>
                            <h2  class="Events__CardContentText">
                                <?php the_content(); the_excerpt();?>
                            </h2>
                            <h2 class="Events__CardContentTime">
                                <?php echo $fixedDate . ", kl: " . $fixedTime; ?>
                            </h2>

                        </li>
                    </ul>
                </a>
            </li>
        <?php
    
        }

    }
    wp_reset_postdata();
    ?>
    </ul>
    </main>

<?php get_footer(); ?>