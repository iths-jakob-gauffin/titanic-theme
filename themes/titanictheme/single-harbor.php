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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32962.146389033776!2d17.910816208137916!3d58.91240958663116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f587fa432eff5%3A0x400fef341e48d00!2sNyn%C3%A4shamn!5e0!3m2!1sen!2sse!4v1610613478475!5m2!1sen!2sse" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </main>
    </div>



<?php get_footer(); ?>