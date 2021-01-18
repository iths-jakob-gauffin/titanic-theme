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
<<<<<<< HEAD
            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
=======
            <img src="<?php echo get_the_post_thumbnail_url('backgroundImage');?>" alt="">
>>>>>>> suriyan

            <?php
        }

    ?>
        </main>
    </div>



<?php get_footer(); ?>