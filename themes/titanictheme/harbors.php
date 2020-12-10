<?php get_header(); ?>

    <h1>Det här är harbor.php</h1>
    <?php

    while(have_posts()){
        the_post();

        ?>
        <div class="container">
            <div class="Page__Container" style="background-image: url('<?php the_post_thumbnail_url('pizza'); ?>')">
                <h1 class="Page__Title">
                    <?php the_title(); ?>
                </h1>
                <?php the_content(); 
                ?>

            </div>
        </div>
    <?php
    }
    ?>

<?php get_footer(); ?>