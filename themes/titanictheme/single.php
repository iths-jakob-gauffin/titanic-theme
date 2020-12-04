<?php get_header(); ?>

    <div class="container">
        <main class="Single">
            <h1 class="Single__Title">
                <?php the_title(); ?>
            </h1>
            <div class="Single__Text">
                <?php the_content(); ?>
            </div>
        </main>
    </div>



<?php get_footer(); ?>