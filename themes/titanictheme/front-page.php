<?php get_header(); ?>

    <h1>Det här är front-page.php</h1>

    <?php

    while(have_posts()){
        the_post();

        ?>
        <div class="container">
            <div class="Page__Container">
                <h1 class="Page__Title">
                    <?php the_title(); ?>
                </h1>
                <?php the_content(); ?>
            </div>
        </div>
    <?php
    }
    ?>

<?php get_footer(); ?>