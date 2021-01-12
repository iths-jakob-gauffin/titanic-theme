<?php get_header(); ?>

    <div class="container">
        <main class="Single">
            <h1 class="Single__Title">
                Single-harbor.php
            </h1>

            <?php while(have_posts()){
                the_post();
                ?> 
                    <h2><?php the_title(); ?></h2>
                    <h2><?php the_content(); ?></h2>
                    <h2><?php the_excerpt(); ?></h2>    
                <?php
            }; 
            ?>

        </main>
    </div>



<?php get_footer(); ?>