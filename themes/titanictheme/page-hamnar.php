<?php get_header(); ?>

    <div class="container">
    <?php

    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));

    while($harbors->have_posts()){
        $harbors->the_post();

        $titleValue = get_the_title();

        $tags = get_the_tags();

        // echo var_dump($taggar);
        

        if(strtolower($titleValue) === strtolower($_SESSION['hamn'])){
            ?>
                <div class="Page__Container" style="background-image: url('<?php the_post_thumbnail_url('pizza'); ?>')">
                    <h1 class="Page__Title">
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); 
                    ?>
                    <ul class="PageHamnar__TagList">
                        <?php 
                            if($tags){
                                foreach($tags as $tag){
                            ?>
                                    <li class="PageHamnar__TagListItem">
                                        <?php echo $tag->name ?>
                                    </li>
                                <?php
                            };
                                
                            }
                        
                        ?>
                        
                    </ul>

                </div>

            <?php
        }

        
            
    }
    wp_reset_postdata();
    ?>
    </div>

<?php get_footer(); ?>






