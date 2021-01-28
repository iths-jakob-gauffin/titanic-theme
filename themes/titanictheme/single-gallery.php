<?php get_header(); ?>

    <div class="container">
        <main class="Single">
            <?php

            while(have_posts()){
                the_post(); 
            ?>

            <div class="Single__Title"><?php the_title(); ?></div>
            <div class="Single__FormWrapper"><?php the_content(); ?></div>

            <?php
        }


    ?>
        </main>
    </div>



<?php get_footer(); ?>