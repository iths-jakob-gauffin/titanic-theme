<?php get_header(); ?>

    <h1>Det här är page-booking-confirmation.php</h1>
    <?php

    while(have_posts()){
        the_post();

        ?>
        <div class="container">
            <div class="Booking">
                <section class="Booking__FormWrapper">

                    <h1 class="Booking__Title">
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); 
                ?>
                </section>

            </div>
        </div>
    <?php
    }
    ?>

<?php get_footer(); ?>