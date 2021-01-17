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
    // echo var_dump($imgUrl);
?>

    <h1>Det här är archive-gallery.php</h1>
    <div class="Gallery">
        <div class="Gallery__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
        ¨<div class="Gallery__TitleWrapper">
            <h1 class="Gallery__Title">
                Personal
            </h1>
        </div>
    </div>
    <div class="container">
        
    <ul class="Gallery__List">
        
        <?php
        global $post;
        echo var_dump($post);
        while(have_posts()){    
            the_post();

            $staff = get_field('hamn')[0]->post_title;  

            $image = get_field('gallery_image')['sizes']['medium'];

            if(strtolower($staff) === strtolower($_SESSION['hamn'])){
                ?>
                <li class="Gallery__ListItem">
                    <ul class="Gallery__CardList">
                        <li class="Gallery__CardListItem">
                            <div class="Gallery__CardImageWrapper">
                                <img src="<?php echo $image; ?>" class="Gallery__Image" alt="">
                            </div>

                            <h2 class="Gallery__CardTitle">
                                <?php the_title(); ?>
                            </h2>

                            <h3 class="Gallery__CardExcerpt">
                            <?php the_excerpt(); ?>
                            </h3>   

                            <h3 class="Gallery__CardContent">
                            <?php the_content(); ?>
                            </h3>   
                        </li>
                    </ul>    
                </li>
                <?php

                }   

                }
                wp_reset_postdata();
                ?>
            
        </ul>
    </div>
</div>

<?php get_footer(); ?>