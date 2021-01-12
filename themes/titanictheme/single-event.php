<?php get_header(); ?>

    <div class="container">
        <main class="Single">
            <h1 class="Single__Title">
                Single-event.php
            </h1>

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