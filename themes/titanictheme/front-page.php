<?php get_header(); ?>

    <h1>Det här är front-page.php</h1>

    <?php

    while(have_posts()){
        the_post();
        $imageUrl = get_field('hero-background')['url'];
        // echo var_dump($imageUrl);
        // $variabel = get_field('hamn');

        // $harbors = new WP_Query(array(
        //     'post_type' => 'harbor'
        // ));
        // echo var_dump($harbors);

        ?>
        <div class="container">
            <div class="Frontpage__Hero" style="background: url('<?php echo $imageUrl; ?>')" ></div>
            <div class="FrontPage__Container" >
                <h1 class="FrontPage__Title">
                    <?php the_title(); ?>
                </h1>
                
                <?php echo do_shortcode('[mphb_availability_search class="is-style-horizontal-form"]'); ?>

                <?php echo do_shortcode('[mphb_rooms gallery="false" excerpt="false" details="false" price="false" view_button="false" class="FrontPage__FlexWrapper"]'); ?>
            </div>
        </div>
    <?php
    }
    ?>

<?php get_footer(); ?>